<?php include("partials/session_functions.php");?>
<?php include("partials/_header.html"); ?>
<?php include("partials/_top_bar.html"); ?>
<br /><br />
<?php
#permisos admin
$perm["edit"] = 1;
/*
#usuario
$perm["edit"] = 0;*/
/*
        if($perm["edit"]){
            include("_editActivities.html");
        }*/
?>
<?php include("html/activities.html");?>
<?php include("partials/_footer.html"); ?>
