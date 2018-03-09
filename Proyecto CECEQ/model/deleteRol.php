<?php
require_once('../utils.php');

if(deleteRol($_GET['idRol'])){
    header('Location: ../rols.php');
}else{
    echo "NOT DELETE ROL";
}
?>