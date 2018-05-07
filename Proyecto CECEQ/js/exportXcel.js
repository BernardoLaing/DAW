$(document).ready(funcionPrincipal);
function funcionPrincipal()
{
    exportar.click(funcExportarExcel);
}
function funcExportarExcel()
{
    window.open('exportarExcel.php'); 
}
var exportar = $('#exportarCatalogo');