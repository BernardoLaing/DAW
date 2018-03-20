$(document).ready(funcionPrincipal);

function funcionPrincipal()
{
    buscarLibros = $('#buscarLibro');
    buscarLibros.click(funcBuscarLibro);
}
function funcBuscarLibro(){
    let nombre = $('#book_author');
    let apaterno = $('#book_apaterno');
    let amaterno = $('#book_amaterno');
    let titulo = $('#book_title');
    let categoria = $('#clasificacionBusqueda');
    $.get("searchBookAjax.php", { name: nombre.val(), apellidop: apaterno.val(), apellidom: amaterno.val(), title: titulo.val() , pagina: pagina, categoria: categoria.val()}, function(data){
         //alert(data);
        $('#respuestaLibros').html(data);
    });
}

var buscarLibros;
var pagina = 20;