<?php
	require_once('../dao/Ticket.dao.php');

	switch ($_GET['a']) {
		case 'ingr':
		 	$obj = new Ticket();
		 	ini_set('date.timezone', 'America/El_Salvador');
		 	$horaLocal = date('Y-m-d H:i:s',time());

		 	$obj->setFechaCreacion($horaLocal);
		 	$obj->setAsunto($_POST['asunto']);
		 	$obj->setDescripcion($_POST['descripcion']);
		 	$obj->setIdCliente('AJPC194');
		 	$obj->setEstado('1');

		 	//Adjuntar imagen
			/*if(!(empty($_FILES['adjunto']['name']))){			
				 $obj->setAdjunto('hola');
				 $nombre=$_FILES['adjunto']['name'];
				 $origen=$_FILES['adjunto']['tmp_name'];
				 $destino="../vistas/userpics/". $nombre;
				 copy($origen, $destino);
			}*/
			TicketDao::agregarRegistro($obj);

		break;
	}

?>