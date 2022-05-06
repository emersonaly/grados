<?php
//Instancio la clase
$resulmar = new Categoria;
//Hago la conexión con la BD
$con = $resulmar->conexion();
//Recibimos el código usuario
$editval=$_GET["editval"];
//En este caso el query devuelve un registro en un array asociativo
$fila=$resulmar->selectOne("tbl_categoria","categoria_ide",$editval,$con);
if ($fila)
{
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Editar categorias</h1>
	<!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
			class="fas fa-download fa-sm text-white-50"></i> Generate Re</a> -->
</div>
<div id="mensaje" class="btn btn-success btn-icon-split" style="display: none;"></div>
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Editar categorias</h6>
	</div>
	<div class="card-body">
		<form method="POST" name="form_categoria" id="form_categoria" class="user">
		<table align="center" class="table table-bordered">
			<tr>
			<td align="right">ID: </td>
			<td><input type="text" id="id" name="id" size="1"  class="form-control form-control-use" value="<?php echo $fila['categoria_ide']; ?>" disabled></td>

				 <td align="right">Descripción</td>
			<td><input type="text" id="descat" name="descat" size="10" maxlength="30" class="form-control form-control-use"
				placeholder="Ingrese Apellidos..." onblur="soloMayusculas('descat')" value="<?php echo $fila['categoria_descrip']; ?>"></td>
				
		</tr>
		<tr>
			<td colspan="6" align="center">
				<a class="btn btn-primary btn-icon-split" onclick="return validaCategoria('modificar')" >                                        
                <span class="text">Guadar</span>
            </a>
				<a class="btn btn-secondary btn-icon-split" href="inicio.php?page=categoria" >                                        
                <span class="text">Volver</span>
            </a>
			
			</td>
		</tr>
	</table>
</form>
	</div>
</div>
<?php
}
else
{
	echo "Falló la consulta";
}
?>
