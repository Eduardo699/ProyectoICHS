<?php  
require_once('../dao/Clientes.dao.php');
require_once "scripts.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Formulario de Usuarios</title>
</head>
<style type="text/css">

label{
	font-weight: bold;
}

#contenedorForm{
	color: black;
}

#contenedorTabla{
		color: black;
		height: 300px; 
		overflow: scroll;	
	}

body{
	background-color:  #F1F0F0;
}

#contenedorTabla #dgv th{
		cursor: pointer;
	}

</style>
<script type="text/javascript" src="../js/formUsuarios.validaciones.js"></script>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 "><!--inicia contenedor del contenido externo-->
				
				<div class="row"><!--inicia fila que divide la barra lateral con el formulario-->
					<div id="contenedorForm" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><!--inicia contenedor del formulario-->
						<form id="formUsuarios" action="../controladores/Cliente.controlador.php?a=ingr&origen=$origen" method="POST" enctype="multipart/form-data">					
							<div class="form-row">
							    <div class="form-group col-md-12">
							    	<br>
							      	<label for="txtNombre">Nombre Completo</label>
							      	<input placeholder="Nombre" type="text" class="form-control" id="txtNombre" name="nombre">
							      	<div id="mensajeUsername" class=""></div>
							    </div>
							</div>
							<div class="form-row">
							    <div class="form-group col-md-6">
							    	<br>
							      	<label for="txtFecha">Fecha de nacimiento</label>
							      	<input type="date" class="form-control" id="txtFecha" name="fecha">
							      	<div id="mensajePassword" class=""></div>
							    </div>

							    <div class="form-group col-md-6">
							    	<br>
							      	<label for="txtDireccion">Dirección</label>
							      	<input placeholder="Dirección actual" type="text" class="form-control" id="txtDireccion" name="direccion">
							      	<div id="mensajeConfirmPassword" class=""></div>
							    </div>
							</div>

							<div class="form-row">
							<div class="form-group col-md-6">
							    	<br>
							      	<label for="txtTelefono">Teléfono</label>
							      	<input placeholder="Ej. 7809-0932" type="text" class="form-control" id="txtTelefono" name="telefono">
							      	<div id="mensajeConfirmPassword" class=""></div>
							    </div>
							

							
							<div class="form-group col-md-6">
							    	<br>
							      	<label for="txtDui">DUI</label>
							      	<input placeholder="Ej. 98430940-0" type="text" class="form-control" id="txtDui" name="dui">
							      	<div id="mensajeConfirmPassword" class=""></div>
							    </div>
							</div>

							<div class="form-row">
							    <div class="form-group col-md-6">
							    	<br>
							      	<label for="cmbDepartamento">Departamento</label>
							      	<select class="custom-select" id="cmbDepartamento" name="dep">
							      		<option disabled selected>--Seleccione una opción--</option>
							      		<option value="1">Opción 1</option>
							      		<option value="2">Opción 2</option>
							      		<option value="3">Opción 3</option>
							      	</select>
							      	<div id="mensajeRol" class=""></div><br><br>
							    </div>

							      <div class="form-group col-md-6">
							    	<br>
							      	<label for="usuarioC">Identificador de usuario</label>
							      	<select class="custom-select" id="usuarioC" name="usuario">
							      		<option disabled selected>--Seleccione una opción--</option>
							      		<option value="1">Opción 1</option>
							      		<option value="2">Opción 2</option>
							      		<option value="3">Opción 3</option>
							      	</select>
							      	<div id="mensajeAvatar" class=""></div><br><br>
							    </div>
							</div>	
							
							<div class="form-row">
							    

							<div class="row">
							    <div style="text-align: center;" class="form-group col-xs-6 col-sm-6 col-md-3 col-lg-4">
							    	<input type="submit" value="Agregar" name="enviar" class="btn btn-dark">
							    </div>
							    <div style="text-align: center;" class="form-group col-xs-6 col-sm-6 col-md-3 col-lg-4">
							    	<input id="resetear" type="reset" value="Borrar" name="borrrar" class="btn btn-dark">
							    </div>
							    <div style="text-align: center;" class="form-group col-xs-6 col-sm-6 col-md-3 col-lg-4">
							    	<button type="button" class="btn btn-dark" data-dismiss="modal">Regresar</button>
							    </div>
							</div>
						</form><br>
					</div><!--termina contenedor del formulario-->
				</div><!--termina fila que divide la barra lateral con el formulario-->
			</div><!--termina contenedor del contenido interno-->
		</div><!--termina la row mas externa-->
	</div><!--termina el container-fluid mas externo-->

</body>
</html>