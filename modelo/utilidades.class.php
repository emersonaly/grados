<?php
class Utilidades
{
	function conexion()
	{
		$con = new mysqli("localhost","root","","db_grados");
		if ($con->connect_errno)
		{
		    echo "Fallo al conectar al servidor: (" . $con->connect_errno . ") " . $con->connect_error;
		}		
		else		
			return $con;
	}
	function sumaventasmes($fecha,$con)
	{
		$sql="SELECT SUM(factura_total) as mtotal FROM tbl_factura WHERE factura_fecha='$fecha'";
		$registros=$con->query($sql);
		$result = $registros->fetch_array();	
		return $result;
	}
	function sumaventasano($fecha,$con)
	{
		$sql="SELECT factura_fecha,SUM(factura_total) AS total  FROM tbl_factura  WHERE YEAR(factura_fecha)='$fecha'";
		$registros=$con->query($sql);
		$result = $registros->fetch_array();	
		return $result;
	}
	function contproductoson($con)
	{
		$sql="SELECT count(*) as res FROM tbl_producto WHERE produc_existen>1;";
		$registros=$con->query($sql);
		$result = $registros->fetch_array();	
		return $result;
	}
	function contproductosoff($con)
	{
		$sql="SELECT count(*) as res FROM tbl_producto WHERE produc_existen<1;";
		$registros=$con->query($sql);
		$result = $registros->fetch_array();	
		return $result;
	}
	function GenIdFact($con)
	{

 //   or die(mysqli_error($con));
 //$codigofactura = mysqli_insert_id($con);
		$sql="INSERT INTO tbl_factura() VALUES ()";
		$registros=$con->query($sql);
		$result=$con -> insert_id;
		return $result;
	}
	function ConsuUltiID($tabla,$campo,$con)
	{
		$sql="SELECT MAX($campo + 1) AS id FROM $tabla";
		$registros=$con->query($sql);
		$result = $registros->fetch_array();	
		return $result;
	}

	function selectAll($tabla,$con)
	{
		$sql="SELECT * FROM $tabla";
		$registros=$con->query($sql);
		$result=$registros;
		return $result;
	}

	function selectOne($tabla,$campo,$valor,$con)
	{
		$sql="SELECT * FROM $tabla WHERE $campo='$valor' LIMIT 1";
		$registros=$con->query($sql);
		return $registros->fetch_assoc();
	}
	function selectUsua($tabla,$campo,$valor,$con)
	{
		$sql="SELECT * FROM $tabla WHERE $campo='$valor' ";
		$registros=$con->query($sql);
		$result=$registros;
		return $result;
	}

	function selectValIngre($tabla,$campo,$valor,$campo2,$valor2,$con)
	{
		$sql="SELECT * FROM $tabla WHERE $campo='$valor' AND $campo2='$valor2' ";
		$registros=$con->query($sql);
		return $registros->num_rows;
	}
	function selectArray($tabla,$campo,$valor,$campo2,$valor2,$campo3,$valor3,$con)
	{
		$sql="SELECT * FROM $tabla WHERE $campo='$valor' AND $campo2='$valor2' AND $campo3='$valor3' LIMIT 1";
		$registros=$con->query($sql);
		return $registros->fetch_array();
	}	
		function selectDIS($tabla,$campo,$valor,$campo2,$valor2,$con)
	{
		$sql="SELECT * FROM $tabla WHERE $campo='$valor' AND $campo2='$valor2' ";
		$registros=$con->query($sql);
		return $registros->fetch_array();
	}
	function selectOneIngre($tabla,$campo,$valor,$campo2,$valor2,$con)
	{
		$sql="SELECT * FROM $tabla WHERE $campo='$valor' AND $campo2='$valor2' ";
		$registros=$con->query($sql);
		return $registros->fetch_array();
	}
	function selectSQL($tabla,$sql,$con)
	{
		$registros=$con->query($sql);
		return $registros;
	}
}
?>