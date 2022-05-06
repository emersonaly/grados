<?php
require("../modelo/usuario.class.php");
$usuario=new Usuario; //Se instancia la clase usuario para poder usar sus métodos
$con=$usuario->conexion();
$respuesta=array();
switch($_REQUEST["accion"])
{
	case 'agregar_usuario':
		$nomusua=$_REQUEST['nomusua'];
		$apeusua=$_REQUEST['apeusua'];
		$mailusua=$_REQUEST['mailusua'];
		$userusua=$_REQUEST['userusua'];
		$passusua=$_REQUEST['passusua'];
		$estadusua=1;
		$nivelusua=$_REQUEST['nivelusua'];
		// Invoco el método insert de la clase usuario
		$respuesta=$usuario->insert($nomusua,$apeusua,$mailusua,$userusua,$passusua,$estadusua,$nivelusua,$con);
		break;

	case 'modificar_usuario':
		$codusua=$_REQUEST['id'];
		$nomusua=$_REQUEST['nomusua'];
		$apeusua=$_REQUEST['apeusua'];
		$mailusua=$_REQUEST['mailusua'];
		$userusua=$_REQUEST['userusua'];
		$passusua=$_REQUEST['passusua'];
		$estadusua=1;
		$nivelusua=$_REQUEST['nivelusua'];
		//Invoco el método update de la clase usuario
		$respuesta=$usuario->update($codusua,$nomusua,$apeusua,$mailusua,$userusua,$passusua,$estadusua,$nivelusua,$con);
		break;

	case 'eliminar_usuario':
		$codusua=$_REQUEST['id'];
		//Invoco el método delete de la clase usuario
		$respuesta=$usuario->delete($codusua,$con);
		break;
}
echo implode("#",$respuesta); //Lo convierto en string para enviarlo a Ajax
?>