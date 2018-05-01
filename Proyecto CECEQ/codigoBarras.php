<?php
include("partials/session_functions.php");
if(!$_SESSION["permisos"][17])
    header('Location: menu.php');
require_once('model/catalog_books_utils.php');
?>
<?php include("partials/_header.html"); ?>
<?php include("partials/_top_bar.html"); ?>
<?php include("html/codigoBarras.html"); ?>
<script src="js/generateCB.js"></script>
<?php include("partials/_footer.html"); ?>
