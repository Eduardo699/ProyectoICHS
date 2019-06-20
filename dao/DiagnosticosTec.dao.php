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
	if(isset($_POST['peticionC'])){
		$tipo = $_POST['tipo'];
		clsDiagnosticosDAO::obtenerComponentes($tipo);
	}


	class clsDiagnosticosDAO{

		public static function listarDatos($parametro, $valor){
			$con = new clsConexion();
			session_start();
			$dato = $_SESSION['idPersona'];

			if($parametro == 1){
				$query = "SELECT idDiagnostico, fechaAsignacion, fechaCierre, diagnostico, solucion, idTicket, idCategoria, estadoDiagnostico FROM diagnostico WHERE idTecnico='". $dato ."' AND estado = 1";
			}
			else if($parametro == 2){
				$query = "SELECT idDiagnostico, fechaAsignacion, fechaCierre, diagnostico, solucion, idTicket, idCategoria, estadoDiagnostico FROM diagnostico WHERE idTecnico='". $dato ."' AND estado = 1 and idDiagnostico = $valor";
			}
			else if($parametro == 3){
				$query = "SELECT idDiagnostico, fechaAsignacion, fechaCierre, diagnostico, solucion, idTicket, idCategoria, estadoDiagnostico FROM diagnostico WHERE idTecnico='". $dato ."' AND estado = 1 and estadoDiagnostico LIKE '%$valor%'";
			}

			$contenedor = $con->ejecutarConsulta($query);
			
			$con->cerrarConexion();
			if($contenedor){
				$aux = 1;
				$salida =  "<tbody id='cuerpoTabla'> ";

						foreach($contenedor as $fila):
						if(is_null($fila[2])){
							$cierre = "Sin cerrar";
						}
						else{
							$cierre = date("d/m/Y h:i A", strtotime($fila[2]));
						}
						if(is_null($fila[3])){
							$diagnostico = "Sin diagnostico";
						}
						else{
							$diagnostico = $fila[3];
						}
						if(is_null($fila[4])){
							$solucion = "Sin solucion";
						}
						else{
							$solucion = $fila[4];
						}
						if(is_null($fila[6])){
							$categoria = "Sin categoria";
						}
						else{
							$categoria= $fila[6];
						}
					  	$salida .= "<tr>
					  		<th scope='row'>". $fila[0] ."</th> ".
					  		"<td>". date("d/m/Y h:i A", strtotime($fila[1])) ."</td>".
					  		"<td>". $cierre ."</td>".
					  		"<td>". $diagnostico ."</td>".
					  		"<td>". $solucion ."</td>".
					  		"<td>". $fila[5] ."</td>".
					  		"<td>". $categoria ."</td>".
					  		"<td>". $fila[7] ."</td>";
					  		if($fila[7]!="Cerrado"){
					  			$salida.=" <td><a data-controls-modal='your_div_id' data-backdrop='static' data-keyboard='false' style='margin-top: 4%; color: white; cursor: pointer;' data-toggle='modal' id='". $fila[0] . ".". $fila[0]. "' data-target='#agregarModal2' class='modificar btn btn-primary btn-sm' >Modificar</a></td>";
					  		}
					  		else{
					  			$salida.=" <td><a style='margin-top: 4%; color: white;' class='modificar btn btn-secondary btn-sm' >Cerrado</a></td>";
					  		}
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

		public static function buscarPorId($id){
			$con = new clsConexion();
			$contenedor = $con->ejecutarConsulta("SELECT D.idDiagnostico, D.diagnostico, D.solucion, D.idCategoria, D.estadoDiagnostico, C.tipo FROM diagnostico as D INNER JOIN categoria as C WHERE D.idCategoria = C.idCategoria AND D.idDiagnostico = '$id'");	
			if(count($contenedor)==0){
				$contenedor = $con->ejecutarConsulta("SELECT D.idDiagnostico, D.diagnostico, D.solucion, D.idCategoria, D.estadoDiagnostico FROM diagnostico as D WHERE D.idDiagnostico = '$id'");
			}	

			$con->cerrarConexion();
			return $contenedor[0];
		}

		public static function modificarRegistroPorId($emp){
			$con = new clsConexion();
			if($emp->getEstadoDiagnostico()=="Cerrado"){
				$sql = "UPDATE diagnostico set fechaCierre = '". $emp->getFechaCierre() . "', diagnostico = '". $emp->getDiagnostico() . "', solucion = '". $emp->getSolucion() . "', idCategoria = '". $emp->getIdCategoria() . "' , estadoDiagnostico = '". $emp->getEstadoDiagnostico() . "' WHERE idDiagnostico = '". $emp->getIdDiagnostico() . "'";
			}
			else{
				$sql = "UPDATE diagnostico set diagnostico = '". $emp->getDiagnostico() . "', solucion = '". $emp->getSolucion() . "', idCategoria = '". $emp->getIdCategoria() . "' , estadoDiagnostico = '". $emp->getEstadoDiagnostico() . "' WHERE idDiagnostico = '". $emp->getIdDiagnostico() . "'";
			}
			
			$con->ejecutarActualizacion($sql,"Diagnostico modificado","modificar el Diagnostico",8);
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

		public static function listarIdCategoria($valor){
			$con = new clsConexion();
			$contenedor = $con->ejecutarConsulta("SELECT idCategoria, nombre from categoria where tipo='$valor' AND estado = 1");

			$con->cerrarConexion();
			return $contenedor;
		}

		public static function obtenerComponentes($tipo){
			$con = new clsConexion();
			$contenedor = $con->ejecutarConsulta("SELECT idCategoria, nombre from categoria where tipo='$tipo' AND estado = 1");

			$con->cerrarConexion();
			$arreglo = array();
			$i = 0;
			foreach ($contenedor as $fila) {
				$arreglo[$i][0] = $fila[0];
				$arreglo[$i][1] = $fila[1];
				$i++;
			}
			$json = json_encode($arreglo);
			echo $json;
		}

		public static function listarTickets(){
			$con = new clsConexion();
			//session_start();
			$dato = $_SESSION['idPersona'];
			$query = "SELECT T.idTicket, C.nombreCompleto, C.telefono, T.fechaCreacion, T.asunto, T.descripcion,T.adjunto, C.direccion FROM ticket as T INNER JOIN diagnostico as D INNER JOIN cliente as C WHERE C.idCliente=T.idCliente AND T.idTicket=D.idTicket  AND D.idTecnico='". $dato ."' AND T.estado!='0' AND D.estado!='0'";
			$contenedor = $con->ejecutarConsulta($query);
			return $contenedor;
		}

	}


?>
