<?php
include_once "autoload.inc.php";
use Dompdf\Dompdf;


$dompdf = new Dompdf();
$dompdf->loadHtml('<h1>Hola mundo</h1><br><a href="https://parzibyte.me/blog">By Parzibyte</a>');
$dompdf->render();
$dompdf->stream();
