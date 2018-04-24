<?php
include("utils.php");
header("Content-Type: application/vnd.ms-excel");


function buscarGeneralLike($nombre, $apellidoPaterno, $apellidoMaterno, $titulo, $categoria) /****/
{
    $connection = connect();
    $statement = mysqli_prepare($connection,"
    select GROUP_CONCAT(a.nombre,' ', apellidoPaterno SEPARATOR ', ') AS autoresApellidos, titulo, t.year, estante, editorial, es.nombre, c.nombre AS nombreC, e.idEjemplar
    from autor a, titulo t, titulo_autor ta, ejemplar e, ejemplar_estado ee, estado es, titulo_categoria tc, categoria c
    where (a.nombre LIKE ? ".($nombre==""?"or 1":"").")
    and (apellidoPaterno = ? ".($apellidoPaterno==""?"or 1":"").")
    and (apellidoMaterno = ? ".($apellidoMaterno==""?"or 1":"").")
    and a.idAutor=ta.idAutor
    and t.idTitulo=ta.idTitulo
    and (t.titulo LIKE ? ".($titulo==""?"or 1":"").")
    and t.idTitulo = e.idTitulo
    and ee.idEjemplar=e.idEjemplar
    and ee.idEstado=es.idEstado
    and es.idEstado<>3
    and t.idTitulo=tc.idTitulo
    and tc.idCategoria=c.idCategoria
    and (c.idCategoria = ? ".($categoria==""?"or 1":"").")
    GROUP BY e.idEjemplar;
    ");
    $statement->bind_param("ssssi", $nombre, $apellidoPaterno, $apellidoMaterno, $titulo, $categoria);
    $statement->execute();
    $result = $statement->get_result();
    disconnect($connection);
    return $result;

}

function exportBooks($result){
    if(mysqli_num_rows($result)>0){
        $fieldNumber = mysqli_num_fields($result);
        for($i = 0; $i < $fieldNumber; $i++){
            echo mysqli_fetch_field_direct($result, $i)->name . "\t";
        }
        echo "\n";
        while($row = mysqli_fetch_assoc($result)){
            foreach($row as $data){
                echo $data . "\t";
            }
            echo "\n";
        }
    }else{
        echo "No hay ejemplares en la BD";
    }
}
exportBooks(buscarGeneralLike("","","","",""));
$filename = "catalogo.xls";
header("Content-disposition: attachment; filename=" . $filename);

?>