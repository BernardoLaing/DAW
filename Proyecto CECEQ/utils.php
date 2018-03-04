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
//           while ($fila = mysqli_fetch_array($results, MYSQLI_BOTH)) {
//                                                // Options: MYSQLI_NUM to use only numeric indexes
//                                                // MYSQLI_ASSOC to use only name (string) indexes
//                                                // MYSQLI_BOTH, to use both
//                    for($i=0; $i<count($fila); $i++) {
//                        // use of numeric index
//                        echo $fila[$i].' '; 
//                    }
//                    echo '<br>';
//            }
//                
//            // it releases the associated results
//            mysqli_free_result($results);
//            disconnect($db);
//            return true;
        }
        return false;
    }

    
    function getUserRoles(){
        $db = connect();
        if($db != NULL){
            //Specification of the SQL query
            $query='SELECT u.usuario, u.nombre, r.nombre  
                    FROM usuario u, usuario_rol ur, rol r
                    WHERE u.user = ur.usuario AND ur.idRol = r.id';
            $query;
             // Query execution; returns identifier of the result group
            $results = $db->query($query);
            disconnect($db);
            return $results;
        }
        return false;
        
    }

    function insertVisitante($name,$paternal,$maternal,$bday,$grade,$gender){
        $conn = connect();
        $sql = "INSERT INTO fruit (nombre,apellidoPaterno,apellidoMaterno,fechaNacimiento,genero) VALUES (". "'" . $name . "', '" . $paternal . "', '"  . $maternal . "', " . $bday . ", '" . $grade . "', '". $gender . "');";
        
        if(mysqli_query($conn,$sql)){
            echo "<p>New record created successfully</p>";
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