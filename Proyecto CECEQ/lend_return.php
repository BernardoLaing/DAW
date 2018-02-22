<?php include("partials/_header.html"); ?> <!--Acaba en la primera etiqueta body-->
<?php include("partials/_top_bar.html");?>  <!--Es la etiqueta Nav-->
<?php include("_lend_return.html"); ?> <!--Empieza en los scripts-->
<?php include("partials/_footer.html"); ?> <!--Empieza en los scripts-->


<?php
  $idCredencial = isset($_POST["user"]["credencial"]) && is_numeric($_POST["user"]["credencial"]);
  $idLibroUno = isset($_POST["user"]["number"]) && is_numeric($_POST["user"]["number"]);
  $idLibroDos =  isset($_POST["user"]["number"]) && is_numeric($_POST["user"]["number"]);
  $idLibroTres = isset($_POST["user"]["number"]) && is_numeric($_POST["user"]["number"]);
  echo $idCredencial;


 ?>
