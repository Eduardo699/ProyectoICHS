<?php  
	require_once('../dao/Ticket.dao.php');
	require_once "scripts.php";
	require_once"../controladores/controladorSesion.php";
	//echo "<script>var idPersona = '". $_SESSION['idPersona'] ."';</script>";
	$tipo = 1;
	$dato = "";
	if($_SESSION['rol']!="Administrador"){
		$tipo = 2;
		$dato = $_SESSION['idPersona'];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Index de Categorias</title>
</head>
<style type="text/css">

	body{
		background-color:  #F1F0F0;
	}

	#contenedorTabla{
		height: 500px;
		overflow: scroll;
	}	
	

	#dgv th,td{
		text-align: center;
	}

</style>
<script type="text/javascript">
	$(document).ready(function(){
		 $("body #contenedorTabla table").on("click","button", function(e){
			var foto = $(this).attr('id');
			var ruta = 'ticketsfoto/' + foto;
			Swal.fire({
				imageUrl: ruta,
				imageHeight: 300,
				text: 'Imagen adjunta',
				imageAlt: 'Imagen adjunta no disponible :(',
				showConfirmButton: true,
			});
		});
	});
</script>
<body>
	<div class="container-fluid">
		<div class="row"><!--inicia segunda fila-->
			<div id="contenedorTabla" class="table-responsive"><!--inicia contenedor de la tabla-->
				<br><br><table id="dgv" class="table  table-hover table-dark">
					  <thead>
						    <tr class="bg-primary">
							    <th scope="col">Id</th>
							    <th scope="col">Nombre</th>
							    <th scope="col">Correo</th>
							    <th scope="col">Telefono</th>
							    <th scope="col">Direccion</th>
							    <th scope="col">Fecha Creacion</th>
							    <th scope="col">Asunto</th>
							    <th  scope="col">Descripcion</th>
							    <th scope="col">Adjunto</th>
						    </tr>
					  </thead>
					  <tbody id="cuerpoTabla">
						<?php foreach(TicketDao::listarDatos($tipo,$dato) as $fila): ?>
						<?php $nombre  = $fila[1]; $correo = explode(" ", $nombre); $len = count($correo);$salida="";
						if($len==1){$salida=$correo[0]."@compusv.com.sv";}if($len==2){$salida=$correo[0].$correo[1]."@compusv.com.sv";}if($len>=3){$salida=$correo[0].$correo[2]."@compusv.com.sv";}
							$len = strlen($fila[6]); if(is_null($fila[6]) || $len<4)
							{$btn = "<button disabled class='btn btn-sm btn-primary'>Sin foto</button>";}
							else{$btn = "<button id='". $fila[6] ."' class='foto btn btn-sm btn-primary'>Ver foto</button>";} 
						?>
							<tr>
								<th style="text-align: center; width: 1%;"><?=$fila[0]?></th>
								<th style="text-align: center; width: 8%;"><?=$fila[1]?></th>
								<td style="text-align: center; width: 8%;"><?= $salida ?></td>
								<td style="text-align: center; width: 17%;"><?=$fila[2]?></td>
								<td style="text-align: center; width: 8%;"><?=$fila[7]?></td>
								<td style="text-align: center; width: 8%;"><?=date("d/m/Y h:i A", strtotime($fila[3])); ?></td>
								<td style="text-align: center; width: 5%;"><?=$fila[4]?></td>
								<td style="text-align: justify; width: 48%;"><?= $fila[5] ?></td>
								<td style="text-align: center; width: 3%;"><?= $btn ?></td>
							</tr>
						<?php endforeach ?>
					  </tbody>
				</table>
			</div><!--termina contenedor de la tabla-->
		</div><!--termina segunda fila-->
	</div><!--termina el contenedor fluido-->

</body>
</html>