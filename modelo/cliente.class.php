<?php
require_once("utilidades.class.php");
class Cliente extends Utilidades
{
	public function insert($cliendi,$nomclie,$apeclie,$direclie,$tlfclie,$mailclie,$estadclie,$con)
	{
		$respuesta=array();
		$sql="INSERT INTO tbl_cliente (clien_ndi,clien_nomb,clien_apel,clien_direc,clien_tel,clien_mail,clien_borrado) 
		                        VALUES ('$cliendi','$nomclie','$apeclie','$direclie','$tlfclie','$mailclie','$estadclie')";
		$ok=$con->query($sql);
		
		$afectadas=$con->affected_rows;

		if ($afectadas>0)
		{
			$respuesta['exito']=1;
			$respuesta['mensaje']="Cliente Registrado Con Exito!!!!";
		}
		else
		{
			$respuesta['exito']=0;
			$respuesta['mensaje']="Error al Agregar!!";
			
		}
		return $respuesta;
	}

	public function update($codclie,$cliendi,$nomclie,$apeclie,$direclie,$tlfclie,$mailclie,$estadclie,$con)
	{
		$respuesta=array();
		$sql="UPDATE tbl_cliente SET clien_ndi='$cliendi',clien_nomb='$nomclie',clien_apel='$apeclie',clien_direc='$direclie',clien_tel='$tlfclie',
        clien_mail='$mailclie',clien_borrado='$estadclie' WHERE clien_ide=$codclie";
		$ok=$con->query($sql);
		$afectadas=$con->affected_rows;
		if ($afectadas>0)
		{
			$respuesta['exito']=1;
			$respuesta['mensaje']="Cliente Modificado";
            
		}
		else
		{
			$respuesta['exito']=0;
			$respuesta['mensaje']="Error al Modificar";
            //echo  $con->error;
            
		}
		return $respuesta;
	}

	public function delete($codclie,$con)
	{
		$respuesta=array();
		$sql="UPDATE tbl_cliente SET clien_borrado='0' WHERE clien_ide=$codclie";
		$ok=$con->query($sql);
		$afectadas=$con->affected_rows;
		if ($afectadas>0)
		{
			$respuesta['exito']=1;
			$respuesta['mensaje']="cliente eliminado";
		}
		else
		{
			$respuesta['exito']=0;
			$respuesta['mensaje']="cliente no se eliminó";
		}
		return $respuesta;
	}
}
?>