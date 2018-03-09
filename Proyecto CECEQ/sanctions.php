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
                    <div class="display-4">Usuarios sancionados</div>
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
                        <input class="form-control cvalidate cname" id="user_name" name="user[name]" size="30" type="text" placeholder="Eduardo"/>
                    </div>
                </div>
            </div>
            <div class='col-sm-4'>
                <div class='form-group'>
                    <label for="user_paternal">Apellido paterno:</label>
                    <div class="col-md-12">
                        <input class="form-control cvalidate cname" id="user_paternal" name="user[paternal]" size="30" type="text" placeholder="Cuesta"/>
                    </div>
                </div>
            </div>
            <div class='col-sm-4'>
                <div class='form-group'>
                    <label for="user_maternal">Apellido materno:</label>
                    <div class="col-md-12">
                        <input class="form-control" id="user_maternal" name="user[maternal]" size="30" type="text" placeholder="Córdova"/>
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
                        <input class="form-control cvalidate cdate" id="user_age" name="user[birth]" size="30" type="date"/>
                    </div>
                </div>
            </div>
            <div class='col-sm-4'>
                <div class='form-group'>
                    <label for="user_schooling">Grado de estudio:</label>
                    <select name="user[schooling]" class="form-control cvalidate cschooling" id="user_schooling">
                        <option value="" disabled selected>...</option>
                        <option value="1">Ninguno</option>
                        <option value="2">Preescolar</option>
                        <option value="3">Primaria</option>
                        <option value="4">Secundaria</option>
                        <option value="5">Preparatoria</option>
                        <option value="6">Universidad</option>
                        <option value="7">Maestría</option>
                        <option value="8">Doctorado</option>
                        <option value="9">Postdoctorado</option>
                    </select>
                </div>
            </div>
            <div class='col-sm-4'>
                <div class='form-group'>
                    <label for="user_genre">Género:</label>
                    <select name="user[genere]" class="form-control cvalidate cgender" id="user_genre">
                        <option value="" disabled selected>...</option>
                        <option value="H>Masculino</option>
                        <option value="M">Femenino</option>
                        <option value="O">Otro</option>
                    </select>
                </div>
            </div>
        </div>
        <!--end of birth, schooling, genre-->
        <!--search button-->
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    <div class="col-lg-12">
                        <input type="submit" class="btn btn-secondary btn-block csearch" value="Buscar sanciones">
                    </div>
                </div>
            </div>
        </div>
        <!--search button-->


        <div class="row text-center">
            <div class="col-sm-12">
                <table class="table table-hover" id="sanctionTable">
                    <thead>
                        <tr>
                            <td>
                                a
                            </td>
                            <td>
                                b
                            </td>
                            <td>
                                c
                            </td>
                            <td>
                                d
                            </td>
                        </tr>
                    </thead>
                        <?php
                        for($i=0;$i<5;$i++){
                            echo "<tr>";
                            for($j=0;$j<4;$j++){
                                echo "<td>".$j."</td>";
                            }
                            echo "<tr>";
                        }
                        ?>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>


        <!--controls-->
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <div class="col-md-12">
                    <a class="btn btn-secondary py-0" href="menu.php"><i class="material-icons align-middle">arrow_back</i></a>
                    </div>
                </div>
            </div>
                <div class="col-sm-3">
                <div class="form-group">
                    <div class="col-md-12">
                    </div>
                </div>
            </div>
        </div>
        <!--end of controls-->
    </form>

</div>
<?php include("partials/_footer.html"); ?>
