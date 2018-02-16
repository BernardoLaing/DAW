<?php include("partials/_header.html"); ?>
<?php include("partials/_top_bar.html"); ?>
<br /><br />
<div class="container shadow">
    <form>
        <div class="row">
            <div class="col-sm-12">
                    <div class="text-center">
                        <div class="display-4">Catálogo de Libros</div>
                    </div>
            </div>
        </div>
        <div class='row'>
            <div class='col-sm-4'>    
                <div class='form-group'>
                    <label for="user_name">Titulo.</label>
                    <div class="col-md-12">
                        <input class="form-control" id="user_name" name="user[name]" size="30" type="text" placeholder="Mara y la cerveza"/>
                    </div>
                </div>
            </div>

            <div class='col-sm-4'>
                <div class='form-group'>
                    <label for="user_paternal">Año.</label>
                    <div class="col-md-12">
                        <input class="form-control" id="user_paternal" name="user[paternal]" required="true" size="30" type="text" placeholder="2017"/>
                    </div>
                </div>
            </div>

            <div class='col-sm-4'>
                <div class='form-group'>
                    <label for="user_maternal">Clasificaciones</label>
                    <div class="col-md-12">
                        <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#clasif">Seleccionar...</button>
                        <div class="modal fade" id="clasif" tabindex="-1" role="dialog" aria-labelledby="clasif" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="clasifTitle">Clasificaciones</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-check">

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" id="generalidades" value="000">
                                                        000 Generalidades. <br/><br/>
                                                    </label>
                                                </div> 
                                                <div class="col-sm-4">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" id="generalidades" value="000">
                                                        100 Filosofía y psicología.
                                                    </label>
                                                </div> 
                                                <div class="col-sm-4">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" id="generalidades" value="000">
                                                        200 Religión.
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" id="generalidades" value="000">
                                                        300 Ciencias sociales. <br/><br/>
                                                    </label>
                                                </div> 
                                                <div class="col-sm-4">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" id="generalidades" value="000">
                                                        400 Lenguas.
                                                    </label>
                                                </div> 
                                                <div class="col-sm-4">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" id="generalidades" value="000">
                                                        500. Ciencias naturales y matemáticas.
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" id="generalidades" value="000">
                                                        600 Tecnología. <br/><br/><br/><br/>
                                                    </label>
                                                </div> 
                                                <div class="col-sm-4">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" id="generalidades" value="000">
                                                        700 Las artes Bellas artes y artes decorativas.
                                                    </label>
                                                </div> 
                                                <div class="col-sm-4">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" id="generalidades" value="000">
                                                        800 Literatura y retórica.
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" id="generalidades" value="000">
                                                            900 Geografía e historia.
                                                        </label>
                                                </div>
                                                <div class="col-sm-6 text-right">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Agregar clasificación...</button>
                                                </div>
                                                
                                            </div>  
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <button type="button" class="btn btn-secondary">Guardar cambios</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            
        <div class='row'>
                <div class='col-sm-4'>
                    <div class='form-group'>
                        <label for="user_age">Autor</label>
                        <div class="col-md-12">
                            <input class="form-control" id="user_age" name="user[age]" required="true" size="30" type="text" placeholder="Laing, Bernardo"/>
                        </div>
                    </div>
                </div>

                <div class='col-sm-4'>
                    <div class='form-group'>
                        <label for="user_grade">Editorial.</label>
                        <div class="col-md-12">
                            <input class="form-control" id="user_grade" name="user[grade]" required="true" size="30" type="text" placeholder="Porrua"/>
                        </div>
                    </div>
                </div>

                <div class='col-sm-4'>
                    <div class='form-group'>
                        <label for="user_ocupation">ISBN.</label>
                        <div class="col-md-12">
                            <input class="form-control" id="user_ocupation" name="user[ocupation]" required="true" size="30" type="text" placeholder="0-7645-26413" />
                        </div>
                    </div>
                </div>
            </div>
        <div class="row">
            <div class="col-sm-12 text-center">
                <div class="form-group">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-secondary mx-auto">Buscar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-sm-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Titulo</th>
                            <th scope="col">Autor</th>
                            <th scope="col">Año</th>
                            <th scope="col">Estante</th>
                            <th scope="col">Editorial</th>
                            <th scope="col">Clasificación</th>
                            <th scope="col">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="edit_book.php">Los Miserables</a></td>
                            <td>Hugo, Victor</td>
                            <td>1998</td>
                            <td>VII-A</td>
                            <td>Porrua</td>
                            <td>80</td>
                            <td>Dañado</td>
                        </tr>
                        <tr>
                            <td>Muestra 1</td>
                            <td>Cuesta, Eduardo</td>
                            <td>1998</td>
                            <td>VII-A</td>
                            <td>Porrua</td>
                            <td>80</td>
                            <td>En reparación</td>
                        </tr>
                        <tr>
                            <td>Muestra 2</td>
                            <td>Laing, Bernardo</td>
                            <td>2018</td>
                            <td>VII-A</td>
                            <td>Porrua</td>
                            <td>65</td>
                            <td>Disponible</td>
                        </tr>
                        <tr>
                            <td>Muestra 3</td>
                            <td>Güemes, Angie</td>
                            <td>2000</td>
                            <td>VII-A</td>
                            <td>Porrua</td>
                            <td>30</td>
                            <td>En prestamo</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="col-md-12">
                        <a class="btn btn-secondary py-0" href="menu.php"><i class="material-icons align-middle">arrow_back</i></a>
        <!--                    <button type="submit" class="btn btn-outline-secondary mx-auto">Iniciar Sesión</button>-->
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 text-right">
                    <div class="form-group">
                        <div class="col-md-12">
                            <a class="btn btn-secondary mx-auto" href="#">Agregar libros desde Excel</a>
            <!--                    <button type="submit" class="btn btn-outline-secondary mx-auto">Iniciar Sesión</button>-->
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 text-right">
                    <div class="form-group">
                        <div class="col-md-12">
                            <a class="btn btn-secondary mx-auto" href="add_book.php">Añadir Libro</a>
            <!--                    <button type="submit" class="btn btn-outline-secondary mx-auto">Iniciar Sesión</button>-->
                        </div>
                    </div>
                </div>
        </div>
    </form>
</div>

<?php include("partials/_footer.html"); ?>