$(document).ready(funcionPrincipal);
function funcionPrincipal()
{
    exportar.click(funcExportarExcel);
}
function funcExportarExcel()
{
    $.get("exportarExcel.php");
    alert("Exportado!");
}
var exportar = $('#exportarCatalogo');