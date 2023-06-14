<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
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
    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="datatable.css">
    <link rel="stylesheet" type="text/css" href="datetime.css">
    <script src="https://kit.fontawesome.com/29b9193ecf.js" crossorigin="anonymous"></script> 
    <link rel="stylesheet" type="text/css" href="DataTables/DataTables-1.12.1/css/dataTables.bootstrap4.min">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
  <!-- searchPanes -->
    <link rel="stylesheet" href="https://cdn.datatables.net/searchpanes/1.0.1/css/searchPanes.dataTables.min.css">
    <!-- select -->
    <link href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">

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
    <title>Sistema De Casos</title>

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
                    ORDER BY c.fecha_actualizacion");

                 $query -> execute();
                $casosa = $query -> fetchAll();
?>

        <div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">  
                        <h1>Buscar Casos</h1>  <br><br> 

                        <table border="0" cellspacing="5" cellpadding="5">
      <tbody><tr>
            <div class="input" >
            <td><label >Desde:</label></td>
            <td><input type="text" id="min" name="min" style="border-color: dodgerblue; color: #6e707e; background-color: #fff; background-clip: padding-box; border-radius: 3px; border: 1px solid #d1d3e2; position: relative; top: 10px;"></td>
            </div>
        </tr>
        <tr>
            <td><label>Hasta:</label></td>
            <td><input type="text" id="max" name="max" style="border-color: dodgerblue; color: #6e707e; background-color: #fff; background-clip: padding-box; border-radius: 3px;border: 1px solid #d1d3e2; position: relative; top: 10px;"></td>
        </tr>
    </tbody>
</table>
     <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                <th>N°Caso</th>
                <th>Titulo</th>
                <th>Solicitante</th>
                <th>Categoria</th>
                <th>Fecha Creación</th>
                <th>Analista</th>
                <th>Prioridad</th>
                <th>Estado</th>
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
                            <td><?php echo ($fila["categoria"]);?>
                            </td>
                            <td><?php echo ($fila["fecha_ingreso"]);?>
                            </td>     
                            <td><?php echo ($fila["analista"]);?>
                            </td>  
                            <td><?php echo ($fila["prioridad"]);?>
                            </td>
                            <td><?php echo ($fila["estado"]);?>
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

 <script src=https://code.highcharts.com/highcharts.js></script>
 <script src="http://code.highcharts.com/modules/exporting.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
<script type="text/javascript" src="dataTables.dateTime.min.js"></script>
<!-- searchPanes   -->
    <script src="https://cdn.datatables.net/searchpanes/1.0.1/js/dataTables.searchPanes.min.js"></script>
    <!-- select -->
    <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>


<script type="text/javascript">
      $(document).ready(function(){

          $('#example').DataTable({        
        language: {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
                 },
                 "sProcessing":"Procesando...",
            },
        //para usar los botones   
        responsive: "true",
        dom: 'Bfrtilp',      
        buttons:[ 
            {
                extend:    'excelHtml5',
                text:      '<i class="fas fa-file-excel"></i> ',
                titleAttr: 'Exportar a Excel',
                className: 'btn btn-success'
            },
            {
                extend:    'pdfHtml5',
                text:      '<i class="fas fa-file-pdf"></i> ',
                titleAttr: 'Exportar a PDF',
                className: 'btn btn-danger'
            },
            {
                extend:    'print',
                text:      '<i class="fa fa-print"></i> ',
                titleAttr: 'Imprimir',
                className: 'btn btn-info'
            },
        ]           
    }); 

var minDate, maxDate;
// Custom filtering function which will search data in column four between two values
$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var min = minDate.val();
        var max = maxDate.val();
        var date = new Date( data[4] );
 
        if (
            ( min === null && max === null ) ||
            ( min === null && date <= max ) ||
            ( min <= date   && max === null ) ||
            ( min <= date   && date <= max )
        ) {
            return true;
        }
        return false;
    }
);



  

    //Creamos una fila en el head de la tabla y lo clonamos para cada columna
    $('#example thead tr').clone(true).appendTo( '#example thead' );

    $('#example thead tr:eq(1) th').each( function (i) {
        var title = $(this).text(); //es el nombre de la columna
        $(this).html( '<input type="text" style ="border-color: dodgerblue; color: #6e707e; background-color: #fff; background-clip: padding-box; border-radius: 3px; border: 1px solid #d1d3e2;"  placeholder="Buscar '+title+'" />' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );   


    // Create date inputs
    minDate = new DateTime($('#min'), {
        format: 'YYYY MMMM Do'
    });
    maxDate = new DateTime($('#max'), {
        format: 'YYYY MMMM Do'
    });
 
    // DataTables initialisation
    var table = $('#example').DataTable();

 
    // Refilter the table
    $('#min, #max').on('change', function () {
        table.draw();
    });







});

</script>


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


</body>
</html>
