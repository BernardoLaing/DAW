<?php 
include("partials/session_functions.php");
require_once('utils.php');
include("partials/_header.html");
include("partials/_top_bar.html"); 
?>
<?php
$rols = getTable('rol');


?>

<?php 
        include('modals/modal_accountCreate.php');

include("html/accountCreate.html");
if(isset($_SESSION['error_type'])){
    if($_SESSION['error_type'] === "primaryKeyError"){
    echo "<script> alert('El usuario ya está registrado')</script>";
    }
    $_SESSION['error_type'] = "";
}
include("partials/_footer.html");
?>