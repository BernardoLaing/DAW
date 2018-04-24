<?php
require_once('utils.php');
function insertAutor($nombre, $apellidoPaterno, $apellidoMaterno)
{
    $connection = connect();
    $statement = mysqli_prepare($connection, "INSERT INTO autor(nombre, apellidoPaterno, apellidoMaterno)
    VALUES(?,?,?);
    ");
    $statement ->bind_param("sss", $nombre, $apellidoPaterno, $apellidoMaterno);
    $retorno = $statement->execute();
    disconnect($connection);
    return($retorno);
}
function buscarAutor($nombre, $apellidoPaterno, $apellidoMaterno)
{
    $connection = connect();
    $statement = mysqli_prepare($connection,"
    select idAutor, nombre, apellidoPaterno, apellidoMaterno
    from autor
    where (nombre = ? ".($nombre==""?"or 1":"").")
    and (apellidoPaterno = ? ".($apellidoPaterno==""?"or 1":"").")
    and (apellidoMaterno = ? ".($apellidoMaterno==""?"or 1":"").")
    ");
    $statement->bind_param("sss", $nombre, $apellidoPaterno, $apellidoMaterno);
    $statement->execute();
    $result = $statement->get_result();
    disconnect($connection);
    return $result;
}
function insertTitulo($titulo, $year)
{
    $connection = connect();
    $statement = mysqli_prepare($connection, "INSERT INTO titulo(titulo, year)
    VALUES(?,?);
    ");
    $statement ->bind_param("si", $titulo, $year);
    $retorno = $statement->execute();
    disconnect($connection);
    return($retorno);

}
function buscarTitulo($titulo, $year)
{
    $connection = connect();
    $statement = mysqli_prepare($connection,"
    select idTitulo, titulo, year
    from titulo
    where (titulo = ? ".($titulo==""?"or 1":"").")
    and (year = ? ".($year==""?"or 1":"").")
    ");
    $statement->bind_param("si", $titulo, $year);
    $statement->execute();
    $result = $statement->get_result();
    disconnect($connection);
    return $result;
}
function insertEjemplar($ISBN, $estante, $editorial, $year, $volumen, $idTitulo, $colection, $edition, $idUsuario, $clave, $adq, $numClas, $bookMaterias )
{
    $connection = connect();
    $statement = mysqli_prepare($connection, "INSERT INTO ejemplar(ISBN, estante, editorial, year, volumen, idTitulo, coleccion, edicion, idUsuario, claveIngreso, adquisicion, numClasificacion, materias)
    VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?);
    ");
    $statement ->bind_param("sssiiisisssss", $ISBN, $estante, $editorial, $year, $volumen, $idTitulo, $colection, $edition, $idUsuario, $clave, $adq, $numClas, $bookMaterias);
    $retorno = $statement->execute();
    disconnect($connection);
    return($retorno);

}
function buscarEjemplar($ISBN, $estante, $editorial, $year, $volumen)
{
    $connection = connect();
    $statement = mysqli_prepare($connection,"
    select ISBN, estante, editorial, year, volumen
    from ejemplar
    where (ISBN = ? ".($ISBN==""?"or 1":"").")
    and (estante = ? ".($estante==""?"or 1":"").")
    and (editorial = ? ".($editorial==""?"or 1":"").")
    and (year = ? ".($year==""?"or 1":"").")
    and (volumen = ? ".($volumen==""?"or 1":"").")
    ");
    $statement ->bind_param("sssii", $ISBN, $estante, $editorial, $year, $volumen);
    $statement->execute();
    $result = $statement->get_result();
    disconnect($connection);
    return $result;
}
function insertAutorTitulo($idTitulo, $idAutor)
{
    $connection = connect();
    $statement = mysqli_prepare($connection, "INSERT INTO titulo_autor(idAutor, idTitulo)
    VALUES(?,?);
    ");
    $statement ->bind_param("ii", $idTitulo, $idAutor);
    $retorno = $statement->execute();
    disconnect($connection);
    return($retorno);

}
function buscarAutorTitulo($idTitulo, $idAutor)
{
    $connection = connect();
    $statement = mysqli_prepare($connection,"
    select idAutor, idTitulo
    from titulo_autor
    where (idTitulo = ? ".($idTitulo==""?"or 1":"").")
    and (idAutor = ? ".($idAutor==""?"or 1":"").")
    ");
    $statement ->bind_param("ii", $idTitulo, $idAutor);
    $statement->execute();
    $result = $statement->get_result();
    disconnect($connection);
    return $result;
}
function buscarGeneralId($id)
{
    $connection = connect();
    $statement = mysqli_prepare($connection,"
    select GROUP_CONCAT(a.nombre SEPARATOR ', ') AS autores, GROUP_CONCAT(apellidoPaterno SEPARATOR ', ') AS apellidos, titulo, t.year, estante, editorial, es.nombre, c.idCategoria, e.idEjemplar, ISBN, volumen, edicion, e.year as yearE, c.nombre AS nombreC, es.idEstado, coleccion, claveIngreso, fechaIngreso, idUsuario, adquisicion, numClasificacion, materias
    from autor a, titulo t, titulo_autor ta, ejemplar e, ejemplar_estado ee, estado es, titulo_categoria tc, categoria c
    where e.idEjemplar = ?
    and a.idAutor=ta.idAutor
    and t.idTitulo=ta.idTitulo
    and t.idTitulo = e.idTitulo
    and ee.idEjemplar=e.idEjemplar
    and ee.idEstado=es.idEstado
    and t.idTitulo=tc.idTitulo
    and tc.idCategoria=c.idCategoria
    ");
    $statement->bind_param("i", $id);
    $statement->execute();
    $result = $statement->get_result();
    disconnect($connection);
    return $result;

}

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
function lastIndexEjemplar()
{
    $connection = connect();
    $statement = mysqli_prepare($connection, "SELECT MAX( idEjemplar )  FROM ejemplar");
    $statement->execute();
    $result = $statement->get_result();
    disconnect($connection);
    if($row = mysqli_fetch_assoc($result))
    {
        $results = $row['MAX( idEjemplar )'];
        //echo $results;
    }
    return $results;
}
function insertEjemplarEstado($idEjemplar, $idEstado)
{
    $connection = connect();
    $statement = mysqli_prepare($connection, "INSERT INTO ejemplar_estado(idEjemplar, idEstado)
    VALUES(?,?);
    ");
    $statement ->bind_param("ii", $idEjemplar, $idEstado);
    $retorno = $statement->execute();
    disconnect($connection);
    return($retorno);

}
function buscarAutorN($nombre, $apellidoPaterno, $apellidoMaterno)
{
    $connection = connect();
    $statement = mysqli_prepare($connection,"
    select idAutor, nombre, apellidoPaterno, apellidoMaterno
    from autor
    where (nombre = ? )
    and (apellidoPaterno = ?)
    and (apellidoMaterno = ? )
    ");
    $statement->bind_param("sss", $nombre, $apellidoPaterno, $apellidoMaterno);
    $statement->execute();
    $result = $statement->get_result();
    disconnect($connection);
    return $result;
}
function buscarSubcategorias($categoria) 
{
    $connection = connect();
    $statement = mysqli_prepare($connection,"
    select idCategoria, nombre
    from categoria
    where idCategoria between ? and (?+99)".($categoria==""?"or 1":"")."
    ");
    $statement->bind_param("ii", $categoria, $categoria);
    $statement->execute();
    $result = $statement->get_result();
    disconnect($connection);
    return $result;

}
function delateBook($categoria) 
{
    $connection = connect();
    $statement = mysqli_prepare($connection,"
    select idCategoria, nombre
    from categoria
    where idCategoria between ? and (?+99)".($categoria==""?"or 1":"")."
    ");
    $statement->bind_param("ii", $categoria, $categoria);
    $statement->execute();
    $result = $statement->get_result();
    disconnect($connection);
    return $result;

}
function insertCategoriaTitulo($idTitulo, $idCategoria)
{
    $connection = connect();
    $statement = mysqli_prepare($connection, "INSERT INTO titulo_categoria (idCategoria, idTitulo)
    VALUES(?,?);
    ");
    $statement ->bind_param("ii", $idCategoria, $idTitulo);
    $retorno = $statement->execute();
    disconnect($connection);
    return($retorno);

}
function editEjemplar($idEjemplar, $ISBN, $estante, $editorial, $year, $volumen, $idTitulo, $colection, $edition, $idUsuario, $clave, $adq, $numClas, $bookMaterias )
{
    $connection = connect();
    $statement = mysqli_prepare($connection, "UPDATE ejemplar SET ISBN=?, estante=?, editorial=?, year =?, volumen=?, idTitulo=?, coleccion=?, edicion=?, idUsuario=?, claveIngreso=?, adquisicion=?, numClasificacion=?, materias=?
    WHERE idEjemplar=?
    ");
    $statement ->bind_param("sssiiisisssssi", $ISBN, $estante, $editorial, $year, $volumen, $idTitulo, $colection, $edition, $idUsuario, $clave, $adq, $numClas, $bookMaterias, $idEjemplar);
    $retorno = $statement->execute();
    disconnect($connection);
    return($retorno);
}
function editEjemplarEstado($idEjemplar, $idEstado)
{
    $connection = connect();
    $statement = mysqli_prepare($connection, "UPDATE ejemplar_estado SET idEstado=?
    WHERE idEjemplar=?
    ");
    $statement ->bind_param("ii", $idEstado, $idEjemplar);
    $retorno = $statement->execute();
    disconnect($connection);
    return($retorno);

}
function editCategoriaTitulo($idTitulo, $idCategoria)
{
    $connection = connect();
    $statement = mysqli_prepare($connection, "UPDATE titulo_categoria SET idCategoria=? 
    WHERE idTitulo=?
    ");
    $statement ->bind_param("ii", $idCategoria, $idTitulo);
    $retorno = $statement->execute();
    disconnect($connection);
    return($retorno);

}
function selectCategoriaTitulo($idTitulo)
{
    $connection = connect();
    $statement = mysqli_prepare($connection, "SELECT idTitulo, idCategoria 
    FROM titulo_categoria 
    WHERE idTitulo=?
    ");
    $statement ->bind_param("i", $idTitulo);
    $statement->execute();
    $result = $statement->get_result();
    disconnect($connection);
    return $result;
}
function buscarGeneralExport() 
{
    $connection = connect();
    $statement = mysqli_prepare($connection,"
    select 'autores', 'titulo', 'anio titulo', 'estante', 'editorial', 'Estado', 'Categoria', 'idEjemplar', 'ISBN', 'volumen', 'Impresion', 'anio impresion', 'Coleccion', 'clave Ingreso', 'fecha Ingreso', 'idUsuario', 'adquisicion', 'numClasificacion', 'materias'
    UNION ALL
    select GROUP_CONCAT(a.nombre,' ', apellidoPaterno SEPARATOR ' y ') AS autores, titulo, t.year, estante, editorial, es.nombre, c.idCategoria, e.idEjemplar, ISBN, volumen, edicion, e.year as yearE, coleccion, claveIngreso, fechaIngreso, idUsuario, adquisicion, numClasificacion, materias
    into outfile 'C:/Users/win 10/Downloads/exports.csv' 
    fields terminated by ', ' 
    lines terminated by '\n'
    from autor a, titulo t, titulo_autor ta, ejemplar e, ejemplar_estado ee, estado es, titulo_categoria tc, categoria c
    where a.idAutor=ta.idAutor
    and t.idTitulo=ta.idTitulo
    and t.idTitulo = e.idTitulo
    and ee.idEjemplar=e.idEjemplar
    and ee.idEstado=es.idEstado
    and es.idEstado<>3
    and t.idTitulo=tc.idTitulo
    and tc.idCategoria=c.idCategoria
    GROUP BY e.idEjemplar;
    ");
    $statement->execute();
    $result = $statement->get_result();
    disconnect($connection);
    return $result;

}
?>