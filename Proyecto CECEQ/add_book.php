<?php
include("partials/session_functions.php");
require_once('model/catalog_books_utils.php');
?>
<?php 
if(!$_SESSION["permisos"][23])
    header('Location: menu.php');
?>
<?php include("partials/_header.html"); ?>
<?php include("partials/_top_bar.html"); ?>
<?php include("html/add_book.html"); ?>
<?php
if(!empty($_POST))
{
    $idAutor;
    $idAutor2;
    $idAutor3;
    $idTitulo;
    $idEjemplar;
    $retro = '';
    $results = buscarAutorN($_POST["book"]["author"], $_POST["book"]["apaterno"], ""); //insetrar autor
    if(mysqli_num_rows($results) == 0) 
    {
        insertAutor($_POST["book"]["author"], $_POST["book"]["apaterno"], "");//insetrar autor
        $retro = $retro.'autor insertado';  //retroalimentacion
    }
    
    $retro = $retro. ' '. $_POST["book"]["author"]; //retroalimentacion
    $retro = $retro. ' '. $_POST["book"]["apaterno"];//retroalimentacion
    
    $results = buscarAutorN($_POST["book"]["author"], $_POST["book"]["apaterno"], ""); //insetrar autor
    if($row = mysqli_fetch_assoc($results))
    {
        $idAutor=$row['idAutor'];
    }
    $retro = $retro. ' id autor= ' .$idAutor. ' ';//retroalimentacion
    
    if($_POST["book"]["author2"] != ""){
        $results = buscarAutorN($_POST["book"]["author2"], $_POST["book"]["apaterno2"], ""); //insetrar autor 2
        if(mysqli_num_rows($results) == 0) 
        {
            insertAutor($_POST["book"]["author2"], $_POST["book"]["apaterno2"], "");//insetrar autor2
            $retro = $retro.'autor 2 insertado';  //retroalimentacion
        }
        $retro = $retro. ' '. $_POST["book"]["author2"]; //retroalimentacion
        $retro = $retro. ' '. $_POST["book"]["apaterno2"];//retroalimentacion
        $results = buscarAutorN($_POST["book"]["author2"], $_POST["book"]["apaterno2"], ""); //insetrar autor2
        if($row = mysqli_fetch_assoc($results))
        {
            $idAutor2=$row['idAutor'];
        }
        $retro = $retro. ' id autor 2 = ' .$idAutor2. ' ';//retroalimentacion
    }
    if($_POST["book"]["author3"] != ""){
        $results = buscarAutorN($_POST["book"]["author3"], $_POST["book"]["apaterno3"], ""); //insetrar autor 2
        if(mysqli_num_rows($results) == 0) 
        {
            insertAutor($_POST["book"]["author3"], $_POST["book"]["apaterno3"], "");//insetrar autor2
            $retro = $retro.'autor 3 insertado';  //retroalimentacion
        }
        $retro = $retro. ' '. $_POST["book"]["author3"]; //retroalimentacion
        $retro = $retro. ' '. $_POST["book"]["apaterno3"];//retroalimentacion
        $results = buscarAutorN($_POST["book"]["author3"], $_POST["book"]["apaterno3"], ""); //insetrar autor2
        if($row = mysqli_fetch_assoc($results))
        {
            $idAutor3=$row['idAutor'];
        }
        $retro = $retro. ' id autor 3 = ' .$idAutor3. ' ';//retroalimentacion
    }
    
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
    if($_POST["book"]["author2"] != ""){
        $results = buscarAutorTitulo($idTitulo, $idAutor2); //crear relacion autor y titulo
        if(mysqli_num_rows($results) == 0)
        {
            insertAutorTitulo($idAutor2, $idTitulo);
            //echo 'relacion titulo autor insertado <br>'; //retroalimentacion
        }
    }
    if($_POST["book"]["author3"] != ""){
        $results = buscarAutorTitulo($idTitulo, $idAutor3); //crear relacion autor y titulo
        if(mysqli_num_rows($results) == 0)
        {
            insertAutorTitulo($idAutor3, $idTitulo);
            //echo 'relacion titulo autor insertado <br>'; //retroalimentacion
        }
    }
    //echo 'id titulo '.$idTitulo. ' idAutor ' . $idAutor. '<br>'; //retroalimentacion
    

    insertEjemplar($_POST["book"]["isbn"], $_POST["book"]["shelf"], $_POST["book"]["editorial"], $_POST["book"]["yeare"], $_POST["book"]["vol"], $idTitulo, $_POST["book"]["colection"], $_POST["book"]["edicion"], $_SESSION["user"], $_POST["book"]["clave"], $_POST["book"]["adquisition"],$_POST["book"]["numClas"],$_POST["book"]["bookmaterias"] );//insetrar ejemplar
    $retro = $retro. 'ejemplar insertado ';//retroalimentacion

    insertCategoriaTitulo($idTitulo, $_POST["sclasificacion"]);
    $idEjemplar = lastIndexEjemplar();
    insertEjemplarEstado($idEjemplar, 5);
    echo '<script> alert("'. $retro . '")</script>';
   
}
?>
<?php include("partials/_footer.html"); ?>
