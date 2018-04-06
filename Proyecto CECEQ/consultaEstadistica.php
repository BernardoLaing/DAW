<?php
include("utils.php"); 
header('Content-Type: application/json');

function obtenerEstados(){
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

function obtenerGenero(){
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


function buildArray($result){
    if(mysqli_num_rows($result)>0){
        $data = array();
        while($row = mysqli_fetch_assoc($result)){
            array_push($data,$row);
        }
    }else{
       echo "No hay resultados";
       return null;
    }
    //echo print_r($a);
    return $data;
}
$data =  buildarray(obtenerEstados());
echo json_encode($data);

//$var = json_encode($data);
//return $var;


?>