<?php require'../controladores/controlsesion.php'; ?><html lang="es">
<head>
	<title>Inicio</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" type="text/css" href="../plugins/fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../plugins/bootstrap/bootstrap.min.css">
	<script src="../plugins/bootstrap/popper.min.js"></script>
</head>
<body>
	<!-- SideBar -->
	<section class="full-box cover dashboard-sideBar">
		<div class="full-box dashboard-sideBar-bg btn-menu-dashboard"></div>
		<div class="full-box dashboard-sideBar-ct">
			<!--SideBar Title -->
			<div class="full-box text-uppercase text-center text-titles dashboard-sideBar-title">
				Compu sv<i class="zmdi zmdi-close btn-menu-dashboard visible-xs"></i>
			</div>
			<!-- SideBar User info -->
			<div class="full-box dashboard-sideBar-UserInfo">
				<figure class="full-box">
					<img src="../imagenes/avatar.jpg" alt="UserIcon">
					<figcaption class="text-center text-titles">User Name</figcaption>
				</figure>
				<ul class="full-box list-unstyled text-center">
					
					<li>
						<a href="#!" class="btn-exit-system">
							<i class="zmdi zmdi-power"></i>
						</a>
					</li>
				</ul>
			</div>
			
			<!-- SideBar Menu -->
			<ul class="list-unstyled full-box dashboard-sideBar-Menu">
				<li>
					<a href="home.html">
						<i class="zmdi zmdi-view-dashboard zmdi-hc-fw"></i> Dashboard
					</a>
				</li>
				<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-case zmdi-hc-fw"></i> Administración <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="period.html"><i class="zmdi zmdi-timer zmdi-hc-fw"></i> Listar tickets</a>
						</li>
						<li>
							<a href="period.html"><i class="fas fa-building"></i></i> Area y Departamento</a>
						</li>
						<li>
							<a href="subject.html"><i class="zmdi zmdi-book zmdi-hc-fw"></i> Listar tecnicos</a>
						</li>
						
						<li>
							<a href="salon.html"><i class="zmdi zmdi-font zmdi-hc-fw"></i>Listar clientes</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-account-add zmdi-hc-fw"></i> Usuarios <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li id="usuarios">
							<a href="vistas/indexusuarios.php"><i class="zmdi zmdi-account-add zmdi-hc-fw"></i> Agregar Usuarios</a>
						</li>
						<li>
							<a href="admin.html"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Admin</a>
						</li>
						<li>
							<a href="teacher.html"><i class="zmdi zmdi-male-alt zmdi-hc-fw"></i> Tecnico</a>
						</li>
						<li>
							<a href="student.html"><i class="zmdi zmdi-face zmdi-hc-fw"></i> Cliente</a>
						</li>
						
					</ul>
				</li>
					</ul>
				</li>
			</ul>
		</div>
	</section>

	<!-- Content page-->
	<section class="full-box dashboard-contentPage">
		<!-- NavBar -->
		<nav class="full-box dashboard-Navbar">
			<ul class="full-box list-unstyled text-right">
				<li class="pull-left">
					<a href="#!" class="btn-menu-dashboard"><i class="zmdi zmdi-more-vert"></i></a>
				</li>
				<li>
					<a href="#!" class="btn-Notifications-area">
						<i class="zmdi zmdi-notifications-none"></i>
						<span class="badge">7</span>
					</a>
				</li>
				<li>
					<a href="#!" class="btn-search">
						<i class="zmdi zmdi-search"></i>
					</a>
				</li>
				<li>
					<a href="#!" class="btn-modal-help">
						<i class="zmdi zmdi-help-outline"></i>
					</a>
				</li>
			</ul>
		</nav>

<script type="text/javascript">	


		$(document).ready(function(){

			validarPermisos();

		});


funtion validarpermisos(){

				//FUNCION PARA VALIDAR PERMISOS DE USUARIOS
		function validarPermisos(){
		//VARIABLE QUE ME ALMACENA LOS ELEMENTOS DEL MENU PARA CADA USUARIO
		var elementos = "";
		if (rol==3) {
			elementos+="";
			elementos+="";
			elementos+="";
			elementos+="";

		}

		if (rol==2) {
			elementos+="";
			elementos+="";
			elementos+="";
			elementos+="";

		}



		if(rol==1){
			//AGREGO LOS ELEMENTOS DEL MENU QUE PODRA USAR EL ADMIN
			elementos+='<article class="full-box tile"><div class="full-box tile-title text-center text-titles text-uppercase">Tickets abiertos</div><div class="full-box tile-icon text-center"><i class="far fa-file-alt"></i></div><div class="full-box tile-number text-titles"><p class="full-box">7</p><small>Tickets</small></div></article>';

			elementos+='<article class="full-box tile"><div class="full-box tile-title text-center text-titles text-uppercase">Tickets Cerrados</div><div class="full-box tile-icon text-center"><i class="fas fa-file-import"></i></div><div class="full-box tile-number text-titles"><p class="full-box">10</p><small>Tickets</small></div></article>';

			elementos+='<article class="full-box tile"><div class="full-box tile-title text-center text-titles text-uppercase">Asignar un ticket</div><div class="full-box tile-icon text-center"><i class="fas fa-calendar-check"></i></div><div class="full-box tile-number text-titles"><p class="full-box">7</p><small>Tickets</small></div></article>';

			elementos+='<article class="full-box tile"><div class="full-box tile-title text-center text-titles text-uppercase">Cerrar un ticket</div><div class="full-box tile-icon text-center"><i class="fas fa-calendar-times"></i></div><div class="full-box tile-number text-titles"><p class="full-box">7</p><small>Tickets</small></div></article>';

			elementos+='<article class="full-box tile"><div class="full-box tile-title text-center text-titles text-uppercase">Crear un ticket</div><div class="full-box tile-icon text-center"><i font-size="20px" class="far fa-calendar"></i></div><div class="full-box tile-number text-titles"><p class="full-box">70</p><small>Tickets</small></div></article>';

		}
		//LA FUNCION APPEND ME AGREGA LO QUE HAY EN ELEMENTOS (LOS ELEMENTOS DEL MENU) INMEDIATAMENTE DESPUES DEL DIV CON ID DE #MENU
		$("#menu").after(elementos);
	}

</script>

 <?php if (!isset($_SESSION['usuario'])){
	

}
else{
	echo "<script>var rol = '". $_SESSION["rol"] ."'</script>";
}

if(isset($_GET['form'])){
	echo "<script>var form = '". $_GET["form"] ."'</script>";
}
 ?>


<!--contenido de la pagina-->

		<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles">Sistema <small>Tickets</small></h1>
			</div>
		</div>
		
		<div class="full-box text-center" style="padding: 30px 10px;" >
			<div id="menu">
				
			</div>
			<div id="mostrador">
			

			</div>			
	</div>
		
	</div>
		
	</section>
	<!-- Notifications area -->
	<section class="full-box Notifications-area">
		<div class="full-box Notifications-bg btn-Notifications-area"></div>
		<div class="full-box Notifications-body">
			<div class="Notifications-body-title text-titles text-center">
				Notificasiones. <i class="zmdi zmdi-close btn-Notifications-area"></i>
			</div>
			<div class="list-group">
			  	<div class="list-group-item">
				    <div class="row-action-primary">
				      	<i class="zmdi zmdi-alert-triangle"></i>
				    </div>
				    <div class="row-content">
				      	<div class="least-content">17m</div>
				      	<h4 class="list-group-item-heading">Titulo de la notificacion</h4>
				      	<p class="list-group-item-text">has recibido un correo electronico.</p>
				    </div>
			  	</div>
			  	<div class="list-group-item">
				    <div class="row-action-primary">
				      	<i class="zmdi zmdi-alert-triangle"></i>
				    </div>
				    <div class="row-content">
				      	<div class="least-content">17m</div>
				      	<h4 class="list-group-item-heading">Titulo de la notificacion</h4>
				      	<p class="list-group-item-text">has recibido un correo electronico.</p>
				    </div>
			  	</div>
			  	<div class="list-group-item">
				    <div class="row-action-primary">
				      	<i class="zmdi zmdi-alert-triangle"></i>
				    </div>
				    <div class="row-content">
				      	<div class="least-content">17m</div>
				      	<h4 class="list-group-item-heading">Titulo de la notificacion</h4>
				      	<p class="list-group-item-text">has recibido un correo electronico.</p>
				    </div>
			  	</div>
			  	<div class="list-group-item">
				    <div class="row-action-primary">
				      	<i class="zmdi zmdi-alert-triangle"></i>
				    </div>
				    <div class="row-content">
				      	<div class="least-content">17m</div>
				      	<h4 class="list-group-item-heading">Titulo de la notificacion</h4>
				      	<p class="list-group-item-text">has recibido un correo electronico.</p>
				    </div>
			  	</div>
			</div>

		</div>
	</section>

	<!-- Dialog help -->
	<div class="modal fade" tabindex="-1" role="dialog" id="Dialog-Help">
	  	<div class="modal-dialog" role="document">
		    <div class="modal-content">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			    	<h4 class="modal-title">Ayuda</h4>
			    </div>
			    <div class="modal-body">
			        <p>
			        	Para poder brindarte soporte contacta con nuestros empleados ellos te brindaran
			        	 y contestaran todas las dudas que necesites o si no llamar al 2220-7678.
			        	   (GRACIAS POR SOLICITAR LA AYUDA)
			        </p>
			    </div>
		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-primary btn-raised" data-dismiss="modal"><i class="zmdi zmdi-thumb-up"></i> Ok</button>
		      	</div>
		    </div>
	  	</div>
	</div>
	<!--====== Scripts -->
	<script src="../js/jquery-3.1.1.min.js"></script>
	<script src="../js/sweetalert2.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/material.min.js"></script>
	<script src="../js/ripples.min.js"></script>
	<script src="../js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="../js/main.js"></script>
	<script>
		$.material.init();
	</script>
</body>
</html>