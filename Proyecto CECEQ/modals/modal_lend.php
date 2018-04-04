<?php
$diaRegreso=strtotime("+7 Days");
$var_value = $_SESSION['ok'];               //Booleano para ver verificar que halla ingresado un libro
$var_credencial = $_SESSION['credencial'];  //Id Credencial
$var_libro = $_SESSION['libro'];            //Id libro
$var_tipo = $_SESSION['tipo'];              //Préstamo, Devolución, excedePrestamos, usuarioInexistente, libroActualmentePrestado
//Succesfull lend
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
          <p>' . checkLendTimes($_SESSION['credencial']) . '</p>
          <p><strong>Ejemplar: </strong>' . getNameBook($_SESSION['libro'], false) . '</p>
          <p><strong>Prestamo a: </strong>' . getNameVisitor($_SESSION['credencial'], true) .'</p>
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
}else
//Succesfull Return
if($var_value && $var_tipo == 'Devolución'){
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
          <p><strong>Ejemplar: </strong>' . getNameBook($_SESSION['libro'], false) . '</p>
          <p><strong>Prestamo a: </strong>' . getNameVisitor($_SESSION['libro'], false) .'</p>
          <p><strong>Fecha de préstamo: </strong>'.date("Y-m-d").'</p>
          <p><strong>Fecha de retorno: </strong>'.date("Y-m-d", $diaRegreso) .'</p>
          <p><strong>Días de retraso: </strong>'.  getLateDays($_SESSION['libro']) .'</p>
        </div>
        <!-- Modal footer -->
    <div class="modal-footer">
      <div class="row">
        <form method="post">
         <div class="row">
             <div class="col-md-12">
              <p class="text-left"> ¿Está en buen estado el libro?</p>
             </div>
         </div>
          <div class="row">
            <div class="col-sm-2 ">
              <input type="submit" id="cancelar" class="btn btn-success" name="buenEstado" value="Sí" />
            </div>
            <div class="col-sm-2  ">
               <input type="submit" id="aceptar" class="btn btn-danger"  name="malEstado" value="No" />
            </div>
            <div class="col-sm-4 ">
              <input type="submit" id="cancelar" class="btn btn-danger" name="cancelar" value="Cancelar Devolución" />
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>';
}
//missing inputs or exceeds amount of books lend
else{
  $modalMissingData = '<div class="modal fade" id="myModal">
                         <div class="modal-dialog">
                           <div class="modal-content">
                             <!-- Modal Header -->
                             <div class="modal-header">
                               <h3 class="modal-title"> Alerta </h3>
                               <button type="button" class="close" data-dismiss="modal">&times;</button>
                             </div>';
  if ($var_tipo == 'Préstamo') { //Presionó prestamo sin ingresar los datos necesarios
      $modalMissingData .=
          '<!-- Modal body -->
           <div class="modal-body">
             <p>Se debe ingresar el Id del usuario y por lo menos un libro.</p>
           </div>';
  }else if($var_tipo == 'Devolución'){ //Presionó devolución sin ingresar un libro
        $modalMissingData .= '
          <!-- Modal body -->
           <div class="modal-body">
             <p>Se debe ingresar un libro.</p>
           </div>';
  }else if($var_tipo == 'usuarioInexistente'){ //Presionó préstamo a un usuario que no esta dado de alta
        $modalMissingData .= '
          <!-- Modal body -->
           <div class="modal-body">
             <p class="text-center">No. de usuario inexistente.</p>
             <p class="text-center">Por favor, revise los datos nuevamente.</p>
           </div>';
  }else if($var_tipo == 'libroInexistente'){ //Presionó devolución sin ingresar un libro
        $modalMissingData .= '
          <!-- Modal body -->
           <div class="modal-body">
             <p class="text-center"> Este Id. de libro es inexistente o no esta actualmente prestado.</p>
             <p class="text-center">Por favor, revise los datos nuevamente.</p>
           </div>';
  }else if($var_tipo == 'libroActualmentePrestado'){ //Presionó préstamo de un libro actualmente prestado
        $modalMissingData .= '
          <!-- Modal body -->
           <div class="modal-body">
             <h5 class="text-center">Este libro esta actualmente prestado. <br> Por favor, revise los datos nuevamente</h5>
             <p class="text-left"> <strong>  Datos del préstamo  </strong> </p>
             <p><strong>Ejemplar: </strong>' . getNameBook($_SESSION['libro'], false) . '</p>
             <p><strong>Prestamo a: </strong>' . getNameVisitor($_SESSION['libro'], false) .'</p>
             <p><strong>Fecha de préstamo: </strong>'.getDateInfo($_SESSION['libro'], true).'</p>
             <p><strong>Fecha de retorno: </strong>'.getDateInfo($_SESSION['libro'], false).'</p>
           </div>';
  }else if($var_tipo == 'noDisponible'){ //Presionó préstamo de un libro actualmente prestado
        $modalMissingData .= '
          <!-- Modal body -->
           <div class="modal-body">
             <h5 class="text-center">No se puede realizar la operacion ya que el estado del ejemplar es "'.getBookState($_SESSION['libro']).'".</h5>
             <h5 class="text-center">Por favor, revise los datos.</h5>
           </div>';
  }
  $modalMissingData .=
  ' <!-- Modal footer -->
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
 echo $modalMissingData;
}
 ?>
