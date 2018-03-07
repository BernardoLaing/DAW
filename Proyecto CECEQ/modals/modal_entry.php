<?php
$var_value = $_SESSION["entry_status"];
if($var_value == 1)
{
  echo '
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
  </div>';
}
else if($var_value == 2)
{
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
          <form method="post">
            <div class="col-sm-6 text-left">
              <input type="submit" class="btn btn-danger" id="cancelar" name="cancelar" value="Cancelar"/>
            </div>
            <div class="col-sm-6 text-right">
              <input type="submit" class="btn btn-success" id="aceptar" name="aceptar" value="Aceptar" />
            </div>
          </form>
          </div>
        </div>

      </div>
    </div>
  </div>';
}
else if($var_value == 3)
{
  echo '<div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">¡Alerta!</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
        Tienes 3 opciones:
        <ol>
            <li>
                Ingresar un número de usuario.
            </li>
            <li>
                Llenar todos los datos para registrar un visitante nuevo.
            </li>
            <li>
                Llenar al menos un campo y buscar un usuario.
            </li>
        </ol>
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
  
      </div>
    </div>
  </div>';
}
else if($var_value == 4){

  echo '<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">¡Alerta!</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <h4>Nombre(s), Apellido P. y Apellido M. solo pueden contener letras.</h4>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>';
}
?>