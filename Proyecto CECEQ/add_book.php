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
    $results = buscarAutor($_POST["book"]["author"], "", ""); //insetrar autor
    if(mysqli_num_rows($results) == 0) 
    {
        insertAutor($_POST["book"]["author"], "", "");//insetrar autor
        echo 'autor insertado';
    }
    echo $_POST["book"]["author"];
    $results = buscarAutor($_POST["book"]["author"], "", ""); //insetrar autor
    if($row = mysqli_fetch_assoc($results))
    {
        $idAutor=$row['idAutor'];
    }
    echo ' id= ' .$idAutor. '<br>';//insetrar autor
    
    $results = buscarTitulo($_POST["book"]["title"], $_POST["book"]["year"]); //insetrar titulo
    if(mysqli_num_rows($results) == 0)
    {
        insertTitulo($_POST["book"]["title"], $_POST["book"]["year"]);//insetrar titulo
        echo 'titulo insertado';
    }
    echo $_POST["book"]["title"]. ' ' .$_POST["book"]["year"];
    $results = buscarTitulo($_POST["book"]["title"], $_POST["book"]["year"]); //insetrar titulo
    if($row = mysqli_fetch_assoc($results))
    {
        $idTitulo=$row['idTitulo'];
    }
    echo ' id= ' .$idTitulo. '<br>';//insetrar titulo
    
    $results = buscarAutorTitulo($idTitulo, $idAutor); //crear relacion autor y titulo
    if(mysqli_num_rows($results) == 0)
    {
        insertAutorTitulo($idAutor, $idTitulo);
        echo 'relacion titulo autor insertado <br>'; //crear relacion autor y titulo
    }
    echo 'id titulo '.$idTitulo. ' idAutor ' . $idAutor. '<br>'; //crear relacion autor y titulo
    

    insertEjemplar($_POST["book"]["isbn"], $_POST["book"]["shelf"], $_POST["book"]["editorial"], $_POST["book"]["year"], "1", $idTitulo);//insetrar ejemplar
    echo 'ejemplar insertado ';
    echo 'isbn '.$_POST["book"]["isbn"].' estante '. $_POST["book"]["shelf"].' editorial '.$_POST["book"]["editorial"]. ' anio ' .$_POST["book"]["year"]. ' 1 titulo' .$idTitulo;
    

   
}
?>
<?php include("partials/_footer.html"); ?>
