<?php
header("Content-Type: application/vnd.ms-excel");

if($_GET["year"] == "null")
    $year = date('Y');
else
    $year = $_GET["year"];

if($_GET["month"] == "null")
    $month = date('m');
else
    $month = $_GET["month"];

$filename = "reportedgb_" . $month . "_" . $year . ".xls";

echo "REPORTE DGB \n";
echo "Fecha: " . $month . "/" . $year . "\n";

echo "\n"."Usuarios atendidos" . "\n";
echo utf8_decode("Niños" . "\t" . "Jovenes" . "\t" . "Adultos" . "\n");
echo $_GET['ninos'] . "\t" . $_GET['jovenes'] . "\t" . $_GET['adultos'] . "\n" . "\n";

echo utf8_decode("\n"."Servicio de préstamo a domicilio" . "\n");
echo "Credenciales Expedidas" . "\t" . "Libros Prestados" . "\n";
echo $_GET['credenciales'] . "\t" . $_GET['libros'] . "\n";

echo utf8_decode("\n"."Automatización " . "\n");
echo "Libros capturados" . "\t" . "Porcentaje" . "\n";
echo $_GET['libros_capturados'] . "\t" . $_GET['porcentaje'] . "\n";

header("Content-disposition: attachment; filename=" . $filename);
?>
