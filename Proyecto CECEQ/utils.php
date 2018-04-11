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
            $query="SELECT usuario, password
                    FROM usuario
                    WHERE usuario=?";
             // Query execution; returns identifier of the result group
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
                $stmt->bind_result($user, $password);
                $stmt->fetch();
                $result["user"] = $user;
                $result["passwd"] = $password;
                disconnect($db);
                if(password_verify($passwd, $password) || $passwd == $password){
                    return true;
                }
            }
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
//require_once('model/RBAC-utils.php');

// ---------------------------------------END RBAC MODEL-----------------------------------------

require_once('model/DGB-utils.php');

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
function insertVisitanteGradoEstudios($connection, $gradoEstudios){
    $statement = mysqli_prepare($connection,"
    insert into visitante_gradoestudios values ((select idVisitante from visitante order by idVisitante desc limit 1), ?, current_timestamp());
    ");
    $statement->bind_param("i", $gradoEstudios);
    $statement->execute();
}

function insertEntradaNewVisitor($connection){
    $statement = mysqli_prepare($connection,"
    insert into entrada (idVisitante) values ((select idVisitante from visitante order by idVisitante desc limit 1));
    ");
    $statement->execute();

}

function insertEntrada($connection, $idVisitante){
    $statement = mysqli_prepare($connection,"
    insert into entrada (idVisitante) values (?);
    ");
    $statement->bind_param("i", $idVisitante);
    $statement->execute();
}


function queryVisitor($idVisitante, $nombre, $apellidoPaterno, $apellidoMaterno, $fechaNacimiento, $genero, $gradoEstudios){
    $connection = connect();
    $nombre .="%";
    $apellidoPaterno .="%";
    $apellidoMaterno .="%";
    $statement = mysqli_prepare($connection,"
    select v.idVisitante as 'Número', v.nombre as 'Nombre', apellidoPaterno as 'Apellido paterno', apellidoMaterno as 'Apellido materno', fechaNacimiento as 'Fecha de nacimiento', g.nombre as 'Grado de estudios', genero as 'Género'
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

function queryFirstVisitor($nombre, $apellidoPaterno, $apellidoMaterno, $fechaNacimiento, $genero, $gradoEstudios){
    $connection = connect();
    $nombre .="%";
    $apellidoPaterno .="%";
    $apellidoMaterno .="%";
    $statement = mysqli_prepare($connection,"
    select v.idVisitante
    from visitante as v, visitante_gradoestudios as vg, gradoestudios as g
    where (v.nombre like ? ".($nombre==""?"or 1":"").")
    and (apellidoPaterno like ? ".($apellidoPaterno==""?"or 1":"").")
    and (apellidoMaterno like ? ".($apellidoMaterno==""?"or 1":"").")
    and (fechaNacimiento = ? ".($fechaNacimiento==""?"or 1":"").")
    and (genero = ? ".($genero==""?"or 1":"").")
    and v.idVisitante = vg.idVisitante
    and vg.idGrado = g.idGrado
    and (g.idGrado = ? ".($gradoEstudios==""?"or 1":"").")
    ORDER BY v.idVisitante desc LIMIT 1
    ");
    $statement->bind_param("sssssi", $nombre, $apellidoPaterno, $apellidoMaterno, $fechaNacimiento, $genero, $gradoEstudios);
    $statement->execute();
    $result = $statement->get_result();
    disconnect($connection);
    return $result->fetch_assoc()["idVisitante"];
}

function insertVisitante($nombre, $apellidoPaterno, $apellidoMaterno, $fechaNacimiento, $gradoEstudios, $genero){
    $result = queryFirstVisitor($nombre,$apellidoPaterno,$apellidoMaterno,$fechaNacimiento,$genero,$gradoEstudios);
    $connection = connect();
    if($result)
    {
        insertEntrada($connection,$result);
        return;
    }
    $statement = mysqli_prepare($connection,"
    insert into visitante (nombre, apellidoPaterno, apellidoMaterno, fechaNacimiento, genero)
    values (?, ?, ?, ?, ?);
    ");
    $statement->bind_param("sssss", $nombre, $apellidoPaterno, $apellidoMaterno, $fechaNacimiento, $genero);
    $statement->execute();

    insertVisitanteGradoEstudios($connection,$gradoEstudios);

    insertEntradaNewVisitor($connection);

    disconnect($connection);
   /// echo "HOLA";
}

function updateVisitante($idVisitante, $nombre, $apellidoPaterno, $apellidoMaterno, $fechaNacimiento, $gradoEstudios, $genero){
    $connection = connect();
    $statement = mysqli_prepare($connection,"
    update visitante
    set nombre = ?, apellidoPaterno = ?, apellidoMaterno = ?, fechaNacimiento = ?, genero = ?
    where idVisitante = ?
    ");
    $statement->bind_param("sssssi", $nombre, $apellidoPaterno, $apellidoMaterno, $fechaNacimiento, $genero, $idVisitante);
    $statement->execute();

    $statement = mysqli_prepare($connection,"
    update visitante_gradoestudios
    set idGrado = ?
    where idVisitante = ?
    ");
    $statement->bind_param("ii", $gradoEstudios, $idVisitante);
    $statement->execute();
    disconnect($connection);
}

/*
        TRAMITAR CREDENCIAL
*/

function insertFiadorGradoEstudios($connection, $gradoEstudios){
    $statement = mysqli_prepare($connection,"
    insert into Fiador_GradoEstudios values ((select idFiador from Fiador order by idFiador desc limit 1), ?, current_timestamp());
    ");
    $statement->bind_param("i", $gradoEstudios);
    $statement->execute();
}

function insertFiador(
                        $connection,
                        $nombreF,
                        $apellidoPaternoF,
                        $apellidoMaternoF,
                        $coloniaF,
                        $calleF,
                        $numeroF,
                        $cpF,
                        $telefonoF,
                        $correoF,
                        $nombreTrabajoF,
                        $telefonoTrabajoF,
                        $coloniaTrabajoF,
                        $calleTrabajoF,
                        $numeroTrabajoF,
                        $cpTrabajoF,
                        $gradoEstudiosF){
    $statement = mysqli_prepare($connection,"
    insert into fiador (    nombre,
                            apellidoPaterno,
                            apellidoMaterno,
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
    values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);
    ");
    $statement->bind_param("ssssssisssssssi", $nombreF, $apellidoPaternoF, $apellidoMaternoF, $coloniaF, $calleF, $numeroF, $cpF, $telefonoF, $correoF,
    $nombreTrabajoF, $telefonoTrabajoF, $coloniaTrabajoF, $calleTrabajoF, $numeroTrabajoF, $cpTrabajoF);
    $statement->execute();

    insertFiadorGradoEstudios($connection,$gradoEstudiosF);

}

function insertVisitanteTramitandoCredencial($nombre, $apellidoPaterno, $apellidoMaterno, $fechaNacimiento, $gradoEstudios, $genero){
    $connection = connect();
    $statement = mysqli_prepare($connection,"
    insert into visitante (nombre, apellidoPaterno, apellidoMaterno, fechaNacimiento, genero)
    values (?, ?, ?, ?, ?);
    ");
    $statement->bind_param("sssss", $nombre, $apellidoPaterno, $apellidoMaterno, $fechaNacimiento, $genero);
    $statement->execute();

    insertVisitanteGradoEstudios($connection,$gradoEstudios);

    disconnect($connection);
}

function insertCredencialFiador($connection){
    $statement = mysqli_prepare($connection,"
    insert into credencial_fiador values ((select idCredencial from Credencial order by idCredencial desc limit 1), (select idFiador from Fiador order by idFiador desc limit 1), date('Y-m-d')
    ");
    $statement->execute();
}
/*
function insertCredential(  Visitante
                            $nombre,
                            $apellidoPaterno,
                            $apellidoMaterno,
                            $fechaNacimiento,
                            $gradoEstudios,
                            $genero,
                            //Credencial
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
                            $cpTrabajo,
                            //Fiador
                            $nombreF,
                            $apellidoPaternoF,
                            $apellidoMaternoF,
                            $correoF,
                            $telefonoF,
                            $calleF,
                            $numeroF,
                            $coloniaF,
                            $cpF,
                            $nombreTrabajoF,
                            $telefonoTrabajoF,
                            $calleTrabajoF,
                            $numeroTrabajoF,
                            $coloniaTrabajoF,
                            $cpTrabajoF,
                            $gradoEstudiosF
                            ){


    insertVisitanteTramitandoCredencial($nombre,$apellidoPaterno,$apellidoMaterno,$fechaNacimiento,$gradoEstudios,$genero);


    $connection = connect();
    $statement = mysqli_prepare($connection,"
    insert into credencial (idVisitante,
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
    values ((select idVisitante from visitante order by idVisitante desc limit 1), date('Y-m-d'), ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);
    ");
    $statement->bind_param("ssssisssssssi", $foto, $colonia, $calle, $numero, $cp, $telefono, $correo,
    $nombreTrabajo, $telefonoTrabajo, $coloniaTrabajo, $calleTrabajo, $numeroTrabajo, $cpTrabajo);
    $statement->execute();

    insertFiador($connection, $nombreF, $apellidoPaternoF, $apellidoMaternoF, $correoF, $telefonoF, $calleF, $numeroF, $coloniaF, $cpF, $nombreTrabajoF,
    $telefonoTrabajoF, $calleTrabajoF, $numeroTrabajoF, $coloniaTrabajoF, $cpTrabajoF, $gradoEstudiosF);

    insertCredencialFiador($connection);

    disconnect($connection);
}*/

/*-----------------------Fin Tramitar Credencial---------------------------------*/

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
function insertEjemplar($ISBN, $estante, $editorial, $year, $volumen, $idTitulo, $colection, $edition, $idUsuario, $clave, $adq, $numClas, $bookMaterias )
{
    $connection = connect();
    $statement = mysqli_prepare($connection, "INSERT INTO ejemplar(ISBN, estante, editorial, year, volumen, idTitulo, coleccion, edicion, idUsuario, claveIngreso, adquisicion, numClasificacion, materias)
    VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?);
    ");
    $statement ->bind_param("sssiiisisssss", $ISBN, $estante, $editorial, $year, $volumen, $idTitulo, $colection, $edition, $idUsuario, $clave, $adq, $numClas, $bookMaterias);
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
    $statement = mysqli_prepare($connection, "INSERT INTO titulo_autor(idAutor, idTitulo)
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
    from titulo_autor
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



function buscarPrestamoDevolucion($idCredencial){
    $connection = connect();
    $statement = mysqli_prepare($connection,"");
    $statement ->bind_param("i", $idCredencial);
    $statement->execute();
    $result = $statement->get_result();
    disconnect($connection);
    return $result;
}
function insertCategoriaTitulo($idTitulo, $idCategoria)
{
    $connection = connect();
    $statement = mysqli_prepare($connection, "INSERT INTO titulo_categoria (idCategoria, idTitulo)
    VALUES(?,?);
    ");
    $statement ->bind_param("ii", $idCategoria, $idTitulo);
    $retorno = $statement->execute();
    disconnect($connection);
    return($retorno);

}
/********************************* Funcion para busqueda de libros **********************************/
function buscarGeneralId($id)
{
    $connection = connect();
    $statement = mysqli_prepare($connection,"
    select GROUP_CONCAT(a.nombre SEPARATOR ', ') AS autores, GROUP_CONCAT(apellidoPaterno SEPARATOR ', ') AS apellidos, titulo, t.year, estante, editorial, es.nombre, c.idCategoria, e.idEjemplar, ISBN, volumen, edicion, e.year as yearE, c.nombre AS nombreC, coleccion, claveIngreso, fechaIngreso, idUsuario, adquisicion, numClasificacion, materias
    from autor a, titulo t, titulo_autor ta, ejemplar e, ejemplar_estado ee, estado es, titulo_categoria tc, categoria c
    where e.idEjemplar = ?
    and a.idAutor=ta.idAutor
    and t.idTitulo=ta.idTitulo
    and t.idTitulo = e.idTitulo
    and ee.idEjemplar=e.idEjemplar
    and ee.idEstado=es.idEstado
    and t.idTitulo=tc.idTitulo
    and tc.idCategoria=c.idCategoria
    ");
    $statement->bind_param("i", $id);
    $statement->execute();
    $result = $statement->get_result();
    disconnect($connection);
    return $result;

}

function buscarGeneralLike($nombre, $apellidoPaterno, $apellidoMaterno, $titulo, $categoria) /****/
{
    $connection = connect();
    $statement = mysqli_prepare($connection,"
    select GROUP_CONCAT(a.nombre,' ', apellidoPaterno SEPARATOR ', ') AS autoresApellidos, titulo, t.year, estante, editorial, es.nombre, c.nombre AS nombreC, e.idEjemplar
    from autor a, titulo t, titulo_autor ta, ejemplar e, ejemplar_estado ee, estado es, titulo_categoria tc, categoria c
    where (a.nombre LIKE ? ".($nombre==""?"or 1":"").")
    and (apellidoPaterno = ? ".($apellidoPaterno==""?"or 1":"").")
    and (apellidoMaterno = ? ".($apellidoMaterno==""?"or 1":"").")
    and a.idAutor=ta.idAutor
    and t.idTitulo=ta.idTitulo
    and (t.titulo LIKE ? ".($titulo==""?"or 1":"").")
    and t.idTitulo = e.idTitulo
    and ee.idEjemplar=e.idEjemplar
    and ee.idEstado=es.idEstado
    and t.idTitulo=tc.idTitulo
    and tc.idCategoria=c.idCategoria
    and (c.idCategoria = ? ".($categoria==""?"or 1":"").")
    GROUP BY e.idEjemplar;
    ");
    $statement->bind_param("ssssi", $nombre, $apellidoPaterno, $apellidoMaterno, $titulo, $categoria);
    $statement->execute();
    $result = $statement->get_result();
    disconnect($connection);
    return $result;

}
function lastIndexEjemplar()
{
    $connection = connect();
    $statement = mysqli_prepare($connection, "SELECT MAX( idEjemplar )  FROM ejemplar");
    $statement->execute();
    $result = $statement->get_result();
    disconnect($connection);
    if($row = mysqli_fetch_assoc($result))
    {
        $results = $row['MAX( idEjemplar )'];
        //echo $results;
    }
    return $results;
}
function insertEjemplarEstado($idEjemplar, $idEstado)
{
    $connection = connect();
    $statement = mysqli_prepare($connection, "INSERT INTO ejemplar_estado(idEjemplar, idEstado)
    VALUES(?,?);
    ");
    $statement ->bind_param("ii", $idEjemplar, $idEstado);
    $retorno = $statement->execute();
    disconnect($connection);
    return($retorno);

}
function buscarAutorN($nombre, $apellidoPaterno, $apellidoMaterno)
{
    $connection = connect();
    $statement = mysqli_prepare($connection,"
    select idAutor, nombre, apellidoPaterno, apellidoMaterno
    from autor
    where (nombre = ? )
    and (apellidoPaterno = ?)
    and (apellidoMaterno = ? )
    ");
    $statement->bind_param("sss", $nombre, $apellidoPaterno, $apellidoMaterno);
    $statement->execute();
    $result = $statement->get_result();
    disconnect($connection);
    return $result;
}


    //var_dump(login('lalo', 'hockey'));
    //var_dump(login('joaquin', 'basket'));
    //var_dump(login('cesar', 'basket'));

function insertSancion($idVisitante, $fechaFin, $descripcion){
    $connection = connect();
    $statement = mysqli_prepare($connection,"
    insert into sancion (descripcion, fechaInicio, fechaFin, idVisitante)
    values (?, CURRENT_TIMESTAMP(), ?, ?);
    ");
    $statement->bind_param("ssi", $descripcion, $fechaFin, $idVisitante);
    $statement->execute();
    disconnect($connection);
}

function querySancion($idVisitante, $nombre, $apellidoPaterno, $apellidoMaterno, $fechaNacimiento, $genero, $gradoEstudios){
    $connection = connect();
    $nombre .="%";
    $apellidoPaterno .="%";
    $apellidoMaterno .="%";
    $statement = mysqli_prepare($connection,"
    select v.idVisitante as 'Número', v.nombre as 'Nombre', apellidoPaterno as 'Apellido paterno', apellidoMaterno as 'Apellido materno', fechaNacimiento as 'Fecha de nacimiento', g.nombre as 'Grado de estudios', genero as 'Género', descripcion as 'Descripción'
    from visitante as v, visitante_gradoestudios as vg, gradoestudios as g, sancion as s
    where (v.idVisitante = ? ".($idVisitante==""?"or 1":"").")
    and (v.nombre like ? ".($nombre==""?"or 1":"").")
    and (apellidoPaterno like ? ".($apellidoPaterno==""?"or 1":"").")
    and (apellidoMaterno like ? ".($apellidoMaterno==""?"or 1":"").")
    and (fechaNacimiento = ? ".($fechaNacimiento==""?"or 1":"").")
    and (genero = ? ".($genero==""?"or 1":"").")
    and v.idVisitante = vg.idVisitante
    and vg.idGrado = g.idGrado
    and (g.idGrado = ? ".($gradoEstudios==""?"or 1":"").")
    and v.idVisitante = s.idVisitante
    and fechaFin > CURRENT_DATE
    ");
    $statement->bind_param("isssssi", $idVisitante, $nombre, $apellidoPaterno, $apellidoMaterno, $fechaNacimiento, $genero, $gradoEstudios);
    $statement->execute();
    $result = $statement->get_result();
    disconnect($connection);
    return $result;
}

function cancelSancion($idVisitante){
    $connection = connect();
    $statement = mysqli_prepare($connection,"
    update sancion
    set fechaFin = CURRENT_DATE()
    where idVisitante = ?;
    ");
    $statement->bind_param("i", $idVisitante);
    $statement->execute();
    disconnect($connection);
}
function buscarSubcategorias($categoria) 
{
    $connection = connect();
    $statement = mysqli_prepare($connection,"
    select idCategoria, nombre
    from categoria
    where idCategoria between ? and (?+99)".($categoria==""?"or 1":"")."
    ");
    $statement->bind_param("ii", $categoria, $categoria);
    $statement->execute();
    $result = $statement->get_result();
    disconnect($connection);
    return $result;

}