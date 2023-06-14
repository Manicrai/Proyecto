<?php 
    session_start();
    
    $idpa = $_POST['dbid'];
    $_SESSION['idpa'] = $idpa;
        require_once 'bdconnect.php';
            $db =  new database();
            $query = $db->connect()->prepare("SELECT * FROM historial_medico WHERE id_pacientes = '$idpa'");
            $query -> execute();
            $row = $query->fetch(PDO::FETCH_NUM);
            if ($row == true ){
                $alergias = $row[1];
                $cronicas = $row[2];
                $quirurgicos = $row[3];
                $familiar = $row[4];
                $ginecologicos = $row[5];
                $otros = $row[6];
                echo "$idpa#$alergias#$cronicas#$quirurgicos#$familiar#$ginecologicos#$otros";

            }else{
                echo "pasa";
            }





?>