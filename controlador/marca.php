<?php
require("../modelo/marca.class.php");
$marca=new Marca; //Se instancia la clase usuario para poder usar sus métodos
$con=$marca->conexion();
$respuesta=array();
switch($_REQUEST["accion"])
{
	case 'agregar_marca':
		$desmar=$_REQUEST['desmar'];
		$estadmarc=1;
		// Invoco el método insert de la clase 
		$respuesta=$marca->insert($desmar,$estadmarc,$con);
		break;

	case 'modificar_marca':
		$codmar=$_REQUEST['id'];
		$desmar=$_REQUEST['desmar'];
		//Invoco el método update de la clase 
		$respuesta=$marca->update($codmar,$desmar,$con);
		break;

	case 'eliminar_marca':
		$codmar=$_REQUEST['id'];
		//Invoco el método delete de la clase
		$respuesta=$marca->delete($codmar,$con);
		break;
}
echo implode("#",$respuesta); //Lo convierto en string para enviarlo a Ajax
?>