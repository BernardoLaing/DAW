<?php 
include("partials/session_functions.php");
if(!$_SESSION["permisos"][4])
    header('Location: menu.php');
include("partials/_header.html");
include("partials/_top_bar.html"); 
?>
<?php 
$hasUploaded = 0; 
$today = date('Y-m-d');
$exp = strtotime(date("Y-m-d", strtotime($today)) . " +24 month");
$exp = date("Y-m-d",$exp);
?>
<?php include("html/credential.html");

if(isset($_SESSION['credential_msg']) && $_SESSION['credential_msg']){
    echo "<script>
            $(document).ready(function (e) {
                $('#modalCredential').modal('show');
            });
        </script>";
    $_SESSION['credential_msg'] = 0;
}

include("partials/_footer.html"); ?>
<?php include("upload.php"); ?>
<?php ?>