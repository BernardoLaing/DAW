<?php include("partials/session_functions.php");?>
<?php 
if(!$_SESSION["permisos"][2])
    header('Location: menu.php');
?>
<?php include("partials/_header.html"); ?>
<?php include("partials/_top_bar.html"); ?>
<?php include("html/catalog.html"); ?>
<?php include("modals/modal_catalog.php");?>
<script src="js/catalog_modal.js"></script> 
<script src="js/exportXcel.js"></script>
<?php include("partials/_footer.html"); ?>
