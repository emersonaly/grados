<?php
//Instancio la clase utilidades
$resulusu = new Usuario;
$resul = new Utilidades;
//Hago la conexión con la BD
$con = $resulusu->conexion();

//Recibimos el código usuario
$editval=$_GET["editval"];
//En este caso el query devuelve un registro en un array asociativo
$fila=$resulusu->selectOne("tbl_usuarios","usua_id",$editval,$con);
if ($fila)
{
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Registro Usuario</h1>
	<!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
			class="fas fa-download fa-sm text-white-50"></i> Generate Re</a> -->
</div>
<div id="mensaje" class="btn btn-success btn-icon-split" style="display: none;"></div>
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Nuevo Usuario</h6>
	</div>
	<div class="card-body">
		<form method="POST" name="form_usua" id="form_usua" class="user">
		<table align="center" class="table table-bordered">
			<tr>
			<td align="right">Nombres: </td>
			<td><input type="text" id="usunom" name="usunom" size="20" maxlength="40" class="form-control form-control-use"
				 placeholder="Ingrese Nombres..." onblur="soloMayusculas('usunom')" value="<?php echo $fila['usua_nomb']; ?>"></td>

				 <td align="right">Apellidos</td>
			<td><input type="text" id="usuape" name="usuape" size="20" maxlength="30" class="form-control form-control-use"
				placeholder="Ingrese Apellidos..." onblur="soloMayusculas('usuape')" value="<?php echo $fila['usua_apel']; ?>"></td>
                
				<td align="right">E-Mail</td>
			<td><input type="text" id="usumail" name="usumail" size="20" maxlength="30" class="form-control form-control-use"
				placeholder="Ingrese Correo..." onblur="soloMayusculas('usumail')" value="<?php echo $fila['usua_mail']; ?>"></td>
		</tr>
		<tr>
			<td  align="right">Usuario:</td>
			<td colspan="1"><input type="text" id="user" name="user" size="30" maxlength="60" class="form-control form-control-use"
				placeholder="Usuario..." onblur="soloMayusculas('user')" value="<?php echo $fila['usua_login']; ?>"></td>

				<td align="right">Clave:</td>
			<td colspan="1"><input type="password" id="pass" name="pass" size="30" maxlength="60" class="form-control form-control-use"
				placeholder="Contraseña...." onblur="soloMayusculas('pass')" value="<?php echo $fila['usua_clave']; ?>"></td>
				
			<td align="right">Nivel:</td>
			<td colspan="1">
				<select class="form-control" name="valnivel" id="valnivel">
					 <?php 
					 	$res=$resul->selectOne("tbl_tipousua","tius_ide",$fila['fk_tipousua'],$con);
							echo '<option value="'.$res['tius_ide'].'">'.$res['tius_descrip'].'</option>';
						$listacate=$resul->selectAll("tbl_tipousua",$con);
						foreach ($listacate as $lista) {
							echo '<option value="'.$lista['tius_ide'].'">'.$lista['tius_descrip'].'</option>';
						}
						?>
					
				</select>			
			</td>	
				
		</tr>
		<tr>
			<td colspan="6" align="center">
			<input type="hidden" name="id" id="id" value="<?php echo $fila['usua_id']; ?>">
				<a class="btn btn-primary btn-icon-split" onclick="return validaUsuario('modificar')" >                                        
                <span class="text">Guadar</span>
            </a>
			</a>
				<a class="btn btn-secondary btn-icon-split" href="inicio.php?page=usuario" >                                        
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
