<?php 
include("partials/session_functions.php");
if(!$_SESSION["permisos"][32])
    header('Location: menu.php');
require_once('utils.php');
require_once('model/RBAC-utils.php');
include("partials/_header.html");
include("partials/_top_bar.html"); 
?>
<?php
$permissions = getTable('operacion');
$rol = getRol($_GET['idRol']);
?>
<?php 
//echo $_SESSION['error_type'];
//echo "dfghjkl";
include("html/rolsEdit.html");
include("modals/modal_error.html");
if(isset($_SESSION['error_type']) && $_SESSION['error_type'] === "rolEditConflict"){
    echo "<script>
            $(document).ready(function (e) {
                $('#myModal').modal('show');
            });
        </script>";
    $_SESSION['error_type'] = null;
    $_SESSION['error_msg'] = null;
}
include("partials/_footer.html"); 
?>
