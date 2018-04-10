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
include("html/accountCreate.html");
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