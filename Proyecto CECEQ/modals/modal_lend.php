<?php
$hoy = getdate();
$d=strtotime("+7 Days");
$var_value = $_SESSION['ok'];

if($var_value){
  echo '
   <div class="modal fade" id="myModal">
     <div class="modal-dialog">
       <div class="modal-content">

         <!-- Modal Header -->
         <div class="modal-header">
           <h3 class="modal-title"> Préstamo </h3>
           <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>

         <!-- Modal body -->
         <div class="modal-body">
           <p><strong>Ejemplar: </strong>'.'El titulo del ejemplar'.'</p>
           <p><strong>Prestamo a: </strong>'.'El nombre del suario'.'</p>
           <p><strong>Fecha de préstamo: </strong>'.date("d/m/Y").'</p>
           <p><strong>Fecha de retorno: </strong>'.date("d/m/Y", $d) .'</p>
         </div>

         <!-- Modal footer -->
         <div class="modal-footer">
           <div class="row">
             <div class="col-sm-6 text-left">
               <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar préstamo</button>
             </div>
             <div class="col-sm-6 text-right">
               <button type="button" class="btn btn-success" data-dismiss="modal">Guardar préstamo</button>
             </div>
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
