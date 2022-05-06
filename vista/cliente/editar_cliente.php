<?php
$resul = new Cliente;
//Hago la conexión con la BD
$con = $resul->conexion();
//Recibimos el código usuario
$editval=$_GET["editval"];
//En este caso el query devuelve un registro en un array asociativo
$fila=$resul->selectOne("tbl_cliente","clien_ide",$editval,$con);
if ($fila)
{
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Editar Cliente</h1>
	<!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
			class="fas fa-download fa-sm text-white-50"></i> Generate Re</a> -->
</div>
<div id="mensaje" class="btn btn-success btn-icon-split" style="display: none;"></div>
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Editar Cliente</h6>
	</div>
	<div class="card-body">
	<form method="POST" name="form_clie" id="form_clie" class="user">
		<table align="center" class="table table-bordered">
			<tr>
			<td align="right">Nº Identificación:</td>
			<td colspan="1"><input type="text" id="cliendi" name="cliendi" size="30" maxlength="60" class="form-control form-control-use"
				placeholder="Numero de Identificacion...." onkeypress="return SoloNumeros(event)" value="<?php echo $fila['clien_ndi']; ?>"
				 required ></td>

			<td align="right">Nombres: </td>
			<td><input type="text" id="clienom" name="clienom" size="20" maxlength="40" class="form-control form-control-use"
				 placeholder="Ingrese Nombres..." onblur="soloMayusculas('clienom')" value="<?php echo $fila['clien_nomb']; ?>"
				 required ></td>

				 <td align="right">Apellidos</td>
			<td><input type="text" id="clieape" name="clieape" size="20" maxlength="30" class="form-control form-control-use"
				placeholder="Ingrese Apellidos..." onblur="soloMayusculas('clieape')" value="<?php echo $fila['clien_apel']; ?>"
				required ></td>
		</tr>
		<tr>
			<td  align="right">Dirección:</td>
			<td colspan="1"><input type="text" id="cliedirec" name="cliedirec" size="30" maxlength="60" class="form-control form-control-use"
				placeholder="Dirección..." onblur="soloMayusculas('cliedirec')" value="<?php echo $fila['clien_direc']; ?>"></td>

				<td align="right">Telf:</td>
			<td colspan="1"><input type="text" id="clietlf" name="clietlf" size="30" maxlength="60" class="form-control form-control-use"
				placeholder="Numero Telefonico...." onkeypress="return SoloNumeros(event)" value="<?php echo $fila['clien_tel']; ?>"></td>

			<td align="right">E-Mail</td>
			<td><input type="text" id="cliemail" name="cliemail" size="30" maxlength="30" class="form-control form-control-use"
				placeholder="Ingrese Correo..." onblur="soloMayusculas('cliemail')" value="<?php echo $fila['clien_mail']; ?>"></td>
				
		</tr>
		<tr>
			<td colspan="6" align="center">
			<input type="hidden" name="id" id="id" value="<?php echo $fila['clien_ide']; ?>">
				<a class="btn btn-primary btn-icon-split" onclick="return validaCliente('modificar')" >                                        
                <span class="text">Guadar</span>
				</a>
				<a class="btn btn-secondary btn-icon-split" href="inicio.php?page=cliente" >                                        
                <span class="text">Volver</span>
            </a>
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
