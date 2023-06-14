<?php 
    session_start();
    $idpa = $_POST['bdidconsulta'];
    $_SESSION['idconsulta'] = $idpa;
    ?>