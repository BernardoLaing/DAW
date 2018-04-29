<?php
include("partials/session_functions.php");

if(!$_SESSION["permisos"][6])
    header('Location: menu.php');

include("partials/_header.html");
include("partials/_top_bar.html");
include ("html/visitors.html");
include("partials/_footer.html");
include("modals/modal_saved.html");
//include("modals/modal_entry.php");

