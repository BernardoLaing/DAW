<?php 
include("partials/session_functions.php");
require_once('utils.php');
include("partials/_header.html");
include("partials/_top_bar.html"); 
?>
<?php
$permissions = getTable('operacion');
$rol = getRol($_GET['idRol']);
?>
<?php 
include("html/rolsEdit.html");
include("partials/_footer.html"); 
?>