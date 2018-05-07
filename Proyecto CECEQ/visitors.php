<?php
include("partials/session_functions.php");

if(!$_SESSION["permisos"][8])
    header('Location: menu.php');

include("partials/_header.html");
include("partials/_top_bar.html");
include("permissions.php");
include ("html/visitors.html");
$link="https://www.youtube.com/embed/2jybkJVT35U?autoplay=1";
include("html/manualUsuario.html"); 
include("partials/_bottom_bar.html"); 
include("partials/_footer.html");
include("modals/modal_saved.html");
include("modals/modal_connection_error.html");

?>