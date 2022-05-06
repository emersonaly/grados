<?php
require_once("../modelo/utilidades.class.php");
header('Content-Type: application/json');


$util = new Utilidades;
$con = $util->conexion();

switch ($_GET['accion']) {
    case 'agregar':
        //Recuperamos el precio del producto
        $respuesta = mysqli_query($con, "SELECT produc_preciovent,produc_existen from tbl_producto 
        where produc_ide=".$_POST['codigoproducto']);
        $reg=mysqli_fetch_array($respuesta);
     if ($reg['produc_existen'] < $_POST['cantidad']) {
         $respuesta='poca';
        echo json_encode($respuesta);
     }else{
        //print_r($reg);UPDATE cursos_abiertos SET cupos = ($cupos - 1) WHERE id = 1
        $respuesta = mysqli_query($con, "INSERT INTO tbl_detafac(detafac_codfac,detafac_codproduc,detafac_precioproduc,detafac_cantidad) values ($_GET[codigofactura],$_POST[codigoproducto],$reg[produc_preciovent],$_POST[cantidad])");
        $respuesta2 = mysqli_query($con, "UPDATE tbl_producto SET produc_existen = ($reg[produc_existen] - $_POST[cantidad]) where produc_ide=$_POST[codigoproducto]");
        echo json_encode($respuesta);
     }
        break;
    

    case 'confirmarfactura':
        //print_r($_POST);
        $respuesta = mysqli_query($con, "UPDATE tbl_factura SET
                                                factura_fecha='$_POST[fecha]',
                                                factura_codclie='$_POST[codigocliente]',
                                                factura_total='$_GET[total]'
                                              WHERE factura_ide=$_GET[codigofactura]");
        echo json_encode($respuesta);        
        break;


    case 'eliminardetalle':
        //print_r($_GET);
        $res = mysqli_query($con, "SELECT detafac_cantidad,detafac_codproduc from tbl_detafac WHERE detafac_ide=$_GET[codigo]");
        $reg=mysqli_fetch_array($res);
        $cantisumar = $reg['detafac_cantidad'];
        $codproducdeta =  $reg['detafac_codproduc'];     
        $respuesta = mysqli_query($con, "DELETE FROM tbl_detafac WHERE detafac_ide=$_GET[codigo]");
        $respuesta2 = mysqli_query($con, "UPDATE tbl_producto SET produc_existen = ( produc_existen + $cantisumar ) where produc_ide=$codproducdeta");
        echo json_encode($respuesta);
        break;
    case 'confirmardescartarfactura':
            $respuesta = mysqli_query($con, "DELETE FROM  tbl_factura WHERE factura_ide=$_GET[codigofactura]");
            $respuesta = mysqli_query($con, "DELETE FROM  tbl_detafac WHERE detafac_codfac=$_GET[codigofactura]");
            echo json_encode($respuesta);
        break;
    
    case 'eliminarfactura':
             $respuesta = mysqli_query($con, "DELETE FROM  tbl_factura WHERE factura_ide=$_GET[codigofactura]");
             $respuesta = mysqli_query($con, "DELETE FROM  tbl_detafac WHERE detafac_codfac=$_GET[codigofactura]");
             header('location:../vista/inicio.php?page=listafactu');
        break;

    case 'agregarcompra':
            //Recuperamos el precio del producto   
            $respuesta = mysqli_query($con, "SELECT detacom_codproduc from tbl_detacom 
            where detacom_codcom=$_GET[codigocompra] AND detacom_codproduc=$_POST[codigoproducto]");
            $reg=mysqli_fetch_array($respuesta);
            if ($reg > 0 ) {
                $respuesta = 'poco';
                echo json_encode($respuesta);
            }else {
            $respuesta = mysqli_query($con, "INSERT INTO tbl_detacom(detacom_codcom,detacom_codproduc,detacom_precioproduc,detacom_cantidad) values ($_GET[codigocompra],$_POST[codigoproducto],$_POST[preciocos],$_POST[cantidad])");
            //$respuesta2 = mysqli_query($con, "UPDATE tbl_producto SET produc_existen = ($reg[produc_existen] - $_POST[cantidad]) where produc_ide=$_POST[codigoproducto]");
            echo json_encode($respuesta);
            }
        break;
    case 'eliminardetallecompra':     
            $respuesta = mysqli_query($con, "DELETE FROM tbl_detacom WHERE detacom_ide=$_GET[codigo]");
            echo json_encode($respuesta);
        break;

    case 'confirmardescartarcompra':
            $respuesta = mysqli_query($con, "DELETE FROM  tbl_detacom WHERE detacom_codcom=$_GET[codigocompra]");
            echo json_encode($respuesta);
        break;
    case 'confirmarcompra':
            $respuesta3 = mysqli_query($con, "INSERT INTO tbl_compra (compra_ide,compra_fecha,compra_total) VALUES ($_GET[codigocompra],'$_GET[fecha]',$_GET[total])");
            if (json_encode($respuesta3)==true) {
                $respuesta1 = mysqli_query($con, "SELECT detacom_codproduc,detacom_cantidad,detacom_precioproduc from tbl_detacom 
                where detacom_codcom=".$_GET['codigocompra']);
                foreach ($respuesta1 as $res) {
                    $codproducdeta =  $res['detacom_codproduc'];
                    $cantisumar = $res['detacom_cantidad'];
                    $precio = $res['detacom_precioproduc'];
                    $rescon = mysqli_query($con, "SELECT produc_preciovent from tbl_producto  where produc_ide=$codproducdeta");                  
                    $reg=mysqli_fetch_array($rescon);
                    $finalcost = ($reg['produc_preciovent'] > $precio) ? $reg['produc_preciovent'] : $precio;
                    $respuesta2 = mysqli_query($con, "UPDATE tbl_producto SET produc_preciovent=$finalcost,produc_existen = ( produc_existen + $cantisumar ) where produc_ide=$codproducdeta");
                }
            }
            echo json_encode($respuesta3);        
        break;
    case 'eliminarcompra':
        $respuesta3 = mysqli_query($con, "INSERT INTO tbl_compra (compra_ide,compra_fecha,compra_total) VALUES ($_GET[codigocompra],$_GET[fecha],$_GET[total])");
            if (json_encode($respuesta3)==true) {
                $respuesta1 = mysqli_query($con, "SELECT detacom_codproduc,detacom_cantidad,detacom_precioproduc from tbl_detacom 
                where detacom_codcom=".$_GET['codigocompra']);
                foreach ($respuesta1 as $res) {
                    $codproducdeta =  $res['detacom_codproduc'];
                    $cantisumar = $res['detacom_cantidad'];
                    $res['detacom_precioproduc'];
                    $respuesta2 = mysqli_query($con, "UPDATE tbl_producto SET produc_existen = ( produc_existen - $cantisumar ) where produc_ide=$codproducdeta");
                } 
            }
            $respuesta = mysqli_query($con, "DELETE FROM  tbl_compra WHERE compra_ide=$_GET[codigocompra]");
            $respuesta4 = mysqli_query($con, "DELETE FROM  tbl_detacom WHERE detacom_codcom=$_GET[codigocompra]");
            header('location:../vista/inicio.php?page=listacomp');
        break;
          

}

?>