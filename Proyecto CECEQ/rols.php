<?php 
include("partials/session_functions.php");
if(!$_SESSION["permisos"][22])
    header('Location: menu.php');
require_once('utils.php');
require_once('model/RBAC-utils.php');
include("partials/_header.html");
include("partials/_top_bar.html"); 
?>

<?php
$rols = getTable('rol');
?>

<?php 
include("html/rols.html");
$link="https://www.youtube.com/embed/5tvv6Uoqbjg?autoplay=1";
include("html/manualUsuario.html"); 
include("partials/_bottom_bar.html"); 
include("partials/_footer.html"); 
?>