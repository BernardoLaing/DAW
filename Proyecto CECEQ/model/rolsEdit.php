<?php
session_start();
require_once('../utils.php');
require_once('RBAC-utils.php');
?>
<?php
var_dump($_POST);
if(count($_POST)>0){
    //Validar que los campos se hayan llenado de la manera correcta.
    if(isset($_POST["nombre_rol"]) && isset($_POST["description_rol"] )){
          echo "PASO1";
        $description = process($_POST["description_rol"]);
        $name = process($_POST["nombre_rol"]);
        //$permissions = $_POST["permissions"];
        $idRol = $_POST["idRol"];
        if(strlen($description) > 0 && strlen($description) <= 50 &&
          strlen($name) > 0 && strlen($name) <= 50 &&
          isset($_POST["permissions"])){
             $permissions = $_POST["permissions"];
            if(updateRol($idRol, $name, $description, $permissions)){
               header('Location: ../rols.php');
            }else{
                echo "ERROR";
            }
            
        }else{
         //  echo "NO ROL";
            $_SESSION['error_type'] = "rolEditConflict";
            $_SESSION['error_msg'] = "No agregaste ningun permisos al rol";
            header('Location: ../rolsEdit.php?idRol=' . $idRol);
        }
    }
}else{
    var_dump($_POST);
    echo "NOT SUBMIT";
}

function process($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

// <?php 
// require_once('../model/RBAC-utils.php');
// ?>

// <?php

// //var_dump($_POST);

// if(count($_POST)>0){
//     //Validar que los campos se hayan llenado de la manera correcta.
//     echo "PASO1";
//     var_dump($_POST);
    
//     if(isset($_POST["nombre_rol"]) && isset($_POST["description_rol"] )){
//         echo "PASO2";
//         $description = process($_POST["description_rol"]);
//         $name = process($_POST["name"]);
//         $permissions = $_POST["permissions"];
//         $idRol = $_POST["idRol"];
//         if(strlen($description) > 0 &&
//           strlen($description) <= 50 &&
//           strlen($name) > 0 &&
//           strlen($name) <= 50){
//             echo "PASO3";
//             if(count($permissions === 0)){
//                 echo "PASO4";
//                 $_SESSION['error_type'] = "rolConflict";
//                 $_SESSION['error_msg'] = "No agregaste permisos al rol";
//                 header('Location: rolsEdit.php?idRol=' . $idRol);
//             }
//             if(updateRol($idRol, $name, $description, $permissions)){
//                 echo "PASO5";
//                 header('Location: ../rols.php');
//             }else{
//                 echo "ERROR";
//             } 
//         }
//     }
// }else{
//   echo "NOT SUBMIT";
// }
// function process($data){
//     $data = trim($data);
//     $data = stripslashes($data);
//     $data = htmlspecialchars($data);
//     return $data;
// }
// ?>