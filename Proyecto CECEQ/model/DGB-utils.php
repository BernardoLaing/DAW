<?php

function getReport($year, $month){
    $db = connect();
    if($db != NULL){
        // Obtener Cantidad de Visitantes niños, jovenes, y adultos
        $startDate = $year . "-" . $month . "-01 00:00:00";
        $endDate = $year . "-" . $month . "-31 23:59:59";
        $startDate=date("Y-m-d H:i:s",strtotime($startDate));
        $endDate=date("Y-m-d H:i:s",strtotime($endDate));

        //ENTRADAS POR EDAD
        $query='SELECT
                    SUM(IF(edad < 12,1,0)) as "Nino",
                    SUM(IF(edad BETWEEN 12 AND 17,1,0)) as "Joven",
                    SUM(IF(edad > 17,1,0)) as "Adulto"
                    FROM entrada e,
                        (SELECT TIMESTAMPDIFF(YEAR, fechaNacimiento, CURRENT_DATE) AS edad, idVisitante
                        FROM visitante) as derived
                    WHERE e.idVisitante=derived.idVisitante
                    AND e.timestamp BETWEEN ? AND ?';

        if(!($stmt = $db->prepare($query))) {
            die("Preparation failed: (" . $db->errno . ") " . $db->error);
        }
        if (!$stmt->bind_param("ss", $startDate, $endDate)) {
            die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error);
        }
        if (!$stmt->execute()) {
            die("Execution failed: (" . $statement->errno . ") " . $statement->error);
        }

        $stmt->bind_result($ninos, $jovenes, $adultos);
        $stmt->fetch();
        $stmt->close();
        $result = new \stdClass();
        if($ninos != null)
            $result->ninos = $ninos;
        else
            $result->ninos = "0";

        if($jovenes != null)
            $result->jovenes = $jovenes;
        else
            $result->jovenes = "0";

        if($adultos != null)
            $result->adultos = $adultos;
        else
            $result->adultos = "0";

        //Credenciales Expedidas
        $startDate=date("Y-m-d",strtotime($startDate));
        $endDate=date("Y-m-d",strtotime($endDate));

        $query='SELECT COUNT(idCredencial) as credenciales
                FROM credencial
                WHERE fechaExpedicion BETWEEN ? AND ?';

        if(!($stmt = $db->prepare($query))) {
            die("Preparation failed: (" . $db->errno . ") " . $db->error);
        }
        if (!$stmt->bind_param("ss", $startDate, $endDate)) {
            die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error);
        }
        if (!$stmt->execute()) {
            die("Execution failed: (" . $statement->errno . ") " . $statement->error);
        }

        $stmt->bind_result($credenciales);
        $stmt->fetch();
        $stmt->close();
        if($credenciales != null)
            $result->credenciales = $credenciales;
        else
            $result->credenciales = "0";

        // Libros Prestados
        $query='SELECT COUNT(*) as libros
                FROM ejemplar_credencial
                WHERE fechaPrestamo BETWEEN ? AND ?';

        if(!($stmt = $db->prepare($query))) {
            die("Preparation failed: (" . $db->errno . ") " . $db->error);
        }
        if (!$stmt->bind_param("ss", $startDate, $endDate)) {
            die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error);
        }
        if (!$stmt->execute()) {
            die("Execution failed: (" . $statement->errno . ") " . $statement->error);
        }

        $stmt->bind_result($libros);
        $stmt->fetch();
        $stmt->close();
        if($libros != null){
                    $result->libros = $libros;
        }
        else{
                    $result->libros = "0";
        }


        //Automatizacion libros_capturados
        $query='SELECT COUNT(idEjemplar) as libros_capturados, (COUNT(idEjemplar) * 0.01) as porcentaje
                    FROM ejemplar
                    WHERE fechaIngreso BETWEEN ? AND ?';

        if(!($stmt = $db->prepare($query))) {
                die("Preparation failed: (" . $db->errno . ") " . $db->error);
        }
        if (!$stmt->bind_param("ss", $startDate, $endDate)) {
                die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error);
        }
        if (!$stmt->execute()) {
                die("Execution failed: (" . $statement->errno . ") " . $statement->error);
        }

        $stmt->bind_result($libros_capturados, $porcentaje);
        $stmt->fetch();
        $stmt->close();
        if($libros_capturados != null)
            $result->libros_capturados = $libros_capturados;
        else
            $result->libros_capturados = "0";

        if($porcentaje != null)
              $result->porcentaje = $porcentaje;
        else
            $result->porcentaje = "0";


        disconnect($db);
        return $result;
    }
    return false;
}

?>
