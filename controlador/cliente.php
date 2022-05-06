<?php
require("../modelo/cliente.class.php");
$cliente=new Cliente; //Se instancia la clase cliente para poder usar sus métodos
$con=$cliente->conexion();
$respuesta=array();
switch($_REQUEST["accion"])
{
	case 'agregar_cliente':
        $cliendi = $_REQUEST['cliendi'];
        $nomclie = $_REQUEST['nomclie'];
        $apeclie = $_REQUEST['apeclie'];
        $direclie = $_REQUEST['direclie'];
        $tlfclie = $_REQUEST['tlfclie'];
        $mailclie = $_REQUEST['mailclie'];
		$estadclie=1;
		// Invoco el método insert de la clase cliente
		$respuesta=$cliente->insert($cliendi,$nomclie,$apeclie,$direclie,$tlfclie,$mailclie,$estadclie,$con);
		break;

	case 'modificar_cliente':
		$codclie=$_REQUEST['id'];
        $cliendi = $_REQUEST['cliendi'];
        $nomclie = $_REQUEST['nomclie'];
        $apeclie = $_REQUEST['apeclie'];
        $direclie = $_REQUEST['direclie'];
        $tlfclie = $_REQUEST['tlfclie'];
        $mailclie = $_REQUEST['mailclie'];
		$estadclie=1;
		//Invoco el método update de la clase cliente
		$respuesta=$cliente->update($codclie,$cliendi,$nomclie,$apeclie,$direclie,$tlfclie,$mailclie,$estadclie,$con);
		break;

	case 'eliminar_cliente':
		$codclie=$_REQUEST['id'];
		//Invoco el método delete de la clase cliente
		$respuesta=$cliente->delete($codclie,$con);
		break;
}
echo implode("#",$respuesta); //Lo convierto en string para enviarlo a Ajax
?>