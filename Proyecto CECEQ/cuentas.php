<?php 
include("partials/session_functions.php");
require_once('utils.php');
include("partials/_header.html");
include("partials/_top_bar.html"); 
?>
<?php
$userList = getUserRoles();
$count = 1;
?>
<?php 
include("html/cuentas.html");
include("partials/_footer.html"); 
?>