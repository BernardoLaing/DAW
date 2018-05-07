<?php 
include("partials/session_functions.php");
if(!$_SESSION["permisos"][22])
    header('Location: menu.php');
require_once('utils.php');
require_once('model/rbac-utils.php');
include("partials/_header.html");
include("partials/_top_bar.html"); 
?>

<?php
$rols = getTable('rol');
?>

<?php 
include("html/rols.html");
$link="https://www.youtube.com//embed/PptNXwj6kN0?autoplay=1";
include("html/manualUsuario.html"); 
include("partials/_bottom_bar.html"); 
include("partials/_footer.html"); 
?>