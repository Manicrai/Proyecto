<?php 
    require_once 'bdconnect.php';
    if (!isset($_SESSION["usuario"])) {
        session_start();
        $db =  new database();
            $query = $db->connect()->prepare("SELECT*FROM usuarios WHERE usuario = :usuario AND password = :password ");
            $query->execute(["usuario" => $_SESSION["usuario"], "password" => $_SESSION["password"]]);
            $row = $query->fetch(PDO::FETCH_NUM);
                if($row == true){

                    }
                else {
                    header("location:login.php");
                    exit;
                }

    }
    

?>

<html>
<head>
<link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
<body>

    <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                 <a class="sidebar-brand d-flex align-items-center justify-content-center" href="PaginaUsuario.php">
                <div>
                    <i class=""> <image src="logo.png"with="50" height="50"></i>
                </div>
                <div class="sidebar-brand-text mx-3">CMM</div>
            </a>
             <li class="nav-item active" style="position: absolute; left: 500px;">
               
                    <a href="crearcaso.php"><span>Crear caso</span></a>
            </li>
            <li class="nav-item active" style="position: absolute; left: 700px;">
               
                   <a href="VerCaso.php">  <span>Ver Casos</span> </a>
            </li>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php  
                                        $usuario = $_SESSION['usuario'];
                                         $db =  new database();
                                         $query = $db->connect()->prepare("SELECT*FROM usuarios WHERE usuario = '$usuario'");
                                         $query -> execute();
                                         $row = $query->fetch(PDO::FETCH_NUM);
                                         $dbsolicitante = $row[2]." " .$row[3];
                                         $_SESSION["dbsolicitante"] = $dbsolicitante;
                                         echo $_SESSION["dbsolicitante"];

                                ?> </span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-ouhttp://localhost:8080/casos/teste.html#t-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerra sesion
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <div class="center">
                    <h1>Bienvenido <?php echo $_SESSION["dbsolicitante"];?></h1>
                    


                </div>

 
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                    <a class="btn btn-primary" href="Disconnet.php">Salir</a>
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
