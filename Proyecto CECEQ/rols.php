<?php 
include("partials/session_functions.php");
require_once('model/RBAC-utils.php');
include("partials/_header.html");
include("partials/_top_bar.html"); 
?>

<?php
$rols = getTable('rol');
?>

<?php 
include("html/rols.html");
include("partials/_footer.html"); 
?>