<html>
<head>
    <link href="caso.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src = "https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Sistema De Casos</title>
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
    <?php 
        require_once 'bdconnect.php';
        session_start();
            $db =  new database();
                $query = $db->connect()->prepare("SELECT*FROM usuarios WHERE usuario = :usuario AND password = :password ");
                $query->execute(["usuario" => $_SESSION["usuario"], "password" => $_SESSION["password"]]);
                $row = $query->fetch(PDO::FETCH_NUM);
                
                                            $bdsolicitante = $row[2]." " .$row[3];
                                            
                                            $_SESSION['bdsolicitante'] = $bdsolicitante;
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
                                                        $_SESSION['bdsolicitant'] = $dbsolicitante;
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
            } 
        ?>

            <?php 
                    $id = $_SESSION['bdid'];
                        $db = new database ();
                            $query = $db->connect()->prepare("SELECT c.id, c.titulo, cc.categoria, d.departamento, c.fecha_ingreso, c.fecha_actualizacion, c.descripcion_caso, p.prioridad, e.estado, c.analista, c.aprobacion, c.comentario_aprobacion Analista  FROM casos AS c 
                                    INNER JOIN categoria AS cc ON c.id_categoria = cc.id
                                    INNER JOIN departamento AS d ON c.id_departamento = d.id
                                    INNER JOIN prioridad AS p ON c.id_prioridad = p.id 
                                    INNER JOIN estado_caso AS e ON c.id_estado_caso = e.id
                                        WHERE c.id = '$id'");
                            $query -> execute(); 
                                $caso = $query -> fetch(PDO::FETCH_NUM); 
                                $ncaso = $caso[0];
                                $ntitulo = $caso[1];
                                $ncategoria = $caso[2];
                                $ndepartamento = $caso[3];
                                $nfechaingreso = $caso[4];
                                $ndescripcion = $caso[6];
                                $nprioridad = $caso[7];
                                $nestado = $caso[8];
                                $nanalista = $caso [9];
                                $ncomentario = $caso[11];
                                $naprobacion = $caso[10];


            ?>
                <div id="container" style="">
                    <div class="center" style="box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;">
                        <form class="" >
                            <h1> Detalles Del Caso</h1>
                                <div class="name">
                                    <div class="inputbox">
                                        <label> Numero Del Caso </label>
                                        <input type="text" name="" id="" placeholder="<?php echo $ncaso ;?>" readonly="readonly">
                                    </div>
                                </div>
                                <div class="email">
                                    <div class="inputbox">
                                        <label>Categoria</label>
                                         <input type="text" name="" id="" placeholder="<?php echo $ncategoria ;?>" readonly="readonly">
                                    </div> 
                                    
                                </div>
                                    <div class="name">
                                        <br>
                                        <div class="inputbox">
                                            <label>Departamento</label>
                                            <input type="text" name="" id="" placeholder="<?php echo $ndepartamento ;?>" readonly="readonly">
                                        </div>
                                    </div>
                                <div class="email">
                                    <br>
                                    <div class="inputbox">
                                        <label>Prioridad</label>
                                        <input type="text" name="" id="" placeholder="<?php echo $nprioridad ;?>" readonly="readonly">
                                    </div>
                                </div>
                                <div class="name">
                                    <br>
                                    <div class="inputbox">
                                        <label>Estado</label>
                                        <input type="text" name="" id="" placeholder="<?php echo $nestado ;?>" readonly="readonly">
                                    </div>
                                </div>
                                <div class="email">
                                    <br>
                                    <div class="inputbox">
                                        <label>Analista Encargado</label>
                                        <input type="text" name="" id="" placeholder="<?php echo $nanalista ;?>" readonly="readonly">
                                    </div>
                                </div>
                                <div class="name">
                                    <br>
                                    <div class="inputbox">
                                        <label> Incidente/Requerimiento</label>
                                        <input type="text" name="" id="" placeholder="<?php echo $ntitulo ;?>" readonly="readonly">
                                    </div>
                                </div>
                                <div class="email">
                                    <br>
                                    <div class="inputbox">
                                        <label for= "name">Fecha De Creación</label>
                                        <input type="text" name="" id="" placeholder="<?php echo $nfechaingreso ;?>" readonly="readonly">
                                    </div>
                                </div>
                                <?php
                                if ($ncategoria == "Permisología (Aplicación/Carpeta)") {  

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
                                            <input type="text" name="" id="" placeholder="<?php echo $ncomentario ;?>" readonly="readonly" style="border: 0;">
                                        </div>
                                    </div>
                                    <?php
                                    } 
                                    ?>
                                <br><br><br><br><br> <br><br><br><br><br><br>
                                <div class="telephone">
                                    <br>                                     
                                    <div class="inputbox">
                                        <br><br><br><br><br> <br><br><br><br><br>

                                        <label>Descripción Casos</label>
                                        <br>
                                        <textarea name="message" rows="5" required="" readonly="readonly"><?php echo $ndescripcion ;?></textarea>
                                    </div>
                                </div>         
                        </form>
                    </div>
                </div>

                    <div class="chat">
                        <h1> Comentarios </h1>
                        <br>
                        <div class="inputbox">
                            <textarea id="comentario" name="comentario" placeholder="Escribe un comentario"></textarea>
                        </div>
                        <div class="inputbox" style="left: 15%">
                            <input type="button" name="" onclick="new_coment()" value="Enviar">
                            <br><br>
                        </div>

                        <?php 
                
                            $db =  new database();
                            $query = $db->connect()->prepare ("SELECT nombre, comentario, fecha FROM comentarios WHERE id_casos = '$id' ORDER BY fecha DESC");
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
