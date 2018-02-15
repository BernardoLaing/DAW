<?php include("partials/_header.html"); ?>
<?php include("partials/_top_bar.html"); ?>
<br /><br />
<div class="container shadow">
    <div class="row">
        <div class="col-sm-12">
                <div class="text-center">
                    <div class="display-4">Entrada</div>
                </div>
        </div>
    </div>
    <form>
    <div class="row">

        <div class="col-sm-12">
            <div class='form-group'>
                <label for="user_number">Número de Usuario</label>
                <div class="col-md-10">
                    <input class="form-control" id="user_number" name="user[number]" size="30" type="text" placeholder="1234567"/>
                </div>
            </div>
        </div>
    </div>
        <div class='row'>

            <div class='col-sm-4'>
                <div class='form-group'>
                    <label for="user_name">Nombre(s).</label>
                    <div class="col-md-12">
                        <input class="form-control" id="user_name" name="user[name]" size="30" type="text" placeholder="Eduardo"/>
                    </div>
                </div>
            </div>

            <div class='col-sm-4'>
                <div class='form-group'>
                    <label for="user_paternal">Apellido P.</label>
                    <div class="col-md-12">
                        <input class="form-control" id="user_paternal" name="user[paternal]" required="true" size="30" type="text" placeholder="Cuesta"/>
                    </div>
                </div>
            </div>

            <div class='col-sm-4'>
                <div class='form-group'>
                    <label for="user_maternal">Apellido M.</label>
                    <div class="col-md-12">
                        <input class="form-control" id="user_maternal" name="user[maternal]" required="true" size="30" type="text" placeholder="Córdova"/>
                    </div>
                </div>
            </div>

        </div>

        <div class='row'>

            <div class='col-sm-4'>
                <div class='form-group'>
                    <label for="user_age">Edad.</label>
                    <div class="col-md-12">
                        <input class="form-control" id="user_age" name="user[age]" required="true" size="30" type="text" placeholder="19"/>
                    </div>
                </div>
            </div>

            <div class='col-sm-4'>
                <div class='form-group'>
                    <label for="user_grade">Grado de Estudio.</label>
                    <div class="col-md-12">
                        <input class="form-control" id="user_grade" name="user[grade]" required="true" size="30" type="text" placeholder="Universidad"/>
                    </div>
                </div>
            </div>

            <div class='col-sm-4'>
                <div class='form-group'>
                    <label for="user_ocupation">Ocupación.</label>
                    <div class="col-md-12">
                        <input class="form-control" id="user_ocupation" name="user[ocupation]" required="true" size="30" type="text" placeholder="Estudiante"/>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-sm-6">
                <div class="form-group">
                    <div class="col-md-12">
                    <a class="btn btn-outline-secondary py-0" href="menu.php"><i class="material-icons align-middle">arrow_back</i></a>
    <!--                    <button type="submit" class="btn btn-outline-secondary mx-auto">Iniciar Sesión</button>-->
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <div class="col-md-12">
                    <a class="btn btn-outline-secondary mx-auto" href="#">Buscar Visitante</a>
    <!--                    <button type="submit" class="btn btn-outline-secondary mx-auto">Iniciar Sesión</button>-->
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-outline-secondary mx-auto">Registrar entrada</button>
                    </div>
                </div>
            </div>

        </div>

    </form>

</div>
<?php include("partials/_footer.html"); ?>
