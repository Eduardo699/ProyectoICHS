<?php
	require_once('../modelos/clsConexion.php');
	if(isset($_POST['consulta'])){
		$parametro = $_POST['consulta'];
		$valor = $_POST['valor'];
		
		if($parametro==1){
			clsDiagnosticosDAO::listarDatos(1,$valor);
		}
		else if($parametro==2){
			clsDiagnosticosDAO::listarDatos(2,$valor);
		}
		else if($parametro==3){
			clsDiagnosticosDAO::listarDatos(3,$valor);
		}
	}


	class clsDiagnosticosDAO{

		public static function listarDatos($parametro, $valor){
			$con = new clsConexion();

			if($parametro == 1){
				$query = "SELECT idDiagnostico, fechaAsignacion, fechaCierre, diagnostico, solucion, idTecnico, idTicket, idCategoria, estadoDiagnostico FROM `diagnostico` WHERE estado = 1";
			}
			else if($parametro == 2){
				$query = "SELECT idDiagnostico, fechaAsignacion, fechaCierre, diagnostico, solucion, idTecnico, idTicket, idCategoria, estadoDiagnostico FROM `diagnostico` WHERE estado = 1 and idDiagnostico = $valor";
			}
			else if($parametro == 3){
				$query = "SELECT idDiagnostico, fechaAsignacion, fechaCierre, diagnostico, solucion, idTecnico, idTicket, idCategoria, estadoDiagnostico FROM `diagnostico` WHERE estado = 1 and estadoDiagnostico LIKE '%$valor%'";
			}

			$contenedor = $con->ejecutarConsulta($query);
			
			$con->cerrarConexion();
			if($contenedor){
				$aux = 1;
				$salida =  "<tbody id='cuerpoTabla'> ";

						foreach($contenedor as $fila):
					  	$salida .= "<tr>
					  		<th scope='row'>". $fila[0] ."</th> ".
					  		"<td>". DateTime::createFromFormat('Y-m-d', $fila[1])->format('d-m-Y') ."</td>".
					  		"<td>". DateTime::createFromFormat('Y-m-d', $fila[2])->format('d-m-Y') ."</td>".
					  		"<td>". $fila[3] ."</td>".
					  		"<td>". $fila[4] ."</td>".
					  		"<td>". $fila[5] ."</td>".
					  		"<td>". $fila[6] ."</td>".
					  		"<td>". $fila[7] ."</td>".					  		
					  		"<td>". $fila[8] ."</td>".
					  		"<td><a data-controls-modal='your_div_id' data-backdrop='static' data-keyboard='false' style='margin-top: 4%; color: white;' data-toggle='modal' id='". $fila[0] . ".". $fila[0]. "' data-target='#agregarModal2' class='modificar btn btn-primary btn-sm' >Modificar</a></td>".
					  		"<td><a style='margin-top: 4%; color: white;' id='". $fila[0] ."' class='eliminar btn btn-primary btn-sm'>Eliminar</a></td>";
					  
					  	$salida.="</tr>";
					  	$aux++;
						endforeach;
					 $salida.=  "</tbody>";
					 echo $salida;
			}
			else{
				echo "<tr id='cuerpoTabla'><td colspan='13'><h5>No existe un valor para la busqueda con parámetro: $valor</h5><img src='../imagenes/robot.png' height='90' width='90'></td></tr>";
			}
		}

		public static function AgregarRegistro($emp){
			$con = new clsConexion();
			$sql = "INSERT INTO diagnostico (fechaAsignacion, fechaCierre, diagnostico, solucion, idTecnico, idTicket, idCategoria, estadoDiagnostico, estado) VALUES('". $emp->getFechaAsignacion() . "','". $emp->getFechaCierre() . "','". $emp->getDiagnostico() . "','". $emp->getSolucion() . "','". $emp->getIdTecnico() . "','". $emp->getIdTicket() . "','". $emp->getIdCategoria() . "','". $emp->getEstadoDiagnostico() . "','". $emp->getEstado() . "') ";
			$con->ejecutarActualizacion($sql,"Diagnostico agregado","agregar el contrato",6);

			$con->cerrarConexion();
		}

		public static function buscarPorId($id){
			$con = new clsConexion();
			$contenedor = $con->ejecutarConsulta("SELECT * FROM diagnostico WHERE idDiagnostico = $id");

			$con->cerrarConexion();
			return $contenedor[0];
		}

		public static function modificarRegistroPorId($emp){
			$con = new clsConexion();
			$sql = "UPDATE diagnostico set fechaAsignacion='". $emp->getFechaAsignacion() . "', fechaCierre = '". $emp->getFechaCierre() . "', diagnostico = '". $emp->getDiagnostico() . "', solucion = '". $emp->getSolucion() . "', idTecnico = '". $emp->getIdTecnico() . "', idTicket = '". $emp->getIdTicket() . "', idCategoria = '". $emp->getIdCategoria() . "' , estadoDiagnostico = '". $emp->getEstadoDiagnostico() . "' WHERE idDiagnostico = '". $emp->getIdDiagnostico() . "'";
			$con->ejecutarActualizacion($sql,"Diagnostico modificado","modificar el Diagnostico",6);
			$con->cerrarConexion();
		}

		public static function eliminarPorId($id){
			$con = new clsConexion();
			$sql = "UPDATE diagnostico set estado = 0 WHERE idDiagnostico = $id";
			$con->ejecutarActualizacion($sql,"Diagnostico eliminado","eliminar el Diagnostico",6);
			$con->cerrarConexion();
		}

		public static function listarIdTecnicos(){
			$con = new clsConexion();
			$contenedor = $con->ejecutarConsulta("SELECT idTecnico, nombreCompleto from tecnicos where estado = 1");

			$con->cerrarConexion();
			return $contenedor;
		}

		public static function listarIdTicket(){
			$con = new clsConexion();
			$contenedor = $con->ejecutarConsulta("SELECT idTicket, asunto from ticket where estado = 1");

			$con->cerrarConexion();
			return $contenedor;
		}

		public static function listarIdCategoria(){
			$con = new clsConexion();
			$contenedor = $con->ejecutarConsulta("SELECT idCategoria, nombre from categoria where estado = 1");

			$con->cerrarConexion();
			return $contenedor;
		}

	}


?>
