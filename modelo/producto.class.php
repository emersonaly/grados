<?php
require_once("utilidades.class.php");
class Producto extends Utilidades
{
	public function insert($codpro,$despro,$talpro,$marpro,$catpro,$exispro,$cospro,$ganpro,$impupro,$pventpro,$obpro,$user,$estadpro,$con)
	{
		$respuesta=array();
		$sql="INSERT INTO tbl_producto (produc_codigo,produc_descrip,produc_existen,produc_costo,produc_preciovent,produc_talla,produc_impuesto,
		produc_porc1,produc_observa,produc_marca,produc_cat,produc_user,produc_borrado) 
		VALUES ('$codpro','$despro','$exispro','$cospro','$pventpro','$talpro','$impupro','$ganpro','$obpro','$marpro','$catpro','$user','$estadpro')";
		$ok=$con->query($sql);
		
		$afectadas=$con->affected_rows;

		if ($afectadas>0)
		{
			$respuesta['exito']=1;
			$respuesta['mensaje']="producto Registrado Con Exito!!!!";
		}
		else
		{
			$respuesta['exito']=0;
			$respuesta['mensaje']="Error al Agregar!!";
			//echo  $con->error;
		}
		return $respuesta;
	}

	public function update($codid,$codpro,$despro,$talpro,$marpro,$catpro,$exispro,$cospro,$ganpro,$impupro,$pventpro,$obpro,$estadpro,$con)
	{
		$respuesta=array();
		$sql="UPDATE tbl_producto SET produc_codigo='$codpro',produc_descrip='$despro',produc_existen='$exispro',produc_costo='$cospro',produc_preciovent='$pventpro'
		,produc_talla='$talpro',produc_impuesto='$impupro',produc_porc1='$ganpro',produc_observa='$obpro',produc_marca='$marpro',produc_cat='$catpro'
		,produc_borrado='$estadpro' WHERE produc_ide=$codid";
		$ok=$con->query($sql);
		$afectadas=$con->affected_rows;
		if ($afectadas>0)
		{
			$respuesta['exito']=1;
			$respuesta['mensaje']="producto Modificado";
		}
		else
		{
			$respuesta['exito']=0;
			$respuesta['mensaje']="Error al Modificar";
		}
		return $respuesta;
	}

	public function delete($codid,$con)
	{
		$respuesta=array();
		$sql="UPDATE tbl_producto SET produc_borrado='0' WHERE produc_ide=$codid";
		$ok=$con->query($sql);
		$afectadas=$con->affected_rows;
		if ($afectadas>0)
		{
			$respuesta['exito']=1;
			$respuesta['mensaje']="producto eliminado";
		}
		else
		{
			$respuesta['exito']=0;
			$respuesta['mensaje']="producto no se eliminó";
		}
		return $respuesta;
	}
}
?>