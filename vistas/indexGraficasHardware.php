

<?php

include "../modelos/clsConexion.php";
require_once"../controladores/controladorSesion.php";
if ($_SESSION["rol"]!="Administrador") {
  header("Location: dashboard.php");
}

$obj=new clsConexion();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Gráficas</title>

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <style type="text/css">
${demo.css}
        </style>
        <script type="text/javascript">
$(function () {
    
         $('#grafico').highcharts({ 
         chart: { type: 'column'},
         title: { text: 'Control de Tickets de Hardware'},
         xAxis: { categories: ['Tickets']},
         yAxis: { title: { text: 'Cantidad total de tickes' }},
         series: [


    { name: 'Microprocesador', data: [

     <?php
      $sql = 'SELECT COUNT(*) as cantidad FROM diagnostico as d INNER JOIN ticket as t ON d.idTicket=t.idTicket INNER JOIN categoria as c ON d.idCategoria = c.idCategoria WHERE c.tipo="Hardware" AND c.nombre="Microprocesador"';

                $res = mysqli_query($obj->getConexion(),$sql);
                
                

                while($data = mysqli_fetch_array($res)){
                    ?>
                    [ <?php echo $data['cantidad'];?> ],

                    <?php 
                }
                ?>

    ]},

    
     { name: 'Fuente de poder', data: [

    <?php
      $sql='SELECT COUNT(*) as cantidad FROM diagnostico as d INNER JOIN ticket as t ON d.idTicket=t.idTicket INNER JOIN categoria as c ON d.idCategoria = c.idCategoria WHERE c.tipo="Hardware" AND c.nombre="Fuente de poder"';

                $res = mysqli_query($obj->getConexion(),$sql);
                
                

                while($data = mysqli_fetch_array($res)){
                    ?>
                    [ <?php echo $data['cantidad'];?> ],

                    <?php 
                }
                ?>

    ]}, 

     { name: 'RAM', data: [

    <?php
      $sql='SELECT COUNT(*) as cantidad FROM diagnostico as d INNER JOIN ticket as t ON d.idTicket=t.idTicket INNER JOIN categoria as c ON d.idCategoria = c.idCategoria WHERE c.tipo="Hardware" AND c.nombre="RAM"';

                $res = mysqli_query($obj->getConexion(),$sql);
                
                

                while($data = mysqli_fetch_array($res)){
                    ?>
                    [ <?php echo $data['cantidad'];?> ],

                    <?php 
                }
                ?>

    ]}, 

     { name: 'Disco Duro', data: [

    <?php
      $sql='SELECT COUNT(*) as cantidad FROM diagnostico as d INNER JOIN ticket as t ON d.idTicket=t.idTicket INNER JOIN categoria as c ON d.idCategoria = c.idCategoria WHERE c.tipo="Hardware" AND c.nombre="Disco Duro"';

                $res = mysqli_query($obj->getConexion(),$sql);
                
                

                while($data = mysqli_fetch_array($res)){
                    ?>
                    [ <?php echo $data['cantidad'];?> ],

                    <?php 
                }
                ?>

    ]}, 

    { name: 'Ventilador', data: [

    <?php
      $sql='SELECT COUNT(*) as cantidad FROM diagnostico as d INNER JOIN ticket as t ON d.idTicket=t.idTicket INNER JOIN categoria as c ON d.idCategoria = c.idCategoria WHERE c.tipo="Hardware" AND c.nombre="Ventilador"';

                $res = mysqli_query($obj->getConexion(),$sql);
                
                

                while($data = mysqli_fetch_array($res)){
                    ?>
                    [ <?php echo $data['cantidad'];?> ],

                    <?php 
                }
                ?>

    ]},

    { name: 'Tarjeta de video', data: [

    <?php
      $sql='SELECT COUNT(*) as cantidad FROM diagnostico as d INNER JOIN ticket as t ON d.idTicket=t.idTicket INNER JOIN categoria as c ON d.idCategoria = c.idCategoria WHERE c.tipo="Hardware" AND c.nombre="Tarjeta de video"';

                $res = mysqli_query($obj->getConexion(),$sql);
                
                

                while($data = mysqli_fetch_array($res)){
                    ?>
                    [ <?php echo $data['cantidad'];?> ],

                    <?php 
                }
                ?>

    ]},  

    { name: 'Motherboard', data: [

    <?php
      $sql='SELECT COUNT(*) as cantidad FROM diagnostico as d INNER JOIN ticket as t ON d.idTicket=t.idTicket INNER JOIN categoria as c ON d.idCategoria = c.idCategoria WHERE c.tipo="Hardware" AND c.nombre="Motherboard"';

                $res = mysqli_query($obj->getConexion(),$sql);
                
                

                while($data = mysqli_fetch_array($res)){
                    ?>
                    [ <?php echo $data['cantidad'];?> ],

                    <?php 
                }
                ?>

    ]},  


    { name: 'Batería CMOS', data: [

    <?php
      $sql='SELECT COUNT(*) as cantidad FROM diagnostico as d INNER JOIN ticket as t ON d.idTicket=t.idTicket INNER JOIN categoria as c ON d.idCategoria = c.idCategoria WHERE c.tipo="Hardware" AND c.nombre="Batería CMOS"';

                $res = mysqli_query($obj->getConexion(),$sql);
                
                

                while($data = mysqli_fetch_array($res)){
                    ?>
                    [ <?php echo $data['cantidad'];?> ],

                    <?php 
                }
                ?>

    ]}

         ]
       });    
     });  



        </script>
    </head>
    <body>

<script src="../Highcharts-4.1.5/js/highcharts.js"></script>
<script src="../Highcharts-4.1.5/js/modules/exporting.js"></script>
<script src="../Highcharts-4.1.5/js/modules/funnel.js"></script>

<div id="grafico" style="width:80%; height:600px; margin: 0 auto; margin-top: 30px;"></div>

    </body>
</html>

