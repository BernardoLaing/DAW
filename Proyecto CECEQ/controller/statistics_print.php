<?php
header("Content-Type: application/vnd.ms-excel");
/*if($_GET["year"] == "null")
    $year = date('Y');
else
    $year = $_GET["year"];

if($_GET["month"] == "null")
    $month = date('m');
else
    $month = $_GET["month"];*/

$filename = "estadisticas.xls";

echo "Estadisticas  \n";
//echo "Fecha: " . $month . "/" . $year . "\n";
//echo "Usuarios atendidos" . "\n";
//echo "Ninos" . "\t" . "Jovenes" . "\t" . "Adultos" . "\n";
echo $_GET['ninos'];// . "\t" . $_GET['jovenes'] . "\t" . $_GET['adultos'] . "\n" . "\n";

//echo "Servicio de Prestamo" . "\n";
//echo "Credenciales Expedidas" . "\t" . "Libros Prestados" . "\n";
//echo $_GET['credenciales'] . "\t" . $_GET['libros'] . "\n";
header("Content-disposition: attachment; filename=" . $filename);
?>