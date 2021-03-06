<?php
    function connect() {
        $ENV = "dev";
        if ($ENV == "dev") {
            $mysql = mysqli_connect("localhost","root","","jambe");
                                            //root si estan en windows
        } else  if ($ENV == "prod"){
            $mysql = mysqli_connect("localhost","jambe","Ceceq123+","jambe");
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
    from visitante v, gradoestudios g,
    (
            
      select vg.idVisitante as vid, vg.idGrado as gid
      from
        (
        select idVisitante as ii, max(fecha) as im
        from visitante_gradoestudios
        group by idVisitante
        ) i, visitante_gradoestudios vg
      where i.ii = vg.idVisitante and i.im = vg.fecha
    
    ) ivg  
    
    
    where (v.idVisitante = ? ".($idVisitante==""?"or 1":"").")
    and (v.nombre like ? ".($nombre==""?"or 1":"").")
    and (apellidoPaterno like ? ".($apellidoPaterno==""?"or 1":"").")
    and (apellidoMaterno like ? ".($apellidoMaterno==""?"or 1":"").")
    and (fechaNacimiento = ? ".($fechaNacimiento==""?"or 1":"").")
    and (genero = ? ".($genero==""?"or 1":"").")
    
    
    and v.idVisitante = ivg.vid
    and ivg.gid = g.idGrado
    
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
    from visitante v, gradoestudios g,
    (
            
      select vg.idVisitante as vid, vg.idGrado as gid
      from
        (
        select idVisitante as ii, max(fecha) as im
        from visitante_gradoestudios
        group by idVisitante
        ) i, visitante_gradoestudios vg
      where i.ii = vg.idVisitante and i.im = vg.fecha
    
    ) ivg  
    
    where
    (v.nombre like ? ".($nombre==""?"or 1":"").")
    and (apellidoPaterno like ? ".($apellidoPaterno==""?"or 1":"").")
    and (apellidoMaterno like ? ".($apellidoMaterno==""?"or 1":"").")
    and (fechaNacimiento = ? ".($fechaNacimiento==""?"or 1":"").")
    and (genero = ? ".($genero==""?"or 1":"").")
    
    
    and v.idVisitante = ivg.vid
    and ivg.gid = g.idGrado
    
    and (g.idGrado = ? ".($gradoEstudios==""?"or 1":"").")
    
    ORDER BY v.idVisitante desc LIMIT 1

    ");
    /*
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
    */
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
    insert into visitante_gradoestudios
    values (?, ?, current_timestamp())
    ");
    $statement->bind_param("ii", $idVisitante, $gradoEstudios);
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
                $table .= "<td style='cursor: pointer;'>$data</td>";
            }
            $table .= "</tr>";
        }
        $table .= "</tbody>";
    }else{
        echo "<thead><td>No hay resultados</td></thead>";
    }
    return $table;
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
    select v.idVisitante as 'Número', v.nombre as 'Nombre', apellidoPaterno as 'Apellido paterno', apellidoMaterno as 'Apellido materno', fechaNacimiento as 'Fecha de nacimiento', g.nombre as 'Grado de estudios', genero as 'Género'
    
    from visitante v, gradoestudios g, sancion s,
    (
            
      select vg.idVisitante as vid, vg.idGrado as gid
      from
        (
        select idVisitante as ii, max(fecha) as im
        from visitante_gradoestudios
        group by idVisitante
        ) i, visitante_gradoestudios vg
      where i.ii = vg.idVisitante and i.im = vg.fecha
    
    ) ivg  
    
    
    where (v.idVisitante = ? ".($idVisitante==""?"or 1":"").")
    and (v.nombre like ? ".($nombre==""?"or 1":"").")
    and (apellidoPaterno like ? ".($apellidoPaterno==""?"or 1":"").")
    and (apellidoMaterno like ? ".($apellidoMaterno==""?"or 1":"").")
    and (fechaNacimiento = ? ".($fechaNacimiento==""?"or 1":"").")
    and (genero = ? ".($genero==""?"or 1":"").")
    
    
    and v.idVisitante = ivg.vid
    and ivg.gid = g.idGrado
    
    and (g.idGrado = ? ".($gradoEstudios==""?"or 1":"").")
    
    and v.idVisitante = s.idVisitante
    and fechaFin > CURRENT_DATE
    ");
    /*
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
    */
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



function buildAssocArray($result){
    $keys = array();
    $r = array();
    if(mysqli_num_rows($result)>0){
        $fieldNumber = mysqli_num_fields($result);
        for($i = 0; $i < $fieldNumber; $i++){
           $keys[$i] = mysqli_fetch_field_direct($result, $i)->name;
        }
        while($row = mysqli_fetch_assoc($result)){
            $j = 0;
            foreach($row as $data){
                $r[$keys[$j]] = $data;
                $j++;
            }
        }
    }
    return $r;
}




function queryCredencial($idVisitante){
    $connection = connect();
    $statement = mysqli_prepare($connection,"
    
            select
            v.nombre as 'name',
            v.apellidoPaterno as 'paternal',
            v.apellidoMaterno as 'maternal',
            v.fechaNacimiento as 'birth',
            v.genero as 'gender',
            
            gnom as 'schooling',
            
            c.fechaExpedicion as 'issuance',
            c.foto as 'fileToUpload',
            c.colonia as 'neighborhood',
            c.calle as 'street',
            c.numero as 'number',
            c.cp as 'postalCode',
            c.telefono as 'phone',
            c.correo as 'email',
            c.nombreTrabajo as 'workName',
            c.telefonoTrabajo as 'workPhone',
            c.coloniaTrabajo as 'workNeighborhood',
            c.calleTrabajo as 'workStreet',
            c.numeroTrabajo as 'workNumber',
            c.cpTrabajo as 'workPostalCode',
            
            f.nombre as 'nameF',
            f.apellidoPaterno as 'paternalF',
            f.apellidoMaterno as 'maternalF',
            f.colonia as 'neighborhoodF',
            f.calle as 'streetF',
            f.numero as 'numberF',
            f.cp as 'postalCodeF',
            f.telefono as 'phoneF',
            f.correo as 'emailF',
            f.nombreTrabajo as 'workNameF',
            f.telefonoTrabajo as 'workPhoneF',
            f.coloniaTrabajo as 'workNeighborhoodF',
            f.calleTrabajo as 'workStreetF',
            f.numeroTrabajo as 'workNumberF',
            f.cpTrabajo as 'workPostalCodeF',
            
            fgnom as 'schoolingF'
            
            
            
            from
            visitante v,
            (
            
              select vg.idVisitante as vid, g.nombre as gnom
              from
                (
                select idVisitante as ii, max(fecha) as im
                from visitante_gradoestudios
                group by idVisitante
                ) i, visitante_gradoestudios vg, gradoestudios g
              where i.ii = vg.idVisitante and i.im = vg.fecha and vg.idGrado = g.idGrado
            
            ) as vg,
            credencial c,
            credencial_fiador cf,
            fiador f,
            (
                select g.nombre as fgnom, f.idFiador as fid
                from
                fiador f,
                fiador_gradoestudios fg,
                gradoestudios g
                where
                f.idFiador = fg.idFiador and
                fg.idGrado = g.idGrado
            
            ) fg,
            (
            select idVisitante as idvc, max(fechaExpedicion) as mfc
            from credencial
            group by idVisitante
            ) ic,
            (
            select idCredencial as eidc, idFiador as eidf
            from credencial_fiador icf,
                (
                select idCredencial as idc, max(fecha) imfc
                from credencial_fiador
                group by idCredencial
                ) ic
            where icf.idCredencial = ic.idc and
            icf.fecha = ic.imfc
            ) scuc
            
            
            where
            v.idVisitante = ? and
            
            -- nombre del grado de estudios
            v.idVisitante = vid and
            
            -- agregar credencial
            v.idVisitante = c.idVisitante and
            
            -- credencial más reciente
            c.idVisitante = ic.idvc and
            c.fechaExpedicion = mfc and
            
            -- fiador más reciente
            c.idCredencial = cf.idCredencial and
            (cf.idCredencial, cf.idFiador) = (scuc.eidc, scuc.eidf) and
            
            -- añadir nombre del grado de estudios del fiador
            cf.idFiador = f.idFiador and
            f.idFiador = fid and  
            c.fechaExpedicion > '".date('Y-m-d', strtotime('-1 year'))."'          
                        
            order by c.fechaExpedicion desc limit 1;
    
    ");
    $statement->bind_param("i", $idVisitante);
    $statement->execute();
    $result = $statement->get_result();
    disconnect($connection);
    return $result;
}


function updateCredential(
    //Visitante
    $idVisitante,
    $nombre, $apellidoPaterno, $apellidoMaterno, $fechaNacimiento, $gradoEstudios, $genero,
    //Credencial
    $foto, $colonia, $calle, $numero, $cp, $telefono, $correo, $nombreTrabajo, $telefonoTrabajo, $coloniaTrabajo, $calleTrabajo, $numeroTrabajo, $cpTrabajo,
    //Fiador
    $nombreF, $apellidoPaternoF, $apellidoMaternoF, $correoF, $telefonoF, $calleF, $numeroF, $coloniaF, $cpF, $nombreTrabajoF, $telefonoTrabajoF, $calleTrabajoF, $numeroTrabajoF, $coloniaTrabajoF, $cpTrabajoF, $gradoEstudiosF
){
    $db = connect();
    if ($db != NULL) {
        // Visitante
        $query="
        update visitante 
        set
        nombre = ?,
        apellidoPaterno = ?, 
        apellidoMaterno = ?,
        fechaNacimiento = ?,
        genero = ?
        where idVisitante = ?
        ";
        // Preparing the statement
        if (!($stmt = $db->prepare($query))) {
            die("Preparation 0 failed: (" . $db->errno . ") " . $db->error);
        }
        // Binding statement params
        if (!$stmt->bind_param("sssssi", $nombre, $apellidoPaterno, $apellidoMaterno, $fechaNacimiento, $genero, $idVisitante)) {
            die("Parameter vinculation 0 failed: (" . $stmt->errno . ") " . $stmt->error);
        }
        // Executing the statement
        if (!$stmt->execute()) {
            die("Execution 0 failed: (" . $stmt->errno . ") " . $stmt->error);
        }


        //visitante_gradoestudios
        $query="insert into visitante_gradoestudios values (?, ?, current_timestamp())";
        // Preparing the statement
        if (!($stmt = $db->prepare($query))) {
            die("Preparation 0.1 failed: (" . $db->errno . ") " . $db->error);
        }
        // Binding statement params
        if (!$stmt->bind_param("ii",$idVisitante, $gradoEstudios)) {
            die("Parameter vinculation 0.1 failed: (" . $stmt->errno . ") " . $stmt->error);
        }
        // Executing the statement
        if (!$stmt->execute()) {
            die("Execution 0.1 failed: (" . $stmt->errno . ") " . $stmt->error);
        }




        // Credential
        $query="
        update credencial 
        set
        foto  = ?,
        colonia = ?,
        calle = ?,
        numero = ?,
        cp = ?,
        telefono = ?,
        correo = ?,
        nombreTrabajo = ?,
        telefonoTrabajo = ?,
        coloniaTrabajo = ?,
        calleTrabajo = ?,
        numeroTrabajo = ?,
        cpTrabajo = ?
        where idVisitante = ?
        ";
        // Preparing the statement
        if (!($stmt = $db->prepare($query))) {
            die("Preparation 1 failed: (" . $db->errno . ") " . $db->error);
        }
        // Binding statement params
        if (!$stmt->bind_param("ssssisssssssii", $foto, $colonia, $calle, $numero, $cp, $telefono, $correo,
            $nombreTrabajo, $telefonoTrabajo, $coloniaTrabajo, $calleTrabajo, $numeroTrabajo, $cpTrabajo, $idVisitante)) {
            die("Parameter vinculation 1 failed: (" . $stmt->errno . ") " . $stmt->error);
        }
        // Executing the statement
        if (!$stmt->execute()) {
            die("Execution 1 failed: (" . $stmt->errno . ") " . $stmt->error);
        }


        //obtener id de credencial
        $query="
        select c.idCredencial
        from 
        credencial c,
        (
        select idCredencial as eidc, idFiador as eidf
            from credencial_fiador icf,
            (
            select idCredencial as idc, max(fecha) imfc
                from credencial_fiador
                group by idCredencial
            ) ic
            where icf.idCredencial = ic.idc and
        icf.fecha = ic.imfc
        ) scuc,
        credencial_fiador cf
        where 
        c.idVisitante = ? and
        c.idCredencial = cf.idCredencial and
        (cf.idCredencial, cf.idFiador) = (scuc.eidc, scuc.eidf)
        ";
        // Preparing the statement
        if (!($stmt = $db->prepare($query))) {
            die("Preparation credqid failed: (" . $db->errno . ") " . $db->error);
        }
        // Binding statement params
        if (!$stmt->bind_param("i", $idVisitante)) {
            die("Parameter vinculation credqid failed: (" . $stmt->errno . ") " . $stmt->error);
        }
        // Executing the statement
        if (!$stmt->execute()) {
            die("Execution credqid failed: (" . $stmt->errno . ") " . $stmt->error);
        }
        $r = $stmt->get_result();
        if(mysqli_num_rows($r)>0){
            while($row = mysqli_fetch_assoc($r)){
                $cred_id = $row;
            }
        }



        // Fiador
        $query="insert into fiador (nombre, apellidoPaterno, apellidoMaterno, colonia, calle, numero, cp, telefono, correo, 
                                    nombreTrabajo, telefonoTrabajo, coloniaTrabajo, calleTrabajo, numeroTrabajo, cpTrabajo)
                values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        // Preparing the statement
        if (!($stmt = $db->prepare($query))) {
            die("Preparation 2 failed: (" . $db->errno . ") " . $db->error);
        }
        // Binding statement params
        if (!$stmt->bind_param("ssssssisssssssi", $nombreF, $apellidoPaternoF, $apellidoMaternoF, $coloniaF, $calleF, $numeroF, $cpF,
            $telefonoF, $correoF, $nombreTrabajoF, $telefonoTrabajoF, $coloniaTrabajoF,
            $calleTrabajoF, $numeroTrabajoF, $cpTrabajoF)) {
            die("Parameter vinculation 2 failed: (" . $stmt->errno . ") " . $stmt->error);
        }
        // Executing the statement
        if (!$stmt->execute()) {
            die("Execution 2 failed: (" . $stmt->errno . ") " . $stmt->error);
        }
        $fiador_id = $db->insert_id;



        //fiador_gradoestudios
        $query="insert into Fiador_GradoEstudios values (?, ?, current_timestamp())";
        // Preparing the statement
        if (!($stmt = $db->prepare($query))) {
            die("Preparation 2.1 failed: (" . $db->errno . ") " . $db->error);
        }
        // Binding statement params
        if (!$stmt->bind_param("ii",$fiador_id, $gradoEstudiosF)) {
            die("Parameter vinculation 2.1 failed: (" . $stmt->errno . ") " . $stmt->error);
        }
        // Executing the statement
        if (!$stmt->execute()) {
            die("Execution 2.1 failed: (" . $stmt->errno . ") " . $stmt->error);
        }

        $query="insert into credencial_fiador values (? , ?, CURDATE())";
        // Preparing the statement
        if (!($stmt = $db->prepare($query))) {
            die("Preparation 3 failed: (" . $db->errno . ") " . $db->error);
        }
        // Binding statement params
        if (!$stmt->bind_param("ii", $cred_id, $fiador_id)) {
            die("Parameter vinculation 3 failed: (" . $stmt->errno . ") " . $stmt->error);
        }
        // Executing the statement
        if (!$stmt->execute()) {
            die("Execution 3 failed: (" . $stmt->errno . ") " . $stmt->error);
        }


        disconnect($db);
        return true;
    }
    return false;
}


function getCurrentPhoto($idVisitante){
    $connection = connect();
    $statement = mysqli_prepare($connection,"
    
            select c.foto as 'fileToUpload'
            
            from
            visitante v,
            (
            
              select vg.idVisitante as vid, g.nombre as gnom
              from
                (
                select idVisitante as ii, max(fecha) as im
                from visitante_gradoestudios
                group by idVisitante
                ) i, visitante_gradoestudios vg, gradoestudios g
              where i.ii = vg.idVisitante and i.im = vg.fecha and vg.idGrado = g.idGrado
            
            ) as vg,
            credencial c,
            credencial_fiador cf,
            fiador f,
            (
                select g.nombre as fgnom, f.idFiador as fid
                from
                fiador f,
                fiador_gradoestudios fg,
                gradoestudios g
                where
                f.idFiador = fg.idFiador and
                fg.idGrado = g.idGrado
            
            ) fg,
            (
            select idVisitante as idvc, max(fechaExpedicion) as mfc
            from credencial
            group by idVisitante
            ) ic,
            (
            select idCredencial as eidc, idFiador as eidf
            from credencial_fiador icf,
                (
                select idCredencial as idc, max(fecha) imfc
                from credencial_fiador
                group by idCredencial
                ) ic
            where icf.idCredencial = ic.idc and
            icf.fecha = ic.imfc
            ) scuc
            
            
            where
            v.idVisitante = ? and
            
            -- nombre del grado de estudios
            v.idVisitante = vid and
            
            -- agregar credencial
            v.idVisitante = c.idVisitante and
            
            -- credencial más reciente
            c.idVisitante = ic.idvc and
            c.fechaExpedicion = mfc and
            
            -- fiador más reciente
            c.idCredencial = cf.idCredencial and
            (cf.idCredencial, cf.idFiador) = (scuc.eidc, scuc.eidf) and
            
            -- añadir nombre del grado de estudios del fiador
            cf.idFiador = f.idFiador and
            f.idFiador = fid and  
            c.fechaExpedicion > '".date('Y-m-d', strtotime('-1 year'))."'          
                        
            order by c.fechaExpedicion desc limit 1;
    
    ");
    $statement->bind_param("i", $idVisitante);
    $statement->execute();
    $result = $statement->get_result();
    disconnect($connection);
    return $result;
}


