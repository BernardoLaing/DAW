<?php
include("utils.php"); 

function obtenerEstados(){
    header('Content-Type: application/json');
    $connection = connect();
    $statement = mysqli_prepare($connection,"
    select e.nombre, COUNT(e.Nombre) as 'Cantidad'
    from estado e, ejemplar_estado ee
    where e.idEstado = ee.idEstado
    group by e.nombre
    ORDER BY e.nombre
    ");
    $statement->execute();
    $result = $statement->get_result();
    disconnect($connection);
    return $result;
}

function obtenerCategorias(){
    header('Content-Type: application/json');
    $connection = connect();
    $statement = mysqli_prepare($connection,"
    SELECT c.nombre, COUNT(tc.idCategoria) as 'Cantidad'
    FROM titulo_categoria tc, ejemplar e, categoria c
    WHERE tc.idTitulo = e.idTitulo AND tc.idCategoria = c.idCategoria
    GROUP BY tc.idCategoria
    ");
    $statement->execute();
    $result = $statement->get_result();
    disconnect($connection);
    return $result;
}

function buildArray($result){
    if(mysqli_num_rows($result)>0){
        //echo mysqli_num_rows($result);
        $data = array();
        while($row = mysqli_fetch_assoc($result)){
            array_push($data,$row);
          //  echo $row['Cantidad'];
        }
    }else{
       echo "No hay resultados";
       return null;
    }
    //echo print_r($a);
    return $data;
}
//$data =  buildarray(obtenerEstados());
$data =  buildarray(obtenerCategorias());
echo json_encode($data);
return json_encode($data);
?>