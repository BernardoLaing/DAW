<?php
include("partials/session_functions.php");

if(!$_SESSION["permisos"][6])
    header('Location: menu.php');

include("partials/_header.html");
include("partials/_top_bar.html");
include ("html/visitors.html");
$link="https://www.youtube.com//embed/PptNXwj6kN0?autoplay=1";
include("html/manualUsuario.html"); 
include("partials/_bottom_bar.html"); 
include("partials/_footer.html");
include("modals/modal_saved.html");
include("modals/modal_connection_error.html");

