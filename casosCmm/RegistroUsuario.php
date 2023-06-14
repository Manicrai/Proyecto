
<html>
<head>
	 <link rel="stylesheet" href="login.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	 <title>Sistema De Casos</title>
</head>
<body>
	<div id="container">
		
		<div class="center" >

			<h1>Nuevo Usuario</h1>
			<form  action="NuevoUsuario.php" method="POST">
				<div class="name">
					<div class="inputbox">
						<input type="text" name="nombre" required=""><span>Nombre</span>
					</div>
				</div>
				<div class="email">
					<div class="inputbox">	
						<input type="text" name="apellido" required=""><span>Apellido</span>
					</div>
				</div>
				<br><br><br><br>
				<div class="name">
					<div class="inputbox">
						<input type="text" name="extension" required=""  minlength="4" maxlength="5"><span>Extensíon</span>
					</div>
				</div>
				<div class="email">
					<div class="inputbox">	
						<input type="text" name="ubicacion" required=""><span>Ubicación Fisica</span>
					</div>
				</div>
				<br><br><br><br>
				<div class="name">
        			<div class="inputbox">
            			<input type="text" name="cedula" id="" required minlength="7" maxlength="10"><span>Cedula</span>
        			</div>
        		</div>
				<div class="email">
					<div class="inputbox">
						<input type="password" name="password" id="password" required minlength="7" required="asdasd" autofocus maxlength="10"><span>Password</span>
						<div class="input-group-append">
            			<button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()" style="width: 80px; height: 38px; left: 210px; top: 5px; border-radius: 20px;" >Mostrar</button>
          				</div>
					</div>
				</div>
				<br><br><br><br>
				<div class="telephone">
					<div class="maile">
						<input type="email" name="correo" placeholder="@centromedicomaracay/gmail.com"  title="Proporcione solo una dirección de correo electrónico Institucional de CMM"> 
					</div>
				</div>
				<div class="subject">
					<div class="caja">
		  				<label for="subject"></label>
                    		<select name="departamento" required>
                        		<option disabled hidden selected >Seleccione Departamento</option>
                            		<?php 
                                        require_once 'bdconnect.php';
                                        $db =  new database();
                                        $query = $db->connect()->prepare("SELECT*FROM departamento");
                                        $query -> execute();
                                        $departamento = $query->fetchAll(); 
                                        foreach ($departamento as $valores):
                                            echo '<option value="'.$valores["id"].'">'.$valores["departamento"].'</option>';
                                        endforeach;
                            		?>
                    		</select>
        			</div>
        		</div>
        		<div class="subject">
        			<div class="caja">
                		<select name="cargo" required>
                        	<option disabled  hidden selected>Seleccione Cargo</option>
                            	<?php 
                                        $db =  new database();
                                        $query = $db->connect()->prepare("SELECT*FROM cargos");
                                        $query -> execute();
                                        $departamento = $query->fetchAll(); 
                                        foreach ($departamento as $valores):
                                            echo '<option value="'.$valores["id"].'">'.$valores["cargo"].'</option>';
                                        endforeach;
                            	?>
                		</select>
        			</div>
        		</div>
        		<div class="telephone">
					<div class="inputbox">
						<input type="submit" name="" value="Registrar Usuario" style="left: 50%;">
					</div>
				</div>
			</form>
		</div>
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