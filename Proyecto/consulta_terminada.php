<?php 
        session_start();
        $idpaciente = $_SESSION['idpac'] ;
        $fecha = $_REQUEST['fecha'] ;
        $valor_consulta = $_REQUEST['valor_consulta'] ;
        $altura = $_REQUEST['altura'] ;
        $peso = $_REQUEST['peso'] ;
        $imc = $_REQUEST['imc'] ;
        $temp = $_REQUEST['temp'] ;
        $fr = $_REQUEST['fr'] ;
        $pa = $_REQUEST['pa'] ;
        $fc = $_REQUEST['fc'] ;
        $motivo_consulta = $_REQUEST['motivo_consulta'] ;
        $exploracion_fisica = $_REQUEST['exploracion_fisica'] ;
        $sintomas_subjetivos = $_REQUEST['sintomas_subjetivos'] ;
        $diagnostico = $_REQUEST['diagnostico'] ;

        $alergias = $_REQUEST['alergias'] ;
        $cronicas = $_REQUEST['cronicas'] ;
        $quirurgicos = $_REQUEST['quirurgicos'] ;
        $familiar = $_REQUEST['familiar'] ;
        $ginecologicos = $_REQUEST['ginecologicos'] ;
        $otros = $_REQUEST['otros'] ;

        $estudio_examen = $_REQUEST['estudio_examen'] ;
        require_once 'bdconnect.php';
        $db =  new database();
        $query = $db->connect()->prepare("INSERT INTO consulta_medica 
        (altura, peso, imc, temp, fr, pa, fc, motivo_consulta, exploracion_fisica, diagnostico, sintomas_subjetivos, valor_consulta, fecha, estudio_examen, id_paciente)
        VALUES ('$altura', '$peso', '$imc', '$temp', '$fr', '$pa', '$fc', '$motivo_consulta', '$exploracion_fisica', '$diagnostico', '$sintomas_subjetivos', '$valor_consulta', '$fecha', '$estudio_examen', '$idpaciente')");
        $query -> execute();
        $db =  new database();
        $query = $db->connect()->prepare("SELECT * FROM historial_medico WHERE id_pacientes = '$idpaciente'");
        $query -> execute();
        $row = $query->fetch(PDO::FETCH_NUM);
            if ($row == true ){
                $db =  new database();
                $query = $db->connect()->prepare("UPDATE historial_medico SET alergias = '$alergias', enfermedades_cronicas = '$cronicas', antecedentes_quirurgicos = '$quirurgicos', antecedentes_familiares = '$familiar', antecedentes_ginecologicos = '$ginecologicos', otros = '$otros'    WHERE id_pacientes = '$idpaciente'");
                $query -> execute();
                ?>
                <script> 
            
            Swal.fire({ 
                icon: 'success',
                title: 'Consulta Guardada',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'ACEPTAR',
                allowOutsideClick: true 
                }).then((resultado) => {
                    if (resultado.isConfirmed) {
                        window.location.href= 'pacientes.php';
                      }
                })
        </script> <?php
            }else{
                $db =  new database();
                $query = $db->connect()->prepare("INSERT INTO historial_medico (alergias, enfermedades_cronicas, antecedentes_quirurgicos, antecedentes_familiares, antecedentes_ginecologicos, otros, id_pacientes) VALUES ('$alergias', '$cronicas', '$quirurgicos', '$familiares', '$ginecologicos', '$otros', '$idpacientes')");
                $query -> execute();
                ?>
                <script> 
            
                        Swal.fire({ 
                            icon: 'success',
                            title: 'Consulta Guardada',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'ACEPTAR',
                            allowOutsideClick: true 
                            }).then((resultado) => {
                                if (resultado.isConfirmed) {
                                    window.location.href= 'pacientes.php';
                                  }
                            })
                    </script> 
                    <?php
            }?>
            



