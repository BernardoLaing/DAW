<?php
include("../utils.php"); 

function obtenerCategorias(){
    header('Content-Type: application/json');
    $connection = connect();
    
    $statement = mysqli_prepare($connection,"
    SELECT 'Generalidades', COUNT(*) as 'Cantidad'
    FROM titulo_categoria tc, ejemplar e, categoria c
    WHERE tc.idTitulo = e.idTitulo AND tc.idCategoria=c.idCategoria
    AND( tc.idCategoria = 0 OR 
    tc.idCategoria = 10 OR 
    tc.idCategoria = 20 OR
    tc.idCategoria = 30 OR 
    tc.idCategoria = 40 OR 
    tc.idCategoria = 50 OR
    tc.idCategoria = 60 OR 
    tc.idCategoria = 70 OR 
    tc.idCategoria = 80 OR
    tc.idCategoria = 90)
    
    UNION
    
    SELECT  'Filosofía y psicología', COUNT(*) as 'Cantidad'
    FROM titulo_categoria tc, ejemplar e, categoria c
    WHERE tc.idTitulo = e.idTitulo AND tc.idCategoria=c.idCategoria
    AND( tc.idCategoria = 100 OR 
    tc.idCategoria = 110 OR 
    tc.idCategoria = 120 OR
    tc.idCategoria = 130 OR 
    tc.idCategoria = 140 OR 
    tc.idCategoria = 150 OR
    tc.idCategoria = 160 OR 
    tc.idCategoria = 170 OR 
    tc.idCategoria = 180 OR
    tc.idCategoria = 190)
    
    
    UNION
    
    SELECT  'Religión', COUNT(*) as 'Cantidad'
    FROM titulo_categoria tc, ejemplar e, categoria c
    WHERE tc.idTitulo = e.idTitulo AND tc.idCategoria=c.idCategoria
    AND( tc.idCategoria = 200 OR 
    tc.idCategoria = 210 OR 
    tc.idCategoria = 220 OR
    tc.idCategoria = 230 OR 
    tc.idCategoria = 240 OR 
    tc.idCategoria = 250 OR
    tc.idCategoria = 260 OR 
    tc.idCategoria = 270 OR 
    tc.idCategoria = 280 OR
    tc.idCategoria = 290)
    
    UNION
    SELECT 'Ciencias Sociales', COUNT(*) as 'Cantidad'
    FROM titulo_categoria tc, ejemplar e, categoria c
    WHERE tc.idTitulo = e.idTitulo AND tc.idCategoria=c.idCategoria
    AND( tc.idCategoria = 300 OR 
    tc.idCategoria = 310 OR 
    tc.idCategoria = 320 OR
    tc.idCategoria = 330 OR 
    tc.idCategoria = 340 OR 
    tc.idCategoria = 350 OR
    tc.idCategoria = 360 OR 
    tc.idCategoria = 370 OR 
    tc.idCategoria = 380 OR
    tc.idCategoria = 390)
    
    UNION
    
    SELECT  'Lenguas', COUNT(*) as 'Cantidad'
    FROM titulo_categoria tc, ejemplar e, categoria c
    WHERE tc.idTitulo = e.idTitulo AND tc.idCategoria=c.idCategoria
    AND( tc.idCategoria =400 OR 
    tc.idCategoria = 410 OR 
    tc.idCategoria = 420 OR
    tc.idCategoria = 430 OR 
    tc.idCategoria = 440 OR 
    tc.idCategoria = 450 OR
    tc.idCategoria = 460 OR 
    tc.idCategoria = 470 OR 
    tc.idCategoria = 480 OR
    tc.idCategoria = 490)
    
    UNION
    
    SELECT  'Ciencias Naturales y matemáticas', COUNT(*) as 'Cantidad'
    FROM titulo_categoria tc, ejemplar e, categoria c
    WHERE tc.idTitulo = e.idTitulo AND tc.idCategoria=c.idCategoria
    AND( tc.idCategoria = 500 OR 
    tc.idCategoria = 510 OR 
    tc.idCategoria = 520 OR
    tc.idCategoria = 530 OR 
    tc.idCategoria = 540 OR 
    tc.idCategoria = 550 OR
    tc.idCategoria = 560 OR 
    tc.idCategoria = 570 OR 
    tc.idCategoria = 580 OR
    tc.idCategoria = 590)
    
    UNION
    
    SELECT  'Tecnología', COUNT(*) as 'Cantidad'
    FROM titulo_categoria tc, ejemplar e, categoria c
    WHERE tc.idTitulo = e.idTitulo AND tc.idCategoria=c.idCategoria
    AND( tc.idCategoria =600 OR 
    tc.idCategoria = 610 OR 
    tc.idCategoria = 620 OR
    tc.idCategoria = 630 OR 
    tc.idCategoria = 640 OR 
    tc.idCategoria = 650 OR
    tc.idCategoria = 660 OR 
    tc.idCategoria = 670 OR 
    tc.idCategoria = 680 OR
    tc.idCategoria = 690)
    
    UNION
    
    SELECT  'Las artes', COUNT(*) as 'Cantidad'
    FROM titulo_categoria tc, ejemplar e, categoria c
    WHERE tc.idTitulo = e.idTitulo AND tc.idCategoria=c.idCategoria
    AND( tc.idCategoria = 700 OR 
    tc.idCategoria = 710 OR 
    tc.idCategoria = 720 OR
    tc.idCategoria = 730 OR 
    tc.idCategoria = 740 OR 
    tc.idCategoria = 750 OR
    tc.idCategoria = 760 OR 
    tc.idCategoria = 770 OR 
    tc.idCategoria = 780 OR
    tc.idCategoria = 790)
    
    UNION
    
    SELECT  'Literatura y retórica', COUNT(*) as 'Cantidad'
    FROM titulo_categoria tc, ejemplar e, categoria c
    WHERE tc.idTitulo = e.idTitulo AND tc.idCategoria=c.idCategoria
    AND( tc.idCategoria =800 OR 
    tc.idCategoria = 810 OR 
    tc.idCategoria = 820 OR
    tc.idCategoria = 830 OR 
    tc.idCategoria = 840 OR 
    tc.idCategoria = 850 OR
    tc.idCategoria = 860 OR 
    tc.idCategoria = 870 OR 
    tc.idCategoria = 880 OR
    tc.idCategoria = 890)
    
    UNION
    
    SELECT  'Ciencias Naturales y matemáticas', COUNT(*) as 'Cantidad'
    FROM titulo_categoria tc, ejemplar e, categoria c
    WHERE tc.idTitulo = e.idTitulo AND tc.idCategoria=c.idCategoria
    AND( tc.idCategoria = 900 OR 
    tc.idCategoria = 910 OR 
    tc.idCategoria = 920 OR
    tc.idCategoria = 930 OR 
    tc.idCategoria = 940 OR 
    tc.idCategoria = 950 OR
    tc.idCategoria = 960 OR 
    tc.idCategoria = 970 OR 
    tc.idCategoria = 980 OR
    tc.idCategoria = 990)
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



$data =  buildarray(obtenerCategorias());
echo json_encode($data);

/*function obtenerEstadosCall(){
    //echo "HOLA";
    $data =  buildarray(obtenerEstados());
    echo json_encode($data);
   // return json_encode($data);
}

function obtenerCategoriasCall(){
    echo "HOLA CAT";
    $data =  buildarray(obtenerCategorias());
    echo json_encode($data);
   // return json_encode($data);
}*/
?>