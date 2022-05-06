

    <?php
    $util = new Utilidades;
    $con = $util->conexion();
    $consulta = mysqli_query(
      $con,
      "select 
      fact.factura_ide as codigo,
      date_format(factura_fecha,'%d/%m/%Y') as fecha,
      cli.clien_nomb as nombre, 
                    cli.clien_apel as apellido,
      round(sum(deta.detafac_precioproduc*deta.detafac_cantidad),2) as importefactura
  from tbl_factura as fact 
  join tbl_cliente as cli on cli.clien_ide=fact.factura_codclie
  join tbl_detafac as deta on deta.detafac_codfac=fact.factura_ide
  group by deta.detafac_codfac
  order by codigo desc	"
    )
      or die(mysqli_error($con));

    $filas = mysqli_fetch_all($consulta, MYSQLI_ASSOC);

    ?>
    <!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Lista Facturas</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Re</a> -->
                                
                    </div>
<!-- DataTales Example -->
<div id="mensaje" class="btn btn-success btn-icon-split " style="display: none;"></div>
<div class="card shadow mb-4 border-left-primary">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Lista Facturas emitidas</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
    <table class="table table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>Factura</th>
          <th>Cliente</th>
          <th>Fecha</th>
          <th class="text-right">Importe</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($filas as $fila) {
          ?>
          <tr>
            <td><?php echo $fila['codigo'] ?></td>
            <td><?php echo $fila['nombre']." ".$fila['apellido'] ?></td>
            <td><?php echo $fila['fecha'] ?></td>
            <td class="text-right"><?php echo '$' . number_format($fila['importefactura'], 2, ',', '.'); ?></td>
            <td class="text-right">
              <a class="btn btn-primary btn-sm botonimprimir" role="button" href="#" data-codigo="<?php echo $fila['codigo'] ?>">Imprimir</a>
              <a class="btn btn-danger btn-sm botonborrar" role="button" href="#" data-codigo="<?php echo $fila['codigo'] ?>">Eliminar</a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
    </div><button type="button" id="btnNuevaFactura" class="btn btn-success">Nueva Factura</button>
                        </div>
                        
                    </div>
    
  

  <!-- ModalConfirmarBorrarFac -->
  <div class="modal fade" id="ModalConfirmarBorrarFac" tabindex="-1" role="dialog">
    <div class="modal-dialog" style="max-width: 600px" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h1>¿Realmente quiere borrar la factura?</h1>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-footer">
          <button type="button" id="btnConfirmarBorradoFac" class="btn btn-success">Confirmar</button>
          <button type="button" data-dismiss="modal" class="btn btn-success">Cancelar</button>
        </div>
      </div>
    </div>


  <script>
    document.addEventListener("DOMContentLoaded", function() {

      $('#btnNuevaFactura').click(function() {
        window.location = 'inicio.php?page=factura';
      });

      var codigofactura;

      $('.botonborrar').click(function() {
        codigofactura = $(this).get(0).dataset.codigo;
        $("#ModalConfirmarBorrarFac").modal();
      });
      

      $('#btnConfirmarBorradoFac').click(function() {
        window.location = '../controlador/transaccion.php?accion=eliminarfactura&codigofactura=' + codigofactura;
      });

      $('.botonimprimir').click(function() {
        window.open('transacciones/imprimir_fac.php?' + '&codigofactura=' + $(this).get(0).dataset.codigo, '_blank');
      });

    });
    
  </script>