<?php include("partials/session_functions.php");?>
<?php include("partials/_header.html"); ?> <!--Acaba en la primera etiqueta body-->
<?php include("partials/_top_bar.html");?>  <!--Es la etiqueta Nav-->
<?php include("html/_lend_return.html"); ?> <!--Empieza en los scripts-->
<?php include("partials/_footer.html"); ?> <!--Empieza en los scripts-->
<?php include("utils.php"); ?> <!-- Utils, funciones -->

<?php
  $idCredencial = isset($_POST["user"]["credencial"]) && is_numeric($_POST["user"]["credencial"]);
  $idLibroUno = isset($_POST["user"]["libroUno"]) && is_numeric($_POST["user"]["libroUno"]);
  $idLibroDos =  isset($_POST["user"]["libroDos"]) && is_numeric($_POST["user"]["libroDos"]);
  $idLibroTres = isset($_POST["user"]["libroTres"]) && is_numeric($_POST["user"]["libroTres"]);
  $ingresoLibro = false;
  $Prestamo = 0;

  if($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST["prestamo"]) || isset($_POST["devolucion"]))){
      echo "PASO 1";
    if ($idLibroUno || $idLibroDos || $idLibroTres) {
        $ingresoLibro=true;
    }
    if($idCredencial && $ingresoLibro && isset($_POST["prestamo"])){
      echo "PRESIONO PRESTAMO";
        $Prestamo = 1;
        $aux_librouno = $_POST["user"]["libroUno"];
        $aux_credencial = $_POST["user"]["credencial"];
        $_SESSION['ok'] = true;
        $_SESSION['tipo'] = 'Préstamo';
        $_SESSION['libro'] = $aux_librouno;
        $_SESSION['credencial'] = $aux_credencial;
      
        $date = new DateTime();
        $dateLend = $date->format('Y-m-d H:i:s');


        $date2 = new DateTime();
        $date2 = $date2->modify('+7 day');
        $dateReturn = $date2->format('Y-m-d H:i:s');

    //    $hoyMasSiete = 'una Semana mas'; //strtotime("+7 Days");
  }else if($idCredencial && $ingresoLibro && isset($_POST["devolucion"])){
    echo "PRESIONO RETORNO";
    $Prestamo = 2;
    $aux_librouno = $_POST["user"]["libroUno"];
    $aux_credencial = $_POST["user"]["credencial"];
    $_SESSION['ok'] = true;
    $_SESSION['tipo'] = 'Devolución';
    $_SESSION['libro'] = $aux_librouno;
    $_SESSION['credencial'] = $aux_credencial;
  }else if(!($idCredencial && $ingresoLibro)){
        $_SESSION['ok'] = false;
  }
    include("modals/modal_lend.php");
    echo "<script> $('#myModal').modal('show') </script>";

  }

  if(isset($_POST["aceptar"]) && ($Prestamo == 1)){ //El cuenta habiente esta ACEPTANDO un PRESTAMO
    echo 'ACEPTO PRESTAMO ';
     insertLend($_SESSION["libro"], $_SESSION["credencial"], $_SESSION['hoy'], $_SESSION['hoy2']);
     $_SESSION["credencial"] = null;
     $_SESSION["libro"] = null;
  }else if(isset($_POST["aceptar"]) && ($Prestamo == 2)){//El cuenta habiente esta acepACEPTANDOtando una DEVOLUCION
    echo 'ACEPTO DEVOLUCION';
     insertLend($_SESSION["libro"], $_SESSION["credencial"], $_SESSION['hoy'], $_SESSION['hoy2']);
     $_SESSION["credencial"] = null;
     $_SESSION["libro"] = null;
  }else if(isset($_POST["cancelar"]) && ($Prestamo == 1)){ //El cuenta habiente esta CANCELANDO un PRESTAMO
    echo "CANCELAR PRESTAMO";
    $_SESSION["credencial"] = null;
    $_SESSION["libro"] = null;
  }else if(isset($_POST["cancelar"]) && ($Prestamo == 2)){ //El cuenta habiente esta CANCELANDO una DEVOLUCION
    echo "CANCELAR DEVOLUCION";
    $_SESSION["credencial"] = null;
    $_SESSION["libro"] = null;
  }
  ($Prestamo == 0);
 ?>
