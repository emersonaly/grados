<?php
require("../modelo/producto.class.php");
$producto=new Producto; //Se instancia la clase usuario para poder usar sus métodos
$con=$producto->conexion();
$respuesta=array();
switch($_REQUEST["accion"])
{
	case 'agregar_producto':
		$codpro = $_REQUEST['codpro'];
		$despro = $_REQUEST['despro'];
		$talpro = $_REQUEST['talpro'];
		$marpro = $_REQUEST['marpro'];
		$catpro = $_REQUEST['catpro'];
		$exispro = $_REQUEST['exispro'];
		$cospro = $_REQUEST['cospro'];
		$ganpro = $_REQUEST['ganpro'];
		$impupro = $_REQUEST['impupro'];
		$pventpro = $_REQUEST['pventpro'];
		$obpro = $_REQUEST['obpro'];
		$user = $_REQUEST['user'];
		$estadpro=1;
		// Invoco el método insert de la clase 
		$respuesta=$producto->insert($codpro,$despro,$talpro,$marpro,$catpro,$exispro,$cospro,
		$ganpro,$impupro,$pventpro,$obpro,$user,$estadpro,$con);
		break;

	case 'modificar_producto':
		$codid=$_REQUEST['id'];
		$codpro = $_REQUEST['codpro'];
		$despro = $_REQUEST['despro'];
		$talpro = $_REQUEST['talpro'];
		$marpro = $_REQUEST['marpro'];
		$catpro = $_REQUEST['catpro'];
		$exispro = $_REQUEST['exispro'];
		$cospro = $_REQUEST['cospro'];
		$ganpro = $_REQUEST['ganpro'];
		$impupro = $_REQUEST['impupro'];
		$pventpro = $_REQUEST['pventpro'];
		$obpro = $_REQUEST['obpro'];
		$estadpro=1;
		//Invoco el método update de la clase 
		$respuesta=$producto->update($codid,$codpro,$despro,$talpro,$marpro,$catpro,$exispro,$cospro,
		$ganpro,$impupro,$pventpro,$obpro,$estadpro,$con);
		break;

	case 'eliminar_producto':
		$codid=$_REQUEST['id'];
		//Invoco el método delete de la clase
		$respuesta=$producto->delete($codid,$con);
		break;
}
echo implode("#",$respuesta); //Lo convierto en string para enviarlo a Ajax
?>