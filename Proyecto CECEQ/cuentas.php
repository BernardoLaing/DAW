<?php 
include("partials/session_functions.php");
require_once('utils.php');
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