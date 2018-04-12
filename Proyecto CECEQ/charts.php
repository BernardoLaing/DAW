<?php
include("regexps.php");
require_once("utils.php"); 
header('Content-Type: application/json');

function obtenerEntrada($año){
    $connection = connect();
    $statement = mysqli_prepare($connection,"
	SELECT 'Enero', COUNT(e.idVisitante) as 'Entradas'
    from entrada e
    WHERE e.timestamp like ?
    AND e.timestamp like '%-01-%'
    	UNION
    SELECT 'Febrero', COUNT(e.idVisitante) as 'Entradas'
    from entrada e
    WHERE e.timestamp like ?
    AND e.timestamp like '%-02-%'
	    UNION
    SELECT 'Marzo', COUNT(e.idVisitante) as 'Entradas'
    from entrada e
    WHERE e.timestamp like ?
    AND e.timestamp like '%-03-%'
	    UNION 
    SELECT 'Abril', COUNT(e.idVisitante) as 'Entradas'
    from entrada e
    WHERE e.timestamp like ?
    AND e.timestamp like '%-04-%'
    	UNION
    	SELECT 'Mayo', COUNT(e.idVisitante) as 'Entradas'
    from entrada e
    WHERE e.timestamp like ?
    AND e.timestamp like '%-05-%'
    	UNION
    SELECT 'Junio', COUNT(e.idVisitante) as 'Entradas'
    from entrada e
    WHERE e.timestamp like ?
    AND e.timestamp like '%-06-%'
	    UNION
    SELECT 'Julio', COUNT(e.idVisitante) as 'Entradas'
    from entrada e
    WHERE e.timestamp like ?
    AND e.timestamp like '%-07-%'
	    UNION 
    SELECT 'Agosto', COUNT(e.idVisitante) as 'Entradas'
    from entrada e
    WHERE e.timestamp like ?
    AND e.timestamp like '%-08-%'
        	UNION
   	SELECT 'Septiembre', COUNT(e.idVisitante) as 'Entradas'
    from entrada e
    WHERE e.timestamp like ?
    AND e.timestamp like '%-09-%'
    	UNION
    SELECT 'Octubre', COUNT(e.idVisitante) as 'Entradas'
    from entrada e
    WHERE e.timestamp like ?
    AND e.timestamp like '%-10-%'
	    UNION
    SELECT 'Noviembre', COUNT(e.idVisitante) as 'Entradas'
    from entrada e
    WHERE e.timestamp like ?
    AND e.timestamp like '%-11-%'
	    UNION 
    SELECT 'Diciembre', COUNT(e.idVisitante) as 'Entradas'
    from entrada e
    WHERE e.timestamp like ?
    AND e.timestamp like '%-12-%'
    ");
    $AÑO=$año."%";
    $statement->bind_param("ssssssssssss", $AÑO, $AÑO, $AÑO, $AÑO, $AÑO, $AÑO, $AÑO, $AÑO, $AÑO, $AÑO, $AÑO, $AÑO);
    $statement->execute();
    $result = $statement->get_result();
    disconnect($connection);
    return $result;
}

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

function obtenerEntradaGenero($año){
    $connection = connect();
    $statement = mysqli_prepare($connection,"
    SELECT v.genero, COUNT(v.genero) as 'Personas'
    FROM entrada e, visitante v 
    WHERE e.idVisitante = v.idVisitante
    AND e.timestamp like ?
    GROUP BY v.genero
    ");
    $AÑO=$año."%";
    $statement->bind_param("s", $AÑO);
    $statement->execute();
    $result = $statement->get_result();
    disconnect($connection);
    return $result;
}

function obtenerCategorias(){
    header('Content-Type: application/json');
    $connection = connect();
    
    $statement = mysqli_prepare($connection,"
    SELECT 'Generalidades', COUNT(*) as 'Cantidad'
    FROM titulo_categoria tc, ejemplar e, categoria c
    WHERE tc.idTitulo = e.idTitulo AND tc.idCategoria=c.idCategoria
    AND( tc.idCategoria = 0 OR 
    tc.idCategoria = 10 OR tc.idCategoria = 20 OR tc.idCategoria = 30 OR 
    tc.idCategoria = 40 OR tc.idCategoria = 50 OR tc.idCategoria = 60 OR 
    tc.idCategoria = 70 OR tc.idCategoria = 80 OR tc.idCategoria = 90)
    
    UNION
    
    SELECT  'Filosofía y psicología', COUNT(*) as 'Cantidad'
    FROM titulo_categoria tc, ejemplar e, categoria c
    WHERE tc.idTitulo = e.idTitulo AND tc.idCategoria=c.idCategoria
    AND( tc.idCategoria = 100 OR 
    tc.idCategoria = 110 OR tc.idCategoria = 120 OR tc.idCategoria = 130 OR 
    tc.idCategoria = 140 OR tc.idCategoria = 150 OR tc.idCategoria = 160 OR 
    tc.idCategoria = 170 OR tc.idCategoria = 180 OR tc.idCategoria = 190)
      
    UNION
    
    SELECT  'Religión', COUNT(*) as 'Cantidad'
    FROM titulo_categoria tc, ejemplar e, categoria c
    WHERE tc.idTitulo = e.idTitulo AND tc.idCategoria=c.idCategoria
    AND( tc.idCategoria = 200 OR 
    tc.idCategoria = 210 OR tc.idCategoria = 220 OR tc.idCategoria = 230 OR 
    tc.idCategoria = 240 OR tc.idCategoria = 250 OR tc.idCategoria = 260 OR 
    tc.idCategoria = 270 OR tc.idCategoria = 280 OR tc.idCategoria = 290)
    
    UNION
    SELECT 'Ciencias Sociales', COUNT(*) as 'Cantidad'
    FROM titulo_categoria tc, ejemplar e, categoria c
    WHERE tc.idTitulo = e.idTitulo AND tc.idCategoria=c.idCategoria
    AND( tc.idCategoria = 300 OR 
    tc.idCategoria = 310 OR tc.idCategoria = 320 OR tc.idCategoria = 330 OR 
    tc.idCategoria = 340 OR tc.idCategoria = 350 OR tc.idCategoria = 360 OR 
    tc.idCategoria = 370 OR tc.idCategoria = 380 OR tc.idCategoria = 390)
    
    UNION
    
    SELECT  'Lenguas', COUNT(*) as 'Cantidad'
    FROM titulo_categoria tc, ejemplar e, categoria c
    WHERE tc.idTitulo = e.idTitulo AND tc.idCategoria=c.idCategoria
    AND( tc.idCategoria =400 OR 
    tc.idCategoria = 410 OR tc.idCategoria = 420 OR tc.idCategoria = 430 OR 
    tc.idCategoria = 440 OR tc.idCategoria = 450 OR tc.idCategoria = 460 OR 
    tc.idCategoria = 470 OR tc.idCategoria = 480 OR tc.idCategoria = 490)
    
    UNION
    
    SELECT  'Ciencias Naturales y matemáticas', COUNT(*) as 'Cantidad'
    FROM titulo_categoria tc, ejemplar e, categoria c
    WHERE tc.idTitulo = e.idTitulo AND tc.idCategoria=c.idCategoria
    AND( tc.idCategoria = 500 OR 
    tc.idCategoria = 510 OR tc.idCategoria = 520 OR tc.idCategoria = 530 OR 
    tc.idCategoria = 540 OR  tc.idCategoria = 550 OR tc.idCategoria = 560 OR 
    tc.idCategoria = 570 OR tc.idCategoria = 580 OR  tc.idCategoria = 590)
    
    UNION
    
    SELECT  'Tecnología', COUNT(*) as 'Cantidad'
    FROM titulo_categoria tc, ejemplar e, categoria c
    WHERE tc.idTitulo = e.idTitulo AND tc.idCategoria=c.idCategoria
    AND( tc.idCategoria =600 OR 
    tc.idCategoria = 610 OR  tc.idCategoria = 620 OR tc.idCategoria = 630 OR 
    tc.idCategoria = 640 OR  tc.idCategoria = 650 OR tc.idCategoria = 660 OR 
    tc.idCategoria = 670 OR  tc.idCategoria = 680 OR tc.idCategoria = 690)
    
    UNION
    
    SELECT  'Las artes', COUNT(*) as 'Cantidad'
    FROM titulo_categoria tc, ejemplar e, categoria c
    WHERE tc.idTitulo = e.idTitulo AND tc.idCategoria=c.idCategoria
    AND( tc.idCategoria = 700 OR 
    tc.idCategoria = 710 OR  tc.idCategoria = 720 OR tc.idCategoria = 730 OR 
    tc.idCategoria = 740 OR  tc.idCategoria = 750 OR tc.idCategoria = 760 OR 
    tc.idCategoria = 770 OR  tc.idCategoria = 780 OR tc.idCategoria = 790)
    
    UNION
    
    SELECT  'Literatura y retórica', COUNT(*) as 'Cantidad'
    FROM titulo_categoria tc, ejemplar e, categoria c
    WHERE tc.idTitulo = e.idTitulo AND tc.idCategoria=c.idCategoria
    AND( tc.idCategoria =800 OR 
    tc.idCategoria = 810 OR  tc.idCategoria = 820 OR tc.idCategoria = 830 OR 
    tc.idCategoria = 840 OR  tc.idCategoria = 850 OR tc.idCategoria = 860 OR 
    tc.idCategoria = 870 OR  tc.idCategoria = 880 OR tc.idCategoria = 890)
    
    UNION
    
    SELECT  'Ciencias Naturales y matemáticas', COUNT(*) as 'Cantidad'
    FROM titulo_categoria tc, ejemplar e, categoria c
    WHERE tc.idTitulo = e.idTitulo AND tc.idCategoria=c.idCategoria
    AND( tc.idCategoria = 900 OR 
    tc.idCategoria = 910 OR  tc.idCategoria = 920 OR tc.idCategoria = 930 OR 
    tc.idCategoria = 940 OR  tc.idCategoria = 950 OR tc.idCategoria = 960 OR 
    tc.idCategoria = 970 OR  tc.idCategoria = 980 OR tc.idCategoria = 990)
    ");
    $statement->execute();
    $result = $statement->get_result();
    disconnect($connection);
    return $result;
}

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

function obtenerPrestamos($año){
    $connection = connect();
    $statement = mysqli_prepare($connection,"
	SELECT 'Enero', COUNT(e.idEjemplar) as 'Prestamos'
    from ejemplar_credencial e
    WHERE e.fechaPrestamo like ?
    AND e.fechaPrestamo like '%-01-%'
    	UNION
    SELECT 'Febrero', COUNT(e.idEjemplar) as 'Prestamos'
    from ejemplar_credencial e
    WHERE e.fechaPrestamo like ?
    AND e.fechaPrestamo like '%-02-%'
	    UNION
    SELECT 'Marzo', COUNT(e.idEjemplar) as 'Prestamos'
    from ejemplar_credencial e
    WHERE e.fechaPrestamo like ?
    AND e.fechaPrestamo like '%-03-%'
	    UNION 
    SELECT 'Abril', COUNT(e.idEjemplar) as 'Prestamos'
    from ejemplar_credencial e
    WHERE e.fechaPrestamo like ?
    AND e.fechaPrestamo like '%-04-%'
    	UNION
    	SELECT 'Mayo', COUNT(e.idEjemplar) as 'Prestamos'
    from ejemplar_credencial e
    WHERE e.fechaPrestamo like ?
    AND e.fechaPrestamo like '%-05-%'
    	UNION
    SELECT 'Junio', COUNT(e.idEjemplar) as 'Prestamos'
    from ejemplar_credencial e
    WHERE e.fechaPrestamo like ?
    AND e.fechaPrestamo like '%-06-%'
	    UNION
    SELECT 'Julio', COUNT(e.idEjemplar) as 'Prestamos'
    from ejemplar_credencial e
    WHERE e.fechaPrestamo like ?
    AND e.fechaPrestamo like '%-07-%'
	    UNION 
    SELECT 'Agosto', COUNT(e.idEjemplar) as 'Prestamos'
    from ejemplar_credencial e
    WHERE e.fechaPrestamo like ?
    AND e.fechaPrestamo like '%-08-%'
        	UNION
   	SELECT 'Septiembre', COUNT(e.idEjemplar) as 'Prestamos'
    from ejemplar_credencial e
    WHERE e.fechaPrestamo like ?
    AND e.fechaPrestamo like '%-09-%'
    	UNION
    SELECT 'Octubre', COUNT(e.idEjemplar) as 'Prestamos'
    from ejemplar_credencial e
    WHERE e.fechaPrestamo like ?
    AND e.fechaPrestamo like '%-10-%'
	    UNION
    SELECT 'Noviembre', COUNT(e.idEjemplar) as 'Prestamos'
    from ejemplar_credencial e
    WHERE e.fechaPrestamo like ?
    AND e.fechaPrestamo like '%-11-%'
	    UNION 
    SELECT 'Diciembre', COUNT(e.idEjemplar) as 'Prestamos'
    from ejemplar_credencial e
    WHERE e.fechaPrestamo like ?
    AND e.fechaPrestamo like '%-12-%'
    ");
    $AÑO=$año."%";
    $statement->bind_param("ssssssssssss", $AÑO, $AÑO, $AÑO, $AÑO, $AÑO, $AÑO, $AÑO, $AÑO, $AÑO, $AÑO, $AÑO, $AÑO);
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

function printStat($year){
    header("Content-Type: application/vnd.ms-excel");
    $filename = "reportedgb_.xls";
    echo "Reporte DGB \n";
    header("Content-disposition: attachment; filename=" . $filename);
}

$metodo = htmlspecialchars($_GET['method']);
$param = htmlspecialchars($_GET['anioSel']);

switch ($metodo) {
        case 'obtenerEstados':
            $data =  buildarray(obtenerEstados());
            echo json_encode($data);
        break;
        case 'obtenerCategorias':
            $data =  buildarray(obtenerCategorias());
            echo json_encode($data);
        break;
        case 'obtenerEntradas':
            $data =  buildarray(obtenerEntrada($param));
            echo json_encode($data);
        break;
        case 'obtenerEntradasGenero':
            $data =  buildarray(obtenerEntradaGenero($param));
            echo json_encode($data);
        break;
        case 'obtenerUsuario':
            $data =  buildarray(obtenerUsuarios());
            echo json_encode($data);
        break;
        case 'obtenerPrestamos':
            $data =  buildarray(obtenerPrestamos($param));
            echo json_encode($data);
        break;
        case 'print':
            printStat($param);
         break;
    
    default:
        # code...
        break;
}


?>