
 <?php
$util = new Utilidades;
//conexión con la BD
$con = $util->conexion(); 
$resul=$util->ConsuUltiID("tbl_compra","compra_ide",$con);
$numcom=$resul['id'];

 ?>

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
                       <h1 class="h3 mb-0 text-gray-800">Nueva Compra</h1>
                   </div>
<!-- DataTales Example -->
<div id="mensaje" class="btn btn-success btn-icon-split " style="display: none;"></div>
<div class="card shadow mb-4 border-left-primary">
                       <div class="card-header py-3">
                           <h6 class="m-0 font-weight-bold text-primary">Nueva Compra</h6>
                       </div>
                       <div class="card-body">
 <div class="container">
   <div class="row mt-4">
     <div class="col-md">

       <div class="form-group row">
         <label for="CodigoCompra" class="col-lg-3 col-form-label">Número de compra:</label>
         <div class="col-lg-3">
           <input type="text" disabled class="form-control" id="CodigoCompra" value="<?php echo $numcom; ?>">
         </div>
       </div>


       <div class="form-group row">
         <label for="Fecha" class="col-lg-3 col-form-label">Fecha de emisión:</label>
         <div class="col-lg-3">
           <input type="date" class="form-control" id="Fecha">
         </div>
       </div>

       <!-- <div class="form-group row">
         <label for="CodigoCliente" class="col-lg-3 col-form-label">Cliente:</label>
         <div class="col-lg-3">
           <select class="form-control" id="CodigoCliente">
             <?php
            //  $consulta = mysqli_query($con, "select * from tbl_cliente")
            //    or die(mysqli_error($con));

            //  $clientes = mysqli_fetch_all($consulta, MYSQLI_ASSOC);

            //  echo "<option value='0'>Seleccionar Cliente</option>";
            //  foreach ($clientes as $cli) {
            //    echo "<option value='" . $cli['clien_ide'] . "'>" . $cli['clien_nomb'] ." ".$cli['clien_apel']." ".$cli['clien_ndi']. "</option>";
            //  }
             ?>
           </select>
         </div>
       </div> -->


     </div>
   </div>


   <div class="row mt-4">
     <div class="col-md">
       <table class="table table-striped">
         <thead>
           <tr>
             <th>Código de Artículo</th>
             <th>Descripción</th>
             <th class="text-right">Cantidad</th>
             <th class="text-right">Precio Unitario</th>
             <th class="text-right">Total</th>
             <th class="text-right"></th>
           </tr>
         </thead>
         <tbody id="DetalleCompra">

         </tbody>
       </table>
       <button type="button" id="btnAgregarProducto" class="btn btn-success">Agregar Producto</button>
       <button type="button" id="btnTerminarCompra" class="btn btn-success">Terminar compra</button>
     </div>
   </div>

 </div>
 </div>
</div>
                       
</div>
 <!-- ModalProducto(Agregar) -->
 <div class="modal fade" id="ModalProducto" tabindex="-1" role="dialog">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">

         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">×</span>
         </button>
       </div>
       <div class="modal-body">

         <div class="form-group">
           <label>Producto:</label>
           <select class="form-control selectpicker " id="CodigoProducto" data-show-subtext="true" data-live-search="true" >
             <?php
             
             $listapro=$util->selectAll("tbl_producto",$con);
             foreach ($listapro as $lista) {
             echo '<option value="'.$lista['produc_ide'].'">'.$lista['produc_descrip'].'</option>';
             }
             
             ?>
           </select>
         </div>

         <div class="form-row">
           <div class="form-group col-md-12">
             <label>Cantidad:</label>
             <input type="number" id="Cantidad" class="form-control" placeholder="" min="1">
           </div>
         </div>
         <div class="form-row">
           <div class="form-group col-md-12">
             <label>Precio Costo:</label>
             <input type="text" id="cospro" name="cospro" size="10" maxlength="30" class="form-control"
					placeholder="Costo del producto..." onkeypress="return SoloNumerosFloat(event,this);">
           </div>
         </div>


       </div>
       <div class="modal-footer">
         <button type="button" id="btnConfirmarAgregarProducto" class="btn btn-success">Agregar a la compra</button>
         <button type="button" data-dismiss="modal" class="btn btn-success">Cancelar</button>
       </div>
     </div>
   </div>
 </div>


 <!-- ModalFinCompra -->
 <div class="modal fade" id="ModalFinCompra" tabindex="-1" role="dialog">
   <div class="modal-dialog" style="max-width: 600px" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h1>Acciones</h1>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">×</span>
         </button>
       </div>
       <div class="modal-footer">
         <button type="button" id="btnConfirmarCompra" class="btn btn-success">Confirmar compra</button>
         <button type="button" id="btnConfirmarImprimirCompra" class="btn btn-success">Confirmar e Imprimir compra</button>
         <button type="button" id="btnConfirmarDescartarCompra" class="btn btn-success">Descartar la compra</button>
       </div>
     </div>
   </div>
 </div>


 <!-- ModalConfirmarBorrarCom -->
 <div class="modal fade" id="ModalConfirmarBorrarCom" tabindex="-1" role="dialog">
   <div class="modal-dialog" style="max-width: 600px" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h1>¿Realmente quiere borrarlo?</h1>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">×</span>
         </button>
       </div>
       <div class="modal-footer">
         <button type="button" id="btnConfirmarBorradoCom" class="btn btn-success">Confirmar</button>
         <button type="button" data-dismiss="modal" class="btn btn-success">Cancelar</button>
       </div>
     </div>
   </div>
 </div>


 <script>

   document.addEventListener('DOMContentLoaded', function() {

     var producto;
     var cliente;

     document.getElementById('Fecha').valueAsDate = new Date();
     




     //Boton que muestra el diálogo de agregar producto
     $('#btnAgregarProducto').click(function() {
       LimpiarFormulario();
       $("#Cantidad").val("1");
       $("#ModalProducto").modal();
     });

     //Boton que agrega el producto al detalle
     $('#btnConfirmarAgregarProducto').click(function() {
       RecolectarDatosFormulario();
       $("#ModalProducto").modal('hide');
       if ($("#Cantidad").val() == "") { //Controlamos que no esté vacío la cantidad de productos
         alert('no puede estar vacío la cantidad de productos.');
         return;
       }
       EnviarInformacionProducto("agregarcompra");
     });

     //Boton terminar compra
     $('#btnTerminarCompra').click(function() {
       $("#ModalFinCompra").modal();
     });

     //Boton confirmar compra
     $('#btnConfirmarCompra').click(function() {
       if ($('#CodigoCliente').val() == 0) {
         alert('Debe seleccionar un cliente');
         return;
       }
       //RecolectarDatosCliente();
       EnviarInformacionCompra("confirmarcompra");
     });

     //Boton que descarta la compra generada borrando tanto en la tabla de Compras como detalleCompra
     $('#btnConfirmarDescartarCompra').click(function() {
       RecolectarDatosCliente();
       EnviarInformacionCompra("confirmardescartarcompra");
     });

     //Boton confirmar compra y ademas genera pdf
     $('#btnConfirmarImprimirCompra').click(function() {
       if ($('#CodigoCliente').val() == 0) {
         alert('Debe seleccionar un cliente');
         return;
       }
       RecolectarDatosCliente();
       EnviarInformacionCompraImprimir("confirmarcompra");
     });

     function RecolectarDatosFormulario() {
       producto = {
         codigoproducto: $('#CodigoProducto').val(),
         cantidad: $('#Cantidad').val(),
         preciocos: $('#cospro').val()
       };
     }

     function RecolectarDatosCliente() {
       cliente = {
         codigocliente: $('#CodigoCliente').val(),
         fecha: $('#Fecha').val()
       };
     }

     //Funciones AJAX para enviar y recuperar datos del servidor
     //******************************************************* 
     function EnviarInformacionProducto(accion) {
       $.ajax({
         type: 'POST',
         url: '../controlador/transaccion.php?accion=' + accion + '&codigocompra=' + <?php echo $numcom?>,
         data: producto,
         success: function(msg) {
            if(msg=='poco'){
              alert("'no puede agregar mas del mismo producto'");
            }else{
            RecuperarDetalle();
            }
         },
         error: function(msg) {
           alert("Hay un error .."+msg);
         }
       });
     }

     function EnviarInformacionCompra(accion) {

      if ( document.getElementById( "totalfac" )) {
        var total = document.getElementById("totalfac").value
        //var fecha = document.getElementById("Fecha").value  
        var fecha = $('#Fecha').val()
          }else {
            var total = 0;
          };     
        
       $.ajax({
         type: 'POST',
         url: '../controlador/transaccion.php?accion=' + accion + '&codigocompra=' + <?php echo $numcom;?> + '&total='+ total + '&fecha=' + fecha,
         data: cliente,
         success: function(msg) {
           window.location = 'inicio.php?page=listacomp';
         },
         error: function() {
           alert("Hay un error ..");
         }
       });
     }

     function EnviarInformacionCompraImprimir(accion) {
       $.ajax({
         type: 'POST',
         url: 'procesar.php?accion=' + accion + '&codigoCompra=' + <?php echo $numcom?>,
         data: cliente,
         success: function(msg) {
           window.open('pdfCompra.php?' + '&codigoCompra=' + <?php echo $numcom?>, '_blank');
           window.location = 'index.php';
         },
         error: function() {
           alert("Hay un error ..");
         }
       });
     }


     function LimpiarFormulario() {
       $('#Cantidad').val('');
     }



   });

   //Se ejecuta cuando se presiona un boton de borrar un item del detalle
   var cod;

   function borrarItem(coddetalle) {
     cod = coddetalle;
     $("#ModalConfirmarBorrarCom").modal();
   }

   function RecuperarDetalle() {
     $.ajax({
       type: 'GET',
       url: 'transacciones/recuperardetallecompra.php?codigocompra=' + <?php echo $numcom?>,
       success: function(datos) {
         document.getElementById('DetalleCompra').innerHTML = datos;
       },
       error: function() {
         alert("Hay un error ..");
       }

     });

   }
 </script>
