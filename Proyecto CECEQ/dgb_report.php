<?php 
include("partials/session_functions.php");

if(!$_SESSION["permisos"][11])
    header('Location: menu.php');

include("partials/_header.html");
include("partials/_top_bar.html");
include("html/dgb_report.html");
include("partials/_footer.html");
?>

