<html>
<meta charset="utf-8" />
<head>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src = "https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="css/sb-admin-2.min.css" rel="stylesheet">
<title>Sistema De Casos</title>
</head>
<body>
<?php
  require_once 'bdconnect.php'; //conexion a la bd
  $nombre = $_POST["nombre"]; 
  $apellido = $_POST["apellido"];
  $extension = $_POST['extension'];
  $ubicacion = $_POST['ubicacion'];
  $cedula = $_POST['cedula'];
  $correo = $_POST["correo"];
  $cargo = $_POST["cargo"];
  $password = $_POST["password"];
  $departamento = $_POST['departamento'];
  


          function generate_login($p_nombre, $p_apellido){ //funcion que genera el usuario automatizado
            $namechar = str_split($p_nombre, 2)[0];
            $usuario = $p_apellido. '.' .$namechar ;
              $db =  new database();
              $consult = $db->connect()->prepare ("SELECT usuario FROM usuarios WHERE usuario = '$usuario'");
              $consult -> execute();
              $row = $consult->fetch(PDO::FETCH_NUM);
              if ($row == true) {
                $namechart = str_split($p_nombre, 3)[0];
                $usuario = $p_apellido. '.' .$namechart ; 
              }

            return $usuario;
          }//final de la funcion

          $usuario = generate_login($_POST["nombre"], $_POST["apellido"]);
          $db =  new database();
          $query = $db->connect()->prepare("INSERT INTO usuarios (usuario, nombre, apellido, extension, ubicacion, cedula, id_departamento, correo, id_cargo, password, tipo_usuario, estado_usuario) VALUES ('$usuario', '$nombre', '$apellido', '$extension', '$ubicacion', '$cedula', '$departamento', '$correo', '$cargo', '$password', '2', '1' )");
          $query->execute(); //se insertan los datos en la bd
           $mensaje = "Su usuario para iniciar sesion es, ". $usuario;
              use phpmailer\PHPMailer\PHPMailer;
              use phpmailer\PHPMailer\SMTP;
              use phpmailer\PHPMailer\Exception;

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
                            window.location.href= 'CrearAnalista.php';
                        }
                          })
            </script>