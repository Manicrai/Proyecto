<html>
<head>
	<link href="css/sb-admin-2.min.css" rel="stylesheet">
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src = "https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script type="text/javascript">
    function new_coment(){
                            
                            var comentario = document.getElementById('comentario').value ;
                            $.ajax({
                                    url: "funcion_comentario.php",
                                    method: "POST",
                                    async: false,
                                    data: {dbco : comentario },
                           //       dataType: "json", 
                                    success: function(respuesta) {
                                    	
                                        location.reload();
                                       
                                    },
                                    error: function (respuesta){
                                            alert ("error");
                                    }
                            });
          

            };
</script>

</head>
<body style="background: url(backgroundlogo.png); ">
			
				<div class="center">
					<h3 ><b>Comentarios del Caso</b> </h3>
					<br><br>
							
					
		<?php 
				session_start();
				require_once 'bdconnect.php';
				$id = $_SESSION['bdid'];
				$db =  new database();
				$query = $db->connect()->prepare ("SELECT nombre, comentario, fecha FROM comentarios WHERE id_casos = '$id' ORDER BY fecha");
				$query -> execute();
            	$comentarios = $query -> fetchAll();
            	if ($comentarios && $query->rowCount()> 0)
                {
                    foreach ($comentarios as $fila)
                    {


		?>




					<ul>
						<li class="me">
							<div class="">
								<span class=""><?php echo ($fila["nombre"]);?></span>
							
							<br>
							<div class="">
								<p><?php echo ($fila["comentario"]);?></p>
								<span><?php echo ($fila["fecha"]);?></span>
							
						</li>
					
				</ul>


      
      <?php 
                    }
                }
                ?>




      <div class="inputbox">
      <input type="text" id="comentario" name="comentario"  placeholder="Escribe un comentario"/>
      </div>
      <div class="inputbox" style="left: 70px">
      <input type="button" name="" onclick="new_coment()" value="Enviar">
  </div>


   
<!-- partial -->
  <script  src="./script.js"></script>

</body>
</html>