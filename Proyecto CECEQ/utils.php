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


//---------------------------------RBAC MODEL---------------------------------------------------------
require_once('model/RBAC-utils.php');

// ---------------------------------------END RBAC MODEL-----------------------------------------

    /*
    function insertVisitante($name,$paternal,$maternal,$bday,$grade,$gender){
        $conn = connect();
        $sql = 'INSERT INTO  visitante(idVisitante,nombre,apellidoPaterno,apellidoMaterno,fechaNacimiento,genero) VALUES (DEFAULT,'. '"' . $name . '", "' . $paternal . '", "'  . $maternal . '",' . $bday . ', "' .$gender . '");';
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
}*/
function insertVisitante($nombre, $apellidoPaterno, $apellidoMaterno, $fechaNacimiento, $gradoEstudios, $genero){
    $connection = connect();
    $statement = mysqli_prepare($connection,"
    insert into visitante (nombre, apellidoPaterno, apellidoMaterno, fechaNacimiento, genero)
    values (?, ?, ?, ?, ?);
    ");
    $statement->bind_param("sssss", $nombre, $apellidoPaterno, $apellidoMaterno, $fechaNacimiento, $genero);
    $statement->execute();

    $statement = mysqli_prepare($connection,"
    insert into visitante_gradoestudios values ((select idVisitante from visitante order by idVisitante desc limit 1), ?, current_timestamp());
    ");
    $statement->bind_param("i", $gradoEstudios);
    $statement->execute();

    $statement = mysqli_prepare($connection,"
    insert into entrada (idVisitante) values ((select idVisitante from visitante order by idVisitante desc limit 1));
    ");
    $statement->execute();
    disconnect($connection);

}

function insertCredential($idCredencial, 
                            $idVisitante,
                            $fechaExpedicion,
                            $foto,
                            $colonia,
                            $calle,
                            $numero,
                            $cp,
                            $telefono,
                            $correo,
                            $nombreTrabajo,
                            $telefonoTrabajo,
                            $coloniaTrabajo,
                            $calleTrabajo,
                            $numeroTrabajo,
                            $cpTrabajo){
    $connection = connect();
    $statement = mysqli_prepare($connection,"
    insert into visitante (idCredencial,
                            idVisitante,
                            fechaExpedicion,
                            foto,
                            colonia,
                            calle,
                            numero,
                            cp,
                            telefono,
                            correo, 
                            nombreTrabajo,
                            telefonoTrabajo,
                            coloniaTrabajo,
                            calleTrabajo,
                            numeroTrabajo,
                            cpTrabajo)
    values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);
    ");
    $statement->bind_param("iisssiiississii", $nombre, $apellidoPaterno, $apellidoMaterno, $fechaNacimiento, $genero);
    $statement->execute();
    
}

function queryVisitor($idVisitante, $nombre, $apellidoPaterno, $apellidoMaterno, $fechaNacimiento, $genero, $gradoEstudios){
    $connection = connect();
    $nombre .="%";
    $apellidoPaterno .="%";
    $apellidoMaterno .="%";
    $statement = mysqli_prepare($connection,"
    select v.idVisitante as 'Número', v.nombre as 'Nombre', apellidoPaterno as 'Apellido paterno', apellidoMaterno as 'Apellido materno', fechaNacimiento as 'Fecha de nacimiento', genero as 'Género', g.nombre as 'Grado de estudios'
    from visitante as v, visitante_gradoestudios as vg, gradoestudios as g
    where (v.idVisitante = ? ".($idVisitante==""?"or 1":"").")
    and (v.nombre like ? ".($nombre==""?"or 1":"").")
    and (apellidoPaterno like ? ".($apellidoPaterno==""?"or 1":"").")
    and (apellidoMaterno like ? ".($apellidoMaterno==""?"or 1":"").")
    and (fechaNacimiento = ? ".($fechaNacimiento==""?"or 1":"").")
    and (genero = ? ".($genero==""?"or 1":"").")
    and v.idVisitante = vg.idVisitante
    and vg.idGrado = g.idGrado
    and (g.idGrado = ? ".($gradoEstudios==""?"or 1":"").")
    ");
    $statement->bind_param("isssssi", $idVisitante, $nombre, $apellidoPaterno, $apellidoMaterno, $fechaNacimiento, $genero, $gradoEstudios);
    $statement->execute();
    $result = $statement->get_result();
    disconnect($connection);
    return $result;
}

function queryStatistics($schooling, $age, $gender, $month, $year){
    $connection = connect();
    $age .="%";
    /*
    $statement = mysqli_prepare($connection,"
    select v.idVisitante as 'Número', v.nombre as 'Nombre', apellidoPaterno as 'Apellido paterno', apellidoMaterno as 'Apellido materno', fechaNacimiento as 'Fecha de nacimiento', genero as 'Género', g.nombre as 'Grado de estudios'
    from visitante as v, visitante_gradoestudios as vg, gradoestudios as g
    where (v.idVisitante = ? ".($idVisitante==""?"or 1":"").")
    and (v.nombre like ? ".($nombre==""?"or 1":"").")
    and (apellidoPaterno like ? ".($apellidoPaterno==""?"or 1":"").")
    and (apellidoMaterno like ? ".($apellidoMaterno==""?"or 1":"").")
    and (fechaNacimiento = ? ".($fechaNacimiento==""?"or 1":"").")
    and (genero = ? ".($genero==""?"or 1":"").")
    and v.idVisitante = vg.idVisitante
    and vg.idGrado = g.idGrado
    and (g.idGrado = ? ".($gradoEstudios==""?"or 1":"").")
    ");
    $statement->bind_param("isssssi", $idVisitante, $nombre, $apellidoPaterno, $apellidoMaterno, $fechaNacimiento, $genero, $gradoEstudios);
    $statement->execute();
    $result = $statement->get_result();
    disconnect($connection);
    return $result;*/
}


function buildTableData($result){
    $table = "";
    if(mysqli_num_rows($result)>0){
        $fieldNumber = mysqli_num_fields($result);
        $table .= "<thead>";
        for($i = 0; $i < $fieldNumber; $i++){
              $table .= "<td><strong>  ".mysqli_fetch_field_direct($result, $i)->name." </strong> </td>";
        }
        $table .= "</thead><tbody>";
        while($row = mysqli_fetch_assoc($result)){
            $table .= "<tr>";
            foreach($row as $data){
                $table .= "<td>$data</td>";
            }
            $table .= "</tr>";
        }
        $table .= "</tbody>";
    }else{
        echo "<thead><td>No hay resultados</td></thead>";
    }
    return $table;
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
function insertAutor($nombre, $apellidoPaterno, $apellidoMaterno)
{
    $connection = connect();
    $statement = mysqli_prepare($connection, "INSERT INTO autor(nombre, apellidoPaterno, apellidoMaterno)
    VALUES(?,?,?);
    ");
    $statement ->bind_param("sss", $nombre, $apellidoPaterno, $apellidoMaterno);
    $retorno = $statement->execute();
    disconnect($connection);
    return($retorno);
}
function buscarAutor($nombre, $apellidoPaterno, $apellidoMaterno)
{
    $connection = connect();
    $statement = mysqli_prepare($connection,"
    select idAutor, nombre, apellidoPaterno, apellidoMaterno
    from autor
    where (nombre = ? ".($nombre==""?"or 1":"").")
    and (apellidoPaterno = ? ".($apellidoPaterno==""?"or 1":"").")
    and (apellidoMaterno = ? ".($apellidoMaterno==""?"or 1":"").")
    ");
    $statement->bind_param("sss", $nombre, $apellidoPaterno, $apellidoMaterno);
    $statement->execute();
    $result = $statement->get_result();
    disconnect($connection);
    return $result;
}
function insertTitulo($titulo, $year)
{
    $connection = connect();
    $statement = mysqli_prepare($connection, "INSERT INTO titulo(titulo, year)
    VALUES(?,?);
    ");
    $statement ->bind_param("si", $titulo, $year);
    $retorno = $statement->execute();
    disconnect($connection);
    return($retorno);

}
function buscarTitulo($titulo, $year)
{
    $connection = connect();
    $statement = mysqli_prepare($connection,"
    select idTitulo, titulo, year
    from titulo
    where (titulo = ? ".($titulo==""?"or 1":"").")
    and (year = ? ".($year==""?"or 1":"").")
    ");
    $statement->bind_param("si", $titulo, $year);
    $statement->execute();
    $result = $statement->get_result();
    disconnect($connection);
    return $result;
}
function insertEjemplar($ISBN, $estante, $editorial, $year, $volumen, $idTitulo)
{
    $connection = connect();
    $statement = mysqli_prepare($connection, "INSERT INTO ejemplar(ISBN, estante, editorial, year, volumen, idTitulo)
    VALUES(?,?,?,?,?,?);
    ");
    $statement ->bind_param("sssiii", $ISBN, $estante, $editorial, $year, $volumen, $idTitulo);
    $retorno = $statement->execute();
    disconnect($connection);
    return($retorno);

}
function buscarEjemplar($ISBN, $estante, $editorial, $year, $volumen)
{
    $connection = connect();
    $statement = mysqli_prepare($connection,"
    select ISBN, estante, editorial, year, volumen
    from ejemplar
    where (ISBN = ? ".($ISBN==""?"or 1":"").")
    and (estante = ? ".($estante==""?"or 1":"").")
    and (editorial = ? ".($editorial==""?"or 1":"").")
    and (year = ? ".($year==""?"or 1":"").")
    and (volumen = ? ".($volumen==""?"or 1":"").")
    ");
    $statement ->bind_param("sssii", $ISBN, $estante, $editorial, $year, $volumen);
    $statement->execute();
    $result = $statement->get_result();
    disconnect($connection);
    return $result;
}
function insertAutorTitulo($idTitulo, $idAutor)
{
    $connection = connect();
    $statement = mysqli_prepare($connection, "INSERT INTO autor_titulo(idAutor, idTitulo)
    VALUES(?,?);
    ");
    $statement ->bind_param("ii", $idTitulo, $idAutor);
    $retorno = $statement->execute();
    disconnect($connection);
    return($retorno);

}
function buscarAutorTitulo($idTitulo, $idAutor)
{
    $connection = connect();
    $statement = mysqli_prepare($connection,"
    select idAutor, idTitulo
    from autor_titulo
    where (idTitulo = ? ".($idTitulo==""?"or 1":"").")
    and (idAutor = ? ".($idAutor==""?"or 1":"").")
    ");
    $statement ->bind_param("ii", $idTitulo, $idAutor);
    $statement->execute();
    $result = $statement->get_result();
    disconnect($connection);
    return $result;
}

//**************************   De interfaz Lend_Return   **********************************
function checkBookAvailability(){
    //si availability da true llama a la funcion insertLend
    // si availability da falso llama/incluye a un modal que marque erro
}

function insertLend( $idEjemplar, $idCredencial, $dateLend, $dateReturn){
  $conn = connect();
  if(!$conn){
    die("No se pudo conectar a la Base de Datos");
  }

  $sql = "INSERT INTO ejemplar_credencial(idEjemplar, idCredencial, fechaPrestamo, fechaDevolucion)
  VALUES(?,?, ?, ?)";
        // Preparing the statement 
        if (!($statement = $conn->prepare($sql))) {
           die("Preparation 1 failed: (" . $conn->errno . ") " . $conn->error);
        }
         // Binding statement params 
        if (!$statement->bind_param("iiss", $idEjemplar, $idCredencial, $dateLend, $dateReturn)) {
            die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error); 
        }
         // Executing the statement
         if (!$statement->execute()) {
            die("Execution failed: (" . $statement->errno . ") " . $statement->error);
          } 
  disconnect($conn);
}

function insertReturn($idEjemplar, $idCredencial, $fechaDevolucionReal){
    $conn = connect();
    if(!$conn){
      die("No se pudo conectar a la Base de Datos");
    }
    $sql = "UPDATE ejemplar_credencial 
            SET fechaDevolucionReal=(?)     
            WHERE idEjemplar=(?) 
            AND idCredencial=(?) ";
          // Preparing the statement 
          if (!($statement = $conn->prepare($sql))) {
             die("Preparation 1 failed: (" . $conn->errno . ") " . $conn->error);
          }
           // Binding statement params 
          if (!$statement->bind_param("sii",$fechaDevolucionReal, $idEjemplar, $idCredencial)) {
              die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error); 
          }
           // Executing the statement
           if (!$statement->execute()) {
              die("Execution failed: (" . $statement->errno . ") " . $statement->error);
            } 
    disconnect($conn);
  }


function buscarPrestamoDevolucion($idCredencial){
    $connection = connect();
    $statement = mysqli_prepare($connection,"");
    $statement ->bind_param("i", $idCredencial);
    $statement->execute();
    $result = $statement->get_result();
    disconnect($connection);
    return $result;
}

    //var_dump(login('lalo', 'hockey'));
    //var_dump(login('joaquin', 'basket'));
    //var_dump(login('cesar', 'basket'));
?>
