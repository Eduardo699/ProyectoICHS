<?php
	require_once('../dao/Departamento.dao.php');
	require_once('scripts.php');
	require_once"../controladores/controladorSesion.php";
	if(isset($_POST['id'])){
		$obj = DepartamentoDao::obtenerRegistroPorId($_POST['id']);
		echo "<script>var tipo = '". $obj[1] ."';</script>";
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Formulario de Departamentos</title>
</head>
<style type="text/css">
	label{
		font-weight: bold;
	}
	#contenedorForm{
		color: black;
	}
	body{
		background-color:  #F1F0F0;
	}
</style>
<script type="text/javascript" src="../js/formDepartamento.validaciones.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		//$("#cmbTipo").val(tipo);
		
		$(document).keydown(function(e){ 
        	if (e.keyCode == 27){
        		location.reload();
        	}  
    	});

	});
</script>

<body><!--oncontextmenu="return false" onkeydown="return false" bloquear teclado y click derecho-->
	<div class="container-fluid">
		<div class="row">

			<div class="col-xs-12 col-sm-12 col-md-12 "><!--inicia contenedor del contenido externo-->
		
				<div class="row"><!--inicia fila que divide la barra lateral con el formulario-->
					<div id="contenedorForm" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><!--inicia contenedor del formulario-->
						<br><form id="formDepartamento" action="../controladores/Departamento.controlador.php?a=edit" method="POST">					
							<div class="form-row">
							    <div class="form-group col-md-12">
							    	<br>
							      	<label for="txtNombre">Nombre</label>
									<input value="<?=$obj[1]?>" maxlength="50" type="text" class="form-control" id="txtNombre" name="nombre">
									<div id="mensajeNombre" class=""></div>
							    </div>

								<div class="form-group col-md-4">
							    	<br>
							    	<input type="hidden" value="<?=$obj[0]?>" name="idDepartamento">
							    </div>
							    
							</div>

							<div class="form-row">
							    <div class="form-group col-md-12">
							    	<br>
							    	<label for="txtDescripcion">Descripción</label>
							    	<textarea maxlength="150" style="resize: none;" name="descripcion" id="txtDescripcion" class="md-textarea form-control" rows="5"><?=$obj[2]?></textarea>
							    	<div id="mensajeDescripcion" class=""></div>
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