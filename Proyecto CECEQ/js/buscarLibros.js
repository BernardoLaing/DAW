$(document).ready(funcionPrincipal);

function funcionPrincipal()
{
    buscarLibros = $('#buscarLibro');
    buscarLibros.click(funcBuscarLibro);
    clasificacion = $("#clasificacion");
    clasificacion.change(funcSubclasificaciones);
    clasificacionB = $("#clasificacionBusqueda");
    clasificacionB.change(funcSubclasificacionesBusqueda);
}
function funcBuscarLibro(){
    let nombre = $('#book_author');
    let apaterno = $('#book_apaterno');
    let amaterno = $('#book_amaterno');
    let titulo = $('#book_title');
    let categoria = $('#subclasificacionBusqueda');
    $.get("searchBookAjax.php", { name: nombre.val(), apellidop: apaterno.val(), apellidom: amaterno.val(), title: titulo.val() , pagina: pagina, categoria: categoria.val()}, function(data){
         //alert(data);
        $('#respuestaLibros').html(data);
    });
}
function funcSubclasificaciones(){
    let subclasificacion = $("#sclasificacion");
    //alert(clasificacion.val());
    $.get("subCategoriasAjax.php", { categoria: clasificacion.val()}, function(data){
        //alert(data);
        subclasificacion.html(data);
    });
    
}
function funcSubclasificacionesBusqueda(){
    let subclasificacion = $("#subclasificacionBusqueda");
    //alert(clasificacionB.val());
    $.get("subCategoriasAjax.php", { categoria: clasificacionB.val()}, function(data){
        //alert(data);
        subclasificacion.html(data);
    });
    
}

var buscarLibros;
var clasificacion;
var clasificacionB;
var pagina = 20;