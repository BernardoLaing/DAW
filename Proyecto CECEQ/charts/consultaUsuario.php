<?php
include("../utils.php"); 
header('Content-Type: application/json');

function obtenerUsuarios(){
    $connection = connect();
    $statement = mysqli_prepare($connection,"
    select r.nombre, COUNT(ur.idRol) as 'Cantidad'
    from usuario_rol ur, rol r
    where ur.idRol = r.idRol
    group by r.nombre
    order by r.nombre
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
$data =  buildarray(obtenerUsuarios());
echo json_encode($data);
?>