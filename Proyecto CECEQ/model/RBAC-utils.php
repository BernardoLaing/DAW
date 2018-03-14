<?php
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
            die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error); 
        }
        if (!$stmt->execute()) {
            die("Execution failed: (" . $statement->errno . ") " . $statement->error);
        } 
        
        $result = $stmt->get_result();
        if($result->num_rows === 0) exit('No rows');
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
        $query='SELECT u.usuario, u.nombre, r.nombre  
                FROM usuario u, usuario_rol ur, rol r
                WHERE u.usuario = ur.usuario AND ur.idRol = r.idRol
                AND u.usuario = ?';
        
        // Preparing the statement 
        if (!($statement = $db->prepare($query))) {
            die("Preparation failed: (" . $db->errno . ") " . $db->error);
        }
        // Binding statement params 
        if (!$statement->bind_param("s", $user)) {
            die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error); 
        }
         // Executing the statement
         if (!$statement->execute()) {
            die("Execution failed: (" . $statement->errno . ") " . $statement->error);
          } 
        $statement->store_result();
        if($statement->num_rows === 0) exit('No rows');
        $statement->bind_result($user, $name, $rol);
        $statement->fetch();
        $result["user"] = $user;
        $result["name"] = $name;
        $result["rol"] = $rol;
        disconnect($db);
        return $result;
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
            // insert command specification 
            $query='INSERT INTO usuario (usuario, nombre, password) VALUES (?,?, ?) ';
            // Preparing the statement 
            if (!($statement = $db->prepare($query))) {
                die("Preparation 1 failed: (" . $db->errno . ") " . $db->error);
            }
            // Binding statement params 
            if (!$statement->bind_param("sss", $user, $name, $password)) {
                die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error); 
            }
             // Executing the statement
             if (!$statement->execute()) {
                die("Execution failed: (" . $statement->errno . ") " . $statement->error);
              } 


            $query='INSERT INTO usuario_rol (usuario, idRol, fecha) VALUES (?,?,CURDATE()) ';

            if (!($statement = $db->prepare($query))) {
                die("Preparation 2 failed: (" . $db->errno . ") " . $db->error);
            }
            // Binding statement params 
            if (!$statement->bind_param("si", $user, $rol)) {
                die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error); 
            }
            if (!$statement->execute()) {
                die("Execution failed: (" . $statement->errno . ") " . $statement->error);
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
            if (!($statement = $db->prepare($query))) {
                die("Preparation 1 failed: (" . $db->errno . ") " . $db->error);
            }
            // Binding statement params 
            if (!$statement->bind_param("sss", $name, $password, $user)) {
                die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error); 
            }
             // Executing the statement
             if (!$statement->execute()) {
                die("Execution failed: (" . $statement->errno . ") " . $statement->error);
              } 
            
            
            $query='UPDATE usuario_rol SET idRol = ? WHERE usuario = ?';
            // Preparing the statement 
            if (!($statement = $db->prepare($query))) {
                die("Preparation 1 failed: (" . $db->errno . ") " . $db->error);
            }
            // Binding statement params 
            if (!$statement->bind_param("is", $rol, $user)) {
                die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error); 
            }
            // Executing the statement
            if (!$statement->execute()) {
                die("Execution failed: (" . $statement->errno . ") " . $statement->error);
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
         if (!($statement = $db->prepare($query))) {
             die("Preparation failed: (" . $db->errno . ") " . $db->error);
         }
        // Binding statement params 
        if (!$statement->bind_param("s", $user)) {
            die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error); 
        }
         // Executing the statement
         if (!$statement->execute()) {
             echo "FAIL EXECUTE";
             die("Execution failed: (" . $statement->errno . ") " . $statement->error);
         } 
        
        
        $query="DELETE FROM usuario WHERE usuario = ?";
         if (!($statement = $db->prepare($query))) {
             die("Preparation failed: (" . $db->errno . ") " . $db->error);
         }
        // Binding statement params 
        if (!$statement->bind_param("s", $user)) {
            die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error); 
        }
         // Executing the statement
         if (!$statement->execute()) {
             echo "FAIL EXECUTE";
             die("Execution failed: (" . $statement->errno . ") " . $statement->error);
         } 
        
        disconnect($db);
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
        if (!($statement = $db->prepare($query))) {
            die("Preparation 1 failed: (" . $db->errno . ") " . $db->error);
        }
        // Binding statement params 
        if (!$statement->bind_param("i", $idRol)) {
            die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error); 
        }
         // Executing the statement
         if (!$statement->execute()) {
            die("Execution failed: (" . $statement->errno . ") " . $statement->error);
          } 
        $statement->store_result();
        if($statement->num_rows === 0) exit('No rows');
        $statement->bind_result($idRol, $name, $description);
        $statement->fetch();
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

        // insert command specification 
        $query='INSERT INTO rol (nombre, descripcion) VALUES (?, ?) ';
        // Preparing the statement 
        if (!($statement = $db->prepare($query))) {
            die("Preparation failed: (" . $db->errno . ") " . $db->error);
        }
        // Binding statement params 
        if (!$statement->bind_param("ss", $name, $description)) {
            die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error); 
        }
         // Executing the statement
         if (!$statement->execute()) {
            die("Execution failed: (" . $statement->errno . ") " . $statement->error);
        } 
        
        $query='SELECT idRol 
                FROM rol 
                WHERE nombre = ?';
        if (!($statement = $db->prepare($query))) {
            die("Preparation failed: (" . $db->errno . ") " . $db->error);
        }
        // Binding statement params 
        if (!$statement->bind_param("s",$name)) {
            die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error); 
        }
         // Executing the statement
         if (!$statement->execute()) {
            die("Execution failed: (" . $statement->errno . ") " . $statement->error);
        } 
        $statement->store_result();
        if($statement->num_rows === 0) exit('No rows');
        $statement->bind_result($idRol);
        $statement->fetch();
        
        foreach($permissions as $idOperacion){
            $query='INSERT INTO rol_operacion (idRol, idOperacion, fecha) VALUES (?,?,CURDATE()) ';

            if (!($statement = $db->prepare($query))) {
                die("Preparation 2 failed: (" . $db->errno . ") " . $db->error);
            }
            // Binding statement params 
            if (!$statement->bind_param("ii", $idRol, $idOperacion)) {
                die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error); 
            }
            if (!$statement->execute()) {
                die("Execution failed: (" . $statement->errno . ") " . $statement->error);
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
         if (!($statement = $db->prepare($query))) {
             die("Preparation failed: (" . $db->errno . ") " . $db->error);
         }
        // Binding statement params 
        if (!$statement->bind_param("i", $idRol)) {
            die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error); 
        }
         // Executing the statement
         if (!$statement->execute()) {
             echo "FAIL EXECUTE";
             $db->rollback();
             die("Execution failed: (" . $statement->errno . ") " . $statement->error);
         } 
        
        
        $query="DELETE FROM rol_operacion WHERE idRol = ?";
         if (!($statement = $db->prepare($query))) {
             die("Preparation failed: (" . $db->errno . ") " . $db->error);
         }
        // Binding statement params 
        if (!$statement->bind_param("i", $idRol)) {
            die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error); 
        }
         // Executing the statement
         if (!$statement->execute()) {
             echo "FAIL EXECUTE";
             $db->rollback();
             die("Execution failed: (" . $statement->errno . ") " . $statement->error);
         } 
        
         $query="DELETE FROM rol WHERE idRol = ?";
         if (!($statement = $db->prepare($query))) {
             die("Preparation failed: (" . $db->errno . ") " . $db->error);
         }
        // Binding statement params 
        if (!$statement->bind_param("i", $idRol)) {
            die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error); 
        }
         // Executing the statement
         if (!$statement->execute()) {
             echo "FAIL EXECUTE";
             $db->rollback();
             die("Execution failed: (" . $statement->errno . ") " . $statement->error);
         } 
        
        $statement->close();
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
            // insert command specification 
            $query='UPDATE rol SET nombre = ?, descripcion = ? WHERE idRol = ?';
            // Preparing the statement 
            if (!($statement = $db->prepare($query))) {
                die("Preparation 1 failed: (" . $db->errno . ") " . $db->error);
            }
            // Binding statement params 
            if (!$statement->bind_param("ssi", $name, $description, $idRol)) {
                die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error); 
            }
             // Executing the statement
             if (!$statement->execute()) {
                die("Execution failed: (" . $statement->errno . ") " . $statement->error);
              } 
            
            $query="DELETE FROM rol_operacion WHERE idRol = ?";
            if (!($statement = $db->prepare($query))) {
                die("Preparation failed: (" . $db->errno . ") " . $db->error);
            }
            // Binding statement params 
            if (!$statement->bind_param("i", $idRol)) {
                die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error); 
            }
            // Executing the statement
            if (!$statement->execute()) {
                echo "FAIL EXECUTE";
                die("Execution failed: (" . $statement->errno . ") " . $statement->error);
            } 
            
            $query='INSERT INTO rol_operacion (idRol, idOperacion, fecha) VALUES (?,?,CURDATE()) ';
            // Preparing the statement 
            if (!($statement = $db->prepare($query))) {
                die("Preparation 1 failed: (" . $db->errno . ") " . $db->error);
            }

            foreach($permissions as $idOperacion){
                // Binding statement params 
                if (!$statement->bind_param("ii", $idRol, $idOperacion)) {
                    die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error); 
                }
                if (!$statement->execute()) {
                    die("Execution failed: (" . $statement->errno . ") " . $statement->error);
                } 
            }
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
//        if (!($statement = $db->prepare($query))) {
//             die("Preparation failed: (" . $db->errno . ") " . $db->error);
//         }
        // Binding statement params 
//        if (!$statement->bind_param("i", $idRol)) {
//            die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error); 
//        }
        // Executing the statement
//        if (!$statement->execute()) {
//            echo "FAIL EXECUTE";
//            die("Execution failed: (" . $statement->errno . ") " . $statement->error);
//        }
        $results = $db->query($query);
        disconnect($db);
        return $results;
    }
    return false;
}

?>