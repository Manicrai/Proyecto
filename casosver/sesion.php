<html>
<head>
	<link rel="stylesheet" href="login.css">
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src = "https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<title>Sistema De Casos</title>
</head>
<body>
	<?php
		require_once 'bdconnect.php';
		session_start();

			if(isset($_REQUEST['btn_login'])) {		//verificacion de datos que login.php
				$_SESSION["usuario"] = $_REQUEST ["usuario"]; //se guardan los datos en la session
				$_SESSION["password"] = $_REQUEST ["password"];
		 
				$db =  new database();
				$query = $db->connect()->prepare("SELECT*FROM usuarios WHERE usuario = :usuario AND password = :password");
				$query->execute(["usuario" => $_SESSION["usuario"], "password" => $_SESSION["password"]]); //buscamos el usuario en la bd

				$row = $query->fetch(PDO::FETCH_NUM);
				if($row == true){
					//validar tipo de usuario
					$dbtipo_usuario= $row[11];
					$dbestado_usuario = $row[12];
					$_SESSION["tipo_usuario"] = $dbtipo_usuario;
					$_SESSION["id_usuario"] = $row[0];
					$_SESSION["correo"] = $row[4];
					}
					if ($dbestado_usuario == 1) {
					
						switch($_SESSION["tipo_usuario"]) //inicio de sesión de tipo de usuario
						{
						case 1:
						header("location: crearcaso.php"); 
						break;

						case 2:
						header("location: PaginaAdministrador.php"); 
						break;

						case 3:
						header("location: PaginaAdministrador.php"); 
						break;
						}
					}else{ 
					// no existe el usuario o esta inabilitado
					session_destroy();?>
            <script> 
            
                Swal.fire({ 
                 icon: 'error',
                 title: 'Usuario o Contraseña Incorrecta',
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
</body>
</html>
