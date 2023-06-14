
<html>
<head>
	 <link rel="stylesheet" href="login.css"> <!-- estilo css -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	 <title>Gestión De Casos</title>
</head>
<body>
	
	<div class="center">
		<image src="logo.png" with="100" height="100" align="center">
		
		<h1>Gestión De Casos 1.0</h1>

	<form action="sesion.php" method="POST"> <!-- Formulario de inicio de sesion -->
		<div class="inputbox">
			<input type="text" name="usuario" required>
			<span>Usuario</span>
		</div>

		<div class="inputbox">
			<input type="Password" name="password"  id="password" required>
			<span>Password</span>
			<div class="input-group-append">
            			<button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()" style="width: 80px; height: 38px; left: 210px; top: 5px; border-radius: 20px;" >Mostrar</button>
          				</div>
		</div>
		<div class="inputbox">
			<label>¿Aun no tienes un usuario? <a href="RegistroUsuario.php">Registrate</a></label> <!--  hipervinculo al formulario de registro  -->
			<br><br>
			<label>¿Olvidaste tu contraseña? <a href="Cambio_password.php">Haz click aquí</a></label> <!-- hipervinculo al cambio de contraseña -->
		</div>
			<div class="inputbox">
			<input type="submit" name="btn_login" value="Iniciar Sesion">
		</div>

	</form>
	</div>
	<script type="text/javascript">
function mostrarPassword(){
		var cambio = document.getElementById("password");
		if(cambio.type == "password"){
			cambio.type = "text";
			$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		}else{
			cambio.type = "password";
			$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
		}
	} 
	
	$(document).ready(function () {
	//CheckBox mostrar contraseña
	$('#ShowPassword').click(function () {
		$('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
	});
});
</script>


</body>
</html>