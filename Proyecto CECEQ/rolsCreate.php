<?php include('partials/session_functions.php');
require_once('utils.php');
include("partials/_header.html");
include("partials/_top_bar.html"); ?>
<?php 
$permissions = getTable('operacion');
?>

<?php 
include("html/rolsCreate.html");
if($_SESSION['error_type'] === "rolConflict"){
    echo "<script>
            $(document).ready(function (e) {
                $('#myModal').modal('show');
            });
        </script>";
    $_SESSION['error_type'] = "";
}
include("partials/_footer.html"); 
?>
