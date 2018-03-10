<?php include('partials/session_functions.php');
require_once('utils.php');
include("partials/_header.html");
include("partials/_top_bar.html"); ?>
<?php 
$permissions = getTable('operacion');
?>

<?php include("html/rolsCreate.html"); ?>
<?php include("partials/_footer.html"); ?>
