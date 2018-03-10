<?php
$diaPrestamo = getdate();
$diaRegreso=strtotime("+7 Days");
$var_value = $_SESSION['ok'];
$var_credencial = $_SESSION['credencial'];
$var_libro = $_SESSION['libro'];
$var_tipo = $_SESSION['tipo'];

if($var_value){
  echo '
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h3 class="modal-title">' . $var_tipo .'</h3>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <p><strong>Ejemplar: </strong>' . $var_libro . '</p>
          <p><strong>Prestamo a: </strong>' .$var_credencial.'</p>
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
