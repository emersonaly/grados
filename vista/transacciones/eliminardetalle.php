<?php  

require_once("../modelo/utilidades.class.php");
header('Content-Type: application/json');


$util = new Utilidades;
$con = $util->conexion();
$respuesta = mysqli_query($con, "DELETE FROM tbl_detafac where detafac_ide=".$_GET['codigo']);
echo json_encode($respuesta);

?>