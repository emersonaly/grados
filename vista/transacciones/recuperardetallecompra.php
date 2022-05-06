<?php 
require_once("../../modelo/utilidades.class.php");
$util = new Utilidades;
$con = $util->conexion();

  $datos = mysqli_query($con, "select pro.produc_ide as produc_ide,produc_descrip,round(deta.detacom_precioproduc,2) as
  precio,detacom_cantidad,round(deta.detacom_precioproduc * detacom_cantidad,2) as preciototal , deta.detacom_ide as coddetalle
           from tbl_detacom as deta
           join tbl_producto as pro on pro.produc_ide=deta.detacom_codproduc
           where detacom_codcom=$_GET[codigocompra]") or die(mysqli_error($con));


  $resultado = mysqli_fetch_all($datos, MYSQLI_ASSOC);
  $pago=0;
  foreach ($resultado as $fila) {
      echo "<tr>";
      echo "<td>$fila[produc_ide]</td>";
      echo "<td>$fila[produc_descrip]</td>";      
      echo "<td class=\"text-right\">$fila[detacom_cantidad]</td>";            
      echo "<td class=\"text-right\">$fila[precio]</td>";
      echo "<td class=\"text-right\">$fila[preciototal]</td>";
      echo '<td class="text-right"><a class="btn btn-danger" onclick="borrarItem('.$fila['coddetalle'].')" role="button" href="#" id="'.$fila['coddetalle'].'">Eliminar</a></td>';
      echo "</tr>";      
      $pago=$pago+$fila['preciototal'];
  }
  echo "<tr>";
  echo "<td></td>";
  echo "<td></td>";      
  echo "<td></td>";            
  echo "<td class=\"text-right\"><strong>Importe total</strong></td>";              
  echo "<td class=\"text-right\"><strong>".number_format(round($pago,2),2,'.','')."</strong></td>";
  echo '<td><input type="hidden" class="form-control" id="totalfac" value="'.number_format(round($pago,2),2,'.','').'"></td>';            
  echo "</tr>";

?>