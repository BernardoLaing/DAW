<?php 
session_start();
require_once('utils.php');
require_once('model/RBAC-utils.php');
?>
<?php
if(isset($_POST["submit"])){
    //Validar que los campos se hayan llenado de la manera correcta.
    echo "SUBMIT";
    if(isset($_POST["user"]) && isset($_POST["name"] )&& isset($_POST["password"]) &&
       isset($_POST["passwordValidate"]) && isset($_POST["rol"])){
        $user = process($_POST["user"]);
        $name = process($_POST["name"]);
        $passwd = process($_POST["password"]);
        $passwdValidate = process($_POST["passwordValidate"]);
        $rol = process($_POST["rol"]);
        echo "PASO2";
        if(strlen($user) > 0 && strlen($user) <= 25 &&
          strlen($name) > 0 && strlen($name) <= 50 &&
          $passwd == $passwdValidate && is_numeric($rol)){
                echo "PASO3";
                        echo "PASO5";
                        if(updateUser($user, $name, $passwd, $rol)){//Se editó exitosamente
                            echo "updateUser validado";
                            $_SESSION['success_msg'] = "La cuenta fue editada con éxito";
                            header('Location: cuentas.php');
                        }else{
                            echo "NO FUNCIONA";
                        }
        }else{
            echo "PASO6";
            if($passwd != $passwdValidate){
                echo "PASO4";
                    $_SESSION['success_msg'] = " <p>La validacion de contraseña no coincide</p>";
                    $_SESSION['error_type'] = "userConflict";
                    header('Location: cuentas.php');
                }else{
                    $_SESSION['error_type'] = "userConflict";
                    $_SESSION['error_msg'] = "El usuario debe tener máxima 25 caracteres. <br>
                                              El nombre debe tener máximo 50 caracteres. <br>
                                              Las contraseñas deben coincidir.";
                    header('Location: accountsEdit.php?user=' . $_POST["user"]);   
                }
        }
        //echo "NOT VALID ARGUMENT(S)";
    }else{
        echo "PASO6";
        $_SESSION['error_type'] = "userConflict";
        $_SESSION['error_msg'] = "No se llenaron todos los campos";
        header('Location: accountsEdit.php?user=' . $_POST["user"]);
    }
}else{
    echo "PASO7";
    echo "NOT SUBMIT";
}


function process($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>