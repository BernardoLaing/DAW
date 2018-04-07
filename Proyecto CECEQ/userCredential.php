<?php 
include("partials/session_functions.php");
require_once('model/visitors-utils.php');
include("partials/_header.html");
if(isset($_GET['id'])){
    $info = getCredentialInfo($_GET['id']);
}
include("html/userCredential.html");
include("partials/_footer.html"); 
?>