<?php include("partials/_header.html"); ?>
<?php include("partials/_top_bar.html"); ?>
<br /><br />
<div class="container shadow">
    <div class="row">
        <div class="col-sm-12">
                <div class="text-center">
                    <div class="display-4">Agregar Libro</div>
                </div>
        </div>
    </div>
    <br/><br/><br/><br/>

    <form>
        <div class='row'>

            <div class='col-sm-4'>    
                <div class='form-group'>
                    <label for="book_title">Title.</label>
                    <div class="col-md-12">
                        <input class="form-control" id="book_title" name="book[title]" required size="30" type="text" placeholder="Los Miserables" />
                    </div>
                </div>
            </div>

            <div class='col-sm-4'>
                <div class='form-group'>
                    <label for="book_isbn">ISBN.</label>
                    <div class="col-md-12">
                        <input class="form-control" id="book_isbn" name="book[isbn]" required="true" size="30" type="text" placeholder="0-7645-26413" />
                    </div>
                </div>
            </div>

            <div class='col-sm-4'>
                <div class='form-group'>
                    <label for="book_shelf">Estante.</label>
                    <div class="col-md-12">
                        <input class="form-control" id="book_shelf" name="book[shelf]" required="true" size="30" type="text" placeholder="VII-A"/>
                    </div>
                </div>
            </div>
            
        </div>
        
        <div class='row'>

            <div class='col-sm-4'>
                <div class='form-group'>
                    <label for="book_author">Autor.</label>
                    <div class="col-md-12">
                        <input class="form-control" id="book_author" name="book[author]" required="true" size="30" type="text" placeholder="Hugo, Victor"/>
                    </div>
                </div>
            </div>

            <div class='col-sm-4'>
                <div class='form-group'>
                    <label for="book_editorial">Editorial.</label>
                    <div class="col-md-12">
                        <input class="form-control" id="book_editorial" name="book[editorial]" required="true" size="30" type="text" placeholder="Editorial"/>
                    </div>
                </div>
            </div>

            <div class='col-sm-4 mx-auto'>
                <div class='form-groupr'>
                    <label for="book_year">Año.</label>
                    <div class="col-md-12">
                        <input class="form-control" id="book_year" name="book[year]" required="true" size="30" type="text" placeholder="1998"/>
                    </div>
                </div>
            </div>
        </div>
        <div class='row'>
            <div class='col-sm-5'>
                    <div class='form-group'>
                        <label for="clasificacion">Clasificación</label>
                        <div class="col-md-12">
                            <select class="form-control" name="clasificacion">
                            <option value="" disabled selected>-- Clasificación --</option>
                                <option value="generalidades">000 Generalidades</option>
                                <option value="filosofia">100 Filosofía y psicología</option>
                                <option value="religion">200 Religión</option>
                                <option value="cienciassoc">300 Ciencias sociales</option>
                                <option value="lenguas">400 Lenguas</option>
                                <option value="cienciasnat">500 Ciencias naturales y matemáticas</option>
                                <option value="tecno">600 Tecnología</option>
                                <option value="artes">700 Las artes. Bellas artes y artes decorativas</option>
                                <option value="literatura">800 Literatura y retórica</option>
                                <option value="geografia">900 Geografía e historia</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class='col-sm-5'>
                    <div class='form-group'>
                        <label for="clasificacion">Subclasificación</label>
                        <div class="col-md-12">
                            <select class="form-control" name="clasificacion">
                            <option value="" disabled selected>-- Subclasificación --</option>
                                <option value="generalidades">000 Generalidades</option>
                                <option value="filosofia">100 Filosofía y psicología</option>
                                <option value="religion">200 Religión</option>
                                <option value="cienciassoc">300 Ciencias sociales</option>
                                <option value="lenguas">400 Lenguas</option>
                                <option value="cienciasnat">500 Ciencias naturales y matemáticas</option>
                                <option value="tecno">600 Tecnología</option>
                                <option value="artes">700 Las artes. Bellas artes y artes decorativas</option>
                                <option value="literatura">800 Literatura y retórica</option>
                                <option value="geografia">900 Geografía e historia</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2 py-auto"><br>
                        <a class="btn btn-secondary mx-auto my-auto py-2" href="#"><i class="material-icons">add</i></a>
            <!--                    <button type="submit" class="btn btn-outline-secondary mx-auto">Iniciar Sesión</button>-->
                </div>
        </div>

        <div class="row">

            <div class="col-sm-6">
                <div class="form-group">
                    <div class="col-md-12">
                    <a class="btn btn-secondary py-0" href="menu.php"><i class="material-icons align-middle">arrow_back</i></a>
    <!--                    <button type="submit" class="btn btn-outline-secondary mx-auto">Iniciar Sesión</button>-->
                    </div>
                </div>
            </div>

            <div class="col-sm-6 text-right">
                <div class="form-group">
                    <div class="col-md-12">
                        <a class="btn btn-secondary" href="catalog.php">Agregar libro</a>
                        <!--<button type="submit" class="btn btn-secondary mx-auto">Agregar Libro</button>-->
                    </div>
                </div>
            </div>

        </div>

    </form>

</div>
<?php include("partials/_footer.html"); ?>