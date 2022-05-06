<?php
require_once("utilidades.class.php");
class Marca extends Utilidades
{
	public function insert($desmar,$estadmarc,$con)
	{
		$respuesta=array();
		$sql="INSERT INTO tbl_marca (marca_descrip,marca_borrado) VALUES ('$desmar','$estadmarc')";
		$ok=$con->query($sql);
		
		$afectadas=$con->affected_rows;

		if ($afectadas>0)
		{
			$respuesta['exito']=1;
			$respuesta['mensaje']="Usuario Registrado Con Exito!!!!";
		}
		else
		{
			$respuesta['exito']=0;
			$respuesta['mensaje']="Error al Agregar!!";
			
		}
		return $respuesta;
	}

	public function update($codmar,$desmar,$con)
	{
		$respuesta=array();
		$sql="UPDATE tbl_marca SET marca_descrip='$desmar' WHERE marca_ide=$codmar";
		$ok=$con->query($sql);
		$afectadas=$con->affected_rows;
		if ($afectadas>0)
		{
			$respuesta['exito']=1;
			$respuesta['mensaje']="Usuario Modificado";
		}
		else
		{
			$respuesta['exito']=0;
			$respuesta['mensaje']="Error al Modificar";
		}
		return $respuesta;
	}

	public function delete($codmar,$con)
	{
		$respuesta=array();
		$sql="UPDATE tbl_marca SET marca_borrado='0' WHERE marca_ide=$codmar";
		$ok=$con->query($sql);
		$afectadas=$con->affected_rows;
		if ($afectadas>0)
		{
			$respuesta['exito']=1;
			$respuesta['mensaje']="Usuario eliminado";
		}
		else
		{
			$respuesta['exito']=0;
			$respuesta['mensaje']="Usuario no se eliminó";
		}
		return $respuesta;
	}
}
?>