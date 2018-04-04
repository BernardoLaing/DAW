<?php
include("utils.php"); 

function obtenerEstados(){
    $connection = connect();
    $statement = mysqli_prepare($connection,"
    select v.nombre as 'Nombre', v.idVisitante as 'Numero'
    from visitante as v, visitante_gradoestudios as vg, gradoestudios as g
    where v.idVisitante = vg.idVisitante
    and vg.idGrado = g.idGrado
    ");
    $statement->execute();
    $result = $statement->get_result();
    disconnect($connection);
    return $result;
}

function buildArray($result){
    $a = array();
    if(mysqli_num_rows($result)>0){
        $fieldNumber = mysqli_num_fields($result);
        array_push($a,array());
        for($i = 0; $i < $fieldNumber; $i++){
            array_push($a[0],mysqli_fetch_field_direct($result, $i)->name);
        }
        while($row = mysqli_fetch_assoc($result)){
            array_push($a,array());
            foreach($row as $data){
                array_push($a[count($a)-1],$data);
            }
        }
    }else{
       echo "No hay resultados";
    }
    //echo print_r($a);
    return $a;
}
$variable =  buildarray(obtenerEstados());

echo json_encode($variable);
//$var = json_encode($variable);
//return $var;


?>