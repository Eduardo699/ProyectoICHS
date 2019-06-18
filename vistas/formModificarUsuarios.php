<?php
	require_once'../modelos/clsConexion.php';
	require_once('../dao/Usuarios.dao.php');
	require_once('scripts.php');
	require_once"../controladores/controladorSesion.php";
	if(isset($_POST['id'])){
		$obj = clsUsuarioDAO::obtenerRegistroPorId($_POST['id']);
		echo "<script>var tipo = '". $obj[1] ."';</script>";
	}

$idFoto=$_SESSION['id'];
if (!isset($_SESSION['id'])){
	header('location:../index.php');
	
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Formulario de Departamentos</title>
</head>
<script type="text/javascript" src="../js/formUsuarios.validaciones2.js"></script>

<body><!--oncontextmenu="return false" onkeydown="return false" bloquear teclado y click derecho-->
	<div class="container-fluid">
		<div class="row">

			<div class="col-xs-12 col-sm-12 col-md-12 "><!--inicia contenedor del contenido externo-->
		
				<div class="row"><!--inicia fila que divide la barra lateral con el formulario-->
					<div id="contenedorForm" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><!--inicia contenedor del formulario-->
						<form id="formUsuarios" action="../controladores/Usuario.controlador.php?a=edit" method="POST" enctype="multipart/form-data">		

					<div class="full-box dashboard-sideBar-UserInfo" style="color: black">
					<figure class="full-box">
						<?php

							$con = new clsConexion();
							$contenedor = $con->ejecutarConsulta("SELECT avatar, username, password, userid from usuario where userid='$idFoto'");	
							$salida = "<tbody id='cuerpoTabla' > ";

						foreach($contenedor as $fila):
							$salida .= "<tr>".

							"<td><img alt='UserIcon' style=' width: 130px; height: 130px;  border-radius:20px; border: 2.5px solid gray; margin: auto;' src='userpics/". $fila[0] ."'>	</td>".
							"<td><br> <figcaption class='text-center text-titles'><h3><b> &nbsp". $fila[1] ." </b></h3></figcaption> </td>".
								"</figure>			
								</div>".	

							"<td>						
								<div class='form-row'>

								    <div class='col-md-12'>
								    	<br>
								      	<label style='text-align: center;' for='txtContraAnterior'>Contraseña Anterior</label>
								      	<input placeholder='Contraseña Anterior' type='password' class='form-control' id='txtContraAnterior' name='contraAnterior'>
								      	<div id='mensajeContraAnterior' class=''></div>
								    </div>			
							
								    <div class='col-md-6'>
								    	<br>
								      	<label for='txtPassword'>Nueva Contraseña</label>
								      	<input placeholder='Contraseña' type='password' class='form-control' id='txtPassword' name='password'>
								      	<div id='mensajePassword' class=''></div>
								    </div>   
								
								    <div class='col-md-6'>
								    	<br>
								      	<label for='txtConfirmPassword'>Confirmar Contraseña</label>
								      	<input placeholder='Confirmar Contraseña' type='password' class='form-control' id='txtConfirmPassword' name='confirmPassword'>
								      	<div id='mensajeConfirmPassword' class=''></div>
								    </div>	

								    <div class='col-md-12'>
								    	<br>
								      	<label for='txtAvatar'>Nueva Foto (Opcional)</label><br>
								      	<input type='file'  id='avatar' name='avatar' value=". $fila[0] ."> 
								    </div>	

								    						    
							
					  			</div>	
							</td>".

							"<td>  <div hidden class='form-group col-md-6'><br> <input class='form-control' name='defecto' value=". $fila[0] ."></div></td>".

							"<td>  <div hidden class='form-group col-md-6'><br> <input class='form-control' name='userid' value=". $fila[3] ."></div></td>".															
							"</tr>";		
						endforeach;

						$salida.= "</tbody>";
						echo $salida;

						?>

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