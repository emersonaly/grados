<?php
require_once("utilidades.class.php");
class Categoria extends Utilidades
{
	public function insert($descat,$estadcat,$con)
	{
		$respuesta=array();
		$sql="INSERT INTO tbl_categoria (categoria_descrip,categoria_borrado) VALUES ('$descat','$estadcat')";
		$ok=$con->query($sql);
		
		$afectadas=$con->affected_rows;

		if ($afectadas>0)
		{
			$respuesta['exito']=1;
			$respuesta['mensaje']="Registrado Con Exito!!!!";
		}
		else
		{
			$respuesta['exito']=0;
			$respuesta['mensaje']="Error al Agregar!!";
			
		}
		return $respuesta;
	}

	public function update($codcat,$descat,$con)
	{
		$respuesta=array();
		$sql="UPDATE tbl_categoria SET categoria_descrip='$descat' WHERE categoria_ide=$codcat";
		$ok=$con->query($sql);
		$afectadas=$con->affected_rows;
		if ($afectadas>0)
		{
			$respuesta['exito']=1;
			$respuesta['mensaje']="Categoria Modificada";
		}
		else
		{
			$respuesta['exito']=0;
			$respuesta['mensaje']="Error al Modificar";
		}
		return $respuesta;
	}

	public function delete($codcat,$con)
	{
		$respuesta=array();
		$sql="UPDATE tbl_categoria SET categoria_borrado='0' WHERE categoria_ide=$codcat";
		$ok=$con->query($sql);
		$afectadas=$con->affected_rows;
		if ($afectadas>0)
		{
			$respuesta['exito']=1;
			$respuesta['mensaje']="Categoria eliminada";
		}
		else
		{
			$respuesta['exito']=0;
			$respuesta['mensaje']="Categoria no se eliminó";
		}
		return $respuesta;
	}
}
?>