<!DOCTYPE html>
<html lang="en">

<head>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src = "https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
        function aproved(){
            var id= p_id ;
            $.ajax({
                    url: "",
                    method: "POST",
                    async: false,
                    data: {dbid : id, dbmotivo: comentario  },
                    //dataType: "json", 
                    success: function(respuesta) { 
                        Swal.fire({ 
                                    icon: 'success',
                                    title: 'Caso Aprobado',
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'ACEPTAR',
                                    allowOutsideClick: true 
                                    }).then((resultado) => {
                                        if (resultado.isConfirmed) {
                                            location.reload();
                                        }
                                    })
                    },
                    error: function (respuesta){
                        alert ("error");
                    }
                    });
            }
    </script>
    <title>Sistema De Casos</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

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

                                ?></span></span>
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
                    $id = $_SESSION['bdid'];
                    $db =  new database();
                        $query = $db->connect()->prepare("SELECT u.id, u.usuario, u.nombre, u.apellido, u.correo, u.extension, u.ubicacion, u.id_departamento, u.id_cargo, u.password, u.tipo_usuario, u.estado_usuario, u.cedula FROM usuarios AS u
                            LEFT JOIN departamento AS d ON u.id_departamento =  d.id 
                            LEFT JOIN cargos AS c ON u.id_cargo = c.id
                            WHERE u.id = '$id'");

                        $query -> execute();
                        $usuarios = $query -> fetch(PDO::FETCH_NUM);
                        $nusu = $usuarios[0];
                        $usuario = $usuarios[1];
                        $nombre = $usuarios[2];
                        $apellido = $usuarios[3];
                        $correo = $usuarios[4];
                        $extension = $usuarios[5];
                        $ubicacion = $usuarios[6];
                        $departamento = $usuarios[7];
                        $cargo = $usuarios[8];
                        $password = $usuarios[9];
                        $tipo_usuario = $usuarios[10];
                        $estado_usuario = $usuarios[11];
                        $cedula = $usuarios[12];
                    ?>
                     <form class="" method="POST" action="Mostrar_Usuario.php" >
                        <div class="center" style="height: 800px;" >
                            <h1> Detalles Del Usuario</h1>
                                <input type="text" name="valor1" id="" readonly value="<?php echo $nusu ;?>" style="display: none;" >
                                <div class="name">
                                    <div class="inputview">
                                        <div class="inputbox">
                                            <label>Nombre</label>
                                            <input type="text" name="valor3" id="" value="<?php echo $nombre ;?>" >
                                        </div> 
                                    </div>
                                </div>
                                <div class="email">
                                    <div class="inputview">
                                        <div class="inputbox">
                                            <label>Apellido</label>
                                            <input type="text" name="valor4" id="" value="<?php echo $apellido ;?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="name">
                                    <br>
                                    <div class="inputview">
                                        <div class="inputbox">
                                            <label>Usuario</label>
                                            <input type="text" name="valor2" id="" value="<?php echo $usuario ;?>" >
                                        </div>
                                    </div>
                                </div>
                                <div class="email">
                                    <br>
                                    <div class="inputview">
                                        <div class="inputbox">
                                            <label>Cedula</label>
                                            <input type="text" name="valor12" id="" value="<?php echo $cedula ;?>"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="name">
                                    <br>
                                    <div class="inputview">
                                        <div class="inputbox">
                                            <label>Extension</label>
                                            <input type="text" name="valor6" id="" value="<?php echo $extension ;?>"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="email">
                                    <br>
                                    <div class="inputview">
                                        <div class="inputbox">
                                            <label>Ubicacion</label>
                                            <input type="text" name="valor7" id="" value="<?php echo $ubicacion ;?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="telephone">
                                    <div class="inputview">
                                        <div class="maile">
                                            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                                            <input type="text" name="valor5" id="" value="<?php echo $correo ;?>">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="name">
                                    <br><br><br><br><br>
                                    <div class="caja">
                                        <select name="valor8" required>
                                            <?php 
                                                $db =  new database();
                                                $query = $db->connect()->prepare("SELECT*FROM departamento");
                                                $query -> execute();
                                                $row = $query->fetchAll(); 
                                                foreach ($row as $valores):
                                                    echo '<option value="'.$valores["id"].'" ';
                                                    if($valores["id"] == $departamento)//si la  del usuario es la de la lista actual
                                                        echo 'selected';//indicamos que quede seleccionada
                                                        echo '>'.$valores["departamento"].'</option>'; 
                                                endforeach;
                                            ?>
                                        </select>
                                    </div> 
                                </div>
                                <div class="email">
                                    <br><br><br><br><br>
                                    <div class="caja">
                                        <select name="valor9" required>
                                            <?php 
                                                $db =  new database();
                                                $query = $db->connect()->prepare("SELECT*FROM cargos");
                                                $query -> execute();
                                                $row = $query->fetchAll(); 
                                                foreach ($row as $valores):
                                                    echo '<option value="'.$valores["id"].'" ';
                                                    if($valores["id"] == $cargo)//si la  del usuario es la de la lista actual
                                                        echo 'selected';//indicamos que quede seleccionada
                                                        echo '>'.$valores["cargo"].'</option>'; 
                                                endforeach;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                   
                                <div class="name">
                                    <div class="caja">
                                        <select name="valor10" required>
                                            <?php 
                                                $db =  new database();
                                                $query = $db->connect()->prepare("SELECT*FROM estado_de_usuario");
                                                $query -> execute();
                                                $row = $query->fetchAll(); 
                                                foreach ($row as $valores):
                                                    echo '<option value="'.$valores["id"].'" ';
                                                    if($valores["id"] == $estado_usuario)//si la  del usuario es la de la lista actual
                                                        echo 'selected';//indicamos que quede seleccionada
                                                        echo '>'.$valores["estado"].'</option>'; 
                                                endforeach;
                                            ?>
                                        </select> 
                                    </div>
                                </div>

                                <div class="email">    
                                    <div class="caja">
                                        <select name="valor11" required>
                                            <?php 
                                                $db =  new database();
                                                $query = $db->connect()->prepare("SELECT*FROM tipo_de_usuario");
                                                $query -> execute();
                                                $row = $query->fetchAll(); 
                                                foreach ($row as $valores):
                                                    echo '<option value="'.$valores["id"].'" ';
                                                    if($valores["id"] == $tipo_usuario)//si la  del usuario es la de la lista actual
                                                        echo 'selected';//indicamos que quede seleccionada
                                                        echo '>'.$valores["tipo"].'</option>'; 
                                                endforeach;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="email"> 
                                    <div class="inputbox">
                                        <input type="submit" name="actualizar" value="Guardar">.
                                    </div>  
                                </div><br><br>
                                <div class="name">
                                    <div class="inputbox">
                                        <input type="submit" name="actualizar" value="Guardar">.
                                    </div>  
                                </div>
                        </div>
                    </form>

                    <?php

                        if (isset($_REQUEST['actualizar'])) {
                            $nusu = $_POST['valor1'];
                            $usuario = $_POST['valor2'];
                            $nombre = $_POST['valor3'];
                            $apellido = $_POST['valor4'];
                            $correo = $_POST['valor5'];
                            $extension = $_POST['valor6'];
                            $ubicacion = $_POST['valor7'];
                            $departamento = $_POST['valor8'];
                            $cargo = $_POST['valor9'];
                            $estado_usuario = $_POST['valor10'];
                            $tipo_usuario = $_POST['valor11'];
                            $cedula = $_POST['valor12'];
                                    $db =  new database();
                                    $query = $db->connect()->prepare("UPDATE usuarios SET usuario = '$usuario', nombre = '$nombre', apellido = '$apellido', correo = '$correo', extension = '$extension', ubicacion = '$ubicacion', id_departamento = '$departamento', id_cargo = '$cargo', estado_usuario = '$estado_usuario', tipo_usuario = '$tipo_usuario', cedula = '$cedula' WHERE id = '$nusu' ");
                                    $query  -> execute();
                    ?>
                    <script> 
                    Swal.fire({ 
                                icon: 'success',
                                title: 'Usuario Actualizado',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'ACEPTAR',
                                allowOutsideClick: true 
                                }).then((resultado) => {
                                    if (resultado.isConfirmed) {
                                        window.location.href= 'List_usuarios.php';
                                        }
                            })
                    </script>
                    <?php
                            }
                    ?>

                