<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Consultorio</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <script src="sweetalert2.all.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

      <!--datables CSS básico-->
      <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
<!--font awesome con CDN-->  
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">  
      
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Mi consultorio</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->
    <link rel="stylesheet" href="main.css"> 

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Buscar Pacientes" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">
              <?php
                session_start();
                  echo "Dr. " .$_SESSION["apellido"];
              ?>
            </span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>
                <?php
                  echo $_SESSION["nombre"], " " .$_SESSION["apellido"];
                ?>
              </h6>
              <span>
                <?php
                  echo $_SESSION["especialidad"];
                ?>
              </span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="cerrar_Sesion.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Cerrar sesion</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed " href="dashboard.php">
          <i class="bi bi-grid"></i>
          <span>Inicio</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link "  href="pacientes.php">
          <i class="bi bi-menu-button-wide"></i><span>Pacientes</span>
        </a>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-journal-text"></i><span>Agenda</span>
        </a>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed"   href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Pagos</span>
        </a>
      </li><!-- End Charts Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gem"></i><span>Estadisticas</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="icons-bootstrap.html">
              <i class="bi bi-circle"></i><span>Consultas por fecha</span>
            </a>
          </li>
          <li>
            <a href="icons-remix.html">
              <i class="bi bi-circle"></i><span>Ingresos por fecha</span>
            </a>
          </li>
          
        </ul>
      </li><!-- End Icons Nav -->
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    <div class="pagetitle">
    <div class="col-md-4"> 
    <h1>Nuevo Paciente</h1>
    </div>
    <form action="pacientes.php" method="POST">
    <div class="col-sm-5 offset-sm-2 col-md-7 offset-md-11">
    <button type="submit"  value="">Volver</button>
    </div>
    </form>
    </div><!-- End Page Title -->
    <!-- End #main -->
    <section class="section dashboard">
      <div class="row">
        <div class="col-xxl-4 col-xl-12">
          <form action="" method="POST" id="sesion" class="form-inline">
            <div class="form-group mx-sm-3">
              <label for="inputUser" class="col-sm-2 col-form-label">Nombre</label>
              <input type="text" class="form-control" name="nombre" required>
            </div>
            <div class="form-group mx-sm-3">
              <label for="user" class="col-sm-2 col-form-label">Apellido</label>
              <input type="text" class="form-control" name="apellido" required>
            </div>
            <div class="form-group mx-sm-3">
              <label for="user" class="col-sm-2 col-form-label">Telefono</label>
              <input type="text" class="form-control" name="telefono" required>
            </div>
            <div class="form-group mx-sm-3">
              <label for="user" class="col-sm-2 col-form-label">Correo</label>
              <input type="text" class="form-control" name="correo" required>
            <div class="form-group mx-sm-1">
              <label for="user" class="col-sm-2 col-form-label">Edad</label>
              <input type="text" class="form-control" name="edad" required>
            </div>
            <div class="form-group mx-sm-1">
              <label for="user" class="col-sm-2 col-form-label">Sexo</label>
              <input type="text" class="form-control" name="sexo" required>
            </div>
            <div class="form-group mx-sm-1">
              <label for="user" class="col-sm-2 col-form-label">Cedula</label>
              <input type="text" class="form-control" name="cedula" required>
            </div>
            <br>
            <button type="submit" name="nuevo_Paciente">Crear Paciente</button>
          </form>
        </div>
      </div>
      <?php
            require_once 'bdconnect.php';
            if (isset($_REQUEST['nuevo_Paciente'])) {
              $nombre = $_REQUEST ["nombre"];
              $apellido = $_REQUEST ["apellido"];
              $telefono = $_REQUEST ["telefono"];
              $correo = $_REQUEST ["correo"];
              $edad = $_REQUEST ["edad"];
              $sexo = $_REQUEST ["sexo"];
              $cedula = $_REQUEST ["cedula"];

                $db =  new database();
                $query = $db->connect()->prepare("INSERT INTO pacientes (nombre, apellido, telefono, edad, sexo, cedula, correo, id_doctores) VALUES ('$nombre', '$apellido', '$telefono', '$edad', '$sexo', '$cedula', '$correo', '".$_SESSION['id_Doctor']."' )");
                $query->execute();
      ?>
                <script>
                  Swal.fire({
                    title: 'Paciente Agregado Correctamente',
                    text: '',
                    icon: 'success',
                    confirmButtonText: 'OK'
                  })
                </script>
        <?php
            }
        ?>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
   <!-- jQuery, Popper.js, Bootstrap JS -->
   <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="popper/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
      
    <!-- datatables JS -->
    <script type="text/javascript" src="datatables/datatables.min.js"></script>    
     
    <!-- para usar botones en datatables JS -->  
    <script src="datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>  
    <script src="datatables/JSZip-2.5.0/jszip.min.js"></script>    
    <script src="datatables/pdfmake-0.1.36/pdfmake.min.js"></script>    
    <script src="datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
    <script src="main.js"></script>
    
       
     

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>