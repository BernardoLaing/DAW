<?php 
include("partials/session_functions.php");
if(!$_SESSION["permisos"][14])
    header('Location: menu.php');
require_once('utils.php');
require_once('model/rbac-utils.php');
include("partials/_header.html");
include("partials/_top_bar.html"); 
?>
<?php
$rols = getTable('rol');
$userList = getUserRoles();
$count = 1;
?>
<?php 
include("html/cuentas.html");

$link="https://www.youtube.com//embed/PptNXwj6kN0?autoplay=1";
include("html/manualUsuario.html"); 
include("partials/_bottom_bar.html"); 

if(isset($_SESSION['success_msg'])){
    echo "<script>
            $(document).ready(function (e) {
                $('#modalSuccess').modal('show');
            });
        </script>";
    $_SESSION['success_msg'] = null;
}

include("partials/_footer.html"); 
?>
