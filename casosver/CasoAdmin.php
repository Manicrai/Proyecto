<!DOCTYPE html>
<html lang="en">

<head>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src = "https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Archivo de casos</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <title>Sistema De Casos</title>
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src = "https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
   
        function showContent() {
            element = document.getElementById("abd");
            check = document.getElementById("check").value;
            if (check == "5") {
                element.style.display='block';
                }
            else {
                element.style.display='none';
                }
            }
    </script>
    <?php 
        require_once 'bdconnect.php';
        session_start();
            $db =  new database();
                $query = $db->connect()->prepare("SELECT*FROM usuarios WHERE usuario = :usuario AND password = :password ");
                $query->execute(["usuario" => $_SESSION["usuario"], "password" => $_SESSION["password"]]);
                $row = $query->fetch(PDO::FETCH_NUM);
                $tipo_usuario = $row[11];
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
</head>

<body id="page-top">

   <!-- Page Wrapper -->
        <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="PaginaAdministrador.php">
                <div>
                    <i class=""> <image src="logo.png"with="50" height="50"></i>
                </div>
                <div class="sidebar-brand-text mx-3">CMM</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="PaginaAdministrador.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Inicio</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Casos
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="BuscarCasos.php" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Buscar Casos</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">      
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="CasosAbiertos.php" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Casos Abiertos</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">   
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="CasosNoAsignados.php" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Casos no asignados</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages">
                    <div class="bg-white py-2 collapse-inner rounded">
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="CasosCerrados.php"  aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Casos Cerrados</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages">
                    <div class="bg-white py-2 collapse-inner rounded">
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="estadisticas.php"  aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Estadisticas</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages">
                    <div class="bg-white py-2 collapse-inner rounded">
                    </div>
                </div>
            </li>
        <?php
            if ($tipo_usuario == 3) {
               
         ?>
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="RegistroCambios.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Registro De Cambios</span></a>
            </li>
        <?php
            }

        ?>
            
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
                <li class="nav-item">
                <a class="nav-link" href="List_usuarios.php">
                   <i class="fas fa-address-card"></i>
                    <span>Listado de usuarios</span></a>
                </li>
        <?php
            if ($tipo_usuario == 2) {
                
        ?>
            <li class="nav-item">
                <a class="nav-link" href="CrearCasoAdmin.php">
                    <i class="fas fa-columns"></i>
                    <span>Registrar Un Caso</span></a>
            </li>
        <?php 
            }
        ?>
            <?php
            if ($tipo_usuario == 3) {
               
            ?>

            <li class="nav-item">
                <a class="nav-link" href="CasoAdmin.php">
                    <i class="fas fa-columns"></i>
                    <span>Registrar Un Caso</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="CrearAdmin.php">
                    <i class="fas fa-clipboard"></i>
                    <span>Registrar Admin</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="CrearAnalista.php">
                    <i class="fas fa-clipboard"></i>
                    <span>Registrar Analista</span></a>
            </li>

            <?php
                 }

            ?>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
         <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form action="search.php" method="POST" 
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar por numero de caso" name="search" 
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Buscar por numero de caso" aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

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
                                                $_SESSION['bdsolicitante'] = $dbsolicitante;
                                                echo "$dbsolicitante";

                                    ?>
                                </span></span>
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

                <form action="CasoAdmin.php" method="POST">
                    <div class = "center">
                        <h1> Nuevo Caso</h1>
                        <div class="inputbox">
                            <div class="inputview">
                                <input type="text" name="titulo_c" placeholder="Requerimiento" required="">
                            </div>
                        </div>
                        <div class="inputbox">
                            <div class="inputview">
                                <input type="text" name="solicitante_c" placeholder="Solicitante" required="">
                            </div>
                        </div>

                        <div class="inputbox">
                            <div class="inputview">
                                <textarea name="descripcion_c" rows="5" required="" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;" placeholder="Descripción Del Caso"></textarea>
                            </div>
                        </div>
                        <br><br><br>
                        <div class="caja">
                            <select name="departamento">
                                 <option hidden selected>Departamento</option>
                                    <?php 
                                        $db =  new database();
                                        $query = $db->connect()->prepare("SELECT*FROM departamento");
                                        $query -> execute();
                                        $prioridad = $query->fetchAll(); 
                                        foreach ($prioridad as $valores):
                                            echo '<option value="'.$valores["id"].'">'.$valores["departamento"].'</option>';
                                        endforeach;
                                    ?>
                            </select>
                        </div>

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
                        <div class="maile" id="abd" style="display: none;" >
                            <div class="inputview"> 
                                <input type="email" name="correo_sub" placeholder="Correo del SubGerente del área">
                            </div>
                        </div>
                        <div class="inputbox">
                            <input type="submit" name="caso_n" value="Crear Caso"  >
                        </div>    
                    </div>
                </form>

                <?php
                    require_once 'bdconnect.php';
                    if (isset($_REQUEST['caso_n'])) {
                        $_SESSION["titulo_c"] = $_REQUEST ["titulo_c"];
                        $titulo_c = $_SESSION ["titulo_c"];
                        $_SESSION["descripcion_c"] = $_REQUEST ["descripcion_c"];
                        $descripcion_c = $_SESSION ["descripcion_c"];
                        $solicitante = $_REQUEST['solicitante_c'];
                        $prioridad = $_REQUEST["prioridad"];
                        $categoria = $_REQUEST["categoria"];
                        $departamento = $_REQUEST['departamento'];
                        if ($categoria == "5") { //en este caso es enviado un correo al subgerente del area
                            $_SESSION["correo_sub"] = $_REQUEST["correo_sub"];
                            $correo_sub = $_SESSION["correo_sub"];
                            $db =  new database();
                            $queri = $db->connect()->prepare("INSERT INTO casos (titulo, solicitante, id_categoria, id_departamento, correo_sub, descripcion_caso, id_prioridad, id_estado_caso, id_usuarios, aprobacion )
                                VALUES ('$titulo_c', '$solicitante', '$categoria', '$departamento', '$correo_sub', '$descripcion_c', '$prioridad', '1', '$bdid_usuarios', 'Por Aprobar') ");
                            $queri -> execute(); //guardamos todo en  la bd casos

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
                            $queri = $db->connect()->prepare("INSERT INTO casos (titulo, solicitante, id_categoria, id_departamento, correo_sub, descripcion_caso, id_prioridad, id_estado_caso, id_usuarios )
                                VALUES ('$titulo_c', '$solicitante', '$categoria', '$departamento', 'No aplica', '$descripcion_c', '$prioridad', '1', '$bdid_usuarios') ");
                            $queri -> execute(); //guardamos todo en  la bd casos
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
                    
                              
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
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
