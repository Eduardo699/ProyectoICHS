<?php
	require_once('../dao/Diagnosticos.dao.php');
	require_once('../modelos/clsDiagnosticos.php');

	switch ($_GET['a']) {
		case 'ingr':
			$obj = new clsDiagnosticos();
			$fechaRecibida1 = $_POST['fechaAsignacion'];
			$fechaRecibida1 = DateTime::createFromFormat('Y-m-d', $fechaRecibida1)->format('Y-m-d');

			$fechaRecibida2 = $_POST['fechaCierre'];
			$fechaRecibida2 = DateTime::createFromFormat('Y-m-d', $fechaRecibida2)->format('Y-m-d');

			$obj->setFechaAsignacion($fechaRecibida1);
			$obj->setFechaCierre($fechaRecibida2);
			$obj->setDiagnostico($_POST['diagnostico']);
			$obj->setSolucion($_POST['solucion']);
			$obj->setIdTecnico($_POST['idTecnico']);
			$obj->setIdTicket($_POST['idTicket']);
			$obj->setIdCategoria($_POST['idCategoria']);
			$obj->setEstadoDiagnostico($_POST['estadoDiagnostico']);
			$obj->setEstado(1);
			
			clsDiagnosticosDAO::agregarRegistro($obj);
			
			break;
			
		case 'edit':
			$obj = new clsDiagnosticos();
			$fechaRecibida1 = $_POST['fechaAsignacion'];
			$fechaRecibida1 = DateTime::createFromFormat('Y-m-d', $fechaRecibida1)->format('Y-m-d');

			$fechaRecibida2 = $_POST['fechaCierre'];
			$fechaRecibida2 = DateTime::createFromFormat('Y-m-d', $fechaRecibida2)->format('Y-m-d');

			$obj->setIdDiagnostico($_POST['id']);
			$obj->setFechaAsignacion($fechaRecibida1);
			$obj->setFechaCierre($fechaRecibida2);
			$obj->setDiagnostico($_POST['diagnostico']);
			$obj->setSolucion($_POST['solucion']);
			$obj->setIdTecnico($_POST['idTecnico']);
			$obj->setIdTicket($_POST['idTicket']);
			$obj->setIdCategoria($_POST['idCategoria']);
			$obj->setEstadoDiagnostico($_POST['estadoDiagnostico']);
			$obj->setEstado(1);
			
			clsDiagnosticosDAO::modificarRegistroPorId($obj);

			break;

		case 'elim':
			clsDiagnosticosDAO::eliminarPorId($_GET['id']);

			break;
	}

	//header("Location: ../vistas/dashboard.php?form=6");


?>