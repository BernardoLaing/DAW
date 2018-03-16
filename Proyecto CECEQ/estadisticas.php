<?php include("partials/_header.html"); ?> <!--Acaba en la primera etiqueta body-->
<?php include("partials/_top_bar.html");?>  <!--Es la etiqueta Nav-->
<?php include("html/_estadisticas.html");?>  <!--  -->
<?php include("partials/_footer.html"); ?> <!--Empieza en los scroipts-->



<?php
/*
$ocupation = isset($_POST["user"]["ocupation"]) && ($_POST["user"]["ocupation"]);
$age = isset($_POST["user"]["age"]) && is_numeric($_POST["user"]["age"]);
$gender = isset($_POST["user"]["gender"]) && ($_POST["user"]["gender"]);
$city = isset($_POST["user"]["city"]) && ($_POST["user"]["city"]);
$month = isset($_POST["user"]["month"]) && ($_POST["user"]["month"]);
$year = isset($_POST["user"]["year"]) && ($_POST["user"]["year"]);

  if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if ( !($ocupation || $age || $gender || $city || $month || $year) ){
      $_SESSION['ok'] = false;
      include("modals/modal_statistics.php");
      echo "<script> $('#myModal').modal('show') </script>";
    }else{
      $_SESSION['ok'] = true;
      include("modals/modal_statistics.php");
      echo "<script> $('#myModal').modal('show') </script>";
    }
  }*/
 ?>
