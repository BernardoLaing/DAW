<?php
$var_value = $_SESSION['ok'];

if($var_value){
  echo 'Se llena la tabla con datos de la BD';
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
           <p>Se debe llenar por lo menos un campo para filtrar la búsqueda.</p>
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
