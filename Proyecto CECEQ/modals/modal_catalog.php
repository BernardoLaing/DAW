<div class="modal fade bd-example-modal-lg" id="modalCatalog" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header row">
        <h2 class="modal-title col-md-8" id="titleModalCatalog">Info...</h2>
          <img class="imagCodigoBarras" id="imgCBBook" src="https://www.barcodesinc.com/generator/image.php?code=10&style=197&type=C128B&width=89&height=50&xres=1&font=3"/>
        <button type="button" class="close col-md-2" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class='row'>

            <div class='col-sm-4'>
                <div class='form-group'>
                    <label for="book_title">Título:</label>
                    <div class="col-md-12">
                        <input class="form-control" id="book_title_see" name="book[title]" required size="30" type="text" />
                    </div>
                </div>
            </div>

            <div class='col-sm-4'>
                <div class='form-group'>
                    <label for="book_isbn">ISBN:</label>
                    <div class="col-md-12">
                        <input class="form-control cvalidate cisbn" id="book_isbn_see" name="book[isbn]" required size="30" type="text" />
                    </div>
                </div>
            </div>

            <div class='col-sm-4'>
                <div class='form-group'>
                    <label for="book_shelf">Estante:</label>
                    <div class="col-md-12">
                        <input class="form-control" id="book_shelf_see" name="book[shelf]" required size="30" type="text"/>
                    </div>
                </div>
            </div>

        </div>
        <div class='row'>

            <div class='col-sm-4'>
                <div class='form-group'>
                    <label for="book_vol">Vol:</label>
                    <div class="col-md-12">
                        <input class="form-control" id="book_vol_see" name="book[vol]" required size="30" type="text" />
                    </div>
                </div>
            </div>

            <div class='col-sm-4'>
                <div class='form-group'>
                    <label for="book_edicion">No. de impresión:</label>
                    <div class="col-md-12">
                        <input class="form-control" id="book_edicion_see" name="book[edicion]" required size="30" type="text"/>
                    </div>
                </div>
            </div>

            <div class='col-sm-4'>
                <div class='form-group'>
                    <label for="book_yeare">Año de impresión:</label>
                    <div class="col-md-12">
                        <input class="form-control cvalidate cyear" id="book_yeare_see" name="book[yeare]" required size="30" type="text"/>
                    </div>
                </div>
            </div>

        </div>
        <div class='row'>
            <div class='col-sm-4'>
                <div class='form-group'>
                    <label for="book_editorial">Editorial:</label>
                    <div class="col-md-12">
                        <input class="form-control" id="book_editorial_see" name="book[editorial]" required size="30" type="text" />
                    </div>
                </div>
            </div>
            <div class='col-sm-4 mx-auto'>
                <div class='form-groupr'>
                    <label for="book_year">Año escritura:</label>
                    <div class="col-md-12">
                        <input class="form-control cvalidate cyear" id="book_year_see" name="book[year]" required size="30" type="text"/>
                    </div>
                </div>
            </div>
            <div class='col-sm-4'>
                <div class='form-group'>
                    <label for="book_colection">Colección:</label>
                    <div class="col-md-12">
                        <input class="form-control" id="book_colection_see" name="book[colection]" required size="30" type="text" />
                    </div>
                </div>
            </div>
        </div>
    <?php
    if(true){
    echo ' <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="book_clave">Clave de ingreso:</label>
                    <div class="col-md-12">
                        <input class="form-control cvalidate " required id="book_clave_see" name="book[clave]" size="30" type="text"/>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="book_clave">No. de Adquisición:</label>
                    <div class="col-md-12">
                        <input class="form-control cvalidate " required id="book_adquisition_see" name="book[adquisition]" size="30" type="text" />
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="book_clave">No. classs:</label>
                    <div class="col-md-12">
                        <input class="form-control cvalidate " id="book_class_see" name="book[noClass]" size="30" type="text" />
                    </div>
                </div>
            </div>
      </div>';
    }
      ?>
      <div class='row'>
            <div class='col-sm-4'>
                <div class='form-group'>
                    <label for="book_author">Nombre autor:</label>
                    <div class="col-md-12">
                        <input class="form-control cvalidate cname" id="book_author_see" name="book[author]" required size="30" type="text" />
                    </div>
                </div>
            </div>
            <div class='col-sm-4'>
                <div class='form-group'>
                    <label for="book_apaterno">Apellido:</label>
                    <div class="col-md-12">
                        <input class="form-control cvalidate cname" id="book_apaterno_see" name="book[apaterno]" size="30" type="text"/>
                    </div>
                </div>
            </div>
            <div class='col-sm-4'>
                <div class='form-group'>
                        <label for="estado">Estado:</label>
                        <div class="col-md-12">
                            <select class="form-control cvalidate " name="estado" id="estado" required>
                                <option value="" disabled selected>-- Estado --</option>
                                <option value="1">Prestado</option>
                                <option value="2">Reparación</option>
                                <option value="3">Eliminado</option>
                                <option value="4">Dañado</option>
                                <option value="5">Disponible</option>
                            </select>
                        </div>
                    </div>
            </div>
        </div>
        <div class="collapse" id="espacioAutor2_see">
        <div class="row">
            <div class='col-sm-4'>
                <div class='form-group'>
                    <label for="book_author2">Nombre autor 2:</label>
                    <div class="col-md-12">
                        <input class="form-control cvalidate cname" id="book_author2_see" name="book[author2]" size="30" type="text"/>
                    </div>
                </div>
            </div>

            <div class='col-sm-4'>
                <div class='form-group'>
                    <label for="book_apaterno2">Apellido autor 2:</label>
                    <div class="col-md-12">
                        <input class="form-control cvalidate cname" id="book_apaterno2_see" name="book[apaterno2]" size="30" type="text" />
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class='col-sm-4'>
                <div class='form-group'>
                    <label for="book_author3">Nombre autor 3:</label>
                    <div class="col-md-12">
                        <input class="form-control cvalidate cname" id="book_author3_see" name="book[author3]" size="30" type="text"/>
                    </div>
                </div>
            </div>

            <div class='col-sm-4'>
                <div class='form-group'>
                    <label for="book_apaterno3">Apellido autor 3:</label>
                    <div class="col-md-12">
                        <input class="form-control cvalidate cname" id="book_apaterno3_see" name="book[apaterno3]" size="30" type="text"/>
                    </div>
                </div>
            </div>

        </div>
        </div>
        <a class="btn btn-secondary " href="#espacioAutor2_see" role="button" data-toggle="collapse">Más autores</a>
        <br>
        <br>
        <div class='row'>
            <div class='col-sm-6'>
                    <div class='form-group'>
                        <label for="clasificacion">Clasificación:</label>
                        <div class="col-md-12">
                            <select class="form-control cvalidate " name="clasificacion" id="clasificacion" required>
                                <option value="" disabled selected>-- Clasificación --</option>
                                <option value="0">000 Generalidades</option>
                                <option value="100">100 Filosofía y psicología</option>
                                <option value="200">200 Religión</option>
                                <option value="300">300 Ciencias sociales</option>
                                <option value="400">400 Lenguas</option>
                                <option value="500">500 Ciencias naturales y matemáticas</option>
                                <option value="600">600 Tecnología</option>
                                <option value="700">700 Las artes. Bellas artes y artes decorativas</option>
                                <option value="800">800 Literatura y retórica</option>
                                <option value="900">900 Geografía e historia</option>
                            </select>
                        </div>
                    </div>
                </div>
            <div class='col-sm-6'>
                    <div class='form-group'>
                        <label for="sclasificacion">Subclasificación:</label>
                        <div class="col-md-12">
                            <select class="form-control cvalidate " name="sclasificacion" id="sclasificacion" required>
                                <option value="" disabled selected>-- seleccionar clasificación--</option>
        
                            </select>
                        </div>
                    </div>
                </div>      
      </div>
          <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="materias">Materias:</label>
                    <div class="col-md-12">
                        <input class="form-control cvalidate" id="book_materias_see" name="book[bookmaterias]" size="30" type="text" />
                    </div>
                </div>
            </div>
        </div>
        <div>
        <?php      
          if($_SESSION["permisos"][22])
          {
            echo '<b id="infoAdicional">info adicional</b>';
          }
          ?> 
        </div>
     
      <div class="modal-footer row">
          <?php      
          if($_SESSION["permisos"][22])
          {
            echo '<button type="button" class="btn btn-success col-md-3" id="saveChangesBook">Guardar cambios</button>';
            echo '<button type="button" class="btn btn-secondary col-md-3" id="editBook">Editar ejemplar</button>';
          }
          ?>
          <button type="button" class="btn btn-outline-secondary col-md-2" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php      
if($_SESSION["permisos"][22])
{
    echo '<div class="modal" id="modalCatalogAviso" tabindex="-1" role="dialog"><div class="modal-dialog" role="document"><div class="modal-content">  <div class="modal-header"><h5 class="modal-title">Aviso</h5>  </div>   <div class="modal-body" >    <p id="modalCatalogAvisoBody">Modal body text goes here</p>  </div>  <div id="modalCatalogAvisoFooter" class="modal-footer">    <button type="button" class="btn btn-primary">Save changes</button>    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></div></div></div></div>';
}
    ?>

