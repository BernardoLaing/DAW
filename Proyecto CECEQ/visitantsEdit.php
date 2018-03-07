<?php include("partials/_header.html"); ?>
<?php include("partials/_top_bar.html"); ?>
<br /><br />
<div class="container shadow">
    <!--header-->
    <div class="row">
        <div class="col-sm-12">
                <div class="text-center">

                    <div class="display-4">Entrada</div>
                </div>
        </div>
    </div>
    <!--end of header-->
    <form>
        <!--id-->
        <div class="row">
            <div class="col-sm-12">
                <div class='form-group'>
                    <label for="user_id">Número de Usuario</label>
                    <div class="col-md-10">
                        <input value="124325243526" class="form-control" id="user_id" name="user[id]" size="30" type="text" placeholder="1234567"/>
                    </div>
                </div>
            </div>
        </div>
        <!--end of id-->

        <!--name, paternal, maternal-->
        <div class='row'>
            <div class='col-sm-4'>
                <div class='form-group'>
                    <label for="user_name">Nombre(s):</label>
                    <div class="col-md-12">
                        <input value="Alfonso" class="form-control" id="user_name" name="user[name]" size="30" type="text" placeholder="Eduardo"/>
                    </div>
                </div>
            </div>
            <div class='col-sm-4'>
                <div class='form-group'>
                    <label for="user_paternal">Apellido paterno:</label>
                    <div class="col-md-12">
                        <input value="Cabral" class="form-control" id="user_paternal" name="user[paternal]" size="30" type="text" placeholder="Cuesta"/>
                    </div>
                </div>
            </div>
            <div class='col-sm-4'>
                <div class='form-group'>
                    <label for="user_maternal">Apellido materno:</label>
                    <div class="col-md-12">
                        <input value="Gómez" class="form-control" id="user_maternal" name="user[maternal]" size="30" type="text" placeholder="Córdova"/>
                    </div>
                </div>
            </div>
        </div>
        <!--end of name, paternal, maternal-->

        <!--of birth, schooling, genre-->
        <div class='row'>
            <div class='col-sm-4'>
                <div class='form-group'>
                    <label for="user_age">Fecha de nacimiento:</label>
                    <div class="col-md-12">
                        <input value="1993-06-01" class="form-control" id="user_age" name="user[birth]" size="30" type="date"/>
                    </div>
                </div>
            </div>
            <div class='col-sm-4'>
                <div class='form-group'>
                    <label for="user_schooling">Grado de estudio:</label>
                    <select name="user[schooling]" class="form-control" id="user_schooling">
                        <option value="" disabled>...</option>
                        <option value="NINGUNO">Ninguno</option>
                        <option value="PREESCOLAR">Preescolar</option>
                        <option value="PRIMARIA">Primaria</option>
                        <option value="SECUNDARIA">Secundaria</option>
                        <option value="PREPARATORIA" selected>Preparatoria</option>
                        <option value="UNIVERSIDAD">Universidad</option>
                        <option value="MAESTRIA">Maestría</option>
                        <option value="DOCTORADO">Doctorado</option>
                    </select>
                </div>
            </div>
            <div class='col-sm-4'>
                <div class='form-group'>
                    <label for="user_genre">Género:</label>
                    <select name="user[genere]" class="form-control" id="user_genre">
                        <option value="" disabled>...</option>
                        <option value="MASCULINO" selected>Masculino</option>
                        <option value="FEMENINO">Femenino</option>
                    </select>
                </div>
            </div>
        </div>
        <!--end of birth, schooling, genre-->
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    <div class="col-lg-12">
                    </div>
                </div>
            </div>
        </div>

        <!--controls-->
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="col-md-12">
                    <a class="btn btn-outline-secondary py-0" href="visitantsView.php"><i class="material-icons align-middle">arrow_back</i></a>
                    </div>
                </div>
            </div>
                <div class="col-sm-3">
                <div class="form-group">
                    <div class="col-md-12">
                        <a class="btn btn-outline-secondary mx-auto" id="buscarVisitante" href="#">Eliminar visitante</a>
                    </div>
                </div>
            </div>
        </div>
        <!--end of controls-->
    </form>

</div>
<?php include("partials/_footer.html"); ?>
