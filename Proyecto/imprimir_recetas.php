<?php
ob_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  
  <link href="dompdf/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="col-lg-4">
      <div    style= "text-align: center;">
        <h1>RECETA MÉDICA</h1> 
      </div>
      <br>
    <div class="container">
    <div class="col-lg-12">
                <div class="table-responsive">        
                  <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>Paciente</th>
                        <th>Edad</th>
                        <th>Sexo</th>
                        <th>Fecha</th>                              
                      </tr>
                    </thead>
                      <tbody>
                      <?php
                        session_start();
                        require_once 'bdconnect.php';
                        $idpaciente = $_SESSION['idpac'] ;
                        $db =  new database();
                        $query = $db->connect()->prepare("SELECT CONCAT (nombre,' ', apellido) AS nombre, edad, sexo FROM pacientes WHERE id = '$idpaciente'");
                        $query -> execute();
                        $row = $query->fetch(PDO::FETCH_NUM);
                        $nombre = $row[0];
                        $edad = $row[1];
                        $sexo = $row[2];
                        $fecha_actual = date("Y-m-d h:i:s");   
                      ?>
                        <tr>
                          <td><span><?php echo $nombre;?></span></td>
                          <td><span><?php echo $edad;?></span></td>
                          <td><span><?php echo $sexo;?></span></td>
                          <td><span><?php echo $fecha_actual;?></span></td>
                
                        </tr>                   
                        </tbody>        
                       </table>   
                <div class="table-responsive">        
                  <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>Medicamentos</th>                           
                      </tr>
                    </thead>
                      <tbody>
                      <?php
                        require_once 'bdconnect.php';
                        $idpaciente = $_SESSION['idpac'] ;
                        $db =  new database();
                        $query = $db->connect()->prepare("SELECT medicamento, concentracion, tomar, frecuencia, durante  FROM recetas WHERE id_paciente = '3'");
                        $query -> execute();
                        $pacientes = $query -> fetchAll();
                          if ($pacientes && $query->rowCount()> 0){
                            foreach ($pacientes as $fila){ 
                      ?>
                        <tr><td>
                         <?php echo ($fila['medicamento']);
                         echo " ";
                         echo ($fila['concentracion']); 
                         echo ", ";
                         echo ($fila['tomar']);
                         echo " ";
                         echo ($fila['frecuencia']);
                         echo ", ";
                         echo ($fila['durante']);
                         ?>
                        </td>
                        </tr> 
                        <?php
                                            }
                                    }
                                    
                        ?>                   
                        </tbody>        
                       </table>                  
                    </div>
                </div><br><br><br>
                <p class="text-center" >Dr. 
                <?php echo $_SESSION["nombre"], " " .$_SESSION["apellido"]; ?>
                <br>
                <?php echo $_SESSION["especialidad"];?>

                                </p>
                                </div></div></div></div></div></div>
                                </body>
                                </html>
                                <?php 
                                require_once 'dompdf/autoload.inc.php';
                                use Dompdf\Dompdf;
                                $dompdf = new Dompdf();
                                $html=ob_get_clean();
                                echo $html;
                                    $dompdf-> loadHtml($html);
                                    $dompdf -> setpaper('letter');

                                    $dompdf->render ();

                                    $dompdf -> stream("archivo.pdf", array ("Attachment" => false));

                                ?>