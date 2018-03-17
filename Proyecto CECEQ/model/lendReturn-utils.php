<?php
//**************************   De interfaz Lend_Return   **********************************
function checkBookLimit($idCredencial){
    $conn = connect();
    if(!$conn){ die("No se pudo conectar a la Base de Datos");}
    ///////////// REVISA QUE NO TENGA 3 PRESTAMOS //////////////////////
    $sql='SELECT *
            FROM ejemplar_credencial ec
            WHERE ec.idCredencial = (?)
            AND fechaDevolucionReal is null';
    // Preparing the statement
    if (!($statement = $conn->prepare($sql))) {
        die("Preparation 1 failed: (" . $conn->errno . ") " . $conn->error);
    }
    // Binding statement params
    if (!$statement->bind_param("i", $idCredencial)) {
        die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error);
    }
    // Executing the statement
    if (!$statement->execute()) {
        die("Execution failed: (" . $statement->errno . ") " . $statement->error);
    }
    $result = $statement->get_result();
    if($result->num_rows === 3){
      return 'excedePrestamos';
    }
    ///////////// REVISA QUE EXISTA USUARIO //////////////////////
    $sql='SELECT *
            FROM credencial c
            WHERE c.idCredencial = (?)';
    // Preparing the statement
    if (!($statement = $conn->prepare($sql))) {
        die("Preparation 1 failed: (" . $conn->errno . ") " . $conn->error);
    }
    // Binding statement params
    if (!$statement->bind_param("i", $idCredencial)) {
        die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error);
    }
    // Executing the statement
    if (!$statement->execute()) {
        die("Execution failed: (" . $statement->errno . ") " . $statement->error);
    }
    $result = $statement->get_result();
    if($result->num_rows === 0){
      return 'usuarioInexistente';
    }

    return 'Préstamo';
}

function insertLend( $idEjemplar, $idCredencial, $dateLend, $dateReturn){
  $conn = connect();
  if(!$conn){ die("No se pudo conectar a la Base de Datos");}

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

function insertReturn($idEjemplar, $fechaDevolucionReal){
    $conn = connect();
    if(!$conn){ die("No se pudo conectar a la Base de Datos");}

    $sql = "UPDATE ejemplar_credencial
            SET fechaDevolucionReal=(?)
            WHERE idEjemplar=(?)";
          // Preparing the statement
          if (!($statement = $conn->prepare($sql))) {
             die("Preparation 1 failed: (" . $conn->errno . ") " . $conn->error);
          }
           // Binding statement params
          if (!$statement->bind_param("si",$fechaDevolucionReal, $idEjemplar)) {
              die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error);
          }
           // Executing the statement
           if (!$statement->execute()) {
              die("Execution failed: (" . $statement->errno . ") " . $statement->error);
            }
    disconnect($conn);
  }

function getNameVisitor($idCampo, $boolCredencial){
  $db = connect();
  if($db != NULL){
    if ($boolCredencial == true) { //Esto quiere decir que marcó un prestamo ya que aqui aun no tiene el idEjemplar en la tabla
      $query='SELECT v.nombre, v.apellidoPaterno, v.apellidoMaterno
              FROM visitante v, credencial c
              WHERE c.idVisitante = v.idVisitante
              AND c.idCredencial = (?)';

    }else{  //Esto quiere decir que marcó una devolución ya que aqui no manda el idCredencial ya que no importa quien lo esta regresando o si hay coincidencia. Simplemente se entrega
      $query='SELECT v.nombre, v.apellidoPaterno, v.apellidoMaterno
              FROM visitante v, credencial c, ejemplar_credencial ec
              WHERE c.idVisitante = v.idVisitante AND ec.idCredencial = c.idCredencial
              AND ec.idEjemplar = (?)
              AND ec.fechaDevolucionReal is NULL';
    }
      if(!($stmt = $db->prepare($query))) {
          die("Preparation failed: (" . $db->errno . ") " . $db->error);
      }
      if (!$stmt->bind_param("i", $idCampo)) {
          die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error);
      }
      if (!$stmt->execute()) {
          die("Execution failed: (" . $statement->errno . ") " . $statement->error);
      }
      $result = $stmt->get_result();
      if($result->num_rows === 0){
        exit('No rows el usuario no existe');
      }
      while($row = $result->fetch_assoc()) {
          $nombre =  $row['nombre'];
          $aPaterno =  $row['apellidoPaterno'];
          $aMaterno =  $row['apellidoMaterno'];}

      return $nombre.' '.$aPaterno.' '.$aMaterno;
  }
}

function getNameBook($var_libro){
  $db = connect();
  if($db != NULL){
    $query='SELECT t.titulo
            FROM titulo t, ejemplar e
            WHERE e.idtitulo = t.idtitulo
            AND e.idEjemplar = (?)';

      if(!($stmt = $db->prepare($query))) {
          die("Preparation failed: (" . $db->errno . ") " . $db->error);
      }
      if (!$stmt->bind_param("i", $var_libro)) {
          die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error);
      }
      if (!$stmt->execute()) {
          die("Execution failed: (" . $statement->errno . ") " . $statement->error);
      }

      $result = $stmt->get_result();
      if($result->num_rows === 0) exit('No rows el ejemplar no existe');
      while($row = $result->fetch_assoc()) {
          $titulo =  $row['titulo'];
      }
      disconnect($db);
      return $titulo;
  }
}

function getLateDays($var_libro){
  $db = connect();
  if($db != NULL){
    $query='SELECT fechaDevolucion
            FROM ejemplar_credencial
            WHERE idEjemplar = (?)
            AND fechaDevolucionReal is NULL';

      if(!($stmt = $db->prepare($query))) {
          die("Preparation failed: (" . $db->errno . ") " . $db->error);
      }
      if (!$stmt->bind_param("i", $var_libro)) {
          die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error);
      }
      if (!$stmt->execute()) {
          die("Execution failed: (" . $statement->errno . ") " . $statement->error);
      }

      $result = $stmt->get_result();
      if($result->num_rows === 0) exit('No rows');
      while($row = $result->fetch_assoc()) {
          $returnDay =  $row['fechaDevolucion'];
      }
      //echo 'returnDay: '.$returnDay;
      $returnDAY= new DateTime($returnDay);
      $DATE = new DateTime();
      $interval = $returnDAY->diff($DATE);
      disconnect($db);
      if($interval->format('%R')=='-'){
        return '0 días';
      }else{
        return $interval->format('%R %m mes, %d días');
      }
  }
}

 ?>
