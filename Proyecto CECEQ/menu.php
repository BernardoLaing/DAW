<?php include("partials/_header.html"); ?>
<?php include("partials/session_functions.php"); ?>
<?php include("partials/_top_bar.html"); ?>

<?php 
# Administrador
$perm["entry"] = 1;
$perm["lend"] = 1;
$perm["stats"] = 1;
$perm["dgb"] = 1;
$perm["visitors"] = 1;
$perm["users"] = 1;
$perm["act"] = 1;
$perm["catalog"] = 1;
$perm["control"] = 1;
$perm["sanctions"] = 1;
# Usuario Simple
//$perm["entry"] = 0;
//$perm["lend"] = 0;
//$perm["stats"] = 0;
//$perm["dgb"] = 0;
//$perm["visitors"] = 0;
//$perm["users"] = 0;
//$perm["act"] = 1;
//$perm["catalog"] = 1;
//$perm["control"] = 0;
//$perm["sanctions"] = 0;
?>

<div class="container">
    <div class="row text-center">
         <?php
        if($perm["act"]){
            include("partials/buttons/_activities.html");
        }
        if($perm["catalog"]){
            include("partials/buttons/_catalog.html");
        }
        if($perm["control"]){
            include("partials/buttons/_control.html");
        }
        if($perm["visitors"]){
            include("partials/buttons/_visitors.html");
        }
        if($perm["entry"]){
            include("partials/buttons/_entry.html");
        }
        if($perm["stats"]){
            include("partials/buttons/_stats.html");
        }
        if($perm["users"]){
            include("partials/buttons/_users.html");
        }
        if($perm["lend"]){
            include("partials/buttons/_lend.html");
        }
        if($perm["dgb"]){
            include("partials/buttons/_dgb.html");
        }

        if($perm["sanctions"]){
            include("partials/buttons/_sanctions.html");
        }
        ?>
    </div><br />
</div>
<?php include("partials/_footer.html"); ?>