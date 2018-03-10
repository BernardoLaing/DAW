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

  if($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST["prestamo"]) || isset($_POST["devolucion"]))){
      echo "PASO 1";
    if ($idLibroUno || $idLibroDos || $idLibroTres) {
        $ingresoLibro=true;
    }
    if($idCredencial && $ingresoLibro && isset($_POST["prestamo"])){
      echo "PRESIONO PRESTAMO";
        $aux_librouno = $_POST["user"]["libroUno"];
        $aux_credencial = $_POST["user"]["credencial"];
        $_SESSION['ok'] = true;
        $_SESSION['tipo'] = 'Préstamo';
        $_SESSION['libro'] = $aux_librouno;
        $_SESSION['credencial'] = $aux_credencial;
    //    $hoy = 'hoy'; //getdate()'';
    //    $hoyMasSiete = 'una Semana mas'; //strtotime("+7 Days");
  }else if($idCredencial && $ingresoLibro && isset($_POST["devolucion"])){
    echo "PRESIONO RETORNO";
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

  if(isset($_POST["aceptar"])){
    echo 'ACEPTO';
     Registrar_Prestamo_Devolucion($_SESSION["credencial"], $_SESSION["libro"]);
     $_SESSION["credencial"] = null;
     $_SESSION["libro"] = null;
  }else if(isset($_POST["cancelar"])){
    echo "CANCELAR";
    $_SESSION["credencial"] = null;
    $_SESSION["libro"] = null;
  }
 ?>
