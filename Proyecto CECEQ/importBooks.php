<?php
include("partials/session_functions.php");

if(!$_SESSION["permisos"][4])
    header('Location: menu.php');

require_once('utils.php');

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
    $statement = mysqli_prepare($connection,"
    CREATE TABLE upload (
        titulo varchar(250) NOT NULL,
        yearTitulo int(11) NOT NULL,
        nombre varchar(50) NOT NULL,
        apellido varchar(50) NOT NULL,
        ISBN char(13) NOT NULL,
        estante varchar(10) NOT NULL,
        editorial varchar(50) NOT NULL,
        yearEdicion int(11) NOT NULL,
        volumen int(11),
        claveIngreso varchar(50) NOT NULL,
        coleccion varchar(50),
        edicion int(11),
        adquisicion varchar(15),
        numClasificacion varchar(15),
        materias varchar(60),
        id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY
        );
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
   transferDataToRespectiveTables();
}

function insertBooks(){
    $connection = connect();
    $sql = "
    LOAD DATA LOCAL INFILE ". "'". '../uploads/uploaded_file.csv'."'" . "
    INTO TABLE upload 
    COLUMNS TERMINATED BY ','
    LINES TERMINATED BY '\\n'
    IGNORE 1 LINES;
    ";
    if(mysqli_query($connection,$sql)){
        disconnect($connection);
        return true;
    }else{
        echo "<p>Error: " . $sql . "<br>" . mysqli_error($connection) ."</p>";
        disconnect($connection);
        return false;
    }
    disconnect($connection);
    return $result;
}

function transferDataToRespectiveTables(){
    
    $connection = connect();
    mysqli_begin_transaction($connection);
    $sql =  "
    SELECT idEjemplar
    FROM Ejemplar
    ORDER BY idEjemplar DESC
    LIMIT 1
    ";
    
    if(mysqli_query($connection,$sql)){
        $resultado = mysqli_query($connection,$sql);
        echo "Paso insert titulo";
        $last_id = intval(mysqli_fetch_row($resultado)[0]);
    }else{
        echo "<p>Error: " . $sql . "<br>" . mysqli_error($connection) ."</p>";
    }

    $sql =  "
    SELECT idTitulo
    FROM Titulo
    ORDER BY idTitulo DESC
    LIMIT 1
    ";
    
    if(mysqli_query($connection,$sql)){
        $resultado = mysqli_query($connection,$sql);
        echo "Paso insert titulo";
        $last_id_titulo = intval(mysqli_fetch_row($resultado)[0]);
    }else{
        echo "<p>Error: " . $sql . "<br>" . mysqli_error($connection) ."</p>";
    }

    $sql = "
        INSERT INTO titulo(titulo,year) 
        SELECT u.titulo , u.yearTitulo 
        FROM upload u
        WHERE (u.titulo, u.yearTitulo) NOT IN 
        (SELECT titulo,year FROM titulo)
        GROUP BY u.titulo,u.yearTitulo;
        ";
        if(mysqli_query($connection,$sql)){
            echo "Paso insert titulo";
        }else{
            echo "<p>Error: " . $sql . "<br>" . mysqli_error($connection) ."</p>";
        }

    $sql = "
        INSERT INTO autor(nombre,apellidoPaterno)
        SELECT u.nombre, u.apellido
        FROM upload u
        WHERE (u.nombre, u.apellido)
        NOT IN(SELECT nombre,apellidoPaterno FROM autor);
        ";
        if(mysqli_query($connection,$sql)){
            echo "Paso insert titulo";
        }else{
            echo "<p>Error: " . $sql . "<br>" . mysqli_error($connection) ."</p>";
        }
     
    $sql = "
        INSERT INTO titulo_autor(idTitulo,idAutor)
        SELECT idTitulo, idAutor
        FROM upload u, autor a, titulo t
        WHERE (u.nombre,u.apellido)=(a.nombre,a.apellidoPaterno)
        AND (u.titulo,u.yearTitulo)=(t.titulo,t.year)
        AND (idTitulo,idAutor)
        NOT IN (SELECT idTitulo, idAutor FROM titulo_autor)
        GROUP BY idTitulo,idAutor;
        ";
        if(mysqli_query($connection,$sql)){
            echo "Paso insert titulo";
        }else{
            echo "<p>Error: " . $sql . "<br>" . mysqli_error($connection) ."</p>";
        }
    $sql = "
        INSERT INTO ejemplar(isbn, estante, editorial, year, volumen, claveIngreso, idTitulo, coleccion, edicion, adquisicion, numClasificacion, materias)
        SELECT u.isbn,u.estante,u.editorial,u.yearTitulo,u.volumen ,u.claveIngreso,t.idTitulo, u.coleccion, u.edicion, u.adquisicion, u.numClasificacion, u.materias
        FROM upload u,titulo t
        WHERE (u.titulo, u.yearTitulo) = (t.titulo, t.year);
        ";
        if(mysqli_query($connection,$sql)){
            echo "Paso insert titulo";
        }else{
            echo "<p>Error: " . $sql . "<br>" . mysqli_error($connection) ."</p>";
        }  

    $sql = "
        UPDATE ejemplar
        SET idUsuario= '".$_SESSION["user"]."'
        WHERE idUsuario is NULL;
        ";
        if(mysqli_query($connection,$sql)){
            echo "Paso insert titulo";
        }else{
            echo "<p>Error: " . $sql . "<br>" . mysqli_error($connection) ."</p>";
        }

    $sql = "
        insert into titulo_categoria (idTitulo, idCategoria)
        select ts.idTitulo, us.numClasificacion 
        FROM 
        (select t.idTitulo, t.titulo, t.year, a.nombre, a.apellidoPaterno 
         from titulo t, titulo_autor ta, autor a 
         where t.idTitulo = ta.idTitulo and ta.idAutor = a.idAutor) ts, 
        (select titulo, yearTitulo, nombre, apellido, numClasificacion from upload) us 
        where (ts.titulo, ts.year, ts.nombre, ts.apellidoPaterno) = (us.titulo, us.yearTitulo, us.nombre, us.apellido)
        AND 
        (ts.idTitulo,us.numClasificacion)
        NOT IN (SELECT idTitulo, idCategoria FROM titulo_categoria)
        group by ts.idTitulo, us.numClasificacion
    ";
    if(mysqli_query($connection,$sql)){
        echo "Paso insert titulo";
    }else{
        echo "<p>Error: " . $sql . "<br>" . mysqli_error($connection) ."</p>";
    }

    

    $sql = "
    INSERT INTO ejemplar_estado(idEjemplar,idEstado)
    select idEjemplar, idEstado
    from ejemplar, (select idEstado from estado where idEstado = 5) a
    where idEjemplar >".$last_id."
    ";
    if(mysqli_query($connection,$sql)){
        echo "Paso insert titulo";
    }else{
        echo "<p>Error: " . $sql . "<br>" . mysqli_error($connection) ."</p>";
    }
        
    $sql = "DROP TABLE upload;";
    if(mysqli_query($connection,$sql)){
        echo "Paso insert titulo";
    }else{
        echo "<p>Error: " . $sql . "<br>" . mysqli_error($connection) ."</p>";
    }
    mysqli_commit($connection);
    
    disconnect($connection);
}

?>