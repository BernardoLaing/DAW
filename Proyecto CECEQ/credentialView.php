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
                <label>01/10/2018</label>
            </div>
            <div class="form-group form-inline col-lg-6">
                <label class="mr-3" for="credential_expiration">Fecha de vencimiento:</label>
                <label>01/10/2018</label>
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
                    <label>Jorge Alberto</label>
                </div>
            </div>
            <div class='col-lg-4'>
                <div class='form-group'>
                    <label for="user_paternal">Apellido paterno:</label>
                    <label>Niño</label>
                </div>
            </div>
            <div class='col-lg-4'>
                <div class='form-group'>
                    <label for="user_maternal">Apellido materno:</label>
                    <label>Cabal</label>
                </div>
            </div>
        </div>
        <!--end of paternal, maternal, name-->

        <!--age, email-->
        <div class="row">
            <div class="form-group form-inline col-lg-6">
                <label class="mr-3 col-lg-5" for="credential_birth">Fecha de nacimiento:</label>
                <label>10/04/1997</label>
            </div>
            <div class="form-group form-inline col-lg-6">
                <label class="mr-3 col-lg-3" for="credential_email">E-Mail:</label>
                <label>ninopythonlover@gmail.com</label>
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
                <label>Calle del niño</label>
            </div>
            <div class="col-lg-3 form-group form-inline">
                <label class="mr-3 col-lg-5" for="credential_number">Número:</label>
                <label>404</label>
            </div>
        </div>
        <!--end of street, number-->

        <!--neighborhood, postalcode-->
        <div class="row">
            <div class="col-lg-9 form-group form-inline">
                <label class="mr-3 col-lg-3" for="credential_neighborhood">Colonia:</label>
                <label>Jardín de los niños</label>
            </div>
            <div class="col-lg-3 form-group form-inline">
                <label class="mr-3 col-lg-5" for="credential_postalCode">CP:</label>
                <label>761010</label>
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
                <label>475968304958</label>
            </div>
        </div>
        <!--end of phone-->

        <!--occupation, schooling-->
        <div class="row">
            <div class="col-lg-6 form-group form-inline">
                <label class="mr-3 col-lg-2" for="credential_occupation">Ocupación:</label>
                <label>Estudiante</label>
            </div>
            <div class="col-lg-6 form-group form-inline">
                <label class="mr-3 col-lg-5" for="credential_schooling">Escolaridad:</label>
                <label>Preparatoria</label>
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
                <label>Av. Monasterio</label>
            </div>
            <div class="col-lg-3 form-group form-inline">
                <label class="mr-3 col-lg-5" for="credential_workNumber">Número:</label>
                <label>898</label>
            </div>
        </div>
        <!--end of workStreet, workNumber-->

        <!--workNeighborhood, workPostalCode-->
        <div class="row">
            <div class="col-lg-9 form-group form-inline">
                <label class="mr-3 col-lg-3" for="credential_workNeighborhood">Colonia:</label>
                <label>Del parque</label>
            </div>
            <div class="col-lg-3 form-group form-inline">
                <label class="mr-3 col-lg-5" for="credential_workPostalCode">CP:</label>
                <label>76938</label>
            </div>
        </div>
        <!--end of workNeighborhood, workPostalCode-->

        <!--workPhone-->
        <div class="row">
            <div class="form-group form-inline col-12">
                <label class="mr-3 col-lg-3" for="credential_workPhone">Teléfono de trabajo:</label>
                <label>44287869686</label>
            </div>
        </div>
        <!--end of workPhone-->

        <!--end of personal information-->

        <!--control buttons-->
        <div class="row">
            <div class="col-lg-9"></div>
            <div class="col-lg-3">
                <div class="form-group">
                    <a class="btn btn-outline-secondary" href="credentialEdit.php">Editar</a>
                </div>
            </div>
        </div>
        <div class="row">
            <!--back button-->
            <div class="col-lg-4">
                <div class="form-group">
                    <a class="btn btn-outline-secondary py-0" href="menu.php"><i class="material-icons align-middle">arrow_back</i></a>
                </div>
            </div>
            <!--end of back button-->
            <div class="col-lg-4"></div>
            <!--save button-->
            <div class="col-lg-4">
                <div class="form-group">
                    <a class="btn btn-outline-secondary" href="#">Imprimir credencial</a>
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
