<?php 
    session_start();
    
    $idconsulta = $_POST['dbid'];
    $_SESSION['idconsulta3'] =  $idconsulta ;
    $idpaciente = $_SESSION['idpac'];
        require_once 'bdconnect.php';
            $db =  new database();
            $query = $db->connect()->prepare("SELECT * FROM reportar_pagos WHERE id_paciente = '$idpaciente' AND id_consulta = '$idconsulta'");
            $query -> execute();
            $row = $query->fetch(PDO::FETCH_NUM);
            if ($row == true ){
                $id = $row[0];
                $referencia = $row[1];
                $metodo_pago = $row[2];
                $monto = $row[3];
                $id_paciente = $row[4];
                $id_consulta = $row[5];
                echo "$id#$referencia#$metodo_pago#$monto#$id_paciente#$id_consulta";

            }else{
                echo "pasa";
            }





?>