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

function insertBooks(){
    $connection = connect();
    $statement = mysqli_prepare($connection, "
    LOAD DATA INFILE \'uploads/uploaded_file.csv\'
    INTO TABLE upload
    COLUMNS TERMINATED BY \',\'
    LINES TERMINATED BY \'\n\'
    IGNORE 1 LINES;
    ");
    $statement->execute();
    $result = $statement->get_result();
    disconnect($connection);
    return $result;
}

echo insertBooks();


?>