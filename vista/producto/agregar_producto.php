<?php 
$util = new Utilidades;
$con = $util->conexion(); 
?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Registro Producto</h1>
	<!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
			class="fas fa-download fa-sm text-white-50"></i> Generate Re</a> -->
</div>
<div id="mensaje" class="btn btn-success btn-icon-split" style="display: none;"></div>
<div class="card shadow mb-4 border-left-primary">
	<div class="card-header py-3">
	<h6 class="m-0 font-weight-bold text-primary">Registro Producto</h6>
	</div>
	<div class="card-body">
		<form method="POST" name="form_producto" id="form_producto" class="user">
		<table align="center" class="table table-bordered">
			<tr>
				<td  align="right">Cod Producto:</td>
				<td colspan="1"><input type="text" id="codpro" name="codpro" size="10" maxlength="30" class="form-control form-control-use"
					placeholder="Cod del producto..." onblur="soloMayusculas('codpro')" required></td>

				<td align="right">Descripción</td>
				<td colspan="3"><input type="text" id="despro" name="despro" size="10" maxlength="30" class="form-control form-control-use"
					placeholder="Descripcion producto..." onblur="soloMayusculas('despro')" required></td>

				<td align="right">Talla:</td>
				<td><input type="text" id="talpro" name="talpro" size="10" maxlength="30" class="form-control form-control-use"
					placeholder="Talla..." onblur="soloMayusculas('talpro')" required ></td>
			</tr>
			<tr>
				<td align="right">Marca:</td>
				<td colspan="2">
				<select class="form-control" name="marpro" id="marpro" required > 
						<?php
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
						$listacate=$util->selectAll("tbl_categoria",$con);
						foreach ($listacate as $lista) {
						echo '<option value="'.$lista['categoria_ide'].'">'.$lista['categoria_descrip'].'</option>';
						}
						?>
				</select>			
				
				<td align="right">Existencia</td>
				<td colspan="2"><input type="number" id="exispro" name="exispro" size="10" maxlength="30" class="form-control form-control-use"
				placeholder="Cantidad..." onkeypress="return SoloNumeros(event)" required ></td>
				
			</tr>
			<tr>
				<td align="right">Costo:</td>
				<td colspan="1"><input type="text" id="cospro" name="cospro" size="10" maxlength="30" class="form-control form-control-use"
					placeholder="Costo del producto..." onblur="calPreVentPro();" required></td>
			
		
				<td align="right">% Ganancia:</td>
				<td><input type="text" id="ganpro" name="ganpro" size="10" maxlength="30" class="form-control form-control-use"
					placeholder="Ganancia..." onblur="calPreVentPro();" ></td>
				
				<td align="right">Impuesto:</td>
				<td><input type="text" id="impupro" name="impupro" size="10" maxlength="30" class="form-control form-control-use"
					placeholder="Impuesto..." onblur="calPreVentPro();" ></td>
					
				<td align="right">Precio Venta:</td>
				<td><input type="text" id="pventpro" name="pventpro" size="10" maxlength="30" class="form-control form-control-use"
					placeholder="Precio Venta..."  disabled></td>
			</tr>
			<tr>		
				
				<td  align="right">Observación:</td>
				<td colspan="7"><input type="text" id="obpro" name="obpro" size="10" maxlength="30" class="form-control form-control-use"
					placeholder="Observacion Acerca del Producto..." onblur="soloMayusculas('obpro')" ></td>
				
			</tr>
		<tr>
			<input type="hidden" id="user" name="user" value="<?php echo $_SESSION['id'] ?>">
			<td colspan="8" align="center">
				<a class="btn btn-primary btn-icon-split" onclick="return validaProducto('incluir')" >                                        
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

