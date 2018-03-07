<?php 
include("partials/session_functions.php");
require_once('utils.php');
include("partials/_header.html");
include("partials/_top_bar.html"); 
?>
<?php
$rols = getTable('rol');
$user = getUser($_GET['user']);
?>
<?php 
include("html/accountsEdit.html");
include("partials/_footer.html"); 
?>