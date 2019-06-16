<?php
	require_once('../dao/Diagnosticos.dao.php');
	require_once('scripts.php');
	require_once"../controladores/controladorSesion.php";

if(isset($_POST['id'])){
	$obj = clsDiagnosticosDAO::buscarPorId($_POST['id']);
	echo "<script>var tecnico = '". $obj[5] ."';</script>";
	echo "<script>var ticket = '". $obj[6] ."';</script>";
	echo "<script>var categoria = '". $obj[7] ."';</script>";
	echo "<script>var estado = '". $obj[8] ."';</script>";

	$salida = '<!DOCTYPE html>
	<html>
	<head>
		<title>Formulario de Diagnosticos</title>
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
	<script type="text/javascript" src="../js/formDiagnosticos.validaciones.js"></script>
	<script type="text/javascript">

		$(document).ready(function(){			
			$("#cmbEstadoDiagnostico").val(estado);			
			$("#cmbIdTecnico").val(tecnico);
			$("#cmbIdTicket").val(ticket);
			$("#cmbIdCategoria").val(categoria);
		});

	</script>

	<body>
		<div class="container-fluid">
			<div class="row">

				<div class="col-xs-12 col-sm-12 col-md-12"></div>

				<div class="col-xs-12 col-sm-12 col-md-12 "><!--inicia contenedor del contenido externo-->
					<div class="row"><!--inicia fila que divide la barra lateral con el formulario-->
						<div id="contenedorForm" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><!--inicia contenedor del formulario-->
							<form id="formDiagnosticos" action="../controladores/Diagnosticos.controlador.php?a=edit" method="POST">	
							<div class="form-row">
								<div class="form-group col-md-6">
							    	<br>
							    	<input type="hidden" name="id" value="'.$obj[0].'">
							      	<label for="txtFechaAsignacion">Fecha de Asginación</label>
									<input type="date" min="" max="" value="'.$obj[1].'"  class="form-control" id="txtFechaAsignacion" name="fechaAsignacion">
									<div id="mensajeFechaAsignacion" class=""></div>
							    </div>

							    <div class="form-group col-md-6">
							    	<br>
							      	<label for="txtFechaCierre">Fecha de Cierre</label>
									<input type="date" min="" max="" value="'.$obj[2].'"   class="form-control" id="txtFechaCierre" name="fechaCierre">
									<div id="mensajeFechaCierre" class=""></div>
							    </div>
							</div>

							<div class="form-row">
							 	<div class="form-group col-md-6">
							    	<br>
							      	<label for="txtDiagnostico">Diagnostico</label>
							      	<textarea maxlength="150" style="resize: none;" name="diagnostico" id="txtDiagnostico" class="md-textarea form-control" rows="5">'.$obj[3].'</textarea>			
							      	<div id="mensajeDiagnostico" class=""></div>
							    </div>

							    <div class="form-group col-md-6">
							    	<br>
							      	<label for="txtSolucion">Solución</label>
							      	<textarea maxlength="150" style="resize: none;"  name="solucion"    class="md-textarea form-control" rows="5">'.$obj[4].'</textarea>
							      	<div id="mensajeSolucion" class=""></div>
							    </div>
							</div>

							<div class="form-row">

								<div class="form-group col-md-6">
								    <br>
								    <label for="cmbIdTecnico">Nombre del Tecnico</label>
								    <select id="cmbIdTecnico" name="idTecnico" class="custom-select">
										<option disabled selected value="default">--seleccione una opcion--</option>';
											foreach (clsDiagnosticosDAO::listarIdTecnicos($obj[5]) as $fila):
													$salida.=	'<option value="'.$fila[0].'">'.$fila[1].'</option>';
													endforeach;
											$salida.= '
									</select>
									<div id="mensajeIdTecnico" class=""></div>
								</div>

								<div class="form-group col-md-6">
								    <br>
								    <label for="cmbIdTicket">Tickets</label>
								    <select id="cmbIdTicket" name="idTicket" class="custom-select">
										<option disabled selected value="default">--seleccione una opcion--</option>';
											foreach (clsDiagnosticosDAO::listarIdTicket($obj[6]) as $fila):
													$salida.=	'<option value="'.$fila[0].'">'.$fila[1].'</option>';
													endforeach;


											$salida.= '
									</select>
									<div id="mensajeIdTicket" class=""></div>
								</div>

							</div>


							<div class="form-row">

								<div class="form-group col-md-6">
								    <br>
								    <label for="cmbIdCategoria">Categoria</label>
								    <select id="cmbIdCategoria" name="idCategoria" class="custom-select">
										<option disabled selected value="default">--seleccione una opcion--</option>';
											foreach (clsDiagnosticosDAO::listarIdCategoria($obj[7]) as $fila):
													$salida.=	'<option value="'.$fila[0].'">'.$fila[1].'</option>';
													endforeach;


											$salida.= '
									</select>
									<div id="mensajeIdCategoria" class=""></div>
								</div>

								<div class="form-group col-md-6">
							    	<br>
							    	<label for="cmbEstadoDiagnostico">Estado del Diagnostico</label>
							    	<input type="hidden" id="estadoSeleccionado" value="'.$obj[8].'">
							    	<select id="cmbEstadoDiagnostico" name="estadoDiagnostico" class="custom-select">
										<option disabled selected value="default">--seleccione una opcion--</option>
										<option value="Abierto">Abierto</option>
										<option value="Cerrado">Cerrado</option>
									</select>
									<div id="mensajeEstadoDiagnostico" class=""></div>
							    </div>

							</div>
								<br><br>
								<div class="form-row">
									<div style="text-align: center;" class="form-group col-xs-6 col-sm-6 col-md-6">
										<input type="submit" class="btn btn-dark" name="enviar" value="Modificar">
									</div>
									<div style="text-align: center;" class="form-group col-xs-6 col-sm-6 col-md-6">
										<a href="dashboard.php" class="btn btn-dark">Regresar</a>
									</div>
								</div>
							</form><br>	
						</div><!--termina contenedor del formulario-->
					</div><!--termina fila que divide la barra lateral con el formulario-->
				</div><!--termina contenedor del contenido interno-->
			</div><!--termina la row mas externa-->
		</div><!--termina el container-fluid mas externo-->	

	</body>
	</html>';

	echo $salida;
}	
?>