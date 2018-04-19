$(document).ready(funcionPrincipal);
function funcionPrincipal()
{
    generate.click(funcGenerate);
    printing.click(printWindow);
}
function printWindow(){
    window.print();

}
/*
$("#download").click(function() {
 	   window.print();
});*/

function funcGenerate(){
    valores = togenerate.val();
    arreglo = valores.split(",");
    impresiones = [];
    i=0;
    while(arreglo.length>i)
    {
        arreglo[i]=arreglo[i].trim();
        i++;
    }
    i=0;
    j=0;
    k=0;
    while(arreglo.length>i)
    {
        arregloAux = arreglo[i].split("-");
        j=0;
        while(arregloAux.length>j)
        {
            arregloAux[j] = arregloAux[j].trim();
            j++;
        }
        j=arregloAux[0];
      
        while(arregloAux[arregloAux.length-1] >= j)
        {
            impresiones[k]=j;
            k++;
            j++;
        }
        i++;
    }
    k=0;
    htmlContainer='';
    while(impresiones.length>k)
    {
        htmlContainer=htmlContainer+'<img class="imagCodigoBarrasPrint" src="https://www.barcodesinc.com/generator/image.php?code='+impresiones[k]+'&style=197&type=C128B&width=89&height=50&xres=1&font=3" alt="Barcode Generator"/>';

        k++;
    }
    container.html(htmlContainer);

}
/*
$('#imgCBBook').attr('src', 'https://barcode.tec-it.com/barcode.ashx?data='+idEjemplar+'&code=Code39FullASCII&multiplebarcodes=false&translate-esc=false&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&qunit=Mm&quiet=0');*/

var container = $('#containerImagesCB');
var generate = $('#genarateCButton');
var printing = $('#printCButton');
var togenerate = $('#cbToGenerate');
var valores;
var htmlContainer;
var arreglo = [];
var arregloAux = [];
var impresiones = [];
