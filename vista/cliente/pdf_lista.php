<?php
require_once("../../modelo/cliente.class.php");
include_once "../../zocal/lib/dompdf/autoload.inc.php";
$timestamp = date('Y-m-d H:i');

$clientes = new Cliente;
//conexión con la BD
$con = $clientes->conexion(); 
$registros=$clientes->selectUsua("tbl_cliente","clien_borrado",1,$con);// Se llama a la Funcion Consulta

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


$html.='                            <h1 align="center">Lista de Clientes / Grados Shopping </h1>
                        
                                <table class="paleBlueRows" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nº Identificación</th>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>Dirección</th>
                                            <th>Tlf</th>
                                            <th>E-mail</th>
                    
                                        </tr>
                                    </thead>
                                    <tbody>';
									foreach($registros as $fila):
                                     $html.='<tr>
                                            <td>'.$fila['clien_ide'].'</td>
                                            <td>'.$fila['clien_ndi'].'</td>
                                            <td>'.$fila['clien_nomb'].'</td>
                                            <td>'.$fila['clien_apel'].'</td>
                                            <td>'.$fila['clien_direc'].'</td>
                                            <td>'.$fila['clien_tel'].'</td>
                                            <td>'.$fila['clien_mail'].'</td>
                                        </tr>';
									endforeach ;
                                    $html.='</tbody>
                                </table>';
//echo $html;
                                    









use Dompdf\Dompdf;
$dompdf = new Dompdf();
$dompdf->set_option('dpi', 126);
$dompdf->setPaper('A4', 'portrait');
$dompdf->set_base_path('/grados/zocal/');
$dompdf->loadHtml($html);
$dompdf->render();
$dompdf->stream("Lista-De-clientes-".$timestamp.".pdf", [ "Attachment" => true]);

?>