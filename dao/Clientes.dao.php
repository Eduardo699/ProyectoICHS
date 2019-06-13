<?php
require_once('../modelos/clsConexion.php');
if(isset($_POST['consulta'])){
	$parametro = $_POST['consulta'];
	$valor = $_POST['valor'];

	
		clsClienteDAO::listarDatos($parametro, $valor);
	

}

class clsClienteDAO{

	public static function agregarRegistro($cli){
			$con = new clsConexion();
			$query = "INSERT INTO cliente (idCliente, nombreCompleto, fechaNac, direccion, telefono, dui, idDepto, userid, estado) VALUES('". $cli->getId() ."','". $cli->getNombre() ."','". $cli->getFechaNac() ."','". $cli->getDireccion()."','".$cli->getTelefono()."','".$cli->getDui()."','".$cli->getIdDept()."','".$cli->getIdUser()."','".$cli->getEstado()."')";
			$con->ejecutarActualizacion($query,"Cliente agregado","agregar el cliente");
			$con->cerrarConexion();
		}

		public static function modificarRegistro($cli){
			$con = new clsConexion();
			$query = "UPDATE cliente set nombreCompleto='". $cli->getNombre() ."', fechaNac='". $cli->getFechaNac() ."', direccion='". $cli->getDireccion() ."', telefono = '". $cli->getTelefono() ."', dui='".$cli->getDui()."', idDepto='".$cli->getIdDept()."', userid = '".$cli->getIdUser()."', estado = '".$cli->getEstado()."' WHERE idCliente='". $cli->getId() ."'";
			$con->ejecutarActualizacion($query,"Cliente modificado","modificar el cliente");
			$con->cerrarConexion();
		}

		public static function eliminarRegistro($cli){
			$con = new clsConexion();
			$query = "UPDATE cliente set estado='". $cli->getEstado() ."' WHERE idCliente='". $cli->getId() ."'";
			$con->ejecutarActualizacion($query,"Categoría eliminada","eliminar la categoría");
			$con->cerrarConexion();
		}

		public static function obtenerRegistroPorId($id){
			$con = new clsConexion();
			$query = "SELECT idCliente, nombreCompleto, fechaNac, direccion, telefono, dui, idDepto, userid, estado FROM cliente WHERE idCliente='". $id ."'";
			$contenedor = $con->ejecutarConsulta($query);
			$con->cerrarConexion();
			return $contenedor[0];
		}

	public static function listarDatos($parametro, $valor){
		$con = new clsConexion();
		if($parametro == 1){
			$contenedor = $con->ejecutarConsulta("SELECT idCliente, nombreCompleto, fechaNac, direccion, telefono, dui, idDepto, userid, estado from cliente");	
		}else if($parametro == 2){
			$contenedor = $con->ejecutarConsulta("SELECT idCliente, nombreCompleto, fechaNac, direccion, telefono, dui, idDepto, userid, estado from cliente WHERE idCliente = $valor");	
		}else if($parametro == 3){
			$contenedor = $con->ejecutarConsulta("SELECT userid, avatar, username, rol from usuario WHERE username LIKE '%$valor%'");	
		}else if($parametro == 4){
			$contenedor = $con->ejecutarConsulta("SELECT userid, avatar, username, rol from usuario WHERE rol LIKE '%$valor%'");	
		}
		
		$con->cerrarConexion();
		if($contenedor){
			
			$salida = "<tbody id='cuerpoTablaClientes'> ";

			foreach($contenedor as $fila):
				
				$salida .= "<tr>".	
				
				"<td>". $fila[0] ."</td>".
				"<td>". $fila[1] ."</td>".
				"<td>". $fila[2] ."</td>".
				"<td>". $fila[3] ."</td>".	
				"<td>". $fila[4] ."</td>".				
				"<td>". $fila[5] ."</td>".	
				"<td>". $fila[6] ."</td>".	
				"<td>". $fila[7] ."</td>".	
				"<td>". $fila[8] ."</td>".	
				"<td><a data-controls-modal='#agregarModal2' data-backdrop='static' style='margin-top: 4%; color: white;' data-toggle='modal' id='". $fila[0] ."' data-target='#agregarModal2' class='modificar btn btn-primary btn-sm' >Modificar</a></td>".
					"<td><a style='margin-top: 4%; color: white;' id='". $fila[0] ."' class='eliminar btn btn-primary btn-sm'>Eliminar</a></td>".
				"</tr>";
				
			endforeach;
			$salida.= "</tbody>";
			echo $salida;
		}else{
			echo "<tr id='cuerpoTablaClientes'><td colspan='13'><h5>No existe un valor para la busqueda con parámetro: $valor</h5><img src='../../imagenes/robot.png' height='90' width='90'></td></tr>";
		}
	}

	

}

?>
