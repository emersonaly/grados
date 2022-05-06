<?php
require_once("utilidades.class.php");
class Usuario extends Utilidades
{
	public function insert($nomusua,$apeusua,$mailusua,$userusua,$passusua,$estadusua,$nivelusua,$con)
	{
		$respuesta=array();
		$sql="INSERT INTO tbl_usuarios (usua_nomb,usua_apel,usua_mail,usua_login,usua_clave,usua_estado,fk_tipousua) 
		VALUES ('$nomusua','$apeusua','$mailusua','$userusua','$passusua','$estadusua','$nivelusua')";
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

	public function update($codusua,$nomusua,$apeusua,$mailusua,$userusua,$passusua,$estadusua,$nivelusua,$con)
	{
		$respuesta=array();
		$sql="UPDATE tbl_usuarios SET usua_nomb='$nomusua',usua_apel='$apeusua',usua_mail='$mailusua',usua_login='$userusua',usua_clave='$passusua' 
		,usua_estado='$estadusua',fk_tipousua='$nivelusua' WHERE usua_id=$codusua";
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

	public function delete($codusua,$con)
	{
		$respuesta=array();
		$sql="UPDATE tbl_usuarios SET usua_estado='0' WHERE usua_id=$codusua";
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