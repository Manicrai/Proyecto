<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
        require_once 'bdconnect.php';
        session_start();
        $db =  new database();
            $query = $db->connect()->prepare("SELECT*FROM usuarios WHERE usuario = :usuario AND password = :password ");
            $query->execute(["usuario" => $_SESSION["usuario"], "password" => $_SESSION["password"]]);
            $row = $query->fetch(PDO::FETCH_NUM);
            $tipo_usuario = $row[11];
                if($row == false ){
                    session_destroy();?>
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
    <script type="text/javascript">
        function new_coment(){    
            var comentario = document.getElementById('comentario').value ;
                $.ajax({
                        url: "funcion_comentario.php",
                        method: "POST",
                        async: false,
                        data: {dbco : comentario },
                        //dataType: "json", 
                        success: function(respuesta) {   
                            location.reload();     
                            },
                        error: function (respuesta){
                            alert ("error");
                            }
                        });
            };
    </script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src = "https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistema De Casos</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

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

            <li class="nav-item">
                <a class="nav-link" href="CrearCasoAdmin.php">
                    <i class="fas fa-columns"></i>
                    <span>Registrar Un Caso</span></a>
            </li>

            <?php
            if ($tipo_usuario == 3) {
               
            ?>

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


                <?php 
                    require_once 'bdconnect.php'; 
                    $seach = $_POST['search'];
                        $db =  new database();
                            $query = $db->connect()->prepare("SELECT c.id, c.titulo, c.solicitante, c.extension, cc.categoria, d.departamento, c.fecha_ingreso, c.fecha_ingreso, c.fecha_actualizacion, c.descripcion_caso, c.analista, p.prioridad, e.estado, c.aprobacion, c.comentario_aprobacion  FROM casos AS c 
                                INNER JOIN categoria AS cc ON c.id_categoria = cc.id
                                INNER JOIN departamento AS d ON c.id_departamento = d.id
                                INNER JOIN prioridad AS p ON c.id_prioridad = p.id 
                                INNER JOIN estado_caso AS e ON c.id_estado_caso = e.id
                                    WHERE c.id = '$seach'");
                            $query -> execute(); 
                            $caso = $query -> fetch(PDO::FETCH_NUM); 
                            $ncaso = $caso[0];
                            $nsolicitante = $caso[2];
                            $ndepartamento = $caso[5];
                            $nextension = $caso[3];
                            $ncategoria = $caso[4];
                            $nprioridad = $caso[11];
                            $nestado = $caso[12];
                            $nanalista = $caso[10];
                            $naprobacion = $caso [13];
                            $nmotivo = $caso[14];
                            $nfechaingreso = $caso[6];
                            $nfechaactualizacion = $caso[7];
                            $ntitulo = $caso[1];
                            $ndescripcion = $caso[9];
                            if (empty($caso)) {
                ?> 
                <script type="text/javascript">
                    Swal.fire({ 
                                icon: 'error',
                                title: 'Caso No encontrado',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'ACEPTAR',
                                allowOutsideClick: true 
                                }).then((resultado) => {
                                if (resultado.isConfirmed) {
                                    window.location.href= 'PaginaAdministrador.php';
                                    }
                                })
                </script>
                <?php
                            }
                ?>
                    
                <div class="center" style="margin: 0px -10%; height: 850px; position: absolute;">
                    <form class="" >
                        <h1> Detalles Del Caso</h1>
                            <div class="name">
                                <div class="inputbox">
                                    <label> Numero Del Caso </label>
                                        <input type="text" name="" id="" placeholder="<?php echo $ncaso ;?>" readonly="readonly" style="border: 0;">
                                </div>
                            </div>
                            <div class="email">
                                <div class="inputbox">
                                    <label>Solicitante</label>
                                         <input type="text" name="" id="" placeholder="<?php echo $nsolicitante ;?>" readonly="readonly"
                                         style="border: 0;">
                                </div>       
                            </div>
                            <div class="name">
                                <br>
                                <div class="inputbox">
                                    <label>Departamento</label>
                                        <input type="text" name="" id="" placeholder="<?php echo $ndepartamento ;?>" readonly="readonly"
                                        style="border: 0;">
                                </div>
                            </div>
                            <div class="email">
                                <br>
                                <div class="inputbox">
                                    <label>Extension</label>
                                        <input type="text" name="" id="" placeholder="<?php echo $nextension ;?>" readonly="readonly"
                                        style="border: 0;">
                                </div>
                            </div>
                            <div class="name">
                                <br>
                                <div class="inputbox">
                                    <label>Categoria</label>
                                        <input type="text" name="" id="" placeholder="<?php echo $ncategoria ;?>" readonly="readonly" style="border: 0;">
                                </div>
                            </div>
                            <div class="email">
                                <br>
                                <div class="inputbox">
                                    <label>Priodidad</label>
                                        <input type="text" name="" id="" placeholder="<?php echo $nprioridad ;?>" readonly="readonly" style="border: 0;">
                                </div>
                            </div>
                                <div class="name">
                                    <br>
                                    <div class="inputbox">
                                        <label>Estado</label>
                                        <input type="text" name="" id="" placeholder="<?php echo $nestado ;?>" readonly="readonly" style="border: 0;">
                                    </div>
                                </div>
                                <div class="email">
                                    <br>
                                    <div class="inputbox">
                                        <label for= "name">Analista</label>
                                        <input type="text" name="" id="" placeholder="<?php echo $nanalista ;?>" readonly="readonly" style="border: 0;">
                                    </div>
                                </div>

                                <?php
                                    if ($ncategoria == "Permisología") {   
                                ?>
                                        <div class="name">
                                            <br>
                                                <div class="inputbox">
                                                    <label>Aprobación</label>
                                                    <input type="text" name="" id="" placeholder="<?php echo $naprobacion ;?>" readonly="readonly" style="border: 0;">
                                                </div>
                                        </div>
                                        <div class="email">
                                            <br>
                                            <div class="inputbox">
                                                <label for= "name">Motivo</label>
                                                <textarea type="text" name="" id="" placeholder="<?php echo $nmotivo ;?>" readonly="readonly" style="max-height: 80px; height: auto; border: 0;" ></textarea>
                                            </div>
                                        </div>
                                <?php
                                        } 
                                ?>
                                <div class="name">
                                    <br>
                                    <div class="inputbox">
                                        <label>Fecha Ingreso</label>
                                        <input type="text" name="" id="" placeholder="<?php echo $nfechaingreso ;?>" readonly="readonly" style="border: 0;">
                                    </div>
                                </div>
                                <div class="email">
                                    <br>
                                    <div class="inputbox">
                                        <label for= "name">Fecha Actualizacion</label>
                                        <input type="text" name="" id="" placeholder="<?php echo $nfechaactualizacion ;?>" readonly="readonly" style="border: 0;">
                                    </div>
                                </div>
                                <div class="name" >
                                    <br>
                                    <div class="inputbox">
                                        <label>Requerimiento/incidente</label>
                                        <input type="text" name="" placeholder="<?php echo $ntitulo;?>" value="" style="border: 0;">
                                    </div>
                                </div>
                                <div class="email">                                                
                                    <div class="inputbox">
                                        <textarea name="message" rows="5" required="" readonly="readonly" style="border: 0;"><?php echo $ndescripcion ;?></textarea>
                                    </div>
                                </div>
                    </form>
                </div>
                <div class="chat">
                    <h1> Comentarios </h1>
                    <br>
                    <div class="inputbox">
                        <textarea id="comentario" name="comentario" placeholder="Escribe un comentario"></textarea>
                    </div>
                <div class="inputbox" style="left: 23%">
                    <input type="button" name="" onclick="new_coment()" value="Enviar">
                    <br><br>
                </div>
                <?php 
                
                    $db =  new database();
                        $query = $db->connect()->prepare ("SELECT nombre, comentario, fecha FROM comentarios WHERE id_casos = '$seach' ORDER BY fecha DESC");
                        $query -> execute();
                        $comentarios = $query -> fetchAll();
                        if ($comentarios && $query->rowCount()> 0)
                            {
                            foreach ($comentarios as $fila)
                                {
                ?>
                <div class="input"> <?php echo ($fila["nombre"]);?>: <?php echo ($fila["comentario"]);?> <br><br> <?php echo ($fila["fecha"]);?></div>             
                <?php 
                                }
                            }
                ?>
                <br><br>  
                </div>


<!-- Scroll to Top Button-->
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









