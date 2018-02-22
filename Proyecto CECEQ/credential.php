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

    <form class="container">
        <!--dates-->
        <div class="row">
            <div class="form-group col-sm-12  col-md-4">
                <label class="mr-3" for="credential_issuance">Fecha de expedición:</label>
                <input name="credential[issuance]" type="date" class="form-control" id="credential_issuance">
            </div>
            <div class="form-group col-sm-12 col-md-4 offset-md-2">
                <label class="mr-3" for="credential_expiration">Fecha de vencimiento:</label>
                <input name="credential[expiration]" type="date" class="form-control" id="credential_expiration">
            </div>
        </div>
        <!--end of dates-->


        <!--personal information-->
        <div class="row">
            <div class="mt-5 mb-3 col-sm-12 text-center">Información personal:</div>
        </div>

        <!--paternal, maternal, name-->
        <div class='form-row'>
            <div class='col-sm-12 col-md-4'>
                <div class='form-group'>
                    <label for="user_name">Nombre(s):</label>
                    <input name="credential[name]" class="form-control" id="credential_name" size="30" type="text" />
                </div>
            </div>
            <div class='col-sm-12 col-md-4'>
                <div class='form-group'>
                    <label for="user_paternal">Apellido paterno:</label>
                    <input name="credential[paternal]" class="form-control" id="credential_paternal" size="30" type="text" />
                </div>
            </div>
            <div class='col-sm-12 col-md-4'>
                <div class='form-group'>
                    <label for="user_maternal">Apellido materno:</label>
                    <input name="credential[maternal]" class="form-control" id="credential_maternal" size="30" type="text" />
                </div>
            </div>
        </div>
        <!--end of paternal, maternal, name-->

        <!--birth, email-->
        <div class="form-row">
            <div class="form-group col-sm-12 col-md-6">
                <label for="credential_birth">Fecha de nacimiento:</label>
                <input name="credential[birth]" class="form-control" id="credential_birth" placeholder="1997-05-09">
            </div>
            <div class="form-group col-sm-12 col-md-6">
                <label for="credential_email">E-Mail:</label>
                <input name="credential[email]" class="form-control" type="email" id="credential_email" placeholder="ejemplo@gmail.com">
            </div>
        </div>
        <!--end of birth, email-->

        <!--domicilio (subsection)-->
        <div class="form-row">
            <div class="col-12 mt-4 mb-3">
                Domicilio
            </div>
        </div>

        <!--street, number-->
        <div class="form-row">
            <div class="col-sm-12 col-md-6 form-group ">
                <label for="credential_neighborhood">Colonia:</label>
                <input name="credential[neighborhood]" class="form-control" id="credential_neighborhood" placeholder="Centro">
            </div>
            <div class="col-sm-12 col-md-6 form-group">
                <label for="credential_street">Calle:</label>
                <input name="credential[street]" class="form-control" id="credential_street" placeholder="Felipe Ángeles">
            </div>
        </div>
        <!--end of street, number-->

        <!--street number, postalcode, phone-->
        <div class="form-row">
            <div class="col-sm-12 col-md-3 form-group ">
                <label for="credential_number">Número:</label>
                <input name="credential[number]" class="form-control" id="credential_number" placeholder="302">
            </div>
            <div class="col-sm-12 col-md-3 form-group ">
                <label for="credential_postalCode">CP:</label>
                <input name="credential[postalCode]" class="form-control" id="credential_postalCode" placeholder="76504">
            </div>
            <div class="form-group  col-sm-12 col-md-6">
                <label for="credential_phone">Teléfono:</label>
                <input name="credential[phone]" class="form-control" id="credential_phone" placeholder="01 442 3231433">
            </div>
        </div>
        <!--end of neighborhood, postalcode, phone-->

        <!--separator-->
        <div class="form-row">
            <div class="col-12 mt-4 mb-3"></div>
        </div>
        <!--end of separator-->

        <!--end of phone-->

        <!--occupation, schooling-->
        <div class="form-row">
            <div class="col-sm-12 col-md-4 form-group ">
                <label for="credential_occupation">Ocupación:</label>
                <input name="credential[occupation]" class="form-control" id="credential_occupation" placeholder="Obrero">
            </div>
            <div class="col-sm-12 col-md-4 offset-md-2 form-group ">
                <label class="mr-3 col-lg-5" for="credential_schooling">Escolaridad:</label>
                <select name="user[schooling]" class="form-control" id="user_schooling">
                    <option value="" disabled selected>...</option>
                    <option value="NINGUNO">Ninguno</option>
                    <option value="PREESCOLAR">Preescolar</option>
                    <option value="PRIMARIA">Primaria</option>
                    <option value="SECUNDARIA">Secundaria</option>
                    <option value="PREPARATORIA">Preparatoria</option>
                    <option value="UNIVERSIDAD">Universidad</option>
                    <option value="MAESTRIA">Maestría</option>
                    <option value="DOCTORADO">Doctorado</option>
                </select>
            </div>
        </div>
        <!--end of occupation, schooling-->

        <!--workaddress (subsection)-->
        <div class="form-row">
            <div class="col-12 mt-4 mb-3">
                Trabajo/Escuela
            </div>
        </div>

        <!--workStreet, workNumber-->
        <div class="form-row">
            <div class="col-lg-9 form-group ">
                <label class="mr-3 col-lg-3" for="credential_workStreet">Calle:</label>
                <input name="credential[workStreet]" class="form-control col-lg-8" id="credential_workStreet" placeholder="Av. Monasterio">
            </div>
            <div class="col-lg-3 form-group ">
                <label class="mr-3 col-lg-5" for="credential_workNumber">Número:</label>
                <input name="credential[workNumber]" class="form-control col-lg-6" id="credential_workNumber" placeholder="556">
            </div>
        </div>
        <!--end of workStreet, workNumber-->

        <!--workNeighborhood, workPostalCode-->
        <div class="form-row">
            <div class="col-lg-9 form-group ">
                <label class="mr-3 col-lg-3" for="credential_workNeighborhood">Colonia:</label>
                <input name="credential[workNeighborhood]" class="form-control col-lg-8" id="credential_workNeighborhood" placeholder="Carretas">
            </div>
            <div class="col-lg-3 form-group ">
                <label class="mr-3 col-lg-5" for="credential_workPostalCode">CP:</label>
                <input name="credential[workPostalCode]" class="form-control col-lg-6" id="credential_workPostalCode" placeholder="76701">
            </div>
        </div>
        <!--end of workNeighborhood, workPostalCode-->

        <!--workPhone-->
        <div class="form-row">
            <div class="form-group  col-12">
                <label class="mr-3 col-lg-3" for="credential_workPhone">Teléfono de trabajo:</label>
                <input name="credential[workPhone]" class="form-control col-lg-8" id="credential_workPhone" placeholder="01 442 3231433">
            </div>
        </div>
        <!--end of workPhone-->

        <!--end of personal information-->

        <!--control buttons-->
        <div class="form-row">
            <!--back button-->
            <div class="col-lg-4">
                <div class="form-group">
                    <a class="btn btn-secondary py-0" href="menu.php"><i class="material-icons align-middle">arrow_back</i></a>
                </div>
            </div>
            <!--end of back button-->
            <div class="col-lg-4"></div>
            <!--save button-->
            <div class="col-lg-4">
                <div class="form-group">
                    <a class="btn btn-secondary" href="#">Tramitar credencial</a>
                </div>
            </div>

            <!--end of save button-->
        </div>
        <!--end of control buttons-->
        <br>
        <br>
    </form>
</div>
<?php include("partials/_footer.html"); ?>
