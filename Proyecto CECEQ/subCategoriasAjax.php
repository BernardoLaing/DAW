<?php
require_once "utils.php";
$_GET["categoria"];
$result= buscarSubcategorias($_GET["categoria"]);
echo '<option value="" disabled selected>-- subclasificación--</option>';
if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                echo  '<option value="'.$row['idCategoria'].'">'.$row['idCategoria'].' '.$row['nombre'].'</option>';
            }
        }
?>