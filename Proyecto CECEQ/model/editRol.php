<?php 
echo "HOLA";
require_once('../model/RBAC-utils.php');
?>

<?php
//if(isset($_POST["submit"])){
    //Validar que los campos se hayan llenado de la manera correcta.
    echo "PASO1";
    if(isset($_POST["name"]) && isset($_POST["description"] )){
        $description = process($_POST["description"]);
        $name = process($_POST["name"]);
        $permissions = $_POST["permissions"];
        $idRol = $_POST["idRol"];
        if(strlen($description) > 0 &&
          strlen($description) <= 50 &&
          strlen($name) > 0 &&
          strlen($name) <= 50){
            if(count($permissions === 0)){
                $_SESSION['error_type'] = "rolConflict";
                $_SESSION['error_msg'] = "No agregaste permisos al rol";
                header('Location: rolsEdit.php?idRol=' . $idRol);
            }
            if(updateRol($idRol, $name, $description, $permissions)){
                header('Location: ../rols.php');
            }else{
                echo "ERROR";
            } 
        }
    }
    echo "NOT ISSET";
//}else{
//  echo "NOT SUBMIT";
//}
function process($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>