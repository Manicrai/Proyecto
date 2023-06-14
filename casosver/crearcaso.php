
<html>
<head>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src = "https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Sistema De Casos</title>
    <script type="text/javascript">
    function showContent() {
        element = document.getElementById("content");
        check = document.getElementById("check").value;
        if (check == "5") {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }

    function caso_new(){
        Swal.fire({ 
                 icon: 'success',
                 title: 'Reporte Enviado',
                 confirmButtonColor: '#3085d6',
                  confirmButtonText: 'ACEPTAR' 

                })

    }
        
    </script>

    <?php 
     use phpmailer\PHPMailer\PHPMailer;
            use phpmailer\PHPMailer\SMTP;
              use phpmailer\PHPMailer\Exception;

              require "phpmailer/PHPMailer.php";
              require "phpmailer/SMTP.php";
              require "phpmailer/Exception.php";
        require_once 'bdconnect.php';
        session_start();
            $db =  new database();
            $query = $db->connect()->prepare("SELECT*FROM usuarios WHERE usuario = :usuario AND password = :password ");
            $query->execute(["usuario" => $_SESSION["usuario"], "password" => $_SESSION["password"]]);
            $row = $query->fetch(PDO::FETCH_NUM);
            $cargo = $row[8];
                if($row == false ){
                    session_destroy();
    ?>
    <script> 
            
        Swal.fire({ 
        icon: 'error',
        title: 'Por Favor inicie Sesion',
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
        ?>

    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
<body>
    <?php 
        if ($cargo == 5) { ?>
  
		<!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                    <!-- Topbar Search -->
                <div>
                    <i class=""> <image src="logo.png"with="50" height="50"></i>
                </div>
                <div class="sidebar-brand-text mx-3">CMM</div>
             
                <li class="nav-item active" style="position: absolute; left: 40%;">
                    <a href="crearcaso.php"><span>Crear caso</span></a>
                </li>
                <li class="nav-item active" style="position: absolute; left: 50%;">
                   <a href="VerCaso.php">  <span>Ver Casos</span> </a>
                </li>
                <li class="nav-item active" style="position: absolute; left: 60%;">
                   <a href="versolicitudes.php" id="">  <span>Solicitudes Por Aprobar</span> </a>
                </li>
                    
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php  
                                        require_once 'bdconnect.php'; //Nombre de usuario superior derecha
                                        
                                        $bdid_usuarios = $_SESSION["id_usuario"];
                                         $db =  new database();
                                         $query = $db->connect()->prepare("SELECT*FROM usuarios WHERE id = '$bdid_usuarios'");
                                         $query -> execute();
                                         $row = $query->fetch(PDO::FETCH_NUM);
                                         $dbsolicitante = $row[2]." " .$row[3];
                                         $dbextension = $row[5];
                                         $dbdepartamento = $row[7];
                                         echo "$dbsolicitante";

                                    ?>
                                </span>
                                    <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-ouhttp://localhost:8080/casos/teste.html#t-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerra sesion
                                    </a>
                                </div>
                        </li>

                    </ul>

            </nav>
	<?php	  
        }else{ 
    ?>
                        <!-- Topbar -->
                            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <!-- Sidebar Toggle (Topbar) -->
                            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                                <i class="fa fa-bars"></i>
                            </button>

                        <!-- Topbar Search -->
                 
                            <div>
                                <i class=""> <image src="logo.png"with="50" height="50"></i>
                            </div>
                            <div class="sidebar-brand-text mx-3">CMM</div>
                            <li class="nav-item active" style="position: absolute; left: 40%;">
                                <a href="crearcaso.php"><span>Crear caso</span></a>
                            </li>
                            <li class="nav-item active" style="position: absolute; left: 50%;">
                                <a href="VerCaso.php">  <span>Ver Casos</span> </a>
                            </li>
            
                <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php  
                                        require_once 'bdconnect.php'; //Nombre de usuario superior derecha
                                        
                                        $bdid_usuarios = $_SESSION["id_usuario"];
                                         $db =  new database();
                                         $query = $db->connect()->prepare("SELECT*FROM usuarios WHERE id = '$bdid_usuarios'");
                                         $query -> execute();
                                         $row = $query->fetch(PDO::FETCH_NUM);
                                         $dbsolicitante = $row[2]." " .$row[3];
                                         $dbextension = $row[5];
                                         $dbdepartamento = $row[7];
                                         $dbcorreo = $row[4];
                                         echo "$dbsolicitante";

                                    ?>
                                </span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <div class="dropdown-divider">
                                </div>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-ouhttp://localhost:8080/casos/teste.html#t-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerra sesion
                                    </a>
                                </div>
                        </li>

                    </ul>

                </nav>
                <?php
                    } 
                ?>
                
                <div class="center">
                    <form method="POST" action="crearcaso.php">
                        <h1> Registrar Nuevo Caso </h1>
                            <div class="inputbox">
                             <div class="inputview">

                                <input type="text" name="titulo_c" required="" placeholder="Escribir">
                                <span>Requerimiento/Incidente</span>
                            </div>
                            </div>

                            <div class="inputbox">
                            <div class="inputview">
                                <textarea name="descripcion_c" rows="5" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;" required="" placeholder="Descripción Del Caso"></textarea>
                            </div>
                            </div>
                            <br><br><br><br>

                            <div class="caja">
                                <select name="prioridad">
                                <option hidden selected>Prioridad</option>
                                    <?php 
                                        $db =  new database();
                                        $query = $db->connect()->prepare("SELECT*FROM prioridad");
                                        $query -> execute();
                                        $prioridad = $query->fetchAll(); 
                                        foreach ($prioridad as $valores):
                                            echo '<option value="'.$valores["id"].'">'.$valores["prioridad"].'</option>';
                                        endforeach;


                                    ?>
                                </select>
                            </div>
                            <div class="caja">
                                <select name="categoria" id="check"  onchange="javascript:showContent()">
                                <option hidden selected>Categoria</option>
                                    <?php 
                                        $db =  new database();
                                        $query = $db->connect()->prepare("SELECT*FROM categoria");
                                        $query -> execute();
                                        $categoria = $query->fetchAll(); 
                                        foreach ($categoria as $valores):
                                            echo '<option value="'.$valores["id"].'">'.$valores["categoria"].'</option>';
                                        endforeach;
                                    ?>
                                </select>
                            </div>

                            <div class="inputbox" id="content" style="display: none;" > 
                            <div class="inputview">
                                <input type="email" name="correo_sub">
                                <span>Correo del SubGerente del Área</span>
                            </div>
                            </div>
                    
                            <div class="inputbox">
                                <input type="submit" name="caso_n" value="Crear Caso"  >
                            </div>
                      
                    </form>
                </div>

<?php
        require_once 'bdconnect.php';

        if (isset($_REQUEST['caso_n'])) {
            $_SESSION["titulo_c"] = $_REQUEST ["titulo_c"];
            $titulo_c = $_SESSION ["titulo_c"];
            $_SESSION["descripcion_c"] = $_REQUEST ["descripcion_c"];
            $descripcion_c = $_SESSION ["descripcion_c"];
            $usuario = $_SESSION['usuario'];
            $prioridad = $_REQUEST["prioridad"];
            $categoria = $_REQUEST["categoria"];

            
                if ($categoria == "5") { //en este caso es enviado un correo al subgerente del area
                    $_SESSION["correo_sub"] = $_REQUEST["correo_sub"];
                    $correo_sub = $_SESSION["correo_sub"];
                    $db =  new database();
                    $queri = $db->connect()->prepare("INSERT INTO casos (titulo, solicitante, extension, id_categoria, id_departamento, correo_sub, descripcion_caso, id_prioridad, id_estado_caso, id_usuarios, aprobacion )
                    VALUES ('$titulo_c', '$dbsolicitante', '$dbextension', '$categoria', '$dbdepartamento', '$correo_sub', '$descripcion_c', '$prioridad', '1', '$bdid_usuarios', 'Por Aprobar') ");
                        $queri -> execute(); //guardamos todo en  la bd casos
                        $mensaje = "Tiene un caso de permisologia por aprobar solicitando por ". $dbsolicitante;

           
              
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
                    $mail->addAddress($correo_sub);     //Add a recipient

                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'Caso Por Aprobar';
                    $mail->Body    = $mensaje;
                    $mail->send();
                    } catch (Exception $e) {
                     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                      }

                      $mail = new PHPMailer(true);
                      $mensaje2 = "Ha sido creado un nuevo caso con el requerimiento ".$titulo_c;

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
                    $mail->addAddress($dbcorreo);     //Add a recipient

                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'Nuevo Caso';
                    $mail->Body    = $mensaje2;
                    $mail->send();
                    } catch (Exception $e) {
                     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                      }
                   
                        ?>
            <script>
             Swal.fire({ 
                 icon: 'success',
                 title: 'Reporte Enviado',
                 confirmButtonColor: '#3085d6',
                  confirmButtonText: 'ACEPTAR' 

            })
            </script>
            <?php
              
            }else{

            $db =  new database();
            $queri = $db->connect()->prepare("INSERT INTO casos (titulo, solicitante, extension, id_categoria, id_departamento, correo_sub, descripcion_caso, id_prioridad, id_estado_caso, id_usuarios )
            VALUES ('$titulo_c', '$dbsolicitante', '$dbextension', '$categoria', '$dbdepartamento', 'No aplica', '$descripcion_c', '$prioridad', '1', '$bdid_usuarios') ");
            $queri -> execute(); //guardamos todo en  la bd casos
              
                    $mail = new PHPMailer(true);
                      $mensaje2 = "Ha sido creado un nuevo caso con el requerimiento ".$titulo_c;

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
                    $mail->addAddress($dbcorreo);     //Add a recipient

                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'Nuevo Caso';
                    $mail->Body    = $mensaje2;
                    $mail->send();
                    } catch (Exception $e) {
                     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                      }
            ?>
            <script>
             Swal.fire({ 
                 icon: 'success',
                 title: 'Reporte Enviado',
                 confirmButtonColor: '#3085d6',
                  confirmButtonText: 'ACEPTAR' 

                })
            </script>
            <?php
              
                }

                }
            ?>
    <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

    <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cerrar Sesion</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                <div class="modal-body">¿Realmente quieres cerrar sesion?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="disconnet.php">Salir</a>
                </div>
                </div>
            </div>
        </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

	