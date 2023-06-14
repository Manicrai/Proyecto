 <?php


            $header = "From: noreply@example.com" . "\r\n";
            $header. = "Reply-To: noreply@example.com" . "\r\n";
            $header. = "X-Mailer: PHP/". phpversion();
            $mail = mail($correo, "Nuevo Registro De Usuario", "Su Credenciales para iniciar sesion son las siguientes " $usuario "," $password)

 ?>