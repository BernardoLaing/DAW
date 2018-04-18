<?php
require_once('utils.php');

function getCredentialInfo($idCredencial) {
    $db = connect();
    if($db != NULL){
        $query='SELECT c.idVisitante, c.foto, c.colonia, c.calle, c.numero, v.nombre, v.apellidoPaterno, v.apellidoMaterno, fechaExpedicion
                FROM credencial c, visitante v
                WHERE c.idVisitante = v.idVisitante
                AND c.idCredencial = ?';
        
        if(!($stmt = $db->prepare($query))) {
            die("Preparation failed: (" . $db->errno . ") " . $db->error);
        }
        if (!$stmt->bind_param("i", $idCredencial)) {
            die("Parameter vinculation failed: (" . $stmt->errno . ") " . $stmt->error); 
        }
        if (!$stmt->execute()) {
            die("Execution failed: (" . $stmt->errno . ") " . $stmt->error);
        } 
        
        $stmt->bind_result($idVisitante, $foto, $colonia, $calle, $numero, $nombre, $apellidoPaterno, $apellidoMaterno, $fechaExp);
        $stmt->fetch();
        
        $date = date("Y-m-d", strtotime($fechaExp));
        $date = strtotime(date("Y-m-d", strtotime($date)) . " +24 month");
        $date = date("Y-m-d",$date);
        
        $cred['id'] = $idVisitante;
        $cred['path'] = $foto;
        $cred['address'] = $calle . " " . $numero . ", " . $colonia;
        $cred['date'] = $date;
        $cred['name'] = $nombre . " " . $apellidoPaterno . " " . $apellidoMaterno;
        disconnect($db);
        return $cred;
    }
    return NULL;
    
}
?>