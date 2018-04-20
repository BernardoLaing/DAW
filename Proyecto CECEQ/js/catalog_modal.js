$(document).ready(funcionPrincipal);
function funcionPrincipal()
{
    saveChanges.click(funcSaveChanges);
    editBook.click(funcEditBook);
}
function round(value) {
    return parseInt(value / 100) * 100;
}
function funcSaveChanges(){
    $('#modalCatalogAvisoBody').text('Desea guardar los cambios?');
    $('#modalCatalogAvisoFooter').html('<button type="button" id="modalCatalogAvisoChange" class="btn btn-success">Guardar</button><button type="button" class="btn btn-secondary" id="modalCatalogAvisoDismiss" >No</button>');
    modalAviso.modal('show');
    $('#modalCatalogAvisoDismiss').click(
        function(){
            modalAviso.modal('hide');
    });
    $('#modalCatalogAvisoChange').click(fucSaveChanges2);
}
function fucSaveChanges2(){
    if(($('#book_title_see').val()!='')&&($('#book_isbn_see').val()!='')&&($('#book_shelf_see').val()!='')&&($('#book_vol_see').val()!='')&&($('#book_edicion_see').val()!='')&&($('#book_yeare_see').val()!='')&&($('#book_editorial_see').val()!='')&&($('#book_year_see').val()!='')&&($('#book_colection_see').val()!='')&&($('#book_author_see').val()!='')&&($('#book_clave_see').val()!='')&&($('#estado').val()!='')&&($('#book_adquisition_see').val()!='')&&($('#sclasificacion').val()!= null)){
       $('#modalCatalogAvisoBody').text('campos Completos');
        sendInfoAjax();
    }
    else{
        $('#modalCatalogAvisoBody').text('campos Faltantes');
        $('#modalCatalogAvisoFooter').html('<button type="button" class="btn btn-secondary" id="modalCatalogAvisoDismiss" >Cerrar</button>');
    }
    $('#modalCatalogAvisoDismiss').click(
        function(){
            modalAviso.modal('hide');
    });
}
function sendInfoAjax(){
    alert('filtro 1')
    $.get("editBookAjax.php", {id: idEjemplarChange, titulo: $('#book_title_see').val(), autor1: $('#book_author_see').val(), apellido1: $('#book_apaterno_see').val(),  autor2: $('#book_author2_see').val(), apellido2: $('#book_apaterno2_see').val(), autor3: $('#book_author3_see').val(), apellido3: $('#book_apaterno3_see').val(), isbn: $('#book_isbn_see').val(), estante: $('#book_shelf_see').val(), vol: $('#book_vol_see').val(), edicion: $('#book_edicion_see').val(), aEdicion: $('#book_yeare_see').val(), editorial: $('#book_editorial_see').val(), anio: $('#book_year_see').val(), coleccion: $('#book_colection_see').val(), categoria: $('#sclasificacion').val(), clave: $('#book_clave_see').val(), adquisicion: $('#book_adquisition_see').val(), numC: $('#book_class_see').val(), materias: $('#book_materias_see').val(), estado: $('#estado').val()}, function(data){
           $('#modalCatalogAvisoBody').text(data);
           $('#modalCatalogAvisoFooter').html('<button type="button" class="btn btn-secondary" id="modalCatalogAvisoDismiss" >Cerrar</button>');
        $('#modalCatalogAvisoDismiss').click(
        function(){
            modalAviso.modal('hide');
    });
    });
}

function funcDisableBook(){
    $('#book_title_see').prop( "disabled", true );
    $('#book_isbn_see').prop( "disabled", true );
    $('#book_shelf_see').prop( "disabled", true );
    $('#book_vol_see').prop( "disabled", true );
    $('#book_edicion_see').prop( "disabled", true );
    $('#book_yeare_see').prop( "disabled", true );
    $('#book_editorial_see').prop( "disabled", true );
    $('#book_year_see').prop( "disabled", true );
    $('#book_colection_see').prop( "disabled", true );
    $('#book_author_see').prop( "disabled", true );
    $('#book_apaterno_see').prop( "disabled", true );
    $('#book_author2_see').prop( "disabled", true );
    $('#book_apaterno2_see').prop( "disabled", true );
    $('#book_author3_see').prop( "disabled", true );
    $('#book_apaterno3_see').prop( "disabled", true );
    $('#book_clave_see').prop( "disabled", true );
    $('#estado').prop( "disabled", true );
    $('#book_adquisition_see').prop( "disabled", true );
    $('#book_class_see').prop( "disabled", true );
    $('#book_materias_see').prop( "disabled", true );
    $('#clasificacion').prop( "disabled", true );
    $('#sclasificacion').prop( "disabled", true );

}
function funcEditBook(){
    $('#book_title_see').prop( "disabled", false );
    $('#book_isbn_see').prop( "disabled", false );
    $('#book_shelf_see').prop( "disabled", false );
    $('#book_vol_see').prop( "disabled", false);
    $('#book_edicion_see').prop( "disabled", false );
    $('#book_yeare_see').prop( "disabled", false);
    $('#book_editorial_see').prop( "disabled", false );
    $('#book_year_see').prop( "disabled", false);
    $('#book_colection_see').prop( "disabled", false );
    $('#book_author_see').prop( "disabled", false);
    $('#book_apaterno_see').prop( "disabled", false );
    $('#book_author2_see').prop( "disabled", false );
    $('#book_apaterno2_see').prop( "disabled", false );
    $('#book_author3_see').prop( "disabled", false );
    $('#book_apaterno3_see').prop( "disabled", false );
    $('#book_clave_see').prop( "disabled", false );
    $('#estado').prop( "disabled", false );
    $('#book_adquisition_see').prop( "disabled", false );
    $('#book_class_see').prop( "disabled", false );
    $('#book_materias_see').prop( "disabled", false );
    $('#clasificacion').prop( "disabled", false );
    $('#sclasificacion').prop( "disabled", false );

}
function funcShowInfo( idEjemplar){
    funcDisableBook();
    idEjemplarChange=idEjemplar;
    modal.modal('show');
    $.get("infoBookAjax.php", {id: idEjemplar}, function(data){
        datos = JSON.parse(data);
        $('#titleModalCatalog').html('Info ejemplar '+idEjemplar+': '+datos['libro'].titulo);
        $('#book_title_see').val(datos['libro'].titulo);
        $('#book_isbn_see').val(datos['libro'].isbn);
        $('#book_shelf_see').val(datos['libro'].estante);
        $('#book_vol_see').val(datos['libro'].vol);
        $('#book_edicion_see').val(datos['libro'].edicion);
        $('#book_yeare_see').val(datos['libro'].aEdicion);
        $('#book_editorial_see').val(datos['libro'].editorial);
        $('#book_year_see').val(datos['libro'].anio);
        $('#book_colection_see').val(datos['libro'].coleccion);
        autores = datos['libro'].autores;
        autores = autores.split(',');
        apellidos = datos['libro'].apellidos;
        apellidos = apellidos.split(',');
        $('#book_author_see').val(autores[0]);
        $('#book_apaterno_see').val(apellidos[0]);
        $('#book_author2_see').val(autores[1]);
        $('#book_apaterno2_see').val(apellidos[1]);
        $('#book_author3_see').val(autores[2]);
        $('#book_apaterno3_see').val(apellidos[2]);
        $('#imgCBBook').attr('src', 'https://www.barcodesinc.com/generator/image.php?code='+idEjemplar+'&style=197&type=C128B&width=89&height=50&xres=1&font=3');
        $('#book_clave_see').val(datos['libro'].clave);
        $('#estado').val(datos['libro'].estado);
        $('#book_adquisition_see').val(datos['libro'].adquisicion);
        $('#book_class_see').val(datos['libro'].numC);  
        $('#book_materias_see').val(datos['libro'].materias);
        $('#infoAdicional').html('Libro introducido por '+datos['libro'].usuario+' el '+datos['libro'].fecha);
        $('#clasificacion').val(round(datos['libro'].categoria));
        $.get("subCategoriasAjax.php", { categoria: clasificacion.val()}, function(data){
            //alert(data);
            $('#sclasificacion').html(data);
            $('#sclasificacion').val(datos['libro'].categoria);
        });
    });
}
var autores =[], apellidos=[];
var modal = $('#modalCatalog');
var datos;
var idEjemplarChange = 0;
var saveChanges = $('#saveChangesBook');
var editBook = $('#editBook');
var modalAviso = $('#modalCatalogAviso');
