<?php include("partials/session_functions.php");?>
<?php 
if(!$_SESSION["permisos"][14])
    header('Location: menu.php');
?>
<?php include("partials/_header.html"); ?> <!--Acaba en la primera etiqueta body-->
<?php include("partials/_top_bar.html");?>  <!--Es la etiqueta Nav-->
<?php include("html/_lend_return.html"); ?> <!--Empieza en los scripts-->
<?php include("partials/_footer.html"); ?> <!--Empieza en los scripts-->
<?php include("model/lendReturn-utils.php"); ?> <!-- Utils, funciones -->

<?php
  $idCredencial = isset($_POST["user"]["credencial"]) && is_numeric($_POST["user"]["credencial"]);
  $idLibroUno = isset($_POST["user"]["libroUno"]) && is_numeric($_POST["user"]["libroUno"]);
  $idLibroDos =  isset($_POST["user"]["libroDos"]) && is_numeric($_POST["user"]["libroDos"]);
  $idLibroTres = isset($_POST["user"]["libroTres"]) && is_numeric($_POST["user"]["libroTres"]);
  $ingresoLibro = false;
  if($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST["prestamo"]) || isset($_POST["devolucion"]))){
    if ($idLibroUno || $idLibroDos || $idLibroTres) {
        $ingresoLibro=true;
    }
    if($idCredencial && $ingresoLibro && isset($_POST["prestamo"])){
        $aux_librouno = $_POST["user"]["libroUno"];
        $aux_credencial = $_POST["user"]["credencial"];
        $_SESSION['libro'] = $aux_librouno;
        $_SESSION['credencial'] = $aux_credencial;
        //Préstamo, Devolución, excedePrestamos, usuarioInexistente, libroInexistente
        $_SESSION['tipo'] = setTipo($_SESSION['credencial'], $_SESSION['libro'], true);
        $_SESSION['ok'] = true;
        $date = new DateTime();
        $dateLend = $date->format('Y-m-d H:i:s');
        $_SESSION['hoy'] = $dateLend;
        //echo "".$_SESSION["hoy"];
        $date2 = new DateTime();
        $date2 = $date2->modify('+7 day');
        $dateReturn = $date2->format('Y-m-d H:i:s');
        $_SESSION['hoy2'] = $dateReturn;
  }else if($ingresoLibro && isset($_POST["devolucion"])){
    $aux_librouno = $_POST["user"]["libroUno"];
    $_SESSION['ok'] = true;
    $_SESSION['libro'] = $aux_librouno;
    //Préstamo, Devolución, excedePrestamos, usuarioInexistente, libroInexistente
    $_SESSION['tipo'] = setTipo(NULL, $_SESSION['libro'], false);
  }else if(!($idCredencial && $ingresoLibro)){
        $_SESSION['ok'] = false;
        if(isset($_POST["devolucion"])){  $_SESSION['tipo'] = 'Devolución';}
        else{$_SESSION['tipo'] = 'Préstamo';}
  }
    include("modals/modal_lend.php");
    echo "<script> $('#myModal').modal('show') </script>";
  }
  ////////// OPCIONES EN EL MODAL ///////////////
  if(isset($_POST["aceptar"]) && ($_SESSION['tipo'] == 'Préstamo')){ //El cuenta habiente esta ACEPTANDO un PRESTAMO
    //echo 'ACEPTO PRESTAMO ';
     insertLend($_SESSION["libro"], $_SESSION["credencial"], $_SESSION['hoy'], $_SESSION['hoy2']);
     $_SESSION["credencial"] = null;
     $_SESSION["libro"] = null;
     $_SESSION['tipo'] = NULL;
  }else if( (isset($_POST["buenEstado"]) || isset($_POST["malEstado"]) )&& ($_SESSION['tipo'] == 'Devolución')){//El cuenta habiente esta ACEPTANDO una DEVOLUCION
    //echo 'ACEPTO DEVOLUCION'; //echo " buen estado: ".isset($_POST["buenEstado"]). "   Mal estado: ". isset($_POST["malEstado"]);
    insertReturn($_SESSION["libro"], $_SESSION['hoy'], isset($_POST["buenEstado"]), isset($_POST["malEstado"]));
     $_SESSION["credencial"] = null;
     $_SESSION["libro"] = null;
     $_SESSION['tipo'] = NULL;
  }else if(isset($_POST["cancelar"]) && ($_SESSION['tipo'] == 'Préstamo')){ //El cuenta habiente esta CANCELANDO un PRESTAMO
    //echo "CANCELAR PRESTAMO";
    $_SESSION["credencial"] = null;
    $_SESSION["libro"] = null;
    $_SESSION['tipo'] = NULL;
  }else if(isset($_POST["cancelar"]) && ($_SESSION['tipo'] == 'Devolución')){ //El cuenta habiente esta CANCELANDO una DEVOLUCION
    //echo "CANCELAR DEVOLUCION";
    $_SESSION["credencial"] = null;
    $_SESSION["libro"] = null;
    $_SESSION['tipo'] = NULL;
  }
 ?>
