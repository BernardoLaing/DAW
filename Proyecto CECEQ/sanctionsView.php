<?php include("partials/_header.html"); ?>
<?php include("partials/_top_bar.html"); ?>
<br /><br />
<div class="container shadow">
    <!--header-->
    <div class="row">
        <div class="col-sm-12">
                <div class="text-center">
                    <br>
                    <br>
                    <br>
                    <div class="display-4">Sanción</div>
                    <br>
                </div>
        </div>
    </div>
    <!--end of header-->
    <form>
        <!--name, paternal, maternal-->
        <div class='row'>
            <div class='col-sm-4'>
                <div class='form-group'>
                    <label for="user_name">Nombre(s):</label>
                    <div class="col-md-12">
                        <label>Bernardo</label>
                    </div>
                </div>
            </div>
            <div class='col-sm-4'>
                <div class='form-group'>
                    <label for="user_paternal">Apellido paterno:</label>
                    <div class="col-md-12">
                        <label>Juárez</label>
                    </div>
                </div>
            </div>
            <div class='col-sm-4'>
                <div class='form-group'>
                    <label for="user_maternal">Apellido materno:</label>
                    <div class="col-md-12">
                        <label>Heredia</label>
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
                        <label>10/08/1995</label>
                    </div>
                </div>
            </div>
            <div class='col-sm-4'>
                <div class='form-group'>
                    <label for="user_schooling">Grado de estudio:</label>
                    <label>Universidad</label>
                </div>
            </div>
            <div class='col-sm-4'>
                <div class='form-group'>
                    <label for="user_genre">Género:</label>
                    <label>Masculino</label>
                </div>
            </div>
        </div>
        <!--end of birth, schooling, genre-->

        <!--controls-->
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="col-md-12">
                    <a class="btn btn-outline-secondary py-0" href="sanctions.php"><i class="material-icons align-middle">arrow_back</i></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <div class="col-md-12">
                        <a class="btn btn-outline-secondary mx-auto" id="buscarVisitante" href="sanctions.php">Eliminar sanción</a>
                    </div>
                </div>
            </div>
        </div>
        <!--end of controls-->
    </form>

</div>
<?php include("partials/_footer.html"); ?>
