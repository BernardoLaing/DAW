<?php include("partials/_header.html"); ?>
<?php include("partials/_top_bar.html"); ?>
<?php 
$perm["entry"] = 1;
$perm["lend"] = 1;
$perm["stats"] = 1;
$perm["dgb"] = 1;
$perm["visitors"] = 1;
$perm["users"] = 1;
$perm["act"] = 1;
$perm["catalog"] = 1;
?>
<div class="container"><br /><br /><br />
    <div class="row text-center">
        <?php 
        if($perm["entry"]){
            include("partials/buttons/_entry.html");
        }
        if($perm["lend"]){
            include("partials/buttons/_lend.html");
        }
        if($perm["stats"]){
            include("partials/buttons/_stats.html");
        }
        if($perm["dgb"]){
            include("partials/buttons/_dgb.html");
        }
        if($perm["visitors"]){
            include("partials/buttons/_visitors.html");
        }
        if($perm["users"]){
            include("partials/buttons/_users.html");
        }
        if($perm["act"]){
            include("partials/buttons/_activities.html");
        }
        if($perm["catalog"]){
            include("partials/buttons/_catalog.html");
        }
        ?>
    </div>
</div>
<?php include("partials/_footer.html"); ?>