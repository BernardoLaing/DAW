<?php 
session_start();
require_once('utils.php');
require_once('model/RBAC-utils.php');
?>
<?php
if(isset($_POST["submit"])){
    //Validar que los campos se hayan llenado de la manera correcta.
    if(isset($_POST["user"]) && isset($_POST["name"] )&& isset($_POST["password"]) && isset($_POST["passwordValidate"]) && isset($_POST["rol"])){
        $user = process($_POST["user"]);
        $name = process($_POST["name"]);
        $passwd = process($_POST["password"]);
        $passwdValidate = process($_POST["passwordValidate"]);
        $rol = process($_POST["rol"]);
        if(strlen($user) > 0 &&
          strlen($user) <= 25 &&
          strlen($name) > 0 &&
          strlen($name) <= 50 &&
          $passwd == $passwdValidate &&
          is_numeric($rol)){
            
            $passwd = password_hash($passwd, PASSWORD_BCRYPT);
            
            if(registerUser($user, $name, $passwd, $rol)){
                $_SESSION['error_msg'] = "";
                $_SESSION['success_msg'] = "La cuenta fue registrada con éxito";
                header('Location: cuentas.php');
            }else{
                header('Location: accountCreate.php');
            }
            
        }
    }else{
        $_SESSION['error_type'] = "userConflict";
        $_SESSION['error_msg'] = "No se llenaron todos los campos";
        header('Location: accountCreate.php');
    }
}else{
    echo "NOT SUBMIT";
}


function process($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>