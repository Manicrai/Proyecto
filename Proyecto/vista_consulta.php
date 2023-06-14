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
  <a href="dashboard.php" class="logo d-flex align-items-center">
    <img src="assets/img/logo.png" alt="">
    <span class="d-none d-lg-block">Mi consultorio</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->
<link rel="stylesheet" href="main.css"> 



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
    <a class="nav-link collapsed" href="agenda.php">
      <i class="bi bi-journal-text"></i><span>Agenda</span>
    </a>
  </li><!-- End Forms Nav -->

  
      
    </ul>
  </li><!-- End Icons Nav -->
</ul>

</aside><!-- End Sidebar-->

  <main id="main" class="main">
    <div class="pagetitle">
      <div class="col-md-4">
        <h1>Consulta Historica</h1> 
      </div>
      <?php
        require_once 'bdconnect.php';
        $idpaciente = $_SESSION['idpac'] ;
        $db =  new database();
        $idpaciente = $_SESSION['idpac'] ;
        $query = $db->connect()->prepare("SELECT CONCAT (nombre,' ', apellido) AS nombre, edad FROM pacientes WHERE id = '$idpaciente'");
        $query -> execute();
        $row = $query->fetch(PDO::FETCH_NUM);
        $nombre = $row[0];
        $edad = $row[1];
        
      ?>

        <form action="historial-consulta.php" method="POST">
            <div class="container">
                <div class="card info-card customers-card">
                    <div class="row align-items-start">      
                        <div class="col">
                            <label class="card-title"> Datos del Paciente</label>
                        </div>
                        <div class="col-6">
                            <div class="offset-sm-0 col-md-5 offset-md-7">
                                <button type="submit"  value="">Atras</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <label class="col-sm-4 col-form-label">Nombre:</label>
                            <input type="text" value="<?php echo $nombre ; ?>" readonly class="form-control disable">
                        </div>
                        <div class="col-sm">
                            <label class="col-sm-4 col-form-label">Edad</label>
                            <input type="text" class="form-control" value="<?php echo $edad ; ?>" readonly>
                        </div>
                        <?php
                            require_once 'bdconnect.php';
                              $db =  new database();
                                $idconsulta = $_SESSION['idconsulta'] ;
                                $query = $db->connect()->prepare("SELECT Altura, peso, imc, temp, fr, pa, fc, motivo_consulta, exploracion_fisica, diagnostico, sintomas_subjetivos, valor_consulta, fecha, estudio_examen FROM consulta_medica WHERE id = '$idconsulta' AND id_paciente = '$idpaciente' ");
                                $query -> execute();
                                $row = $query->fetch(PDO::FETCH_NUM);
                                $altura = $row[0];
                                $peso =$row[1];
                                $imc = $row[2];
                                $temp = $row[3];
                                $fr = $row[4];
                                $pa = $row[5];
                                $fc = $row[6];
                                $motivo_consulta = $row[7];
                                $exploracion_fisica = $row[8];
                                $diagnostico = $row[9];
                                $sintomas_subjetivos = $row[10];
                                $valor_consulta = $row[11];
                                $fecha = $row[12];
                                $estudio_examen = $row[13];
        
                        ?>
                        <div class="col-sm">
                            <label class="col-sm-4 col-form-label">Fecha</label>
                            <input type="text" class="form-control" name="fecha" value="<?php echo $fecha;?>" readonly>
                        </div>
                        <div class="col-sm">
                            <label class="col-sm-7 col-form-label">Valor Consulta</label>
                            <input type="text" name="valor_consulta" value="<?php echo $valor_consulta;?>" class="form-control" readonly>
                        </div>
                    </div>
                    <br>
                    <br>
                </div> 
                <div class="card info-card customers-card">
                    <br>
                    <ul class="nav nav-tabs">
                        <li class="nav-item active"><a class="nav-link"  href="#medica" data-toggle="tab">Consulta Medica </a></li>
                        <li class="nav-item"><a class="nav-link" href="#recetas" data-toggle="tab">Recetas</a></li>
                        <li class="nav-item"><a class="nav-link" href="#historial_medico" data-toggle="tab">Historial Medico</a></li>
                        <li class="nav-item"><a class="nav-link" href="#examenes" data-toggle="tab">Estudios/Examanes</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="medica">
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="list-group">
                                        <label class="col-sm-0 col-form-label">Altura:</label>
                                        <input type="text" name="altura" value="<?php echo $altura;?>" readonly class="form-control">    
                                        <label class="col-sm-0 col-form-label">Peso:</label>
                                        <input type="text" name="peso" value="<?php echo $peso;?>" readonly class="form-control">
                                        <label class="col-sm-0 col-form-label">IMC:</label>
                                        <input type="text" name="imc" value="<?php echo $imc;?>" readonly class="form-control">
                                        <label class="col-sm-0 col-form-label">Temp.:</label>
                                        <input type="text" name="temp" value="<?php echo $temp;?>" readonly class="form-control">
                                        <label class="col-sm-0 col-form-label">F.R.:</label>
                                        <input type="text" name="fr" value="<?php echo $fr;?>" readonly class="form-control">
                                        <label class="col-sm-0 col-form-label">P.A.:</label>
                                        <input type="text" name="pa" value="<?php echo $pa;?>" readonly class="form-control">
                                        <label class="col-sm-0 col-form-label">F.C.:</label>
                                        <input type="text" name="fc" value="<?php echo $fc;?>" readonly class="form-control">
                                    </div>
                                </div>

                                <div class="col-5">
                                    <label class="col-sm-6 col-form-label">Motivo Consulta</label>
                                    <textarea class="form-control"  readonly name="motivo_consulta" id="" rows="8" ><?php echo $motivo_consulta;?></textarea>
                                    <label class="col-sm-6 col-form-label">Exploración Fisica</label>
                                    <textarea class="form-control"  readonly name="exploracion_fisica" id=" "rows="8" ><?php echo $exploracion_fisica;?></textarea>  
                                </div>
                                <div class="col-5">
                                    <label class="col-sm-6 col-form-label">Sintomas subjetivos</label>
                                    <textarea class="form-control"  readonly name="sintomas_subjetivos" id=""rows="8" ><?php echo $sintomas_subjetivos;?></textarea>
                                    <label for="user" class="col-sm-6 col-form-label">Diagnóstico</label>
                                    <textarea class="form-control"  readonly name="diagnostico" id=""rows="8" ><?php echo $diagnostico;?></textarea> 
                                </div>   
                            </div>
                        </div>
                        <div class="tab-pane fade" id="recetas">
                            <div class="row">
                                
                            </div>
                                <br>
                                <br>
                                <br>
                                
                                <div class="table-responsive">        
                                    <table id="example" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>N°</th> 
                                            <th>Medicamento</th>
                                            <th>Concentración</th>
                                            <th>Tomar</th>
                                            <th>Frecuencia</th>                              
                                            <th>Durante</th>
                                        </tr>
                                    </thead> 
                                    <tbody>
                                    <?php
                                    require_once 'bdconnect.php';
                                    $idpaciente = $_SESSION['idpac'] ;
                                    $db =  new database();
                                    $query = $db->connect()->prepare("SELECT * FROM recetas WHERE id_paciente = '$idpaciente'");
                                    $query -> execute();
                                    $pacientes = $query -> fetchAll();
                                    if ($pacientes && $query->rowCount()> 0){
                                        foreach ($pacientes as $fila){ 
        
                                ?>
                                    <tr>
                                      <td ><?php echo ($fila["id"]);?></td> 
                                      <td><?php echo ($fila["medicamento"]);?></td>
                                      <td><?php echo ($fila["concentracion"]);?></td>
                                      <td><?php echo ($fila["tomar"]);?></td>
                                      <td><?php echo ($fila["frecuencia"]);?></td>
                                      <td><?php echo ($fila["durante"]);?></td>
                                    </tr>
                                    <?php
                                            }
                                    }
                                     
                        ?> 
                                    </tbody>
                                    </table>
                                </div>
                        </div>
                        
                        <div class="tab-pane fade" id="historial_medico">
                            <?php
                            $db =  new database();
                            $query = $db->connect()->prepare("SELECT * FROM historial_medico WHERE id_pacientes = '$idpaciente'");
                            $query -> execute();
                            $row = $query->fetch(PDO::FETCH_NUM);
                            if ($row == true ){
                            $alergias = $row[1];
                            $cronicas = $row[2];
                            $quirurgicos = $row[3];
                            $familiar = $row[4];
                            $ginecologicos = $row[5];
                            $otros = $row[6];
                            ?>
                            <div class="row">
                                <div class="col-4">
                                    <label for="user" class="col-sm-5 col-form-label" >Alergias</label>
                                    <textarea name="alergias" readonly value="" class="form-control"  id="alergias" rows="5" ><?php echo $alergias ?></textarea>
                                    <label for="user" class="col-sm-6 col-form-label">Enfermedad Cronicas</label>
                                    <textarea name="cronicas" readonly value="" id="cronicas"class="form-control" rows="5"><?php echo $cronicas ?></textarea> 
                                </div>
                                <div class="col-4">
                                    <label for="user" class="col-sm-8 col-form-label">Antecedentes Quirurgicos</label>
                                    <textarea class="form-control" readonly value="" name="quirurgicos" id="quirurgicos"rows="5" ><?php echo $quirurgicos ?></textarea>
                                    <label for="user" class="col-sm-6 col-form-label">Antecedentes Familiares</label>
                                    <textarea class="form-control" readonly value="" name="familiar" id="familiar"rows="5"><?php echo $familiar ?></textarea>
                                </div>
                                <div class="col-4">
                                    <label for="user" class="col-sm-10 col-form-label">Antecedentes Ginecologicos</label>
                                    <textarea class="form-control"value="" readonly name="ginecologicos" id="ginecologicos"rows="5" ><?php echo $ginecologicos ?></textarea>
                                    <label for="user" class="col-sm-10 col-form-label">Otros (medicamentos, Traumatismos...)</label>
                                    <textarea class="form-control"  readonly value="" name="otros" id="otros"rows="5" ><?php echo $otros ?></textarea>
                                </div>
                            </div>
                            <br>
                            <br>
                            <?php
                            }else{
                            ?>
                            <div class="row">
                                <div class="col-4">
                                    <label for="user" class="col-sm-5 col-form-label" >Alergias</label>
                                    <textarea name="alergias" value="" readonly class="form-control"  id="alergias" rows="5" ></textarea>
                                    <label for="user" class="col-sm-6 col-form-label">Enfermedad Cronicas</label>
                                    <textarea name="cronicas" value="" readonly id="cronicas"class="form-control" rows="5"></textarea> 
                                </div>
                                <div class="col-4">
                                    <label for="user" class="col-sm-8 col-form-label">Antecedentes Quirurgicos</label>
                                    <textarea class="form-control" value="" readonly name="quirurgicos" id="quirurgicos"rows="5" ></textarea>
                                    <label for="user" class="col-sm-6 col-form-label">Antecedentes Familiares</label>
                                    <textarea class="form-control" value="" readonly name="familiar" id="familiar"rows="5"></textarea>
                                </div>
                                <div class="col-4">
                                    <label for="user" class="col-sm-10 col-form-label">Antecedentes Ginecologicos</label>
                                    <textarea class="form-control"value=""  readonly name="ginecologicos" id="ginecologicos"rows="5" ></textarea>
                                    <label for="user" class="col-sm-10 col-form-label">Otros (medicamentos, Traumatismos...)</label>
                                    <textarea class="form-control" value="" readonly name="otros" id="otros"rows="5" ></textarea>
                                </div>
                            </div>
                            <br>
                            <br>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="tab-pane fade" id="examenes">
                            <div class="col-10">
                                <label for="user" class="col-sm-10 col-form-label" >Solicitud De Estudio/Examen</label>
                                <textarea name="estudio_examen" value="" readonly class="form-control"  id="" rows="5" ><?php echo $estudio_examen;?></textarea>
                            </div>
                            <br>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </form>  

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
    <script src="modal.js"></script>    
    
       
     
        