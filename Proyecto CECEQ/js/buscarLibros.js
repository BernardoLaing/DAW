$(document).ready(funcionPrincipal);

function funcionPrincipal()
{
    buscarLibros = $('#buscarLibro');
    buscarLibros.click(funcBusquedaInicial);
    clasificacion = $("#clasificacion");
    clasificacion.change(funcSubclasificaciones);
    clasificacionB = $("#clasificacionBusqueda");
    clasificacionB.change(funcSubclasificacionesBusqueda);
    libroAnterior.click(funcLibroAnterior);
    libroSiguiente.click(funcLibroSiguiente);
    numeroResultadosBusqueda.change(funcPaginacion);
}
function funcBusquedaInicial(){
    pagina=paginacion;
    funcBuscarLibro();
}
function funcPaginacion(){
    //alert('cambia paginacion');
    paginacion=Number(numeroResultadosBusqueda.val());
    funcBusquedaInicial();
}
function funcBuscarLibro(){
    var nombre = $('#book_author');
    var apaterno = $('#book_apaterno');
    var amaterno = $('#book_amaterno');
    var titulo = $('#book_title');
    var categoria = $('#subclasificacionBusqueda');
    $.get("searchBookAjax.php", { name: nombre.val(), apellidop: apaterno.val(), apellidom: amaterno.val(), title: titulo.val() , paginacion: paginacion, pagina: pagina, categoria: categoria.val()}, function(data){
         //alert(data);
        $('#respuestaLibros').html(data);
        funcVerificarPaginacion();
    });
}
function funcVerificarPaginacion(){
    if(($('#respuestaLibros').html()=="")&&(pagina!=paginacion)){
        alert("No hay más resultados");
        funcLibroAnterior();
    }
    else if($('#respuestaLibros').html()==""){
        alert("No hay resultados");
    }
}
function funcSubclasificaciones(){
    var subclasificacion = $("#sclasificacion");
    //alert(clasificacion.val());
    $.get("subCategoriasAjax.php", { categoria: clasificacion.val()}, function(data){
        //alert(data);
        subclasificacion.html(data);
    });

}
function funcSubclasificacionesBusqueda(){
    var subclasificacion = $("#subclasificacionBusqueda");
    //alert(clasificacionB.val());
    $.get("subCategoriasAjax.php", { categoria: clasificacionB.val()}, function(data){
        //alert(data);
        subclasificacion.html(data);
    });

}
function funcLibroAnterior(){
    if(pagina>paginacion){
        pagina=pagina-paginacion;
    }
    funcBuscarLibro();
}
function funcLibroSiguiente(){
    if($('#respuestaLibros').html()!=""){
        pagina=pagina+paginacion;
    }
    funcBuscarLibro();
}

var buscarLibros;
var clasificacion;
var clasificacionB;
var libroAnterior = $('#buscarLibroAnterior');
var libroSiguiente = $('#buscarLibroSiguiente');
var paginacion = 10;
var pagina = paginacion;
var numeroResultadosBusqueda = $('#numeroResultadosBusqueda');
