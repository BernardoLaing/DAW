<?php include("partials/_header.html"); ?>
<?php include("partials/_top_bar.html"); ?>
<br /><br />
<div class="container shadow">
    <div class="row">
        <div class="col-sm-12">
                <div class="text-center">
                    <div class="display-4">Editar Ejemplar</div>
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
                        <input class="form-control" id="book_title" name="book[title]" size="30" type="text" value="Los Miserables" />
                    </div>
                </div>
            </div>

            <div class='col-sm-4'>
                <div class='form-group'>
                    <label for="book_isbn">ISBN.</label>
                    <div class="col-md-12">
                        <input class="form-control" id="book_isbn" name="book[isbn]" required="true" size="30" type="text" value="0-7645-26413"/>
                    </div>
                </div>
            </div>

            <div class='col-sm-4'>
                <div class='form-group'>
                    <label for="book_shelf">Estante.</label>
                    <div class="col-md-12">
                        <input class="form-control" id="book_shelf" name="book[shelf]" required="true" size="30" type="text" value="VII-A"/>
                    </div>
                </div>
            </div>
            
        </div>
        
        <div class='row'>

            <div class='col-sm-4'>
                <div class='form-group'>
                    <label for="book_author">Autor.</label>
                    <div class="col-md-12">
                        <input class="form-control" id="book_author" name="book[author]" required="true" size="30" type="text" value="Hugo, Victor"/>
                    </div>
                </div>
            </div>

            <div class='col-sm-4'>
                <div class='form-group'>
                    <label for="book_editorial">Editorial.</label>
                    <div class="col-md-12">
                        <input class="form-control" id="book_editorial" name="book[editorial]" required="true" size="30" type="text" value="Porrua"/>
                    </div>
                </div>
            </div>

            <div class='col-sm-4'>
                <div class='form-group'>
                    <label for="book_clasif">Clasificación.</label>
                    <div class="col-md-12">
                        <input class="form-control" id="book_clasif" name="book[clasif]" required="true" size="30" type="text" value="80" />
                    </div>
                </div>
            </div>

        </div>
        <div class='row'>

            <div class='col-sm-4 mx-auto'>
                <div class='form-group'>
                    <label for="book_year">Año.</label>
                    <div class="col-md-12">
                        <input class="form-control" id="book_year" name="book[year]" required="true" size="30" type="text" value="1998"/>
                    </div>
                </div>
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
                        <a class="btn btn-secondary" href="catalog.php">Eliminar ejemplar</a>
        <!--                    <button type="submit" class="btn btn-outline-secondary mx-auto">Iniciar Sesión</button>-->
                    </div>
                </div>
            </div>

            <div class="col-sm-4 text-right">
                <div class="form-group">
                    <div class="col-md-12">
                    <a class="btn btn-secondary" href="catalog.php">Guardar cambios</a>
                        <!--<button type="submit" class="btn btn-outline-secondary mx-auto">Guardar cambios</button>-->
                    </div>
                </div>
            </div>
            

        </div>

    </form>

</div>
<?php include("partials/_footer.html"); ?>