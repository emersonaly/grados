<?php
include_once "../../zocal/lib/dompdf/autoload.inc.php";
use Dompdf\Dompdf;
$dompdf = new Dompdf();
ob_start();
include "./compra_vistaimprimir.php";
$html = ob_get_clean();
$dompdf->loadHtml($html);
$dompdf->render();
header("Content-type: application/pdf");
header("Content-Disposition: inline; filename=factura.pdf");
$dompdf->stream("Compra-".$timestamp.".pdf", [ "Attachment" => true]);
