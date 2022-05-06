<?php
$cliente = new Cliente;
//conexión con la BD
$con = $cliente->conexion(); 
$registros=$cliente->selectUsua("tbl_cliente","clien_borrado",1,$con);// Se llama a la Funcion Consulta
if ($registros)
{
?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Lista Clientes</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Re</a> -->
                                <a href="cliente/pdf_lista.php" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                                    <i class="fas fa-download fa-sm text-white-50"></i> 
                                    Reporte PDF</a>
                    </div>
<!-- DataTales Example -->
<div id="mensaje" class="btn btn-success btn-icon-split " style="display: none;"></div>
<div class="card shadow mb-4 border-left-primary">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Lista de Clientes</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nº Identificación</th>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>Dirección</th>
                                            <th>Tlf</th>
                                            <th>E-mail</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php foreach($registros as $fila): ?>
                                        <tr>
                                            <td><?php echo $fila['clien_ide']; ?></td>
                                            <td><?php echo $fila['clien_ndi']; ?></td>
                                            <td><?php echo $fila['clien_nomb']; ?></td>
                                            <td><?php echo $fila['clien_apel']; ?></td>
                                            <td><?php echo $fila['clien_direc']; ?></td>
                                            <td><?php echo $fila['clien_tel']; ?></td>
                                            <td><?php echo $fila['clien_mail']; ?></td>
                                            <td><a href="inicio.php?page=editar_clie&editval=<?php echo $fila['clien_ide']; ?>" class="btn btn-success btn-circle btn-sm">
                                                <i class="fas fa-user-edit"></i></a>
                                                <a href="#" class="btn btn-danger btn-circle btn-sm" onclick="eliminarCliente(this,'<?php echo $fila['clien_ide'];?>')">
                                                <i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
									<?php	endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
<?php
}
else
{
	echo "Falló la consulta";
}
?>
