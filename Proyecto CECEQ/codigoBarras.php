<?php
include("partials/session_functions.php");
if(!$_SESSION["permisos"][13])
    header('Location: menu.php');
require_once('model/catalog_books_utils.php');
?>
<?php include("partials/_header.html"); ?>
<?php include("partials/_top_bar.html"); ?>
<?php include("html/codigoBarras.html");
$link="https://www.youtube.com/embed/WVbMyrh5hLI?autoplay=1";
include("html/manualUsuario.html"); 
include("partials/_bottom_bar.html");  ?>
<script src="js/generateCB.js"></script>
<?php include("partials/_footer.html"); ?>
