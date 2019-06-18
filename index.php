
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="./css/main.css">
</head>
<body class="cover" style="background-image: url(imagenes/tec.jpg); color: white;">
	<form action="" method="post" autocomplete="off" class="full-box logInForm">
		<p class="text-center text-muted"><i class="zmdi zmdi-account-circle zmdi-hc-5x"></i></p>
		<p class="text-center text-muted text-uppercase">Inicia sesión con tu cuenta</p>
		<div class="form-group label-floating">
		  <label class="control-label" for="UserEmail">Nombre de usuario</label>
		  <input class="form-control"  type="text" required="" name="UserEmail" style="color: white;">
		  <p class="help-block">Escribe tú nombre de usuario</p>
		</div>
		<div class="form-group label-floating">
		  <label class="control-label" for="UserPass">Contraseña</label>
		  <input class="form-control" id="UserPass" type="password" required="" name="UserPass" style="color: white;">
		  <p class="help-block">Escribe tú contraseña</p>
		</div>
		<div class="form-group text-center">
			<input type="submit" value="Iniciar sesión" class="btn btn-raised btn-danger"  name="login">
		</div>
	</form>
	<?php 
	$con=new mysqli("localhost","root","","bdsistema");
	if(!empty($_POST['login'])){
		$usuario =mysqli_escape_string($con,$_POST["UserEmail"]);
		$contra =mysqli_escape_string($con, hash("sha256", $_POST["UserPass"]));

		$sql="SELECT * FROM usuario WHERE username ='$usuario' AND password ='$contra'";
		$res=$con->query($sql);
	

		if($res->num_rows>0){

		while($row = mysqli_fetch_array($res)){

				if ($row["rol"]=="Administrador") {
					session_start();
					$_SESSION["usuario"]=$row["username"];
					$_SESSION["id"]=$row["userid"];
					$_SESSION["rol"]=$row["rol"];
					header('Location:vistas/dashboard.php');
				}
				if ($row["rol"]=="Tecnico") {
					$res3=$con->query("SELECT * FROM tecnicos as t, usuario as u WHERE u.userid=t.userid");
					if ($res3->num_rows>0) {
					while ($row3=mysqli_fetch_array($res3)) {
					session_start();
					$_SESSION["usuario"]=$row["username"];
					$_SESSION["id"]=$row["userid"];
					$_SESSION["rol"]=$row["rol"];
					$_SESSION["nombreT"]=$row3["nombreCompleto"];
					$_SESSION["idPersona"]=$row3["idTecnico"];
					header('Location:vistas/dashboard.php');	

					}

				}
				else{
						
						echo "<div style='background-color: #FAB1AD;'><center>El usuario no pertenece a ningun tecnico(contacte a un administrador de ser asi.)</center></div>";
					}
			}

				if ($row["rol"]=="Cliente") {

					$sql2="SELECT * FROM cliente as c, usuario as u WHERE u.userid=c.userid";
					$res2=$con->query($sql2);
					if ($res2->num_rows>0) {
					while ($row2=mysqli_fetch_array($res2)) {
					session_start();
					$_SESSION["usuario"]=$row["username"];
					$_SESSION["id"]=$row["userid"];
					$_SESSION["rol"]=$row["rol"];
					$_SESSION["nombreC"]=$row2["nombreCompleto"];
					$_SESSION["idPersona"]=$row2["idCliente"];
					header('Location:vistas/dashboard.php');

						}
					}else{
						
						echo "<div style='background-color: #FAB1AD;'><center>El usuario no pertenece a ningun cliente(contacte a un administrador de ser asi.)</center></div>";
					}

					
				}
			
		}//cierre de while :v

		}else{
			echo "<div style='background-color: #FAB1AD;'><center>Usuario o contraseña no son válidos</center></div>";
		}
		
	}
	mysqli_close($con);

 ?>
	<!--====== Scripts -->
	<script src="./js/jquery-3.1.1.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script src="./js/material.min.js"></script>
	<script src="./js/ripples.min.js"></script>
	<script src="./js/sweetalert2.min.js"></script>
	<script src="./js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="./js/main.js"></script>
	<script>
		$.material.init();
	</script>
</body>
</html>