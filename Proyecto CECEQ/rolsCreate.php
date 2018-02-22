<?php include("partials/_header.html"); ?>
<?php include("partials/_top_bar.html"); ?>
<br /><br />
<div class="container mdiv shadow">
    <div class="mx-auto text-center"> <!-- mx-auto da un padding y border automatico-->
        <div class="display-3">Roles</div> <!--display son headdings mas grandes-->
    </div>
    <br>
    <br>
    <form>
        <div class="form-row">
            <div class="col-sm-12 col-md-4 mx-auto">
                <div class="form-group">
                    <label for="name">Nombre: </label>
                    <input class="form-control" type="text" name="name" placeholder="Administrador">
                </div>
            </div>
            <div class="col-sm-12 col-md-4 mx-auto">
                <div class="form-group">
                    <label for="description">Descripción: </label>
                    <input class="form-control" type="text" name="description" placeholder="Cuenta con todos los permisos">
                </div>
            </div>
        </div><br /><br />
        <div class="row">
            <div class="col-sm-12 col-md-4 offset-md-1">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">Privilegio 1</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">Privilegio 2</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">Privilegio 3</label>
                </div>
            </div>
        </div>
    </form>
    <br>
    <br>
    <div class="row mx-auto">
        <div class="col-sm-1"></div>
        <div class="col-sm-2 center-block"><a href="rols.php" class="btn btn-secondary py-0"><i class="material-icons alagin-middle">arrow_back</i></a></div>
        <div class="col-sm-5"></div>
        <div class="col-lg-2 col-sm-4">
            <button type="button" class="btn btn-secondary  btn-block"> Registrar</button>
        </div>
        <div class="col-lg-5 col-sm-4"></div>
    </div>
    
</div>

<?php include("partials/_footer.html"); ?>