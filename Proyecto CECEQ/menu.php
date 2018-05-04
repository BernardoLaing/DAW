<?php include("partials/_header.html"); ?>
<?php include("partials/session_functions.php"); ?>
<?php include("partials/_top_bar.html"); 

?>



<div class="container">
    <div class="row text-center">
         <?php
        if($_SESSION["permisos"][1]){
            include("partials/buttons/_activities.html");
        }
        if($_SESSION["permisos"][2]){
            include("partials/buttons/_catalog.html");
        }
        if($_SESSION["permisos"][14]){
            include("partials/buttons/_control.html");
        }
        if($_SESSION["permisos"][8]){
            include("partials/buttons/_visitors.html");
        }
        if($_SESSION["permisos"][6]){
            include("partials/buttons/_entry.html");
        }
        if($_SESSION["permisos"][9]){
            include("partials/buttons/_stats.html");
        }
        if($_SESSION["permisos"][8]){
            include("partials/buttons/_users.html");
        }
        if($_SESSION["permisos"][12]){
            include("partials/buttons/_lend.html");
        }
        if($_SESSION["permisos"][11]){
            include("partials/buttons/_dgb.html");
        }
        if($_SESSION["permisos"][15]){
            include("partials/buttons/_sanctions.html");
        }
        ?>
    </div><br />
</div>
<?php include("partials/_footer.html"); ?>