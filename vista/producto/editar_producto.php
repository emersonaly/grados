<?php
$util = new Utilidades;
$con = $util->conexion(); 

//Instancio la clase
$resulmar = new Marca;
//Hago la conexión con la BD
$con = $resulmar->conexion();
//Recibimos el código usuario
$editval=$_GET["editval"];
//En este caso el query devuelve un registro en un array asociativo
$fila=$resulmar->selectOne("tbl_producto","produc_ide",$editval,$con);
if ($fila)
{
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Editar sdfsdf</h1>
	<!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
			class="fas fa-download fa-sm text-white-50"></i> Generate Re</a> -->
</div>
<div id="mensaje" class="btn btn-success btn-icon-split" style="display: none;"></div>
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Editar prod</h6>
	</div>
	<div class="card-body">
	<form method="POST" name="form_producto" id="form_producto" class="user">
		<table align="center" class="table table-bordered">
			<tr>
				<td  align="right">Cod Producto:</td>
				<td colspan="1"><input type="text" id="codpro" name="codpro" size="10" maxlength="30" class="form-control form-control-use"
					placeholder="Cod del producto..." onblur="soloMayusculas('codpro')" value="<?php echo $fila['produc_codigo']; ?>" required></td>

				<td align="right">Descripción</td>
				<td colspan="3"><input type="text" id="despro" name="despro" size="10" maxlength="30" class="form-control form-control-use"
					placeholder="Descripcion producto..." onblur="soloMayusculas('despro')" value="<?php echo $fila['produc_descrip']; ?>" required></td>

				<td align="right">Talla:</td>
				<td><input type="text" id="talpro" name="talpro" size="10" maxlength="30" class="form-control form-control-use"
					placeholder="Talla..." onblur="soloMayusculas('talpro')" value="<?php echo $fila['produc_talla']; ?>" required ></td>
			</tr>
			<tr>
				<td align="right">Marca:</td>
				<td colspan="2">
				<select class="form-control" name="marpro" id="marpro" required > 
					
						<?php
						$res=$util->selectOne("tbl_marca","marca_ide",$fila['produc_marca'],$con);
						echo '<option value="'.$res['marca_ide'].'">'.$res['marca_descrip'].'</option>';
						$listamar=$util->selectAll("tbl_marca",$con);
						foreach ($listamar as $lista) {
						echo '<option value="'.$lista['marca_ide'].'">'.$lista['marca_descrip'].'</option>';
						}
						?>
				</select>			
			
				
				<td align="right">Categoria:</td>
				<td colspan="2">
				<select class="form-control" name="catpro" id="catpro" required > 
						<?php
						$res=$util->selectOne("tbl_categoria","categoria_ide",$fila['produc_cat'],$con);
						echo '<option value="'.$res['categoria_ide'].'">'.$res['categoria_descrip'].'</option>';

						$listacate=$util->selectAll("tbl_categoria",$con);
						foreach ($listacate as $lista) {
						echo '<option value="'.$lista['categoria_ide'].'">'.$lista['categoria_descrip'].'</option>';
						}
						?>
				</select>			
				
				<td align="right">Existencia</td>
				<td colspan="2"><input type="number" id="exispro" name="exispro" size="10" maxlength="30" class="form-control form-control-use"
				placeholder="Cantidad..." onkeypress="return SoloNumeros(event)" value="<?php echo $fila['produc_existen']; ?>" required ></td>
				
			</tr>
			<tr>
				<td align="right">Costo:</td>
				<td colspan="1"><input type="text" id="cospro" name="cospro" size="10" maxlength="30" class="form-control form-control-use"
					placeholder="Costo del producto..." onblur="calPreVentPro();" value="<?php echo $fila['produc_costo']; ?>" required></td>
			
		
				<td align="right">% Ganancia:</td>
				<td><input type="text" id="ganpro" name="ganpro" size="10" maxlength="30" class="form-control form-control-use"
					placeholder="Ganancia..." onblur="calPreVentPro();" value="<?php echo $fila['produc_porc1']; ?>"></td>
				
				<td align="right">Impuesto:</td>
				<td><input type="text" id="impupro" name="impupro" size="10" maxlength="30" class="form-control form-control-use"
					placeholder="Impuesto..." onblur="calPreVentPro();" value="<?php echo $fila['produc_impuesto']; ?>"></td>
					
				<td align="right">Precio Venta:</td>
				<td><input type="text" id="pventpro" name="pventpro" size="10" maxlength="30" class="form-control form-control-use"
					placeholder="Precio Venta..." value="<?php echo $fila['produc_preciovent']; ?>"  disabled ></td>
			</tr>
			<tr>		
				
				<td  align="right">Observación:</td>
				<td colspan="7"><input type="text" id="obpro" name="obpro" size="10" maxlength="30" class="form-control form-control-use"
					placeholder="Observacion Acerca del Producto..." onblur="soloMayusculas('obpro')" value="<?php echo $fila['produc_observa']; ?>" ></td>
				
			</tr>
		<tr>
			<input type="hidden" name="id" id="id" value="<?php echo $fila['produc_ide']; ?>">
			<input type="hidden" id="user" name="user" value="<?php echo $_SESSION['id'] ?>">
			<td colspan="8" align="center">
				<a class="btn btn-primary btn-icon-split" onclick="return validaProducto('modificar')" >                                        
                <span class="text">Guadar</span>
            </a>
				<a class="btn btn-secondary btn-icon-split" href="inicio.php?page=producto" >                                        
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
