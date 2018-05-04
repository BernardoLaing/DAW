<?php 
include("partials/session_functions.php");
require_once('model/visitors-utils.php');
if(isset($_GET['id'])){
    $info = getCredentialInfo($_GET['id']);
}
include("html/userCredential.html");
include("partials/_footer.html"); 
?>