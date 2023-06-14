
<html>
<head>
    <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="popper/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="datatables/datatables.min.js"></script>  
    <script src="datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>  
    <script src="datatables/JSZip-2.5.0/jszip.min.js"></script>    
    <script src="datatables/pdfmake-0.1.36/pdfmake.min.js"></script>    
    <script src="datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="datatable_imprimir.js"></script>
    <script src="datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="datatable.js"></script>
    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="datatable.css">
    <script src="https://kit.fontawesome.com/29b9193ecf.js" crossorigin="anonymous"></script> 
    <link rel="stylesheet" type="text/css" href="DataTables/DataTables-1.12.1/css/dataTables.bootstrap4.min">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Sistema De Casos</title>
    <script> 
        function vercaso(p_id){ 
            var id = p_id
                $.ajax({
                                    url: "idsession.php",
                                    method: "POST",
                                    async: false,
                                    data: {bdid : id },
                           //       dataType: "json", 
                                    success: function(respuesta) {
                                     

                                    window.location.href = "MostrarCaso.php";
                                    }  
                        })
        }
    </script>
<?php 
    require_once 'bdconnect.php';
    session_start();
        $db =  new database();
            $query = $db->connect()->prepare("SELECT*FROM usuarios WHERE usuario = :usuario AND password = :password ");
            $query->execute(["usuario" => $_SESSION["usuario"], "password" => $_SESSION["password"]]);
            $row = $query->fetch(PDO::FETCH_NUM);
            $cargo = $row[8];
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

    <?php 
        require_once 'bdconnect.php'; //mostramos los casos del usuario en una tabla
        $id = $_SESSION["id_usuario"];
        $db =  new database();
                $query = $db->connect()->prepare("SELECT c.id, c.titulo, cc.categoria, d.departamento, c.fecha_ingreso, c.fecha_actualizacion, c.descripcion_caso, p.prioridad, e.estado, c.analista FROM casos AS c 
                            INNER JOIN categoria AS cc ON c.id_categoria = cc.id
                            INNER JOIN departamento AS d ON c.id_departamento = d.id
                            INNER JOIN prioridad AS p ON c.id_prioridad = p.id 
                            INNER JOIN estado_caso AS e ON c.id_estado_caso = e.id
                                    WHERE id_usuarios = '$id' 
                                            ORDER BY c.fecha_actualizacion DESC ");
                $query -> execute();
                $casos = $query -> fetchAll();
    ?>
            <div class ="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <h1 class="mt-3"> Lista de casos reportados</h1><br><br>
                                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                            <th>N°Caso</th>
                                            <th>Titulo</th>
                                            <th>Categoria</th>
                                            <th>Departamento</th>
                                            <th>Fecha Creación</th>
                                            <th>Prioridad</th>
                                            <th>Estado</th>
                                            <th>Analista Asignado</th>
                                            <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    if ($casos && $query->rowCount()> 0)
                                                        {
                                                            foreach ($casos as $fila)
                                                                {
                                                ?>
                                                                    <tr>
                                                                        <td><?php echo ($fila["id"]);?>
                                                                        </td>
                                                                        <td><?php echo ($fila["titulo"]);?>
                                                                        </td>
                                                                        <td><?php echo ($fila["categoria"]);?>
                                                                        </td> 
                                                                        <td><?php echo ($fila["departamento"]);?>
                                                                        </td>
                                                                        <td><?php echo ($fila["fecha_ingreso"]);?>
                                                                        </td>   
                                                                        <td><?php echo ($fila["prioridad"]);?>
                                                                        </td>   
                                                                        <td><?php echo ($fila["estado"]);?>
                                                                        </td>  
                                                                        <td><?php echo ($fila["analista"]);?>
                                                                        </td>
                                                                        <td><input type="button" name="" value="Ver Caso" style="  width: 100%; background: dodgerblue; color: #fff; border: #fff; border-radius: 8px; " onclick="vercaso(<?php echo $fila['id']; ?>)">
                                                                        </td>
                                   
                            
                                                                    </tr>
                                                <?php
                                                                }
                                                        }
                                                ?>
                    
                                            </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>



    <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
