<?php
require("../modelo/ingreso.class.php");
$ingreso=new Ingreso; //Se instancia la clase ingreso para poder usar sus métodos
$con=$ingreso->conexion();
$respuesta=array();
switch($_REQUEST["accion"])
{
	case 'agregar_ingreso':
		$cedpacingre=$_REQUEST['cedpacingre'];
		$numhabingre=$_REQUEST['numhabingre'];
		$fecingre=$_REQUEST['fecingre'];
		$codmedingre=$_REQUEST['codmedingre'];
		// Invoco el método insert de la clase ingreso
		$respuesta=$ingreso->insert($cedpacingre,$numhabingre,$fecingre,$codmedingre,$con);
		break;

	case 'modificar_ingreso':
        $codingre=$_REQUEST['codingre'];
		$cedpacingre=$_REQUEST['cedpacingre'];
		$numhabingre=$_REQUEST['numhabingre'];
		$fecingre=$_REQUEST['fecingre'];
		$codmedingre=$_REQUEST['codmedingre'];
		//Invoco el método update de la clase ingreso
		$respuesta=$ingreso->update($codingre,$cedpacingre,$numhabingre,$fecingre,$codmedingre,$con);
		break;

	case 'eliminar_ingreso':
		$codingre=$_REQUEST["codingre"];
		//Invoco el método delete de la clase ingreso
		$respuesta=$ingreso->delete($codingre,$con);
		break;
}
echo implode("#",$respuesta); //Lo convierto en string para enviarlo a Ajax
?>