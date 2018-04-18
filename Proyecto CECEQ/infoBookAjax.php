<?php
require_once('model/catalog_books_utils.php');

$result=buscarGeneralId($_GET["id"]);

    if($row = mysqli_fetch_assoc($result))
    {
        echo '{
        "libro": {
        "titulo": "'.$row['titulo'].'",
        "autores": "'.$row['autores'].'",
        "apellidos": "'.$row['apellidos'].'",
        "isbn": "'.$row['ISBN'].'",
        "estante": "'.$row['estante'].'",
        "vol": '.$row['volumen'].',
        "edicion": "'.$row['edicion'].'",
        "aEdicion": '.$row['yearE'].',
        "editorial": "'.$row['editorial'].'",
        "anio": '.$row['year'].',
        "coleccion": "'.$row['coleccion'].'",
        "categoriaN": "'.$row['nombreC'].'",
        "categoria": '.$row['idCategoria'].',
        "clave": "'.$row['claveIngreso'].'",
        "fecha": "'.$row['fechaIngreso'].'",
        "usuario": "'.$row['idUsuario'].'",
        "adquisicion": "'.$row['adquisicion'].'",
        "numC": "'.$row['numClasificacion'].'",
        "materias": "'.$row['materias'].'",
        "estado": '.$row['idEstado'].'
        
        }
        }';
        //claveIngreso, fechaIngreso, idUsuario, adquisicion, numClasificacion, materias
        
        /*
        echo'  {
        "name":"John",
        "age":31,
        "pets":[
        { "animal":"dog", "name":"Fido" },
        { "animal":"cat", "name":"Felix" },
        { "animal":"hamster", "name":"Lightning" }
        ]
        }';*/
        
    }

?>