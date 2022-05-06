<?php
require("../modelo/categoria.class.php");
$categoria=new Categoria; //Se instancia la clase usuario para poder usar sus métodos
$con=$categoria->conexion();
$respuesta=array();
switch($_REQUEST["accion"])
{
	case 'agregar_categoria':
		$descat=$_REQUEST['descat'];
		$estadcat=1;
		// Invoco el método insert de la clase 
		$respuesta=$categoria->insert($descat,$estadcat,$con);
		break;

	case 'modificar_categoria':
		$codcat=$_REQUEST['id'];
		$descat=$_REQUEST['descat'];
		//Invoco el método update de la clase 
		$respuesta=$categoria->update($codcat,$descat,$con);
		break;

	case 'eliminar_categoria':
		$codcat=$_REQUEST['id'];
		//Invoco el método delete de la clase
		$respuesta=$categoria->delete($codcat,$con);
		break;
}
echo implode("#",$respuesta); //Lo convierto en string para enviarlo a Ajax
?>