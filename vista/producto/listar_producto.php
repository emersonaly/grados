<?php
$producto = new Producto;
//conexión con la BD
$con = $producto->conexion(); 
$registros=$producto->selectUsua("tbl_producto","produc_borrado",1,$con);// Se llama a la Funcion Consulta
if ($registros)
{
?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Lista productos</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Re</a> -->
                                <a href="producto/pdf_lista.php" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                                    <i class="fas fa-download fa-sm text-white-50"></i> 
                                    Reporte PDF</a>
                    </div>
<!-- DataTales Example -->
<div id="mensaje" class="btn btn-success btn-icon-split " style="display: none;"></div>
<div class="card shadow mb-4 border-left-primary">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Lista de productos</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr align="center">
                                            <th>ID</th>
                                            <th>Cod Producto</th>
                                            <th>Descripción</th>
                                            <th>Talla</th>
                                            <th>Marca</th>
                                            <th>Categoria</th>                                            
                                            <th>Existencia</th>
                                            <th>Costo</th>                                            
                                            <th>% Ganancia</th>
                                            <th>Impuesto</th>
                                            <th>Precio Venta</th>  
                                            <th>Obsevación</th>                                            
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php foreach($registros as $fila): ?>
                                        <tr>
                                            <td ><?php echo $fila['produc_ide']; ?></td>
                                            <td><?php echo $fila['produc_codigo']; ?></td>
                                            <td><?php echo $fila['produc_descrip']; ?></td>
                                            <td><?php echo $fila['produc_talla']; ?></td>
                                            <td>
                                                <?php 
                                            $regismarca=$producto->selectOne("tbl_marca","marca_ide",$fila['produc_marca'],$con);                                            
                                            echo $regismarca['marca_descrip']; ?>
                                            </td>
                                            <td><?php 
                                            $regiscat=$producto->selectOne("tbl_categoria","categoria_ide",$fila['produc_cat'],$con);                                            
                                            echo $regiscat['categoria_descrip']; 
                                                ?>
                                            </td>
                                            <td><?php echo $fila['produc_existen']; ?></td>
                                            <td><?php echo $fila['produc_costo']; ?></td>
                                            <td><?php echo $fila['produc_preciovent']; ?></td>                                            
                                            <td><?php echo $fila['produc_impuesto']; ?></td>
                                            <td><?php echo $fila['produc_porc1']; ?></td>
                                            <td><?php echo $fila['produc_observa']; ?></td>                                            
                                            <td align="center"><a href="inicio.php?page=editar_produc&editval=<?php echo $fila['produc_ide']; ?>" class="btn btn-success btn-circle btn-sm">
                                                <i class="fas fa-user-edit"></i></a>
                                                <a href="#" class="btn btn-danger btn-circle btn-sm" onclick="eliminarProducto(this,'<?php echo $fila['produc_ide'];?>')">
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
