<?php 
include('partials/session_functions.php');
if(!$_SESSION["permisos"][30])
    header('Location: menu.php');
require_once('utils.php');
require_once('model/RBAC-utils.php');
include("partials/_header.html");
include("partials/_top_bar.html"); ?>
<?php 
$permissions = getTable('operacion');
?>

    <?php 
    include("html/rolsCreate.html");
    include("modals/modal_error.html");
    if(isset($_SESSION['error_type']) && $_SESSION['error_type'] === "rolConflict"){
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
