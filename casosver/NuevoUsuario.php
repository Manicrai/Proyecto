<html>
<meta charset="utf-8" />
<head>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src = "https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>
           
  <?php
      require_once 'bdconnect.php'; //conexion a la bd
              use phpmailer\PHPMailer\PHPMailer;
              use phpmailer\PHPMailer\SMTP;
              use phpmailer\PHPMailer\Exception;
        $nombre = $_POST["nombre"]; 
        $apellido = $_POST["apellido"];
        $correo = $_POST["correo"];
        $extension = $_POST["extension"];
        $ubicacion = $_POST["ubicacion"];
        $departamento = $_POST["departamento"];
        $password = $_POST["password"];
        $cargo = $_POST["cargo"];
        $cedula = $_POST['cedula'];
          function generate_login($p_nombre, $p_apellido){ //funcion que genera el usuario automatizado
            $namechar = str_split($p_nombre, 1)[0];
            $usuario = $namechar. '' .$p_apellido ;
              $db =  new database();
              $consult = $db->connect()->prepare ("SELECT usuario FROM usuarios WHERE usuario = '$usuario'");
              $consult -> execute();
              $row = $consult->fetch(PDO::FETCH_NUM);
              if ($row == true) {
                $namechart = str_split($p_nombre, 2)[0];
                $usuario = $namechart. '.' .$p_apellido ; 
              }

            return $usuario;
          }//final de la funcion

          $db = new database();
          $query = $db->connect()->prepare("SELECT cedula FROM usuarios WHERE cedula = '$cedula'");
          $query->execute();
          $provicional = $query->fetch();
          if(empty($provicional)) {

            $usuario = generate_login($_POST["nombre"], $_POST["apellido"]);
            $db =  new database();
            $query = $db->connect()->prepare("INSERT INTO usuarios (usuario, nombre, apellido, correo, extension, ubicacion, id_departamento, id_cargo, password, tipo_usuario, estado_usuario, cedula) VALUES ('$usuario', '$nombre', '$apellido', '$correo', '$extension', '$ubicacion', '$departamento', '$cargo', '$password', '1', '1', '$cedula' )");
            $query->execute(); //se insertan los datos en la bd 
            $mensaje = "Su usuario para iniciar sesion es, ". $usuario;
              

              require "phpmailer/PHPMailer.php";
              require "phpmailer/SMTP.php";
              require "phpmailer/Exception.php";
              
                $mail = new PHPMailer(true);


            try {
              
              
                    //Server settings
                    $mail->SMTPDebug = 0;                     //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host = 'mail.centromedicomaracay.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth = true;                                   //Enable SMTP authentication
                    $mail->Username  = 'helpdesk@centromedicomaracay.com';                     //SMTP username
                    $mail->Password  = 'Sist123.*';                               //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
                    $mail->SMTPOptions = [
                    'ssl' => [
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true,
                   ]
                    ];
                    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                    //Recipients
                    $mail->setFrom('helpdesk@centromedicomaracay.com', 'CMM Helpdesk');
                    $mail->addAddress($correo);     //Add a recipient

                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'Usuario Del Portal De Casos';
                    $mail->Body    = $mensaje;
                    $mail->send();
                    } catch (Exception $e) {
                     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                      }
                   


            
  ?>
  <script> 
    var x = 'Su Usuario es el siguiente: <?php echo $usuario; ?>';
      Swal.fire({ 
                  icon: 'success',
                  title: 'Usuario Creado',
                  text: x  ,
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
           }else { ?>
            <script> 
            
                Swal.fire({ 
                 icon: 'error',
                 title: 'Usuario Existente',
                 confirmButtonColor: '#3085d6',
                 confirmButtonText: 'ACEPTAR',
                 allowOutsideClick: true 
                  }).then((resultado) => {
                       if (resultado.isConfirmed) {
                          window.location.href= 'Login.php';
                        }
                })
            </script><?php 

           } ?>
            

 