$(document).ready(funcionPrincipal);
function funcionPrincipal()
{
    saveChanges.click(funcSaveChanges);
    delateBook.click(funcDelateBook);
    editBook.click(funcEditBook);
}
function round(value) {
    return parseInt(value / 100) * 100;
}
function funcSaveChanges(){
    alert('guardando cambios');
}
function funcDelateBook(){
    alert('eliminar ejemplar');
}
function funcEditBook(){
    alert('Editar');
    /*
    $('#book_title_see');
    $('#book_isbn_see');
    $('#book_shelf_see');
    $('#book_vol_see');
    $('#book_edicion_see');
    $('#book_yeare_see');
    $('#book_editorial_see');
    $('#book_year_see');
    $('#book_colection_see');
    $('#book_author_see');
    $('#book_apaterno_see');
    $('#book_author2_see');
    $('#book_apaterno2_see');
    $('#book_author3_see');
    $('#book_apaterno3_see');
    $('#book_clave_see');
    $('#book_adquisition_see');
    $('#book_class_see');  
    $('#book_materias_see');
    $('#clasificacion');
    $('#sclasificacion');*/

}
function funcShowInfo( idEjemplar){
    modal.modal('show');
    $.get("infoBookAjax.php", {id: idEjemplar}, function(data){
        datos = JSON.parse(data);
        $('#titleModalCatalog').html('Info ejemplar '+idEjemplar);
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
        $('#imgCBBook').attr('src', 'https://barcode.tec-it.com/barcode.ashx?data='+idEjemplar+'&code=Code39FullASCII&multiplebarcodes=false&translate-esc=false&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&qunit=Mm&quiet=0');
        $('#book_clave_see').val(datos['libro'].clave);
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
var saveChanges = $('#saveChangesBook');
var delateBook = $('#delateBook');
var editBook = $('#editBook');
