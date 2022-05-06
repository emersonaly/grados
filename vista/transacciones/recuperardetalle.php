<?php 
require_once("../../modelo/utilidades.class.php");
$util = new Utilidades;
$con = $util->conexion();

  $datos = mysqli_query($con, "select pro.produc_ide as produc_ide,produc_descrip,round(deta.detafac_precioproduc,2) as
   precio,detafac_cantidad,round(deta.detafac_precioproduc * detafac_cantidad,2) as preciototal , deta.detafac_ide as coddetalle
            from tbl_detafac as deta
            join tbl_producto as pro on pro.produc_ide=deta.detafac_codproduc
            where detafac_codfac=$_GET[codigofactura]") or die(mysqli_error($con));


  $resultado = mysqli_fetch_all($datos, MYSQLI_ASSOC);
  $pago=0;
  foreach ($resultado as $fila) {
      echo "<tr>";
      echo "<td>$fila[produc_ide]</td>";
      echo "<td>$fila[produc_descrip]</td>";      
      echo "<td class=\"text-right\">$fila[detafac_cantidad]</td>";            
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