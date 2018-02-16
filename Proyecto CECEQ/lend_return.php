<?php include("partials/_header.html"); ?> <!--Acaba en la primera etiqueta body-->
<?php include("partials/_top_bar.html");?>  <!--Es la etiqueta Nav-->
<br><br>
<div class="container shadow">
  <!--Titulo de intent-->
  <div class="container">
    <div class="row text-center">
        <div class="col-sm-12 mx-auto">
          <br>
            <div class="display-3">Préstamo & Devolución</div>
        </div>
    </div>
  </div>
  <!--ID USUARIO--> <br>
  <div class="row">
    <div class="col-sm-4"></div> <!--NADA-->
    <div class='col-sm-4'>
        <div class='form-group'>
            <label for="user_ocupation">Id. Credencial</label>
            <input class="form-control" id="user_ocupation" name="user[ocupation]" required="false" size="30" type="number" />
        </div>
    </div>
    <div class="col-sm-4"></div> <!--NADA-->
  </div>
  <!--ID LIBROS--><br>
  <div class="row">
      <div class="col-sm-4"></div> <!--NADA-->
      <div class='col-sm-4'>
          <div class='form-group'>
              <label for="user_ocupation">Código de Libro</label>
              <input class="form-control" id="user_ocupation" name="user[ocupation]" required="false" size="30" type="text" />
          </div>
      </div>
      <div class="col-sm-1"> <!--BOTON MAS -->
        <br><button class="btn btn-secondary mx-auto my-auto py-2 add-book" id="addBook" href="#"><i class="material-icons">add</i></button>
      </div> <!--NADA-->
      <div class="col-sm-4"></div> <!--NADA-->
  </div>
    <div class="row book-input" id="">
      <div class="col-sm-4"></div> <!--NADA-->
      <div class='col-sm-4'>
          <div class='form-group'>
              <label for="user_ocupation">Código de Libro</label>
              <input class="form-control" id="user_ocupation" name="user[ocupation]" required="false" size="30" type="text" />
          </div>
      </div>
  </div>
    <div class="row book-input" id="">
      <div class="col-sm-4"></div> <!--NADA-->
      <div class='col-sm-4'>
          <div class='form-group'>
              <label for="user_ocupation">Código de Libro</label>
              <input class="form-control" id="user_ocupation" name="user[ocupation]" required="false" size="30" type="text" />
          </div>
      </div>
  </div>
  <!--BOTONES--><br>
  <div class="row">
    <div class="col-sm-4 col-md-3">
      <a class="btn btn-secondary py-0" href="menu.php"><i class="material-icons align-middle">arrow_back</i></a>
    </div>
    <div class="col-sm-4 col-md-3">
      <div class='form-group'>
          <div class="text-center">
              <button type="button" name="button" class="btn btn-secondary mx-auto">Préstamo</button>
          </div>
      </div>
    </div>
    <div class="col-sm-4 col-md-3">
      <div class="text-center">
          <button type="button" name="button" class="btn btn-secondary mx-auto">Devolución</button>
      </div>
    </div>
    </div>
    <br>
  </div>
  <br>



<?php include("partials/_footer.html"); ?> <!--Empieza en los scripts-->
