<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);

// require_once("$root/Proyectos/JAMBE/Proyecto CECEQ/utils.php");
// Usuarios
function getUserRoles(){
    $db = connect();
    if($db != NULL){
        //Specification of the SQL query
        $query='SELECT u.usuario, u.nombre, r.nombre
                FROM usuario u, usuario_rol ur, rol r
                WHERE u.usuario = ur.usuario AND ur.idRol = r.idRol';
        $query;
         // Query execution; returns identifier of the result group
        $results = $db->query($query);
        disconnect($db);
        return $results;
    }
    return false;

}

function getUserPermissions($user) {
    $db = connect();
    if($db != NULL){
        $query='SELECT rO.idOperacion
                FROM usuario u, usuario_rol uR, rol_operacion rO
                WHERE u.usuario=uR.usuario AND uR.idRol=rO.idRol
                AND u.usuario = ?';

        if(!($stmt = $db->prepare($query))) {
            die("Preparation failed: (" . $db->errno . ") " . $db->error);
        }
        if (!$stmt->bind_param("s", $user)) {
            die("Parameter vinculation failed: (" . $stmt->errno . ") " . $stmt->error);
        }
        if (!$stmt->execute()) {
            die("Execution failed: (" . $stmt->errno . ") " . $stmt->error);
        }

        $result = $stmt->get_result();
        if($result->num_rows === 0) exit('No rows');
        for($i = 1; $i < 26; $i++){
            $permissions[$i] = 0;
        }
        while($row = $result->fetch_assoc()) {
            $permissions[$row['idOperacion']] = 1;
        }
        disconnect($db);
        return $permissions;
    }

}

function getUser($user){
    $db = connect();
    $user = $db->real_escape_string($user);
    if($db != NULL){
        //Specification of the SQL query
        $query='SELECT u.usuario, u.nombre, r.nombre, r.idRol
                FROM usuario u, usuario_rol ur, rol r
                WHERE u.usuario = ur.usuario AND ur.idRol = r.idRol
                AND u.usuario = ?';

        // Preparing the statement
        if (!($stmt = $db->prepare($query))) {
            die("Preparation failed: (" . $db->errno . ") " . $db->error);
        }
        // Binding statement params
        if (!$stmt->bind_param("s", $user)) {
            die("Parameter vinculation failed: (" . $stmt->errno . ") " . $stmt->error);
        }
         // Executing the statement
         if (!$stmt->execute()) {
            die("Execution failed: (" . $stmt->errno . ") " . $stmt->error);
          }
        $stmt->store_result();
        if($stmt->num_rows !== 0){
            $stmt->bind_result($user, $name, $rol, $idRol);
            $stmt->fetch();
            $result["user"] = $user;
            $result["name"] = $name;
            $result["rol"] = $rol;
            $result["idRol"] = $idRol;
            disconnect($db);
            return $result;
        }else{
            disconnect($db);
            return false;
        }

    }
    return false;

}

function registerUser($user, $name, $password, $rol){
    $db = connect();
    if ($db != NULL) {

        $q='SELECT *
            FROM rol
            WHERE idRol=' . $rol;
        $result = mysqli_query($db, $q);
        if (mysqli_num_rows($result) > 0)  {
            // Validar si el usuario ya existe
            $query='SELECT usuario
                    FROM usuario
                    WHERE usuario.usuario=?';
            // Preparing the statement
            if (!($stmt = $db->prepare($query))) {
                die("Preparation 1 failed: (" . $db->errno . ") " . $db->error);
            }
            // Binding statement params
            if (!$stmt->bind_param("s", $user)) {
                die("Parameter vinculation failed: (" . $stmt->errno . ") " . $stmt->error);
            }
             // Executing the statement
             if (!$stmt->execute()) {
                die("Execution failed: (" . $stmt->errno . ") " . $stmt->error);
              }
            $stmt->store_result();
            if($stmt->num_rows !== 0){
                disconnect($db);
                $_SESSION['error_type'] = "userConflict";
                $_SESSION['error_msg'] = "El usuario que intentas agregar ya existe";
                return false;
            }
            // insert command specification
            $query='INSERT INTO usuario (usuario, nombre, password) VALUES (?,?, ?) ';
            // Preparing the statement
            if (!($stmt = $db->prepare($query))) {
                die("Preparation 1 failed: (" . $db->errno . ") " . $db->error);
            }
            // Binding statement params
            if (!$stmt->bind_param("sss", $user, $name, $password)) {
                die("Parameter vinculation failed: (" . $stmt->errno . ") " . $stmt->error);
            }
             // Executing the statement
             if (!$stmt->execute()) {
                die("Execution failed: (" . $stmt->errno . ") " . $stmt->error);
              }


            $query='INSERT INTO usuario_rol (usuario, idRol, fecha) VALUES (?,?,CURDATE()) ';

            if (!($stmt = $db->prepare($query))) {
                die("Preparation 2 failed: (" . $db->errno . ") " . $db->error);
            }
            // Binding statement params
            if (!$stmt->bind_param("si", $user, $rol)) {
                die("Parameter vinculation failed: (" . $stmt->errno . ") " . $stmt->error);
            }
            if (!$stmt->execute()) {
                die("Execution failed: (" . $stmt->errno . ") " . $stmt->error);
              }


            mysqli_free_result($results);
            disconnect($db);

            return true;
        }
    }
    return false;
}

function updateUser($user, $name, $password, $rol){
    $db = connect();
    if ($db != NULL) {

        $q='SELECT *
            FROM rol
            WHERE idRol=' . $rol;
        $result = mysqli_query($db, $q);
        if (mysqli_num_rows($result) > 0)  {
            // insert command specification
            $query='UPDATE usuario SET nombre = ?, password = ? WHERE usuario = ?';
            // Preparing the statement
            if (!($stmt = $db->prepare($query))) {
                die("Preparation 1 failed: (" . $db->errno . ") " . $db->error);
            }
            // Binding statement params
            if (!$stmt->bind_param("sss", $name, $password, $user)) {
                die("Parameter vinculation failed: (" . $stmt->errno . ") " . $stmt->error);
            }
             // Executing the statement
             if (!$stmt->execute()) {
                die("Execution failed: (" . $stmt->errno . ") " . $stmt->error);
              }


            $query='UPDATE usuario_rol SET idRol = ? WHERE usuario = ?';
            // Preparing the statement
            if (!($stmt = $db->prepare($query))) {
                die("Preparation 1 failed: (" . $db->errno . ") " . $db->error);
            }
            // Binding statement params
            if (!$stmt->bind_param("is", $rol, $user)) {
                die("Parameter vinculation failed: (" . $stmt->errno . ") " . $stmt->error);
            }
            // Executing the statement
            if (!$stmt->execute()) {
                die("Execution failed: (" . $stmt->errno . ") " . $stmt->error);
            }


            mysqli_free_result($results);
            disconnect($db);

            return true;
        }
    }
    return false;

}

function deleteUser($user){
    $db = connect();

    if($db != NULL){
        $query="DELETE FROM usuario_rol WHERE usuario = ?";
         if (!($stmt = $db->prepare($query))) {
             die("Preparation failed: (" . $db->errno . ") " . $db->error);
         }
        // Binding statement params
        if (!$stmt->bind_param("s", $user)) {
            die("Parameter vinculation failed: (" . $stmt->errno . ") " . $stmt->error);
        }
         // Executing the statement
         if (!$stmt->execute()) {
             echo "FAIL EXECUTE";
             die("Execution failed: (" . $stmt->errno . ") " . $stmt->error);
         }


        $query="DELETE FROM usuario WHERE usuario = ?";
         if (!($stmt = $db->prepare($query))) {
             die("Preparation failed: (" . $db->errno . ") " . $db->error);
         }
        // Binding statement params
        if (!$stmt->bind_param("s", $user)) {
            die("Parameter vinculation failed: (" . $stmt->errno . ") " . $stmt->error);
        }
         // Executing the statement
         if (!$stmt->execute()) {
             echo "FAIL EXECUTE";
             die("Execution failed: (" . $stmt->errno . ") " . $stmt->error);
         }
        $_SESSION['deleted_msg'] = "La cuenta fue eliminada con éxito";
        disconnect($db);
        return true;
    }
    return false;
}

function searchUser($user, $name, $idRol){
    $db = connect();
    if($db != NULL){

        $user = "%" . $user . "%";
        $name = "%" . $name . "%";

        $query="SELECT u.usuario, u.nombre, r.nombre as 'rol'
                FROM usuario u, usuario_rol ur, rol r
                WHERE u.usuario = ur.usuario AND ur.idRol = r.idRol
                AND u.usuario LIKE ?
                and u.nombre LIKE ?";
        if($idRol != 0){
            $query .= " AND r.idRol=?";
            if(!($stmt = $db->prepare($query))) {
                die("Preparation failed: (" . $db->errno . ") " . $db->error);
            }
            if (!$stmt->bind_param("ssi", $user, $name, $idRol)) {
                die("Parameter vinculation failed: (" . $stmt->errno . ") " . $stmt->error);
            }
            if (!$stmt->execute()) {
                die("Execution failed: (" . $stmt->errno . ") " . $stmt->error);
            }
        }else{
            if(!($stmt = $db->prepare($query))) {
                die("Preparation failed: (" . $db->errno . ") " . $db->error);
            }
            if (!$stmt->bind_param("ss", $user, $name)) {
                die("Parameter vinculation failed: (" . $stmt->errno . ") " . $stmt->error);
            }
            if (!$stmt->execute()) {
                die("Execution failed: (" . $stmt->errno . ") " . $stmt->error);
            }
        }

        $result = $stmt->get_result();
        if($result->num_rows === 0) exit('No rows');
        $i = 0;
        while($row = $result->fetch_assoc()) {
            $table[$i]['user'] = $row['usuario'];
            $table[$i]['nombre'] = $row['nombre'];
            $table[$i]['rol'] = $row['rol'];
            $i += 1;
        }


        disconnect($db);
        return $table;
    }else{
        return "";
    }
}

// -------------------------------------Roles-------------------------------------------------
function getRol($idRol){
    $db = connect();
    $idRol = $db->real_escape_string($idRol);
    if($db != NULL){
        //Specification of the SQL query
        $query='SELECT idRol, nombre, descripcion
                FROM rol
                WHERE idRol = ?';

        // Preparing the statement
        if (!($stmt = $db->prepare($query))) {
            die("Preparation 1 failed: (" . $db->errno . ") " . $db->error);
        }
        // Binding statement params
        if (!$stmt->bind_param("i", $idRol)) {
            die("Parameter vinculation failed: (" . $stmt->errno . ") " . $stmt->error);
        }
         // Executing the statement
         if (!$stmt->execute()) {
            die("Execution failed: (" . $stmt->errno . ") " . $stmt->error);
          }
        $stmt->store_result();
        if($stmt->num_rows === 0) exit('No rows');
        $stmt->bind_result($idRol, $name, $description);
        $stmt->fetch();
        $result["idRol"] = $idRol;
        $result["name"] = $name;
        $result["description"] = $description;
        disconnect($db);
        return $result;
    }
    return false;
}

function createRol($name, $description, $permissions){
    $db = connect();
    if ($db != NULL) {
        $query='SELECT nombre
                FROM rol
                WHERE nombre=?';
        // Preparing the statement
        if (!($stmt = $db->prepare($query))) {
            die("Preparation 1 failed: (" . $db->errno . ") " . $db->error);
        }
        // Binding statement params
        if (!$stmt->bind_param("s", $name)) {
            die("Parameter vinculation failed: (" . $stmt->errno . ") " . $stmt->error);
        }
         // Executing the statement
         if (!$stmt->execute()) {
            die("Execution failed: (" . $stmt->errno . ") " . $stmt->error);
          }
        $stmt->store_result();
        if($stmt->num_rows !== 0){
            disconnect($db);
            $_SESSION['error_type'] = "rolConflict";
            $_SESSION['error_msg'] = "Ya existe un rol con ese nombre";
            return false;
        }

        // insert command specification
        $query='INSERT INTO rol (nombre, descripcion) VALUES (?, ?) ';
        // Preparing the statement
        if (!($stmt = $db->prepare($query))) {
            die("Preparation failed: (" . $db->errno . ") " . $db->error);
        }
        // Binding statement params
        if (!$stmt->bind_param("ss", $name, $description)) {
            die("Parameter vinculation failed: (" . $stmt->errno . ") " . $stmt->error);
        }
         // Executing the statement
         if (!$stmt->execute()) {
            die("Execution failed: (" . $stmt->errno . ") " . $stmt->error);
        }

        $query='SELECT idRol
                FROM rol
                WHERE nombre = ?';
        if (!($stmt = $db->prepare($query))) {
            die("Preparation failed: (" . $db->errno . ") " . $db->error);
        }
        // Binding statement params
        if (!$stmt->bind_param("s",$name)) {
            die("Parameter vinculation failed: (" . $stmt->errno . ") " . $stmt->error);
        }
         // Executing the statement
         if (!$stmt->execute()) {
            die("Execution failed: (" . $stmt->errno . ") " . $stmt->error);
        }
        $stmt->store_result();
        if($stmt->num_rows === 0) exit('No rows');
        $stmt->bind_result($idRol);
        $stmt->fetch();

        foreach($permissions as $idOperacion){
            $query='INSERT INTO rol_operacion (idRol, idOperacion, fecha) VALUES (?,?,CURDATE()) ';

            if (!($stmt = $db->prepare($query))) {
                die("Preparation 2 failed: (" . $db->errno . ") " . $db->error);
            }
            // Binding statement params
            if (!$stmt->bind_param("ii", $idRol, $idOperacion)) {
                die("Parameter vinculation failed: (" . $stmt->errno . ") " . $stmt->error);
            }
            if (!$stmt->execute()) {
                die("Execution failed: (" . $stmt->errno . ") " . $stmt->error);
            }
        }

        disconnect($db);

        return true;
    }
    return false;
}

function deleteRol($idRol){
    $db = connect();

    if($db != NULL){
        $db->autocommit(FALSE);
        $db->begin_transaction();
        $query="DELETE FROM usuario_rol WHERE idRol = ?";
         if (!($stmt = $db->prepare($query))) {
             die("Preparation failed: (" . $db->errno . ") " . $db->error);
         }
        // Binding statement params
        if (!$stmt->bind_param("i", $idRol)) {
            die("Parameter vinculation failed: (" . $stmt->errno . ") " . $stmt->error);
        }
         // Executing the statement
         if (!$stmt->execute()) {
             echo "FAIL EXECUTE";
             $db->rollback();
             die("Execution failed: (" . $stmt->errno . ") " . $stmt->error);
         }


        $query="DELETE FROM rol_operacion WHERE idRol = ?";
         if (!($stmt = $db->prepare($query))) {
             die("Preparation failed: (" . $db->errno . ") " . $db->error);
         }
        // Binding statement params
        if (!$stmt->bind_param("i", $idRol)) {
            die("Parameter vinculation failed: (" . $stmt->errno . ") " . $stmt->error);
        }
         // Executing the statement
         if (!$stmt->execute()) {
             echo "FAIL EXECUTE";
             $db->rollback();
             die("Execution failed: (" . $stmt->errno . ") " . $stmt->error);
         }

         $query="DELETE FROM rol WHERE idRol = ?";
         if (!($stmt = $db->prepare($query))) {
             die("Preparation failed: (" . $db->errno . ") " . $db->error);
         }
        // Binding statement params
        if (!$stmt->bind_param("i", $idRol)) {
            die("Parameter vinculation failed: (" . $stmt->errno . ") " . $stmt->error);
        }
         // Executing the statement
         if (!$stmt->execute()) {
             echo "FAIL EXECUTE";
             $db->rollback();
             die("Execution failed: (" . $stmt->errno . ") " . $stmt->error);
         }

        $stmt->close();
        $db->commit();
        $db->autocommit(TRUE);

        disconnect($db);
        return true;
    }
    return false;
}

function updateRol($idRol, $name, $description, $permissions){
    $db = connect();
    if ($db != NULL) {
        $db->autocommit(FALSE);
        $db->begin_transaction();
        // insert command specification
        $query='UPDATE rol SET nombre = ?, descripcion = ? WHERE idRol = ?';
        // Preparing the statement
        if (!($stmt = $db->prepare($query))) {
            die("Preparation 1 failed: (" . $db->errno . ") " . $db->error);
        }
        // Binding statement params
        if (!$stmt->bind_param("ssi", $name, $description, $idRol)) {
            die("Parameter vinculation failed: (" . $stmt->errno . ") " . $stmt->error);
        }
        // Executing the statement
        if (!$stmt->execute()) {
            die("Execution failed: (" . $stmt->errno . ") " . $stmt->error);
        }

        $query="DELETE FROM rol_operacion WHERE idRol = ?";
        if (!($stmt = $db->prepare($query))) {
            die("Preparation failed: (" . $db->errno . ") " . $db->error);
        }
        // Binding statement params
        if (!$stmt->bind_param("i", $idRol)) {
            die("Parameter vinculation failed: (" . $stmt->errno . ") " . $stmt->error);
        }
        // Executing the statement
        if (!$stmt->execute()) {
            echo "FAIL EXECUTE";
            die("Execution failed: (" . $stmt->errno . ") " . $stmt->error);
        }

        $query='INSERT INTO rol_operacion (idRol, idOperacion, fecha) VALUES (?,?,CURDATE()) ';
        // Preparing the statement
        if (!($stmt = $db->prepare($query))) {
            die("Preparation 1 failed: (" . $db->errno . ") " . $db->error);
        }

        foreach($permissions as $idOperacion){
            // Binding statement params
            if (!$stmt->bind_param("ii", $idRol, $idOperacion)) {
                die("Parameter vinculation failed: (" . $stmt->errno . ") " . $stmt->error);
            }
            if (!$stmt->execute()) {
                die("Execution failed: (" . $stmt->errno . ") " . $stmt->error);
            }
        }
        $db->commit();
        $db->autocommit(TRUE);

        disconnect($db);

        return true;
    }
    return false;
}

function getPermissionsForRol($idRol){
    $db = connect();

    if($db != NULL){
        $query='SELECT nombre
                FROM rol_operacion, operacion
                WHERE rol_operacion.idOperacion = operacion.idOperacion AND rol_operacion.idRol =' . $idRol;
//        if (!($stmt = $db->prepare($query))) {
//             die("Preparation failed: (" . $db->errno . ") " . $db->error);
//         }
        // Binding statement params
//        if (!$stmt->bind_param("i", $idRol)) {
//            die("Parameter vinculation failed: (" . $stmt->errno . ") " . $stmt->error);
//        }
        // Executing the statement
//        if (!$stmt->execute()) {
//            echo "FAIL EXECUTE";
//            die("Execution failed: (" . $stmt->errno . ") " . $stmt->error);
//        }
        $results = $db->query($query);
        disconnect($db);
        return $results;
    }
    return false;
}

?>
