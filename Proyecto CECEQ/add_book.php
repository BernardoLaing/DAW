<?php
include("partials/session_functions.php");
require_once('utils.php');
?>
<?php include("partials/_header.html"); ?>
<?php include("partials/_top_bar.html"); ?>
<?php include("html/add_book.html"); ?>
<?php
if(!empty($_POST))
{
    $idAutor;
    $idTitulo;
    $idEjemplar;
    $retro = '';
    $results = buscarAutorN($_POST["book"]["author"], $_POST["book"]["apaterno"], $_POST["book"]["amaterno"]); //insetrar autor
    if(mysqli_num_rows($results) == 0) 
    {
        insertAutor($_POST["book"]["author"], $_POST["book"]["apaterno"], $_POST["book"]["amaterno"]);//insetrar autor
        $retro = $retro.'autor insertado';  //retroalimentacion
    }
    
    $retro = $retro. ' '. $_POST["book"]["author"]; //retroalimentacion
    $retro = $retro. ' '. $_POST["book"]["apaterno"];//retroalimentacion
    $retro = $retro. ' '. $_POST["book"]["amaterno"];//retroalimentacion
    
    $results = buscarAutorN($_POST["book"]["author"], $_POST["book"]["apaterno"], $_POST["book"]["amaterno"]); //insetrar autor
    if($row = mysqli_fetch_assoc($results))
    {
        $idAutor=$row['idAutor'];
    }
    
    $retro = $retro. ' id autor= ' .$idAutor. ' ';//retroalimentacion
    
    $results = buscarTitulo($_POST["book"]["title"], $_POST["book"]["year"]); //insetrar titulo
    if(mysqli_num_rows($results) == 0)
    {
        insertTitulo($_POST["book"]["title"], $_POST["book"]["year"]);//insetrar titulo
        $retro = $retro. 'titulo insertado';//retroalimentacion
    }
    
    $retro = $retro.' '. $_POST["book"]["title"]. ' ' .$_POST["book"]["year"]; //retroalimentacion
    
    $results = buscarTitulo($_POST["book"]["title"], $_POST["book"]["year"]); //insetrar titulo
    if($row = mysqli_fetch_assoc($results))
    {
        $idTitulo=$row['idTitulo'];
    }
    
    $retro = $retro.' id= ' .$idTitulo;//retroalimentacion
    
    $results = buscarAutorTitulo($idTitulo, $idAutor); //crear relacion autor y titulo
    if(mysqli_num_rows($results) == 0)
    {
        insertAutorTitulo($idAutor, $idTitulo);
        //echo 'relacion titulo autor insertado <br>'; //retroalimentacion
    }
    
    //echo 'id titulo '.$idTitulo. ' idAutor ' . $idAutor. '<br>'; //retroalimentacion
    

    insertEjemplar($_POST["book"]["isbn"], $_POST["book"]["shelf"], $_POST["book"]["editorial"], $_POST["book"]["yeare"], $_POST["book"]["vol"], $idTitulo, $_POST["book"]["colection"], $_POST["book"]["edicion"], $_SESSION["user"] );//insetrar ejemplar
    $retro = $retro. 'ejemplar insertado ';//retroalimentacion
    //echo 'isbn '.$_POST["book"]["isbn"].' estante '. $_POST["book"]["shelf"].' editorial '.$_POST["book"]["editorial"]. ' anio ' .$_POST["book"]["yeare"]. 'vol'. $_POST["book"]["vol"].' titulo' .$idTitulo; //retroalimentacion
    insertCategoriaTitulo($idTitulo, $_POST["clasificacion"]);
    //echo '<br> clasificacion: '.$_POST["clasificacion"]; //retroalimentacion
    $idEjemplar = lastIndexEjemplar();
    insertEjemplarEstado($idEjemplar, 5);
    echo '<script> alert("'. $retro . '")</script>';
   
}
?>
<?php include("partials/_footer.html"); ?>
