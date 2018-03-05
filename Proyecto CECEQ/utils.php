<?php
function connect() {
    $ENV = "dev";
    if ($ENV == "dev") {
        $mysql = mysqli_connect("localhost","root","","jambe");
                                        //root si estan en windows
    } else  if ($ENV == "prod"){
        $mysql = mysqli_connect("localhost","blaing","awdvcft13509","jambe");
    }

    $mysql->set_charset("utf8");
    return $mysql;
}

function disconnect($mysql) {
    mysqli_close($mysql);
}

function login($user, $passwd) {
    $db = connect();
    if ($db != NULL) {

        //Specification of the SQL query
        $query="SELECT usuario 
                FROM usuario 
                WHERE usuario='" . $user . "' AND password='" . $passwd . "'";
         // Query execution; returns identifier of the result group
        $results = mysqli_query($db, $query);
         // cycle to explode every line of the results

        if (mysqli_num_rows($results) > 0)  {
            // it releases the associated results
            mysqli_free_result($results);
            disconnect($db);
            return true;
        }
        return false;
    } 
    return false;
}

function getTable($tableName) {
    $db = connect();
    if ($db != NULL) {

        //Specification of the SQL query
        $query='SELECT * FROM ' . $tableName;
        $query;
         // Query execution; returns identifier of the result group
        $results = $db->query($query);
         // cycle to explode every line of the results
        disconnect($db);
        return $results;
    }
    return false;
}

//---------------------------------RBAC MODEL---------------------------------------------------------
    
function getUserRoles(){
    $db = connect();
    if($db != NULL){
        //Specification of the SQL query
        $query='SELECT u.usuario, u.nombre, r.nombre  
                FROM usuario u, usuario_rol ur, rol r
                WHERE u.usuario = ur.idUsuario AND ur.idRol = r.idRol';
        $query;
         // Query execution; returns identifier of the result group
        $results = $db->query($query);
        disconnect($db);
        return $results;
    }
    return false;

}

function getUser($user){
    $db = connect();
    $user = $db->real_escape_string($user);
    if($db != NULL){
        //Specification of the SQL query
        $query='SELECT u.usuario, u.nombre, r.nombre  
                FROM usuario u, usuario_rol ur, rol r
                WHERE u.usuario = ur.idUsuario AND ur.idRol = r.idRol
                AND u.usuario = ?';
        // Preparing the statement 
        if (!($statement = $db->prepare($query))) {
            die("Preparation 1 failed: (" . $db->errno . ") " . $db->error);
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


            $query='INSERT INTO usuario_rol (idUsuario, idRol, fecha) VALUES (?,?,CURDATE()) ';

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


            $query='INSERT INTO usuario_rol (idUsuario, idRol, fecha) VALUES (?,?,CURDATE()) ';

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
    
//    $stmt = $mysqli->prepare("UPDATE myTable SET name = ? WHERE id = ?");
//$stmt->bind_param("si", $_POST['name'], $_SESSION['id']);
//$stmt->execute();
//$stmt->close();
}

function deleteUser($user){
    $db = connect();
    
    if($db != NULL){
        $query="DELETE FROM usuario_rol WHERE idUsuario = ?";
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

// ---------------------------------------END RBAC MODEL-----------------------------------------

    function insertVisitante($name,$paternal,$maternal,$bday,$grade,$gender){
        $conn = connect();
        $sql = 'INSERT INTO  visitante(idVisitante,nombre,apellidoPaterno,apellidoMaterno,fechaNacimiento,genero) VALUES (DEFAULT,'. '"' . $name . '", "' . $paternal . '", "'  . $maternal . '",' . $bday . ', "' .$gender . '")';
        if(mysqli_query($conn,$sql)){
            disconnect($conn);
            $idvisitante = getLastIdVisitante();
            if($idvisitante != false){
                if(_insertVisitante_Grado($idvisitante,$grade) == false){
                    echo "<p>No se han ingresado los grados de estudio en la base de datos</p>";
                }
            }
            return true;
        }else{
            echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) ."</p>";
            disconnect($conn);
            return false;
        }
        disconnect($conn);
}

function getLastIdVisitante(){
    $conn = connect();
    $sql = "SELECT idVisitante FROM visitante ORDER BY idVisitante DESC LIMIT 1";
    $results = mysqli_query($conn,$sql);
    if($results){
        return $results->fetch_assoc()["idVisitante"];
    }else{
        echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) ."</p>";
        return false;
    }
}

function _insertVisitante_Grado($idvisitante,$idgrado){
    $conn = connect();
    $sql = 'INSERT INTO  visitante_gradoestudios(idVisitante, idGrado, fecha) VALUES (' . $idvisitante . ',' . $idgrado . ',' . date("Y-m-d") . ');';
    if(mysqli_query($conn,$sql)){
        disconnect($conn);
        return true;
    }else{
        echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) ."</p>";
        disconnect($conn);
        return false;
    }
    disconnect($conn);

}



    
    //var_dump(login('lalo', 'hockey'));
    //var_dump(login('joaquin', 'basket'));
    //var_dump(login('cesar', 'basket'));
?>