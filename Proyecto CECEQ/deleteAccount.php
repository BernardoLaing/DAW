<?php
require_once('utils.php');

deleteUser($_GET['user']);

header('Location: cuentas.php');
?>