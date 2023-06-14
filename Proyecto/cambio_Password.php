<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Inicio</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <script src="sweetalert2.all.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body style=" background: url(https://fondosmil.com/fondo/6725.jpg)";>
<div class="login-wrap">
  <div class="login-html">
    <h1 style="text-align: center; color: #FFFFFF; margin-top: -25px; margin-bottom: 30px;"> Tu consultorio  </h1>
    <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Recuperación</label>
    <input id="tab-2" type="radio" style="visibility: hidden;" name="tab" class="sign-up"><label for="tab-2" style="visibility: hidden;" class="tab">Sign Up</label>
    <div class="login-form">
      <div class="sign-in-htm">
      <form action="" method="POST" id="sesion">
        <div class="group">
          <label for="user" class="label">Usuario</label>
          <input type="text" class="input" name="usuario" required>
        </div>
        <div class="group">
          <label for="user" class="label">Cedula</label>
          <input type="text" class="input" name="cedula" required>
        </div>
        <div class="group">
          <label for="pass" class="label">Nueva Contraseña</label>
          <input  type="password" class="input" name="pass" data-type="password" required>
        </div>
        <div class="group">
          <input type="submit" name="cambio_Password" class="button" value="Cambiar Contraseña">
        </div>
        </form>
        <div class="hr"></div>
      </div>
      
      </div>
    </div>
  </div>
</div>
<?php
		require_once 'bdconnect.php';
		session_start();

			if(isset($_REQUEST['cambio_Password'])) {		//verificacion de datos que login.php
				$_SESSION["usuario"] = $_REQUEST ["usuario"]; //se guardan los datos en la session
				$_SESSION["password"] = $_REQUEST ["pass"];
                $_SESSION["cedula"] = $_REQUEST ["cedula"];
		 
				$db =  new database();
				$query = $db->connect()->prepare("SELECT*FROM doctores WHERE usuario = :usuario AND cedula = :cedula AND solvencia = :solvencia");
				$query->execute(["usuario" => $_SESSION["usuario"], "cedula" => $_SESSION["cedula"], "solvencia" => 1]); //buscamos el usuario en la bd
				$row = $query->fetch(PDO::FETCH_NUM);
				if($row == true){
					$db =  new database();
				    $query = $db->connect()->prepare("UPDATE doctores SET password = '".$_SESSION['password']."'  WHERE usuario = :usuario AND cedula = :cedula AND solvencia = :solvencia");
				    $query->execute(["usuario" => $_SESSION["usuario"], "cedula" => $_SESSION["cedula"], "solvencia" => 1]);
                    ?>
                    <script>
                        Swal.fire({ // En caso que de que coincidan se guarda la nueva contraseña y se muestra una alerta 
                            icon: 'success',
                            title: 'Contraseña Cambiada Correctamente',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'ACEPTAR',
                            allowOutsideClick: true 
                        }).then((resultado) => {
                            if (resultado.isConfirmed) {
                            window.location.href= 'index.php';
                        }
                        })
                    </script>
                <?php  
                }else {
                    ?>
                    <script>
                    Swal.fire({
                        title: 'Error!',
                        text: 'Datos incorrectos o insolvente',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    })
                    </script>
                    <?php
                } 
          
           
		

 		
 	}
 	
?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>