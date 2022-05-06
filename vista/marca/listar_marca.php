<?php
$marca = new Marca;
//conexión con la BD
$con = $marca->conexion(); 
$registros=$marca->selectUsua("tbl_marca","marca_borrado",1,$con);// Se llama a la Funcion Consulta
if ($registros)
{
?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Lista Marcas</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Re</a> -->
                                <a href="marca/pdf_lista.php" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                                    <i class="fas fa-download fa-sm text-white-50"></i> 
                                    Reporte PDF</a>
                    </div>
<!-- DataTales Example -->
<div id="mensaje" class="btn btn-success btn-icon-split " style="display: none;"></div>
<div class="card shadow mb-4 border-left-primary">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Lista de Marcas</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr align="center">
                                            <th>ID</th>
                                            <th>Descripción</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php foreach($registros as $fila): ?>
                                        <tr>
                                            <td ><?php echo $fila['marca_ide']; ?></td>
                                            <td><?php echo $fila['marca_descrip']; ?></td>
                                            <td align="center"><a href="inicio.php?page=editar_marca&editval=<?php echo $fila['marca_ide']; ?>" class="btn btn-success btn-circle btn-sm">
                                                <i class="fas fa-user-edit"></i></a>
                                                <a href="#" class="btn btn-danger btn-circle btn-sm" onclick="eliminarMarca(this,'<?php echo $fila['marca_ide'];?>')">
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
