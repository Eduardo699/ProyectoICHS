<?php  
require_once('../dao/Clientes.dao.php');
require_once "scripts.php";

if(isset($_POST['id'])){
		$obj = clsClienteDao::obtenerRegistroPorId($_POST['id']);
		echo "<script>var tipo = '". $obj[1] ."';</script>";
		echo "<script>var us = '". $obj[7] ."';</script>";
		echo "<script>var dep = '". $obj[6] ."';</script>";
	}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Formulario de Clientes</title>
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
<script type="text/javascript">

	$(document).ready(function () {

	var nombre1 = "";
	var nombre2 = "";
	var apellido1 = "";
	var apellido2 = "";


	var nombre1txt = "";
	var nombre2txt = "";
	var apellido1txt = "";
	var apellido2txt = "";

	var code1 = "";
	var code2 = "";
	var code3 = "";
	var code4 = "";

	var aux = "";



	var cadena = $("#txtNombre").val();
	var codigo = $("#txtCodigo").val();
	numbers = codigo.substring(0,4);
	correc = codigo.substring(4);
	console.log(correc);
	console.log(numbers);
	var separador = " ";

	arreglo = cadena.split(separador);

	console.log(arreglo);

	aux = arreglo[0];
	aux1 = arreglo[1];
	aux2 = arreglo[2];
	aux3 = arreglo[3];

	code1 = numbers[0];
	code2 = numbers[1];
	code3 = numbers[2];
	code4 = numbers[3];



	$("#txtNombre1").val(arreglo[0]);
	$("#txtNombre2").val(arreglo[1]);
	$("#txtApellido1").val(arreglo[2]);
	$("#txtApellido2").val(arreglo[3]);


	

	$('#txtNombre1').change(function() {
		aux = $(this).val();
		$("#txtNombre").val(aux+" "+aux1+" "+aux2+" "+aux3);
		code1 = aux.substr(0,1).toUpperCase();
        $("#txtCodigo").val(code1+code2+code3+code4+correc);
});

	$('#txtNombre2').change(function() {
		aux1 = $(this).val();
		$("#txtNombre").val(aux+" "+aux1+" "+aux2+" "+aux3);
		code2 = aux1.substr(0,1).toUpperCase();
        $("#txtCodigo").val(code1+code2+code3+code4+correc);
});

	$('#txtApellido1').change(function() {
		aux2 = $(this).val();
		$("#txtNombre").val(aux+" "+aux1+" "+aux2+" "+aux3);
		code3 = aux2.substr(0,1).toUpperCase();
        $("#txtCodigo").val(code1+code2+code3+code4+correc);
});

		$('#txtApellido2').change(function() {
		aux3 = $(this).val();
		$("#txtNombre").val(aux+" "+aux1+" "+aux2+" "+aux3);
		code4 = aux3.substr(0,1).toUpperCase();
        $("#txtCodigo").val(code1+code2+code3+code4+correc);
});


	
	
		$("#cmbTipo").val(tipo);
		$("#cmbDepartamento").val(dep);
		$("#usuarioC").val(us);
		
		$(document).keydown(function(e){ 
        	if (e.keyCode == 27){
        		location.reload();
        	}  
    	});

    	});


</script>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 "><!--inicia contenedor del contenido externo-->
				
				<div class="row"><!--inicia fila que divide la barra lateral con el formulario-->
					<div id="contenedorForm" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><!--inicia contenedor del formulario-->
						<form id="formUsuarios" action="../controladores/Cliente.controlador.php?a=edit" method="POST">					
							<div class="form-row">
							    <div class="form-group col-md-12">
							    	<br>
							    	<input type="hidden" value="<?=$obj[0]?>" name="idCliente">
							    	<input type="hidden" value="<?=$obj[0]?>" name="idClienteRes" id="txtCodigo">
							      	<label for="txtNombre">Nombre Completo</label>
							      	<input placeholder="Nombre" type="text" class="form-control" id="txtNombre" name="nombre" value="<?=$obj[1]?>" readonly>
							      	<div id="mensajeUsername" class=""></div>
							    </div>
								
								<div class="form-group col-md-6">
							    	<br>
							      	<label for="txtNombre1">Primer Nombre</label>
							      	<input placeholder="Primer nombre" type="text" class="form-control" id="txtNombre1" name="txtNombre1">
							      	<div id="mensajeUsername" class=""></div>
										</div>
									
									<div class="form-group col-md-6">
							    	<br>
							      	<label for="txtNombre2">Segundo Nombre</label>
							      	<input placeholder="Segundo nombre" type="text" class="form-control" id="txtNombre2" name="txtNombre2">
							      	<div id="mensajeUsername" class=""></div>
							    </div>
							</div>
							
							<div class="form-row">
								<div class="form-group col-md-6">
							    	<br>
							      	<label for="txtApellido1">Primer Apellido</label>
							      	<input placeholder="Primer apellido" type="text" class="form-control" id="txtApellido1" name="txtApellido1">
							      	<div id="mensajeUsername" class=""></div>
										</div>
									
									<div class="form-group col-md-6">
							    	<br>
							      	<label for="txtApellido2">Segundo Apellido</label>
							      	<input placeholder="Segundo apellido" type="text" class="form-control" id="txtApellido2" name="txtApellido2">
							      	<div id="mensajeUsername" class=""></div>
							    </div>
							

							</div>
							<div class="form-row">
							    <div class="form-group col-md-6">
							    	<br>
							      	<label for="txtFecha">Fecha de nacimiento</label>
							      	<input type="date" class="form-control" id="txtFecha" name="fecha" value="<?=$obj[2]?>">
							      	<div id="mensajePassword" class=""></div>
							    </div>

							    <div class="form-group col-md-6">
							    	<br>
							      	<label for="txtDireccion">Dirección</label>
							      	<input placeholder="Dirección actual" type="text" class="form-control" id="txtDireccion" name="direccion" value="<?=$obj[3]?>">
							      	<div id="mensajeConfirmPassword" class=""></div>
							    </div>
							</div>

							<div class="form-row">
							<div class="form-group col-md-6">
							    	<br>
							      	<label for="txtTelefono">Teléfono</label>
							      	<input placeholder="Ej. 7809-0932" type="text" class="form-control" id="txtTelefono" name="telefono" value="<?=$obj[4]?>">
							      	<div id="mensajeConfirmPassword" class=""></div>
							    </div>
							

							
							<div class="form-group col-md-6">
							    	<br>
							      	<label for="txtDui">DUI</label>
							      	<input placeholder="Ej. 98430940-0" type="text" class="form-control" id="txtDui" name="dui" value="<?=$obj[5]?>">
							      	<div id="mensajeConfirmPassword" class=""></div>
							    </div>
							</div>

							<div class="form-row">
							    <div class="form-group col-md-6">
							    	<br>
							      	<label for="cmbDepartamento">Departamento</label>
							      	<select class="custom-select" id="cmbDepartamento" name="dep">
							      		<option disabled selected value="">--Seleccione una opción--</option>
							      		<?php foreach(clsClienteDao::listarDepartamentos() as $fila): ?>
							      			<option value="<?=$fila[0]?>"><?=$fila[1]?></option>
							      		<?php endforeach?>
							      	</select>
							      	<div id="mensajeRol" class=""></div><br><br>
							    </div>

							      <div class="form-group col-md-6">
							    	<br>
							      	<label for="usuarioC">Identificador de usuario</label>
							      	<select class="custom-select" id="usuarioC" name="usuario">
							      		<option disabled selected value="">--Seleccione una opción--</option>
							      		<?php foreach(clsClienteDao::listarUsuariosMod($obj[7]) as $fila): ?>
							      			<option value="<?=$fila[0]?>"><?=$fila[1]?></option>
							      		<?php endforeach?>
							      	</select>
							      	<div id="mensajeAvatar" class=""></div><br><br>
							    </div>
							</div>	
							
							<br><br>
							<div class="form-row">
								<div style="text-align: center;" class="form-group col-xs-4 col-sm-4 col-md-4">
									<input type="submit" class="btn btn-dark" name="enviar" value="Modificar">
								</div>
								<div style="text-align: center;" class="form-group col-xs-4 col-sm-4 col-md-4">
									<input id="resetear" type="reset" class="btn btn-dark" name="borrar" value="Resetear">
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