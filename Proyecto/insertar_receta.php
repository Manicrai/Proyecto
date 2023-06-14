<?php 
    session_start();
    $medicamento = $_POST['medicamento'];
    $concentracion = $_POST['concentracion'];
    $tomar = $_POST['tomar'];
    $frecuencia = $_POST['frecuencia'];
    $durante = $_POST['durante'];
    $id_paciente = $_SESSION['idpac'];
    require_once 'bdconnect.php';
    $db =  new database();
        $query = $db->connect()->prepare("INSERT INTO recetas 
        (medicamento, concentracion, tomar, frecuencia, durante, id_paciente)
        VALUES ('$medicamento', '$concentracion', '$tomar', '$frecuencia', '$durante', '$id_paciente')");
        $query -> execute();
        

?>