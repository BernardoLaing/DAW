<?php 
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once("$root/JAMBE/Proyecto CECEQ/utils.php");
function insertCredential(  //Visitante
                            $nombre, $apellidoPaterno, $apellidoMaterno, $fechaNacimiento, $gradoEstudios, $genero,
                            //Credencial
                            $foto, $colonia, $calle, $numero, $cp, $telefono, $correo, $nombreTrabajo, $telefonoTrabajo, $coloniaTrabajo, $calleTrabajo, $numeroTrabajo, $cpTrabajo,
                            //Fiador
                            $nombreF, $apellidoPaternoF, $apellidoMaternoF, $correoF, $telefonoF, $calleF, $numeroF, $coloniaF, $cpF, $nombreTrabajoF, $telefonoTrabajoF, $calleTrabajoF, $numeroTrabajoF, $coloniaTrabajoF, $cpTrabajoF, $gradoEstudiosF){
    $db = connect();
    if ($db != NULL) {
        // Visitante
        $query="insert into visitante (nombre, apellidoPaterno, apellidoMaterno, fechaNacimiento, genero)
                values (?, ?, ?, ?, ?)";
        // Preparing the statement 
        if (!($stmt = $db->prepare($query))) {
            die("Preparation 0 failed: (" . $db->errno . ") " . $db->error);
        }
        // Binding statement params 
        if (!$stmt->bind_param("sssss", $nombre, $apellidoPaterno, $apellidoMaterno, $fechaNacimiento, $genero)) {
            die("Parameter vinculation 0 failed: (" . $stmt->errno . ") " . $stmt->error); 
        }
        // Executing the statement
        if (!$stmt->execute()) {
            die("Execution 0 failed: (" . $stmt->errno . ") " . $stmt->error);
        } 
        
        $visitante_id = $db->insert_id;
        
        $query="insert into visitante_gradoestudios values (?, ?, current_timestamp())";
        // Preparing the statement 
        if (!($stmt = $db->prepare($query))) {
            die("Preparation 0.1 failed: (" . $db->errno . ") " . $db->error);
        }
        // Binding statement params 
        if (!$stmt->bind_param("ii",$visitante_id, $gradoEstudios)) {
            die("Parameter vinculation 0.1 failed: (" . $stmt->errno . ") " . $stmt->error); 
        }
        // Executing the statement
        if (!$stmt->execute()) {
            die("Execution 0.1 failed: (" . $stmt->errno . ") " . $stmt->error);
        } 
        
        // Credential
        $query="insert into credencial (idVisitante, fechaExpedicion, foto, colonia, calle, numero, 
                                        cp, telefono, correo, nombreTrabajo, telefonoTrabajo, coloniaTrabajo, 
                                        calleTrabajo, numeroTrabajo, cpTrabajo)
                values (?, CURDATE(), ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        // Preparing the statement 
        if (!($stmt = $db->prepare($query))) {
            die("Preparation 1 failed: (" . $db->errno . ") " . $db->error);
        }
        // Binding statement params 
        if (!$stmt->bind_param("issssisssssssi",$visitante_id, $foto, $colonia, $calle, $numero, $cp, $telefono, $correo, 
                               $nombreTrabajo, $telefonoTrabajo, $coloniaTrabajo, $calleTrabajo, $numeroTrabajo, $cpTrabajo)) {
            die("Parameter vinculation 1 failed: (" . $stmt->errno . ") " . $stmt->error); 
        }
         // Executing the statement
         if (!$stmt->execute()) {
            die("Execution 1 failed: (" . $stmt->errno . ") " . $stmt->error);
          } 
        
        $credential_id = $db->insert_id;
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
        if (!$stmt->bind_param("ii", $credential_id, $fiador_id)) {
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
?>