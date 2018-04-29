<?php 
include("partials/session_functions.php");
if(!$_SESSION["permisos"][28])
    header('Location: menu.php');
require_once('utils.php');
require_once('model/RBAC-utils.php');
include("partials/_header.html");
include("partials/_top_bar.html"); 
?>
<?php
$rols = getTable('rol');
$user = getUser($_GET['user']);
?>
<?php 
include("html/accountsEdit.html");
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