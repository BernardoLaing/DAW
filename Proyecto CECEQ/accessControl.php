<?php
include("partials/session_functions.php");
require_once('utils.php');
?>
<?php include("partials/_header.html"); ?>
<?php include("partials/_top_bar.html"); ?>
<br /><br />
<div class="container">
     <div class="mx-auto text-center"> <!-- mx-auto da un padding y border automatico-->
        <div class="display-3">Control de acceso</div> <!--display son headdings mas grandes-->
    </div>
    <br>
    <br>
    <div class="row text-center center-block">
        <div class="col-sm-0 col-md-2 "></div>
        <?php include("partials/buttons/_accounts.html"); ?>
        <?php include("partials/buttons/_rols.html"); ?>
        <div class="col-sm-0 col-md-2 "></div>
    </div>
    <br>
    <br>
    <div class="row ">
        <div class="col-sm-2"></div>
        <div class="col-sm-2 center-block"><a href="menu.php" class="btn btn-secondary"><i class="material-icons alagin-middle">arrow_back</i></a></div>
        <br>
        <br>
    </div>
</div>
<?php include("partials/_footer.html"); ?>