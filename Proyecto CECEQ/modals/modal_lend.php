<?php
$diaPrestamo = getdate();
$diaRegreso=strtotime("+7 Days");
$var_value = $_SESSION['ok'];
$var_credencial = $_SESSION['credencial'];  //Id Credencial
$var_libro = $_SESSION['libro'];            //Id libro
$var_tipo = $_SESSION['tipo'];              //Prestamo o Devolucion
//getNameVisitor($_SESSION['credencial']);
//Obtener el nombre del visitante
function getNameVisitor($var_credencial){
  $db = connect();
  if($db != NULL){
    $query='SELECT v.nombre, v.apellidoPaterno, v.apellidoMaterno
            FROM visitante v, credencial c
            WHERE c.idVisitante = v.idVisitante 
            AND c.idVisitante = (?)';
      
      if(!($stmt = $db->prepare($query))) {
          die("Preparation failed: (" . $db->errno . ") " . $db->error);
      }
      if (!$stmt->bind_param("i", $var_credencial)) {
          die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error); 
      }
      if (!$stmt->execute()) {
          die("Execution failed: (" . $statement->errno . ") " . $statement->error);
      } 

      $result = $stmt->get_result();
      if($result->num_rows === 0) exit('No rows');
      while($row = $result->fetch_assoc()) {
          $nombre =  $row['nombre'];
          $aPaterno =  $row['apellidoPaterno'];
          $aMaterno =  $row['apellidoMaterno'];
      }
      disconnect($db);
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
      if($result->num_rows === 0) exit('No rows');
      while($row = $result->fetch_assoc()) {
          $titulo =  $row['titulo'];
      }
      disconnect($db);
      return $titulo;
  }
}

function getReturnData($var_libro, $var_credencial){
  //$datetime1 = new DateTime('2009-10-11');
  //$datetime2 = new DateTime('2009-10-13');
  //$interval = $datetime1->diff($datetime2);
  //echo $interval->format('%R%a días');
  $db = connect();
  if($db != NULL){
    //$date = new DateTime();
    //$dateReturn = $date->format('Y-m-d H:i:s');
    //echo 'Date Return: '.$dateReturn;
    //return;
    $query='SELECT fechaDevolucion
            FROM ejemplar_credencial
            WHERE idEjemplar = (?)
            AND idCredencial = (?)';
      
      if(!($stmt = $db->prepare($query))) {
          die("Preparation failed: (" . $db->errno . ") " . $db->error);
      }
      if (!$stmt->bind_param("ii", $var_libro, $var_credencial)) {
          die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error); 
      }
      if (!$stmt->execute()) {
          die("Execution failed: (" . $statement->errno . ") " . $statement->error);
      } 

      $result = $stmt->get_result();
      if($result->num_rows === 0) exit('No rows');
      while($row = $result->fetch_assoc()) {
          //$lendDay =  $row['fechaPrestamo'];
          $returnDay =  $row['fechaDevolucion'];
      }
      //echo 'Prestamo '.$lendDay;
      $actualReturnDay= new DateTime(date("Y-m-d H:i:s"));
      echo 'returnDay: '.$returnDay;
      echo 'actualReturnDay: '.$actualReturnDay;
      $interval = $returnDay->diff($actualReturnDay);
      echo $interval->format('%R%a días');
      disconnect($db);
      return $titulo;
  }
}

if($var_value && $var_tipo == 'Préstamo'){
  echo '
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h3 class="modal-title">  Préstamo </h3>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <p><strong>Ejemplar: </strong>' . getNameBook($_SESSION['libro']) . '</p>
          <p><strong>Prestamo a: </strong>' . getNameVisitor($_SESSION['credencial']) .'</p>
          <p><strong>Fecha de préstamo: </strong>'.date("Y-m-d").'</p>
          <p><strong>Fecha de retorno: </strong>'.date("Y-m-d", $diaRegreso) .'</p>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <div class="row">
            <form method="post">
              <div class="row">
                <div class="col-sm-6 text-left">
                  <input type="submit" id="cancelar" class="btn btn-danger" name="cancelar" value="Cancelar" />
                </div>
                <div class="col-sm-6 text-left ">
                   <input type="submit" id="aceptar" class="btn btn-success"  name="aceptar" value="Aceptar" />
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>';

}else if($var_value && $var_tipo == 'Devolución'){
  echo '
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h3 class="modal-title">  Devolución </h3>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <p><strong>Ejemplar: </strong>' . getNameBook($_SESSION['libro']) . '</p>
          <p><strong>Prestamo a: </strong>' . getNameVisitor($_SESSION['credencial']) .'</p>
          <p><strong>Fecha de préstamo: </strong>'.date("Y-m-d").'</p>
          <p><strong>Fecha de retorno: </strong>'.date("Y-m-d", $diaRegreso) .'</p>
          <p><strong>Días de retraso: </strong>'. getReturnData($_SESSION['libro'], $_SESSION['credencial']).'</p>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <div class="row">
            <form method="post">
              <div class="row">
                <div class="col-sm-6 text-left">
                  <input type="submit" id="cancelar" class="btn btn-danger" name="cancelar" value="Cancelar" />
                </div>
                <div class="col-sm-6 text-left ">
                   <input type="submit" id="aceptar" class="btn btn-success"  name="aceptar" value="Aceptar" />
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>';
}else{
  echo '
   <div class="modal fade" id="myModal">
     <div class="modal-dialog">
       <div class="modal-content">

         <!-- Modal Header -->
         <div class="modal-header">
           <h3 class="modal-title"> Alerta </h3>
           <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>

         <!-- Modal body -->
         <div class="modal-body">
           <p>Se debe ingresar el Id del usuario y por lo menos un libro.</p>
         </div>

         <!-- Modal footer -->
         <div class="modal-footer">
           <div class="row">
             <div class="col-sm-6 text-right">
               <button type="button" class="btn btn-success" data-dismiss="modal">Aceptar</button>
             </div>
           </div>
         </div>

       </div>
     </div>
   </div>';
}
 ?>
