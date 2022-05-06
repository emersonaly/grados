<?php
$usuarios = new usuario;
//conexión con la BD
$con = $usuarios->conexion(); 
$registros=$usuarios->selectUsua("tbl_usuarios","usua_estado",1,$con);// Se llama a la Funcion Consulta
if ($registros)
{
?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Lista Usuarios</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Re</a> -->
                                <a href="usuario/pdf_lista.php" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                                    <i class="fas fa-download fa-sm text-white-50"></i> 
                                    Reporte PDF</a>
                    </div>
<!-- DataTales Example -->
<div id="mensaje" class="btn btn-success btn-icon-split " style="display: none;"></div>
<div class="card shadow mb-4 border-left-primary">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Lista de Usuarios</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>Correo</th>
                                            <th>Usuario</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php foreach($registros as $fila): ?>
                                        <tr>
                                            <td><?php echo $fila['usua_id']; ?></td>
                                            <td><?php echo $fila['usua_nomb']; ?></td>
                                            <td><?php echo $fila['usua_apel']; ?></td>
                                            <td><?php echo $fila['usua_mail']; ?></td>
                                            <td><?php echo $fila['usua_login']; ?></td>
                                            <td><a href="inicio.php?page=editar_usua&editval=<?php echo $fila['usua_id']; ?>" class="btn btn-success btn-circle btn-sm">
                                                <i class="fas fa-user-edit"></i></a>
                                                <a href="#" class="btn btn-danger btn-circle btn-sm" onclick="eliminarUsuarios(this,'<?php echo $fila['usua_id'];?>')">
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
