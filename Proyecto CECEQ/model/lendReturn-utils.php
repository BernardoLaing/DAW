<?php //*********   De interfaz Lend_Return   *************
require_once('utils.php');
 //Estable el valor de la variable sesión tipo.
 //Préstamo, Devolución, excedePrestamos, usuarioInexistente, libroInexistente, libroActualmentePrestado
function setTipo($idCredencial, $idEjemplar, $boolPrestamo){
    $conn = connect();
    $estadoDisponible = true;
    if(!$conn){ die("No se pudo conectar a la Base de Datos");}
    if ($boolPrestamo == true) {
    ///////////// REVISA QUE NO ESTE ACTUALMENTE EN LA TABLA EJEMPLAR_CREDENCIAL  //////////////////////
          $sql='SELECT *
          FROM ejemplar_credencial ec
          WHERE ec.idEjemplar = (?)
          AND ec.fechaDevolucionReal is null';
        // Preparing the statement
        if (!($statement = $conn->prepare($sql))) {die("Preparation 1 failed: (" . $conn->errno . ") " . $conn->error);}
        // Binding statement params
        if (!$statement->bind_param("i", $idEjemplar)) {
            die("Parameter vinculation failed: (" .$statement->errno . ") " . $statement->error);
        }
        // Executing the statement
        if (!$statement->execute()) {
            die("Execution failed: (" . $statement->errno . ") " . $statement->error);
        }
        $result = $statement->get_result();
        if($result->num_rows === 1){return 'libroActualmentePrestado';}
       
      ///////////// REVISA QUE ESTE EN ESTADO DISPONIBLE //////////////////////
      $sql='SELECT idEstado
              FROM ejemplar_estado ee
              WHERE ee.idEjemplar = (?)';
      // Preparing the statement
      if (!($statement = $conn->prepare($sql))) {
          die("Preparation 1 failed: (" . $conn->errno . ") " . $conn->error);
      }
      // Binding statement params
      if (!$statement->bind_param("i", $idEjemplar)) {
          die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error);
      }
      // Executing the statement
      if (!$statement->execute()) {
          die("Execution failed: (" . $statement->errno . ") " . $statement->error);
      }
      $result = $statement->get_result();
      if($result->num_rows === 0) exit('No rows');
      while($row = $result->fetch_assoc()) {
          $returnEstado =  $row['idEstado'];
      }
      if ($returnEstado != 5) {
          return 'noDisponible';
      }
      ///////////// REVISA QUE EXISTA USUARIO //////////////////////
      $sql='SELECT *
              FROM credencial c
              WHERE c.idVisitante = (?)';
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
    
    }
    else{
      ///////////// REVISA QUE EL LIBRO SI ESUVIERA PRESTADO //////////////////////
      $sql='SELECT *
              FROM ejemplar_estado ee
              WHERE ee.idEjemplar = (?)
              AND idEstado = 1
              ';
      // Preparing the statement
      if (!($statement = $conn->prepare($sql))) {
          die("Preparation 1 failed: (" . $conn->errno . ") " . $conn->error);
      }
      // Binding statement params
      if (!$statement->bind_param("i", $idEjemplar)) {
          die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error);
      }
      // Executing the statement
      if (!$statement->execute()) {
          die("Execution failed: (" . $statement->errno . ") " . $statement->error);
      }
      $result = $statement->get_result();
      if($result->num_rows === 0){
        return 'noDisponible';
      }
    }
    ///////////// REVISA QUE EXISTA LIBRO //////////////////////
    $sql='SELECT *
            FROM ejemplar e
            WHERE e.idEjemplar = (?)';
    // Preparing the statement
    if (!($statement = $conn->prepare($sql))) {
        die("Preparation 1 failed: (" . $conn->errno . ") " . $conn->error);
    }
    // Binding statement params
    if (!$statement->bind_param("i", $idEjemplar)) {
        die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error);
    }
    // Executing the statement
    if (!$statement->execute()) {
        die("Execution failed: (" . $statement->errno . ") " . $statement->error);
    }
    $result = $statement->get_result();
    if($result->num_rows === 0){
      return 'libroInexistente';
    }
    if ($boolPrestamo==true) {
        return 'Préstamo';
    }else{
      return 'Devolución';
    }
    disconnect($conn);
}

function checkLendTimes($idVisitante){
  $conn = connect();
  if(!$conn){ die("No se pudo conectar a la Base de Datos");}
  ///////////// REVISA QUE NO TENGA 3 PRESTAMOS //////////////////////
  $sql='SELECT idCredencial
  FROM credencial
  WHERE idVisitante = (?)';

    // Preparing the statement
    if (!($statement = $conn->prepare($sql))) {
    die("Preparation 1 failed: (" . $conn->errno . ") " . $conn->error);
    }
    // Binding statement params
    if (!$statement->bind_param("i", $idVisitante)) {
    die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error);
    }
    // Executing the statement
    if (!$statement->execute()) {
    die("Execution failed: (" . $statement->errno . ") " . $statement->error);
    }
    $result = $statement->get_result();
    //if($result->num_rows === 0) exit('No rows el ejemplar no existe');
    if($row = $result->fetch_assoc()) {
    $idCredencial =  $row['idCredencial'];
    }
  
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
  if($result->num_rows >= 3){
    return '<p class="text-center">¡Este usuario ya tiene tres libros prestados!</p>';
  }
  disconnect($conn);
}


function getBookState($idLibro){
    $conn = connect();
    if(!$conn){ die("No se pudo conectar a la Base de Datos");}
    ///////////// REVISA QUE NO TENGA 3 PRESTAMOS //////////////////////
    $sql='SELECT nombre
            FROM estado e, ejemplar_estado ee
            WHERE ee.idEstado = e.idEstado
            AND ee.idEjemplar = (?)';
    // Preparing the statement
    if (!($statement = $conn->prepare($sql))) {
        die("Preparation 1 failed: (" . $conn->errno . ") " . $conn->error);
    }
    // Binding statement params
    if (!$statement->bind_param("i", $idLibro)) {
        die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error);
    }
    // Executing the statement
    if (!$statement->execute()) {
        die("Execution failed: (" . $statement->errno . ") " . $statement->error);
    }
    $result = $statement->get_result();
    //if($result->num_rows === 0) exit('No rows el ejemplar no existe');
    while($row = $result->fetch_assoc()) {
        $estado =  $row['nombre'];
    }
    return $estado;
    disconnect($conn);
  }


function insertLend( $idEjemplar, $idVisitante, $dateLend, $dateReturn){
  $conn = connect();
  if(!$conn){ die("No se pudo conectar a la Base de Datos");}

  $sql='SELECT idCredencial
            FROM credencial
            WHERE idVisitante = (?)';

    // Preparing the statement
        if (!($statement = $conn->prepare($sql))) {
            die("Preparation 1 failed: (" . $conn->errno . ") " . $conn->error);
        }
        // Binding statement params
        if (!$statement->bind_param("i", $idVisitante)) {
            die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error);
        }
        // Executing the statement
        if (!$statement->execute()) {
            die("Execution failed: (" . $statement->errno . ") " . $statement->error);
        }
        $result = $statement->get_result();
        //if($result->num_rows === 0) exit('No rows el ejemplar no existe');
        if($row = $result->fetch_assoc()) {
            $idCredencial =  $row['idCredencial'];
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
  cambiarEstado(1, $idEjemplar);
  disconnect($conn);
}

function insertReturn($idEjemplar, $fechaDevolucionReal, $buenEstado, $malEstado){
    $conn = connect();
    if(!$conn){ die("No se pudo conectar a la Base de Datos");}
    //////////////// PONER FECHA DE DEVOLUCION REAL ///////////////////
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
      //////////////// CAMBIA EL ESTADO A DAÑADO O DISPONIBLE ///////////////////
      if ($buenEstado == true)
          cambiarEstado(5, $idEjemplar);
      else
        cambiarEstado(4, $idEjemplar);
    disconnect($conn);
  }

  function getNameVisitor($idCampo, $boolCredencial){
  $db = connect();
  if($db != NULL){
    if ($boolCredencial == true) { //Esto quiere decir que marcó un prestamo ya que aqui aun no tiene el idEjemplar en la tabla
      $query='SELECT v.nombre, v.apellidoPaterno, v.apellidoMaterno
              FROM visitante v, credencial c
              WHERE c.idVisitante = v.idVisitante
              AND c.idVisitante = (?)';
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
  disconnect($db);
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
      if(!($stmt = $db->prepare($query))) {die("Preparation failed: (" . $db->errno . ") " . $db->error);}
      if (!$stmt->bind_param("i", $var_libro)) {die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error);}
      if (!$stmt->execute()) {die("Execution failed: (" . $statement->errno . ") " . $statement->error);}
      $result = $stmt->get_result();
      if($result->num_rows === 0) exit('No rows');
      while($row = $result->fetch_assoc()) {
          $returnDay =  $row['fechaDevolucion'];
      }
      $returnDAY= new DateTime($returnDay);
      $DATE = new DateTime();
      $interval = $returnDAY->diff($DATE);
      if($interval->format('%R')=='-'){
        return '0 días';
      }else
        return $interval->format('%R %m mes, %d días');
      disconnect($db);
  }
}
//true para recibir fecha lend, false para recibir fecha devolucion
function getDateInfo($idLibro, $lend ){
  $db = connect();
  if($db != NULL){
    if ($lend ==true ) {
      $query='SELECT fechaPrestamo
              FROM ejemplar_credencial
              WHERE idEjemplar = (?)
              AND fechaDevolucionReal is NULL';
    }else{
      $query='SELECT fechaDevolucion
              FROM ejemplar_credencial
              WHERE idEjemplar = (?)
              AND fechaDevolucionReal is NULL';
    }
      if(!($stmt = $db->prepare($query))) {die("Preparation failed: (" . $db->errno . ") " . $db->error);}
      if (!$stmt->bind_param("i", $idLibro)){die("Parameter vinculation failed: (".$statement->errno.")".$statement->error);}
      if (!$stmt->execute()) {die("Execution failed: (" . $statement->errno . ") " . $statement->error);}
      $result = $stmt->get_result();
      if($result->num_rows === 0) exit('No rows');
      if ($lend ==true) {
        while($row = $result->fetch_assoc()) {
            $returnDay =  $row['fechaPrestamo'];
        }
      }else{
        while($row = $result->fetch_assoc()) {
            $returnDay =  $row['fechaDevolucion'];
        }
      }
      $returnDAY= new DateTime($returnDay);
      $returnDay = $returnDAY->format('Y-m-d');
      return $returnDay;
      disconnect($db);
  }
}
function cambiarEstado($numEstado, $idEjemplar){
  $conn = connect();
  if(!$conn){ die("No se pudo conectar a la Base de Datos");}
  $hoy = date("Y-m-d");
  $sql = "UPDATE ejemplar_estado
          SET idEstado = (?), fecha = (?)
          WHERE idEjemplar=(?)";
      // Preparing the statement
      if (!($statement = $conn->prepare($sql))) {
         die("Preparation 1 failed: (" . $conn->errno . ") " . $conn->error);
      }
       // Binding statement params
      if (!$statement->bind_param("isi",$numEstado, $hoy, $idEjemplar)) {
          die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error);
      }
       // Executing the statement
       if (!$statement->execute()) {
          die("Execution failed: (" . $statement->errno . ") " . $statement->error);
        }
  disconnect($conn);
}
 ?>
