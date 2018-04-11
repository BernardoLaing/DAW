<?php
session_start();
require_once('model/RBAC-utils.php');

if(deleteUser($_GET["user"])){
   // $_SESSION['success_msg'] = "La cuenta fue eliminada con éxito";
}else{
    $_SESSION['success_msg'] = "La cuenta no pudo ser eliminada";
}
header('Location:cuentas.php');
?>