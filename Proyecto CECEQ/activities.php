<?php include("partials/session_functions.php");?>
<?php include("partials/_header.html"); ?>
<?php include("partials/_top_bar.html"); ?>
<br /><br />
<?php 
if(!$_SESSION["permisos"][1])
    header('Location: menu.php');
?>
<?php include("html/activities.html");?>
<?php include("partials/_footer.html"); ?>
