<?php include("partials/_header.html"); ?>
<?php include("partials/_top_bar.html"); ?>
<br /><br />
<div class="container shadow">
    <br><br><br><br>
    <div class="row">
        <div class="col-sm-12">
                <div class="text-center">
                    <div class="display-3">Tramitar credencial</div>
                </div>
        </div>
    </div>
    <br/><br/><br/><br/>

    <form>
        <!--dates-->
        <div class="row">
            <div class="form-group form-inline col-lg-6">
                <label class="mr-3" for="credential_issuance">Fecha de expedición:</label>
                <input value="2018-03-01" name="credential[issuance]" type="date" class="form-control" id="credential_issuance">
            </div>
            <div class="form-group form-inline col-lg-6">
                <label class="mr-3" for="credential_expiration">Fecha de vencimiento:</label>
                <input value="2018-03-01" name="credential[expiration]" type="date" class="form-control" id="credential_expiration">
            </div>
        </div>
        <!--end of dates-->


        <!--personal information-->
        <div class="row">
            <div class="mt-5 mb-3 col-lg-12 text-center">Información personal:</div>
        </div>

        <!--paternal, maternal, name-->
        <div class='row'>
            <div class='col-lg-4'>
                <div class='form-group'>
                    <label for="user_name">Nombre(s):</label>
                    <input value="Juan" name="credential[name]" class="form-control" id="credential_name" size="30" type="text" />
                </div>
            </div>
            <div class='col-lg-4'>
                <div class='form-group'>
                    <label for="user_paternal">Apellido paterno:</label>
                    <input value="Jiménez" name="credential[paternal]" class="form-control" id="credential_paternal" size="30" type="text" />
                </div>
            </div>
            <div class='col-lg-4'>
                <div class='form-group'>
                    <label for="user_maternal">Apellido materno:</label>
                    <input value="Flores" name="credential[maternal]" class="form-control" id="credential_maternal" size="30" type="text" />
                </div>
            </div>
        </div>
        <!--end of paternal, maternal, name-->

        <!--age, email-->
        <div class="row">
            <div class="form-group form-inline col-lg-6">
                <label class="mr-3 col-lg-5" for="credential_birth">Fecha de nacimiento:</label>
                <input value="1998-07-08" name="credential[birth]" class="form-control col-lg-6" id="credential_birth" placeholder="18">
            </div>
            <div class="form-group form-inline col-lg-6">
                <label class="mr-3 col-lg-3" for="credential_email">E-Mail:</label>
                <input value="jfflores@hotmail.com" name="credential[email]" class="form-control col-lg-8" type="email" id="credential_email" placeholder="ejemplo@gmail.com">
            </div>
        </div>
        <!--end of age, email-->

        <!--domicilio (subsection)-->
        <div class="row">
            <div class="col-12 mt-4 mb-3">
                Domicilio
            </div>
        </div>

        <!--street, number-->
        <div class="row">
            <div class="col-lg-9 form-group form-inline">
                <label class="mr-3 col-lg-3" for="credential_street">Calle:</label>
                <input value="Epigmenio González" name="credential[street]" class="form-control col-lg-8" id="credential_street" placeholder="Felipe Ángeles">
            </div>
            <div class="col-lg-3 form-group form-inline">
                <label class="mr-3 col-lg-5" for="credential_number">Número:</label>
                <input value="100" name="credential[number]" class="form-control col-lg-6" id="credential_number" placeholder="302">
            </div>
        </div>
        <!--end of street, number-->

        <!--neighborhood, postalcode-->
        <div class="row">
            <div class="col-lg-9 form-group form-inline">
                <label class="mr-3 col-lg-3" for="credential_neighborhood">Colonia:</label>
                <input value="Centro" name="credential[neighborhood]" class="form-control col-lg-8" id="credential_neighborhood" placeholder="Centro">
            </div>
            <div class="col-lg-3 form-group form-inline">
                <label class="mr-3 col-lg-5" for="credential_postalCode">CP:</label>
                <input value="768090" name="credential[postalCode]" class="form-control col-lg-6" id="credential_postalCode" placeholder="76504">
            </div>
        </div>
        <!--end of neighborhood, postalcode-->

        <!--separator-->
        <div class="row">
            <div class="col-12 mt-4 mb-3"></div>
        </div>
        <!--end of separator-->

        <!--phone-->
        <div class="row">
            <div class="form-group form-inline col-12">
                <label class="mr-3 col-lg-1" for="credential_phone">Teléfono:</label>
                <input value="4420984759" name="credential[phone]" class="form-control col-lg-5" id="credential_phone" placeholder="01 442 3231433">
            </div>
        </div>
        <!--end of phone-->

        <!--occupation, schooling-->
        <div class="row">
            <div class="col-lg-6 form-group form-inline">
                <label class="mr-3 col-lg-2" for="credential_occupation">Ocupación:</label>
                <input value="Administrativo" name="credential[occupation]" class="form-control col-lg-8" id="credential_occupation" placeholder="Obrero">
            </div>
            <div class="col-lg-6 form-group form-inline">
                <label class="mr-3 col-lg-5" for="credential_schooling">Escolaridad:</label>
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
        <!--end of occupation, schooling-->

        <!--workaddress (subsection)-->
        <div class="row">
            <div class="col-12 mt-4 mb-3">
                Domicilio de trabajo
            </div>
        </div>

        <!--workStreet, workNumber-->
        <div class="row">
            <div class="col-lg-9 form-group form-inline">
                <label class="mr-3 col-lg-3" for="credential_workStreet">Calle:</label>
                <input value="Cardenales" name="credential[workStreet]" class="form-control col-lg-8" id="credential_workStreet" placeholder="Av. Monasterio">
            </div>
            <div class="col-lg-3 form-group form-inline">
                <label class="mr-3 col-lg-5" for="credential_workNumber">Número:</label>
                <input value="224" name="credential[workNumber]" class="form-control col-lg-6" id="credential_workNumber" placeholder="556">
            </div>
        </div>
        <!--end of workStreet, workNumber-->

        <!--workNeighborhood, workPostalCode-->
        <div class="row">
            <div class="col-lg-9 form-group form-inline">
                <label class="mr-3 col-lg-3" for="credential_workNeighborhood">Colonia:</label>
                <input value="Menchaca" name="credential[workNeighborhood]" class="form-control col-lg-8" id="credential_workNeighborhood" placeholder="Carretas">
            </div>
            <div class="col-lg-3 form-group form-inline">
                <label class="mr-3 col-lg-5" for="credential_workPostalCode">CP:</label>
                <input value="760898" name="credential[workPostalCode]" class="form-control col-lg-6" id="credential_workPostalCode" placeholder="76701">
            </div>
        </div>
        <!--end of workNeighborhood, workPostalCode-->

        <!--workPhone-->
        <div class="row">
            <div class="form-group form-inline col-12">
                <label class="mr-3 col-lg-3" for="credential_workPhone">Teléfono de trabajo:</label>
                <input value="4427503657" name="credential[workPhone]" class="form-control col-lg-8" id="credential_workPhone" placeholder="01 442 3231433">
            </div>
        </div>
        <!--end of workPhone-->

        <!--end of personal information-->

        <!--control buttons-->
        <div class="row">
            <div class="col-5"></div>
            <div class="col-2">
                <div class="form-group">
                    <a class="btn btn-outline-secondary mr-0" href="visitants.php">Eliminar usuario</a>
                </div>
            </div>
            <div class="col-5"></div>
        </div>
        <div class="row">
            <!--back button-->
            <div class="col-lg-4">
                <div class="form-group">
                    <a class="btn btn-outline-secondary py-0" href="credentialView.php"><i class="material-icons align-middle">arrow_back</i></a>
                </div>
            </div>
            <!--end of back button-->
            <div class="col-lg-4"></div>
            <!--save button-->
            <div class="col-lg-4">
            </div>

            <!--end of save button-->
        </div>
        <!--end of control buttons-->
        <br>
        <br>
    </form>
</div>
<?php include("partials/_footer.html"); ?>
