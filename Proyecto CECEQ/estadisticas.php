<?php include("partials/session_functions.php"); ?>
<?php 
if(!$_SESSION["permisos"][9])
    header('Location: menu.php');
?>
<?php include("partials/_top_bar.html");?>  <!--Es la etiqueta Nav-->
<?php include("partials/_header.html");?>
<?php include("html/statisticsBooks.html");?>  <!--  -->
<!--?php include("partials/_footer.html"); Empieza en los scripts-->
