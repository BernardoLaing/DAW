<?php include("partials/_header.html"); ?> <!--Acaba en la primera etiqueta body-->
<?php include("partials/_top_bar.html");?>  <!--Es la etiqueta Nav-->
<?php include("html/_lend_return.html"); ?> <!--Empieza en los scripts-->
<?php include("partials/_footer.html"); ?> <!--Empieza en los scripts-->


<?php
  $idCredencial = isset($_POST["user"]["credencial"]) && is_numeric($_POST["user"]["credencial"]);
  $idLibroUno = isset($_POST["user"]["libroUno"]) && is_numeric($_POST["user"]["libroUno"]);
  $idLibroDos =  isset($_POST["user"]["libroDos"]) && is_numeric($_POST["user"]["libroDos"]);
  $idLibroTres = isset($_POST["user"]["libroTres"]) && is_numeric($_POST["user"]["libroTres"]);
  $ingresoLibro = false;

  if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if ($idLibroUno || $idLibroDos || $idLibroTres) {
      $ingresoLibro=true;
    }

    if($idCredencial && $ingresoLibro){
        $_SESSION['ok'] = true;
        include("modals/modal_lend.php");
        echo "<script> $('#myModal').modal('show') </script>";
    }
    if(!($idCredencial && $ingresoLibro)){
        $_SESSION['ok'] = false;
        include("modals/modal_lend.php");
        echo "<script> $('#myModal').modal('show') </script>";
    }

  }
 ?>
s