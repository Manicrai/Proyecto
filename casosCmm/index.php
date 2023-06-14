
<html>
<head>
	 <link rel="stylesheet" href="login.css"> <!-- estilo css -->
	 <title>Gestión De Casos</title>
</head>
<body>
	
	<div class="center">
		<image src="logo.png" with="100" height="100" align="center">
		
		<h1>Gestión De Casos</h1>

	<form action="sesion.php" method="POST"> <!-- Formulario de inicio de sesion -->
		<div class="inputbox">
			<input type="text" name="usuario" required>
			<span>Usuario</span>
		</div>

		<div class="inputbox">
			<input type="Password" name="password" required>
			<span>Password</span>
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


</body>
</html>