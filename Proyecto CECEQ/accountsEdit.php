<?php 
include("partials/session_functions.php");
if(!$_SESSION["permisos"][21])
    header('Location: menu.php');
require_once('utils.php');
require_once('model/rbac-utils.php');
include("partials/_header.html");
include("partials/_top_bar.html"); 
?>
<?php
$rols = getTable('rol');
$user = getUser($_GET['user']);
?>
<?php 
include("html/accountsEdit.html");
$link="https://www.youtube.com/embed/1GR5bdopQDM?autoplay=1";
include("html/manualUsuario.html"); 
include("partials/_bottom_bar.html"); 
include("modals/modal_error.html");
if(isset($_SESSION['error_type']) && $_SESSION['error_type'] === "userConflict"){
    echo "<script>
            $(document).ready(function (e) {
                $('#myModal').modal('show');
            });
        </script>";
    $_SESSION['error_type'] = "";
}
include("partials/_footer.html"); 
?>