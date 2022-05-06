<?php 
$util = new Utilidades;
$con = $util->conexion(); 
?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Registro Usuario</h1>
	<!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
			class="fas fa-download fa-sm text-white-50"></i> Generate Re</a> -->
</div>
<div id="mensaje" class="btn btn-success btn-icon-split" style="display: none;"></div>
<div class="card shadow mb-4 border-left-primary">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Nuevo Usuario</h6>
	</div>
	<div class="card-body">
		<form method="POST" name="form_usua" id="form_usua" class="user">
		<table align="center" class="table table-bordered">
			<tr>
			<td align="right">Nombres: </td>
			<td><input type="text" id="usunom" name="usunom" size="20" maxlength="40" class="form-control form-control-use"
				 placeholder="Ingrese Nombres..." onblur="soloMayusculas('usunom')"></td>

				 <td align="right">Apellidos</td>
			<td><input type="text" id="usuape" name="usuape" size="20" maxlength="30" class="form-control form-control-use"
				placeholder="Ingrese Apellidos..." onblur="soloMayusculas('usuape')"></td>
                
				<td align="right">E-Mail</td>
			<td><input type="text" id="usumail" name="usumail" size="20" maxlength="30" class="form-control form-control-use"
				placeholder="Ingrese Correo..." onblur="soloMayusculas('usumail')"></td>
		</tr>
		<tr>
			<td  align="right">Usuario:</td>
			<td colspan="1"><input type="text" id="user" name="user" size="30" maxlength="60" class="form-control form-control-use"
				placeholder="Usuario..." onblur="soloMayusculas('user')"></td>

				<td align="right">Clave:</td>
			<td colspan="1"><input type="text" id="pass" name="pass" size="30" maxlength="60" class="form-control form-control-use"
				placeholder="Contraseña...." onblur="soloMayusculas('pass')"></td>
				
			<td align="right">Nivel:</td>
			<td colspan="1">
				<select class="form-control" name="valnivel" id="valnivel"> 
					<option>Seleccione Nivel</option>
						<?php
						$listacate=$util->selectAll("tbl_tipousua",$con);
						foreach ($listacate as $lista) {
						echo '<option value="'.$lista['tius_ide'].'">'.$lista['tius_descrip'].'</option>';
						}
						?>
				</select>			
			</td>	
				
		</tr>
		<tr>
			<td colspan="6" align="center">
			<a class="btn btn-primary btn-icon-split" onclick="return validaUsuario('incluir')" >                                        
                <span class="text">Guadar</span>
            </a>
			<a class="btn btn-secondary btn-icon-split" onclick=" resetform('form_usua')" >                                        
                <span class="text">Limpiar</span>
            </a>
				
			</td>
		</tr>
	</table>
</form>
	</div>
</div>

