<?php
header("Content-Type: application/vnd.ms-excel");
require_once('model/catalog_books_utils.php');

$filename = "exportsCatalog.xls";
header("Content-disposition: attachment; filename=" . $filename);
$results = buscarGeneralExport();
while($row = mysqli_fetch_assoc($results)){
   $imprimir = $row['Autores']. "\t". $row['Titulo']. "\t" .$row['Anio titulo']. "\t". $row['Estante']. "\t" .$row['Editorial']. "\t" .$row['Estado']. "\t" .$row['Categoria']. "\t".$row['idEjemplar']. "\t" .$row['ISBN']. "\t" .$row['Volumen']. "\t". $row['Impresion']. "\t" .$row['Anio impresion']. "\t" .$row['Coleccion']. "\t" .$row['Clave Ingreso']. "\t" .$row['Fecha Ingreso']. "\t" .$row['idUsuario']. "\t" .$row['Adquisicion']. "\t" .$row['numClasificacion']. "\t" .$row['Materias']. "\n";
    echo $imprimir;
}

?>
