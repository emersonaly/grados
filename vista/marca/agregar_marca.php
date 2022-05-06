<?php 
$fecha = date('Y-m-d');
$util = new Utilidades;
$con = $util->conexion(); 
?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Registro Marca</h1>
	<!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
			class="fas fa-download fa-sm text-white-50"></i> Generate Re</a> -->
</div>
<div id="mensaje" class="btn btn-success btn-icon-split" style="display: none;"></div>
<div class="card shadow mb-4 border-left-primary">
	<div class="card-header py-3">
	<h6 class="m-0 font-weight-bold text-primary">Registro Marca</h6>
	</div>
	<div class="card-body">
		<form method="POST" name="form_marca" id="form_marca" class="user">
		<table align="center" class="table table-bordered">
			<tr>
			<td align="right">Descripción</td>
			<td><input type="text" id="desmar" name="desmar" size="10" maxlength="30" class="form-control form-control-use"
				placeholder="Ingrese Marca..." onblur="soloMayusculas('desmar')" ></td>
				
		</tr>
		<tr>
			<td colspan="6" align="center">
				<a class="btn btn-primary btn-icon-split" onclick="return validaMarca('incluir')" >                                        
                <span class="text">Guadar</span>
            </a>
				<a class="btn btn-secondary btn-icon-split" href="inicio.php?page=marca" >                                        
                <span class="text">Volver</span>
            </a>
			
			</td>
		</tr>
	</table>
</form>
	</div>
</div>

