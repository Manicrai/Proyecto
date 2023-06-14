
<!DOCTYPE html>
<html lang="en">

<head>
   <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="popper/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="datatables/datatables.min.js"></script>  
    <script src="datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>  
    <script src="datatables/JSZip-2.5.0/jszip.min.js"></script>    
    <script src="datatables/pdfmake-0.1.36/pdfmake.min.js"></script>    
    <script src="datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="datatable_imprimir.js"></script>
    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="datatable.css">
    <script src="https://kit.fontawesome.com/29b9193ecf.js" crossorigin="anonymous"></script> 
    <link rel="stylesheet" type="text/css" href="DataTables/DataTables-1.12.1/css/dataTables.bootstrap4.min">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Sistema De Casos</title>

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

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
    
   
   <script> 
        function vercaso(p_id){       
            var id = p_id
                $.ajax({
                            url: "idsession.php",
                            method: "POST",
                            async: false,
                            data: {bdid : id },
                           //dataType: "json", 
                            success: function(respuesta) {                                
                                window.location.href = "Mostrar_Caso.php";
                                }  
                    })
            }


            async function documentarestade(p_id, p_analista){
            const { value: text } = await Swal.fire({
                                                    input: 'text',
                                                    icon : 'warning',
                                                    inputLabel: 'Documentar el cambio',
                                                    inputPlaceholder: 'Escribe tu mensaje aca',
                                                    inputAttributes: {
                                                    'aria-label': 'Type your message here'
                                                    },
                                                    showCancelButton: true
                                                    })

                                                    if (text) {
                                                        var comentario = (text);
                                                        var id= p_id ;
                                                            $.ajax({
                                                                    url: "funcion_documentar.php",
                                                                    method: "POST",
                                                                    async: false,
                                                                    data: {dbid : id, dbco: comentario  },
                                                                    //dataType: "json", 
                                                                    success: function(respuesta) {
                                                                          estado = document.getElementById("estado"+id).value;
                                                                        var analista = p_analista;
                                                                            $.ajax({
                                                                                    url: "funcion_estadodb.php",
                                                                                    method: "POST",
                                                                                    async: false,
                                                                                    data: {bdid : id, newestado : estado, newanalista: analista },
                                                                                    //dataType: "json", 
                                                                                        success: function(respuesta) {
                                                                                            window.location.reload();                                    
                                                                                        }  
                                                                                    })     
                                                                    }
                                                                    });
                                                    }
                                    };
            async function documentarcatego(p_id, p_analista){
            const { value: text } = await Swal.fire({
                                                    input: 'text',
                                                    icon : 'warning',
                                                    inputLabel: 'Documentar el cambio',
                                                    inputPlaceholder: 'Escribe tu mensaje aca',
                                                    inputAttributes: {
                                                    'aria-label': 'Type your message here'
                                                    },
                                                    showCancelButton: true
                                                    })

                                                    if (text) {
                                                        var comentario = (text);
                                                        var id= p_id ;
                                                            $.ajax({
                                                                    url: "funcion_documentar.php",
                                                                    method: "POST",
                                                                    async: false,
                                                                    data: {dbid : id, dbco: comentario  },
                                                                    //dataType: "json", 
                                                                    success: function(respuesta) {
                                                                        
                                                                        categoria = document.getElementById("categoria"+id).value;
                                                                        var analista = p_analista;
                                                                            $.ajax({
                                                                                    url: "funcion_categoria.php",
                                                                                    method: "POST",
                                                                                    async: false,
                                                                                    data: {bdid : id, newcategoria : categoria, newanalista: analista },
                                                                                    //dataType: "json", 
                                                                                        success: function(respuesta) {
                                                                                            window.location.reload();                                    
                                                                                        }  
                                                                                    })     
                                                                    }
                                                                    });
                                                    }
                                    };

    </script>

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


            <?php

                require_once 'bdconnect.php';
                    $db =  new database();
                        $query = $db->connect()->prepare("SELECT c.id, c.titulo, c.solicitante, cc.categoria,  c.fecha_ingreso, c.fecha_actualizacion, c.analista, p.prioridad, e.estado 
                                FROM casos AS c
                                INNER JOIN categoria AS cc ON c.id_categoria =  cc.id
                                INNER JOIN prioridad AS p ON c.id_prioridad = p.id
                                INNER JOIN estado_caso AS e ON c.id_estado_caso = e.id 
                                WHERE e.id = 2 OR e.id = 3 OR e.id = 4
                                ORDER BY e.estado");

                        $query -> execute();
                        $casosa = $query -> fetchAll();
            ?>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">  
                                <h1>Casos Abiertos</h1>  <br><br>    
                                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>N°Caso</th>
                                            <th>Titulo</th>
                                            <th>Solicitante</th>
                                            <th>Categoria</th>
                                            <th>Fecha Creación</th>
                                            <th>Fecha Actualización</th>
                                            <th>Analista</th>
                                            <th>Prioridad</th>
                                            <th>Estado</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                <tbody>

                             <?php
                                if ($casosa && $query->rowCount()> 0)
                                    {
                                    foreach ($casosa as $fila)
                                        {
                            ?>
                                        <tr>
                                            <td><?php echo ($fila["id"]);?>
                                            </td>
                                            <td><?php echo ($fila["titulo"]);?>
                                            </td>
                                            <td><?php echo ($fila["solicitante"]);?>
                                            </td> 
                                            <td><div class="tab" >
                                                <select name="valor9" <?php echo 'id="categoria'.$fila["id"].'"';?> onchange="documentarcatego(<?php echo $fila['id']?>, '<?php echo $dbsolicitante; ?>');">
                                                    <?php 
                                                        $db =  new database();
                                                            $quer = $db->connect()->prepare("SELECT*FROM categoria");
                                                            $quer -> execute();
                                                            $row = $quer->fetchAll(); 
                                                                foreach ($row as $valores):
                                                                    echo '<option value="'.$valores["id"].'" ';
                                                                        if($valores["categoria"] == $fila["categoria"])//si la  del caso es la de la lista actual
                                                                            echo 'selected';//indicamos que quede seleccionada
                                                                            echo '>'.$valores["categoria"].'</option>'; 
                                                                endforeach;
                                                    ?>
                                                </select>
                                                </div>
                                            </td>
                                            <td><?php echo ($fila["fecha_ingreso"]);?>
                                            </td>   
                                            <td><?php echo ($fila["fecha_actualizacion"]);?>
                                            </td>   
                                            <td><?php echo ($fila["analista"]);?>
                                            </td>  
                                            <td><?php echo ($fila["prioridad"]);?>
                                            </td>
                                            <td><div class="tab" >
                                                <select name="valor9" <?php echo 'id="estado'.$fila["id"].'"';?> onchange="documentarestade(<?php echo $fila['id']?>, '<?php echo $dbsolicitante; ?>');">
                                                    <?php 
                                                        $db =  new database();
                                                            $quer = $db->connect()->prepare("SELECT*FROM estado_caso");
                                                            $quer -> execute();
                                                            $row = $quer->fetchAll(); 
                                                                foreach ($row as $valores):
                                                                    echo '<option value="'.$valores["id"].'" ';
                                                                        if($valores["estado"] == $fila["estado"])//si la  del caso es la de la lista actual
                                                                            echo 'selected';//indicamos que quede seleccionada
                                                                            echo '>'.$valores["estado"].'</option>'; 
                                                                endforeach;
                                                    ?>
                                                </select>
                                                </div>
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

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>