<html>
<head>
	<link rel="stylesheet" href="login.css">
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src = "https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<title>Sistema De Casos</title>
	<script type="text/javascript">
	 function showContent() { //funcion para verificar y mostrar los siguientes campos

	 	var usuario = document.getElementById("usuario").value;
	 	var cedula = document.getElementById("cedula").value;

	 		$.ajax({
                        url: "funcion_usuario.php",
                        method: "POST",
                        async: false,
                        data: {ausuario : usuario, acedula: cedula },
                        //dataType: "json", 
                        success: function(respuesta) {
                                        
                            var response = respuesta

                            if (response == "si") {

                                password = document.getElementById("password");
        						password2 = document.getElementById("password2");
        						siguiente = document.getElementById("siguiente");
        						confirmar = document.getElementById("confirmar");
        							password.style.display='block';
            						password2.style.display='block';
            						siguiente.style.display='none';
            						confirmar.style.display="block";

                            }else{

                                    Swal.fire({ 
                 						icon: 'error',
                 						title: 'Usuario o Cedula Incorrecta',
                 						confirmButtonColor: '#3085d6',
                 						confirmButtonText: 'ACEPTAR',
                 					})
                            } 
                                        

                                       
                        },
                        error: function (respuesta){
                        alert ("error");
                        }
            });
         
    }

 

        
	</script>
</head>
<body>
	
	<div class="center">

		<h1>Recuperación</h1>
		<form action="Cambio_password.php" method="POST"> <!-- Formulario de cambio de contraseña -->

			<div id="error" class="alert alert-danger ocultar" role="alert" style="display: none;">
    			Las Contraseñas no coinciden, vuelve a intentar !
			</div>

		<div class="inputbox">
			<input type="text" name="usuario" id="usuario" required>
			<span>Usuario</span>
		</div>

		<div class="inputbox">
			<input type="text" name="cedula"  id="cedula" required minlength="7" maxlength="10">
			<span>Cedula</span>
		</div>

		<div class="inputbox" id="password" style="display: none;">
			<input type="password" id="pass1" name="password" >
			<span>Nueva Contraseña</span>
		</div>

		<div class="inputbox" id="siguiente" style="display: block;" >
			<input type="button" name="" onclick="showContent()" value="Siguiente">
		</div>

		<div class="inputbox" id="password2" style="display: none;">
			<input type="password" name="password2" id="pass2" required> 
			<span>Confirme Contraseña</span>
		 </div>

		<div class="inputbox" id="confirmar" style="display: none;">
			<input type="submit" name="actualizar" value="Confirmar" >
		</div>
	</form>

		<?php

			if (isset($_REQUEST['actualizar'])) { // Se verifican si la contraseña coinciden
				$pass1 = $_POST['password'];
				$pass2 = $_POST['password2'];
			
				if ($pass1 != $pass2) {
		?>

		<script type="text/javascript">
   				Swal.fire({ // En caso que no coincidan mostramos una alerta correspondiente
                 		icon: 'error',
                 		title: 'Contraseña No Coinciden',
                 		confirmButtonColor: '#3085d6',
                  		confirmButtonText: 'ACEPTAR',
                 		allowOutsideClick: true 
                 		 }).then((resultado) => {
                       		if (resultado.isConfirmed) {
                         	 window.location.href= 'Cambio_password.php';
                        	}
                	})

   		</script>

   		<?php

				}else {
					$usuario = $_POST['usuario'];
					$cedula = $_POST['cedula'];
					$new = $_POST['password'];
						require_once 'bdconnect.php';
						$db =  new database();
            			$query = $db->connect()->prepare("UPDATE usuarios SET password = '$new' WHERE usuario = '$usuario' AND cedula = '$cedula' ");
            			$query -> execute();
   		?>

   		<script type="text/javascript">
   			Swal.fire({ // En caso que de que coincidan se guarda la nueva contraseña y se muestra una alerta 
                icon: 'success',
                title: 'Contraseña Cambiada Correctamente',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'ACEPTAR',
                allowOutsideClick: true 
                }).then((resultado) => {
                    if (resultado.isConfirmed) {
                        window.location.href= 'Login.php';
                    }
                })

   		</script>

<?php
			}

			 }




	?>

	</div>
	