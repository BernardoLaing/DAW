<?php
include("utils.php");

function checkIfTableExists(){
    $connection = connect();
    $statement = mysqli_prepare($connection,"
    SHOW TABLES LIKE 'upload';
    ");
    $statement->execute();
    $result = $statement->get_result();
    disconnect($connection);
    return $result;
}

function createTable(){
    $connection = connect();
    //apellido materno va a ser eliminado
    $statement = mysqli_prepare($connection,"
    CREATE TABLE upload (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        titulo varchar(250) NOT NULL,
        yearTitulo int(11) NOT NULL,
        nombre varchar(50) NOT NULL,
        apellido varchar(50) NOT NULL,
        ISBN char(13) NOT NULL,
        estante varchar(10) NOT NULL,
        editorial varchar(50) NOT NULL,
        yearEdicion int(11) NOT NULL,
        volumen int(11),
        fechaIngreso timestamp NOT NULL,
        claveIngreso varchar(50) NOT NULL,
        coleccion varchar(50),
        edicion int(11)
        ) 
    ");
    $statement->execute();
    $result = $statement->get_result();
    disconnect($connection);
    return $result;
}


function importBooks(){
    if(mysqli_num_rows(checkIfTableExists())>0){
        insertBooks();
    }else{
        createTable();
        insertBooks();
    }
}


// FALTA AGREGARLE EL TIMESTAMP AL LOAD DATA
function insertBooks(){
    $connection = connect();
    $sql = "
    START TRANSACTION;

    LOAD DATA LOCAL INFILE ". "'". '../uploads/uploaded_file.csv'."'" . "
    INTO TABLE upload 
    COLUMNS TERMINATED BY ','
    LINES TERMINATED BY '\\n'
    IGNORE 1 LINES;

    INSERT INTO titulo(titulo,year) 
    SELECT u.titulo , u.yearTitulo 
    FROM upload u
    WHERE (u.titulo, u.yearTitulo) NOT IN 
    (SELECT titulo,year FROM titulo);

    INSERT INTO autor(nombre,apellido)
    SELECT u.nombre, u.apellido
    FROM upload u
    WHERE (u.nombre, u.apellido)
    NOT IN(SELECT nombre,apellido FROM autor);

    INSERT INTO titulo_autor(idTitulo,idAutor)
    SELECT idTitulo, idAutor
    FROM upload u, autor a, titulo t
    WHERE (u.nombre,u.apellido)=(a.nombre,a.apellido)
    AND (u.titulo,u.yearTitulo)=(t.titulo,t.year);

    INSERT INTO ejemplar(isbn, estante, editorial, year, volumen, fechaIngreso, claveIngreso, idTitulo, coleccion, edicion, idUsuario,adquisicion, numClasificacion, materias)
    SELECT u.isbn,u.estante,u.editorial,u.year,u.volumen, CURRENT_TIMESTAMP,u.claveIngreso,t.idTitulo, u.coleccion, u.edicion 
    ";
    /*$statement = mysqli_prepare($connection, "
    LOAD DATA INFILE \'uploads/uploaded_file.csv\'
    INTO TABLE upload
    COLUMNS TERMINATED BY \',\'
    LINES TERMINATED BY \'\n\'
    IGNORE 1 LINES;
    ");
    */
    if(mysqli_query($connection,$sql)){
        disconnect($connection);
        return true;
    }else{
        echo "<p>Error: " . $sql . "<br>" . mysqli_error($connection) ."</p>";
        disconnect($connection);
        return false;
    }
    disconnect($connection);
    //$statement->execute();
    //$result = $statement->get_result();
    //disconnect($connection);
    return $result;

    /*function insertVisitante($name,$paternal,$maternal,$bday,$grade,$gender){
        $conn = connect();
        $sql = 'INSERT INTO  visitante(idVisitante,nombre,apellidoPaterno,apellidoMaterno,fechaNacimiento,genero) VALUES (DEFAULT,'. '"' . $name . '", "' . $paternal . '", "'  . $maternal . '",' . $bday . ', "' .$gender . '");';
        if(mysqli_query($conn,$sql)){
            disconnect($conn);
            $idvisitante = getLastIdVisitante();
            if($idvisitante != false){
                if(_insertVisitante_Grado($idvisitante,$grade) == false){
                    echo "<p>No se han ingresado los grados de estudio en la base de datos</p>";
                }
            }
            return true;
        }else{
            echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) ."</p>";
            disconnect($conn);
            return false;
        }
        disconnect($conn);
        */
}

function transferDataToRespectiveTables(){
    
    $connection = connect();
    $statement = mysqli_prepare($connection, "
    START TRANSACTION;

    INSERT INTO titulo(titulo,year) 
    SELECT u.titulo , u.yearTitulo 
    FROM upload u
    WHERE (u.titulo, u.yearTitulo) NOT IN 
    (SELECT titulo,year FROM titulo);

    INSERT INTO autor(nombre,apellido)
    SELECT u.nombre, u.apellido
    FROM upload u
    WHERE (u.nombre, u.apellido)
    NOT IN(SELECT nombre,apellido FROM autor);

    INSERT INTO titulo_autor(idTitulo,idAutor)
    SELECT idTitulo, idAutor
    FROM upload u, autor a, titulo t
    WHERE (u.nombre,u.apellido)=(a.nombre,a.apellido)
    AND (u.titulo,u.yearTitulo)=(t.titulo,t.year);

    INSERT INTO ejemplar(isbn 
    ");
    $statement->execute();
    $result = $statement->get_result();




    disconnect($connection);
    return $result;
}




?>