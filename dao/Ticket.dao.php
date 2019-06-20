<?php 
	require_once('../modelos/clsTicket.php');
	require_once('../modelos/clsConexion.php');

	class TicketDao{

		public static function agregarRegistro($tic){
			$con = new clsConexion();
			$query = "INSERT INTO ticket (fechaCreacion, asunto, descripcion, adjunto, idCliente, estado) VALUES('". $tic->getFechaCreacion() ."','". $tic->getAsunto() ."','". $tic->getDescripcion() ."','". $tic->getAdjunto() ."','". $tic->getIdCliente()."','". $tic->getEstado() ."')";
			$con->ejecutarActualizacion($query,"Ticket agregado","agregar el ticket",9);
			$con->cerrarConexion();
		}

		public static function listarDatos($tipo,$dato){
			$con = new clsConexion();
			$query = "";
			if($tipo==1){
				$query = "SELECT T.idTicket, C.nombreCompleto, C.telefono, T.fechaCreacion, T.asunto, T.descripcion, T.adjunto, C.direccion FROM ticket AS t INNER JOIN cliente as C WHERE C.idCliente = T.idCliente AND T.estado!='0' ORDER BY T.idTicket ASC ";
			}
			else{
				$query = "SELECT T.idTicket, C.nombreCompleto, C.telefono, T.fechaCreacion, T.asunto, T.descripcion, T.adjunto, C.direccion FROM ticket AS t INNER JOIN cliente as C WHERE C.idCliente = T.idCliente AND T.idCliente='". $dato ."' AND T.estado!='0' ";
			}
			$contenedor = $con->ejecutarConsulta($query);
			return $contenedor;
		}

	}

?>