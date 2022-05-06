<?php
require_once("../../modelo/utilidades.class.php");
include_once "../../zocal/lib/dompdf/autoload.inc.php";
$timestamp = date('Y-m-d H:i');

$productos = new Utilidades;
//conexión con la BD
$con = $productos->conexion(); 
$registros=$productos->selectUsua("tbl_producto","produc_borrado",1,$con);// Se llama a la Funcion Consulta
$html='
<meta charset="utf-8">
<head>
<style type="text/css">
table.paleBlueRows {
    font-family: Arial, Helvetica, sans-serif;
    border: 0px solid #FFFFFF;
    width: 90%;
    height: %;
    text-align: center;
    border-collapse: collapse;
  }
  table.paleBlueRows td, table.paleBlueRows th {
    border: 0px solid #000000;
    padding: 10px 10px;
  }
  table.paleBlueRows tbody td {
    font-size: 16px;
    font-weight: bold;
  }
  table.paleBlueRows tr:nth-child(even) {
    background: #D0E4F5;
  }
  table.paleBlueRows thead {
    background: #0B6FA4;
    border-bottom: 5px solid #FFFFFF;
  }
  table.paleBlueRows thead th {
    font-size: 17px;
    font-weight: bold;
    color: #FFFFFF;
    text-align: center;
    border-left: 0px solid #FFFFFF;
  }
  table.paleBlueRows thead th:first-child {
    border-left: none;
  }
  
  table.paleBlueRows tfoot {
    font-size: 14px;
    font-weight: bold;
    color: #333333;
    background: #D0E4F5;
    border-top: 3px solid #444444;
  }
  table.paleBlueRows tfoot td {
    font-size: 14px;
  }

    

</style>
</head>';


$html.='                            <h1 align="center">Lista de productos / Grados Shopping </h1>
                        
                                <table class="paleBlueRows" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>ID</th>
                                        <th>Cod Producto</th>
                                        <th>Descripción</th>
                                        <th>Talla</th>
                                        <th>Marca</th>
                                        <th>Categoria</th>                                            
                                        <th>Existencia</th>
                                        <th>Costo</th>                                            
                                        <th>% Ganancia</th>
                                        <th>Impuesto</th>
                                        <th>Precio Venta</th>  
                                        <th>Obsevación</th>                                            
                      
                                        </tr>
                                    </thead>

                                    <tbody>';
									foreach($registros as $fila):
                                        $regismarca=$productos->selectOne("tbl_marca","marca_ide",$fila['produc_marca'],$con);
                                        $regiscate=$productos->selectOne("tbl_categoria","categoria_ide",$fila['produc_cat'],$con);
                                     $html.='<tr>
                                            <td>'.$fila['produc_ide'].'</td>
                                            <td>'.$fila['produc_codigo'].'</td>
                                            <td>'.$fila['produc_descrip'].'</td>
                                            <td>'.$fila['produc_talla'].'</td>
                                            <td>'.$regismarca['marca_descrip'].'</td>
                                            <td>'.$regiscate['categoria_descrip'].'</td>
                                            <td>'.$fila['produc_existen'].'</td>
                                            <td>'.$fila['produc_costo'].'</td>
                                            <td>'.$fila['produc_porc1'].'</td>
                                            <td>'.$fila['produc_impuesto'].'</td>
                                            <td>'.$fila['produc_preciovent'].'</td>
                                            <td>'.$fila['produc_observa'].'</td>
                                            

                                        </tr>';
									endforeach ;
                                    $html.='</tbody>
                                </table>';
//echo $html;
                                    

use Dompdf\Dompdf;
$dompdf = new Dompdf();
$dompdf->set_option('dpi', 156);
$dompdf->setPaper('A4', 'portrait');
$dompdf->loadHtml($html);
$dompdf->render();
$dompdf->stream("Lista-De-productos-".$timestamp.".pdf", [ "Attachment" => true]);
?>