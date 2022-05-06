

    <?php
    $util = new Utilidades;
    $con = $util->conexion();
    $consulta = mysqli_query(
      $con, "select 
      comp.compra_ide as codigo,date_format(compra_fecha,'%d/%m/%Y') as fecha, round(sum(deta.detacom_precioproduc*deta.detacom_cantidad),2) as importecompra
  from tbl_compra as comp join tbl_detacom as deta on deta.detacom_codcom=comp.compra_ide  group by deta.detacom_codcom  order by codigo desc	" )
      or die(mysqli_error($con));

    $filas = mysqli_fetch_all($consulta, MYSQLI_ASSOC);

    ?>
    <!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Lista Compras</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Re</a> -->
                                
                    </div>
<!-- DataTales Example -->
<div id="mensaje" class="btn btn-success btn-icon-split " style="display: none;"></div>
<div class="card shadow mb-4 border-left-primary">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Lista Compras Realizadas</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
    <table class="table table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>compra</th>
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
            <td><?php echo $fila['fecha'] ?></td>
            <td class="text-right"><?php echo '$' . number_format($fila['importecompra'], 2, ',', '.'); ?></td>
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
    </div><button type="button" id="btnNuevacompra" class="btn btn-success">Nueva compra</button>
                        </div>
                        
                    </div>
    
  

  <!-- ModalConfirmarBorrarFac -->
  <div class="modal fade" id="ModalConfirmarBorrarFac" tabindex="-1" role="dialog">
    <div class="modal-dialog" style="max-width: 600px" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h1>¿Realmente quiere borrar la compra?</h1>
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

      $('#btnNuevacompra').click(function() {
        window.location = 'inicio.php?page=compra';
      });

      var codigocompra;

      $('.botonborrar').click(function() {
        codigocompra = $(this).get(0).dataset.codigo;
        $("#ModalConfirmarBorrarFac").modal();
      });
      

      $('#btnConfirmarBorradoFac').click(function() {
        window.location = '../controlador/transaccion.php?accion=eliminarcompra&codigocompra=' + codigocompra;
      });

      $('.botonimprimir').click(function() {
        window.open('transacciones/imprimir_com.php?' + '&codigocompra=' + $(this).get(0).dataset.codigo, '_blank');
      });

    });
    
  </script>