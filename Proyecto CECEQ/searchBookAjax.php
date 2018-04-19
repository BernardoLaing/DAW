<?php
require_once('model/catalog_books_utils.php');
$respuesta = 'venga '.$_GET["name"] .' '. $_GET["apellidop"] .' '. $_GET["title"].' '. $_GET["pagina"].' '. $_GET["categoria"] ;

//$result=buscarGeneral($_GET["name"] , $_GET["apellidop"], $_GET["apellidom"], $_GET["title"]);
$result=buscarGeneralLike('%'.$_GET["name"].'%' , $_GET["apellidop"], "", '%'.$_GET["title"].'%', $_GET["categoria"]);
$i=0;
$j=$_GET["paginacion"];
if(mysqli_num_rows($result) > 0)
{
    if($_GET["pagina"]>$j)
    {
        while(($row = mysqli_fetch_assoc($result))&&($i<($_GET["pagina"]-$j)))
        {
            $i++;
        }
    }
    while(($row = mysqli_fetch_assoc($result))&&($i<$_GET["pagina"]))
    {
        echo '<tr style="cursor: pointer;" onclick="funcShowInfo('.$row['idEjemplar'].')"><td>' .$row['idEjemplar']. '</td><td>'.$row['titulo']. '</td><td>'.$row['autoresApellidos']. '</td><td>'. $row['year'] . '</td><td>'. $row['estante'].'</td><td>'.$row['nombreC']. '</td><td>'. $row['nombre']. '</td></tr>';
        $i++;
    }
}

?>