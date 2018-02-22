<?php echo '
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title">Por favor revisa el numero de usuario ingresado:</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
          <p><b>Numero de usuario ingresado: </b>'.$_POST["user"]["number"] .'</p>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <div class="row">
            <div class="col-sm-6 text-left">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
            <div class="col-sm-6 text-right">
              <button type="button" class="btn btn-success" data-dismiss="modal">Aceptar</button>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>'
  ?>