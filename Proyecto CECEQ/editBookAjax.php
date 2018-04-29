<?php   
    include("partials/session_functions.php");
    if(!$_SESSION["permisos"][22])
    header('Location: menu.php');
    require_once('model/catalog_books_utils.php');
    $idAutor;
    $idAutor2;
    $idAutor3;
    $idTitulo;
    $idEjemplar;
    

    $results = buscarAutorN($_GET["autor1"], $_GET["apellido1"], ""); //insetrar autor
    if(mysqli_num_rows($results) == 0) 
    {
        insertAutor($_GET["autor1"], $_GET["apellido1"], "");//insetrar autor
    }
    $results = buscarAutorN($_GET["autor1"], $_GET["apellido1"], ""); //insetrar autor
    if($row = mysqli_fetch_assoc($results))
    {
        $idAutor=$row['idAutor'];
    }
    if($_GET["autor2"] != ""){
        $results = buscarAutorN($_GET["autor2"], $_GET["apellido2"], ""); //insetrar autor
        if(mysqli_num_rows($results) == 0) 
        {
            insertAutor($_GET["autor2"], $_GET["apellido2"], "");//insetrar autor
        }
        $results = buscarAutorN($_GET["autor2"], $_GET["apellido2"], ""); //insetrar autor
        if($row = mysqli_fetch_assoc($results))
        {
            $idAutor=$row['idAutor'];
        }
    }
    if($_GET["autor3"] != ""){
        $results = buscarAutorN($_GET["autor3"], $_GET["apellido3"], ""); //insetrar autor
        if(mysqli_num_rows($results) == 0) 
        {
            insertAutor($_GET["autor3"], $_GET["apellido3"], "");//insetrar autor
        }
        $results = buscarAutorN($_GET["autor3"], $_GET["apellido3"], ""); //insetrar autor
        if($row = mysqli_fetch_assoc($results))
        {
            $idAutor=$row['idAutor'];
        }
    }
    

    $results = buscarTitulo($_GET["titulo"], $_GET["anio"]); //insetrar titulo
    if(mysqli_num_rows($results) == 0)
    {
        insertTitulo($_GET["titulo"], $_GET["anio"]);//insetrar titulo
    }
    $results = buscarTitulo($_GET["titulo"], $_GET["anio"]); //insetrar titulo
    if($row = mysqli_fetch_assoc($results))
    {
        $idTitulo=$row['idTitulo'];
    }
    
    
    $results = buscarAutorTitulo($idTitulo, $idAutor); //crear relacion autor y titulo
    if(mysqli_num_rows($results) == 0)
    {
        insertAutorTitulo($idAutor, $idTitulo);
    }
    if($_GET["autor2"] != ""){
        $results = buscarAutorTitulo($idTitulo, $idAutor2); //crear relacion autor y titulo
        if(mysqli_num_rows($results) == 0)
        {
            insertAutorTitulo($idAutor2, $idTitulo);
        }
    }
    if($_GET["autor3"] != ""){
        $results = buscarAutorTitulo($idTitulo, $idAutor3); //crear relacion autor y titulo
        if(mysqli_num_rows($results) == 0)
        {
            insertAutorTitulo($idAutor3, $idTitulo);
        }
    }
    
    $idEjemplar = $_GET["id"];
    editEjemplar($idEjemplar, $_GET["isbn"], $_GET["estante"], $_GET["editorial"], $_GET["aEdicion"], $_GET["vol"], $idTitulo, $_GET["coleccion"], $_GET["edicion"], $_SESSION["user"], $_GET["clave"], $_GET["adquisicion"], $_GET["numC"],$_GET["materias"] );//insetrar ejemplar

    $cat = (int)$_GET["categoria"];
    $results = selectCategoriaTitulo($idTitulo);
    if(mysqli_num_rows($results) == 0)
    {
        insertCategoriaTitulo($idTitulo, $cat);
    }
    else{
        editCategoriaTitulo($idTitulo, $cat);
    }
    editEjemplarEstado($idEjemplar, $_GET["estado"]);
    echo $idTitulo. ' '. $cat;
    echo 'cambios guardados';

   ?>