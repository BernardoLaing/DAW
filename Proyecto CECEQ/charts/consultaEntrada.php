<?php
include("../utils.php"); 
header('Content-Type: application/json');

function obtenerEntrada(){
    $connection = connect();
    $statement = mysqli_prepare($connection,"
    select COUNT(e.idVisitante) as 'Entradas'
    from entrada e
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
$data =  buildarray(obtenerEntrada());
echo json_encode($data);
?>