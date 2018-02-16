<?php include("partials/_header.html"); ?>
<?php include("partials/_top_bar.html"); ?>
<br /><br />
<div class="container mdiv shadow">
    <div class="mx-auto text-center"> <!-- mx-auto da un padding y border automatico-->
        <div class="display-3">Cuentas</div> <!--display son headdings mas grandes-->
    </div>
    <br>
    <br>
    <div class="row text-center center-block mx-auto">
        <div class="col-sm-12 col-md-4">Nombre: <input type="text" name="name"></div>
        <div class="col-sm-12 col-md-4">Nombre Usuario: <input type="text" name="user"></div>
        <div class="col-sm-12 col-md-4">Rol: 
            <select name="rol">
						<option>-select-</option>
						<option>Becas</option>
						<option>Administrador</option>
						<option>Bibliotecario</option>
            </select>
        </div>
        <br>
        <br>
        <div class="col-sm-12 col-md-4">Contraseña: <input type="password" name="pw"></div>
        <div class="col-sm-12 col-md-4">Validar Contraseña: <input type="password" name="pw2"></div>
    </div>
    <br>
    <br>
    <div class="row mx-auto">
        <div class="col-sm-2 center-block"><a href="cuentas.php" class="btn btn-secondary py-0"><i class="material-icons alagin-middle">arrow_back</i></a></div>
        <div class="col-lg-4 col-sm-3">
            <button type="button" class="btn btn-secondary "> Eliminar cuenta </button>
        </div>
        <div class="col-lg-1 col-sm-6"></div>
        <div class="col-lg-4 col-sm-3">
            <button type="button" class="btn btn-secondary "> Registrar Cambios </button>
        </div>
    </div>
    
</div>

<?php include("partials/_footer.html"); ?>