<?php

function analista(){
	$id = $_POST['bdid'];
	$newanalista = $_POST['newanalista'];
	require_once 'bdconnect.php';
        $db =  new database();
                $query = $db->connect()->prepare("UPDATE casos SET analista = '$newanalista', fecha_actualizacion = now(), id_estado_caso = 2  WHERE id = '$id' ");
                $query ->execute();
	return ;
	}
analista();
?>