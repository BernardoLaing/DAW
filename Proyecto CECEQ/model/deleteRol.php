<?php
require_once('../utils.php');
require_once('rbac-utils.php');
if(deleteRol($_GET['idRol'])){
    header('Location: ../rols.php');
}else{
    echo "NOT DELETE ROL";
}
?>