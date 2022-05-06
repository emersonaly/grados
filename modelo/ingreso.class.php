<?php
require_once("utilidades.class.php");
class Ingreso extends Utilidades
{
	public function insert($cedpacingre,$numhabingre,$fecingre,$codmedingre,$con)
	{  
        $respuesta=array();
        $c = new Utilidades;
        $con2 = $c->conexion(); 
        $registros=$c->selectValIngre("ingreso","ced_pac",$cedpacingre,"cod_med",$codmedingre,$con2);   
        if ($registros>0) {
            $respuesta['exito']=0;
            $respuesta['mensaje']="Medico se repite!!";
            return $respuesta;
        }else{
                $sql="INSERT INTO ingreso (ced_pac,hab_ing,fec_ing,cod_med) 
                VALUES ('$cedpacingre','$numhabingre','$fecingre','$codmedingre')";
                $ok=$con->query($sql);                
                $afectadas=$con->affected_rows;

                    if ($afectadas>0)
                    {
                        $respuesta['exito']=1;
                        $respuesta['mensaje']="Ingreso Registrado Con Exito!!!!";
                    }
                    else
                    {
                        $respuesta['exito']=0;
                        $respuesta['mensaje']="Error al Ingresar!!";
                        
                    }
                    return $respuesta;
            }
	}

	public function update($codingre,$cedpacingre,$numhabingre,$fecingre,$codmedingre,$con)
	{
        $respuesta=array();
        $c = new Utilidades;
        $con2 = $c->conexion(); 
        $registros=$c->selectArray("ingreso","cod_ing",$codingre,"ced_pac",$cedpacingre,"cod_med",$codmedingre,$con2);
        
         $c2 = new Utilidades;
        $con3 = $c2->conexion(); 
        $registros2=$c2->selectDIS("ingreso","ced_pac",$cedpacingre,"cod_med",$codmedingre,$con3);
        //echo "dos.".$registros2;
        $c3 = new Utilidades;
        $con4 = $c3->conexion(); 
        $registros3=$c2->selectDIS("ingreso","cod_ing",$codingre,"ced_pac",$cedpacingre,$con4);

        $c4 = new Utilidades;
        $con5 = $c4->conexion(); 
        $registros4=$c4->selectOne("ingreso","cod_ing",$codingre,$con);

        if (
            ($codmedingre == $registros['cod_med'] && $cedpacingre != $registros['ced_pac']) || 
            ($codmedingre == $registros['cod_med'] && $numhabingre != $registros['hab_ing']) || 
            ($codmedingre == $registros['cod_med'] && $fecingre != $registros['fec_ing']) ||
            ($cedpacingre != $registros4['ced_pac'] && $codingre == $registros4['cod_ing']) ||
            ($codmedingre != $registros2['cod_med'] && $cedpacingre == $registros3['ced_pac']) 
            
             
        ) 
        {
            $sql="UPDATE ingreso SET ced_pac='$cedpacingre',hab_ing='$numhabingre',fec_ing='$fecingre',cod_med='$codmedingre' WHERE cod_ing=$codingre";
                $ok=$con->query($sql);
                $afectadas=$con->affected_rows;
                if ($afectadas>0)
                {
                    $respuesta['exito']=1;
                    $respuesta['mensaje']="Ingreso Modificado";
                }
                else
                {
                    $respuesta['exito']=0;
                    $respuesta['mensaje']="Error al Modificar";
                }
                return $respuesta;

          
         }elseif ($cedpacingre == $registros2['ced_pac'] && $codmedingre == $registros2['cod_med'])  {
                $respuesta['exito']=0;
                $respuesta['mensaje']="Medico se repite!!";
            return $respuesta;
            }
            var_dump($respuesta);
	}

	public function delete($codingre,$con)
	{
		$respuesta=array();
		$sql="DELETE FROM ingreso WHERE cod_ing=$codingre";
		$ok=$con->query($sql);
		$afectadas=$con->affected_rows;
		if ($afectadas>0)
		{
			$respuesta['exito']=1;
			$respuesta['mensaje']="Ingreso eliminado";
		}
		else
		{
			$respuesta['exito']=0;
			$respuesta['mensaje']="Ingreso no se eliminó";
		}
		return $respuesta;
	}
}
?>