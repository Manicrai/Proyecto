<?php
    if (isset($_REQUEST['actualizar_Paciente'])) {
    $nombre = $_REQUEST ["nombre"];
    $apellido = $_REQUEST ["apellido"];
    $telefono = $_REQUEST ["telefono"];
    $cedula = $_REQUEST ["cedula"];
    $edad = $_REQUEST ["edad"];
    $sexo = $_REQUEST ["sexo"];
    $id = $_REQUEST ["id"];

    require_once 'bdconnect.php';
    $db =  new database();
                $query = $db->connect()->prepare("UPDATE pacientes 
                SET nombre = '$nombre', apellido = '$apellido', telefono = '$telefono', cedula = '$cedula', edad = '$edad', sexo = '$sexo'
                WHERE id = '$id'");
                $query->execute();
            }

?>
