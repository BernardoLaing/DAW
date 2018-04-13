<?php 
include("partials/session_functions.php");
include("partials/_header.html");
include("partials/_top_bar.html"); 
?>
<?php 
$hasUploaded = 0; 
$today = date('Y-m-d');
$exp = strtotime(date("Y-m-d", strtotime($today)) . " +24 month");
$exp = date("Y-m-d",$exp);
?>
<?php include("html/credential.html"); ?>
<?php include("partials/_footer.html"); ?>
<?php include("upload.php"); ?>
<?php ?>