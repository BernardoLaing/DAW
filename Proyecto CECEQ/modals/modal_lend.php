<?php
$diaPrestamo = getdate();
$diaRegreso=strtotime("+7 Days");
$var_value = $_SESSION['ok'];
$var_credencial = $_SESSION['credencial'];  //Id Credencial
$var_libro = $_SESSION['libro'];            //Id libro
$var_tipo = $_SESSION['tipo'];              //Prestamo o Devolucion

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
          <p><strong>Días de retraso: </strong>'.  getReturnData($_SESSION['libro'], $_SESSION['credencial']) .'</p>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer text-center">
          <div class="row">
            <form method="post">
              <div class="row text-center">
                  <p class="text-center">¿El libro esta en buen estado?</p>
              </div>
              <div class="row">
                <div class="col-sm-3">
                  <input type="submit" id="cancelar" class="btn btn-secondary" name="malEstado" value="Sí" />
                </div>
                <div class="col-sm-3">
                   <input type="submit" id="aceptar" class="btn btn-secondary"  name="buenEstado" value="No" />
                </div>
                <div class="col-sm-6">
                   <input type="submit" id="aceptar" class="btn btn-danger"  name="cancelar" value="Cancelar devolución" />
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
