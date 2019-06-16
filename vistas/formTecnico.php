<?php  
require_once('../dao/Tecnico.dao.php');
require_once"../controladores/controladorSesion.php";
require_once "scripts.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Formulario de Técnicos</title>
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
						<form id="formUsuarios" action="../controladores/Tecnico.controlador.php?a=ingr&origen=$origen" method="POST" enctype="multipart/form-data">					
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
							      	<label for="txtDireccion">Dirección</label>
							      	<input placeholder="Dirección actual" type="text" class="form-control" id="txtDireccion" name="direccion">
							      	<div id="mensajeConfirmPassword" class=""></div>
							      	
							    </div>

							    <div class="form-group col-md-6">
							    	<br>
							      	<label for="txtTelefono">Teléfono</label>
							      	<input placeholder="Ej. 7809-0932" type="text" class="form-control" id="txtTelefono" name="telefono">
							      	<div id="mensajeConfirmPassword" class=""></div>
							    </div>

							   
							</div>

							<div class="form-row">
							
							

							
							<div class="form-group col-md-6">
							    	<br>
							      	<label for="txtDui">DUI</label>
							      	<input placeholder="Ej. 98430940-0" type="text" class="form-control" id="txtDui" name="dui">
							      	<div id="mensajeConfirmPassword" class=""></div>
							    </div>

							    <div class="form-group col-md-6">
							    	<br>
							      	<label for="txtEspecialidad">Especialidad</label>
							      	<input placeholder="Dirección actual" type="text" class="form-control" id="txtEspecialidad" name="especialidad">
							      	<div id="mensajeConfirmPassword" class=""></div>
							      	
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
							      	<label for="usuarioC">Identificador de usuario</label>
							      	<select class="custom-select" id="usuarioC" name="usuario">
							      		<option disabled selected value="">--Seleccione una opción--</option>
							      		<?php foreach(clsTecnicoDao::listarUsuarios() as $fila): ?>
							      			<option value="<?=$fila[0]?>"><?=$fila[1]?></option>
							      		<?php endforeach ?>
							      	</select>
							      	<div id="mensajeAvatar" class=""></div><br><br>
							    </div>
							</div>	
							
							<br><br>
							<div class="form-row">
								<div style="text-align: center;" class="form-group col-xs-4 col-sm-4 col-md-4">
									<input type="submit" class="btn btn-dark" name="enviar" value="Agregar">
								</div>
								<div style="text-align: center;" class="form-group col-xs-4 col-sm-4 col-md-4">
									<input id="resetear" type="reset" class="btn btn-dark" name="borrar" value="Borrar">
								</div>
								<div style="text-align: center;" class="form-group col-xs-4 col-sm-4 col-md-4">
									<button type="button" onclick="location.reload()" class="btn btn-dark" data-dismiss="modal">Regresar</button>
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