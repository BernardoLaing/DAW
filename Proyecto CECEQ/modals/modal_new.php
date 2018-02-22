<?php
echo '
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title">Por favor revisa los datos ingresados:</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
          <p><b>Nombre(s): </b>'.$_POST["user"]["name"] .'</p>
          <p><b>Apellido Paterno: </b>'.$_POST["user"]["paternal"].'</p>
          <p><b>Apellido Materno: </b>'.$_POST["user"]["maternal"].'</p>
          <p><b>Fecha de Nacimiento: </b>'.$_POST["user"]["birthday"].'</p>
          <p><b>Genero: </b>'.$_POST["user"]["gender"].'</p>
          <p><b>Grado de Estudio: </b>'.$_POST["user"]["user_grade"].'</p>
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