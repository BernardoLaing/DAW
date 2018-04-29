<?php
include("partials/session_functions.php");
if(!$_SESSION["permisos"][20])
    header('Location: menu.php');
include("partials/_header.html");
include("partials/_top_bar.html");
include("html/sanctions.html");
include("partials/_footer.html");
?>
