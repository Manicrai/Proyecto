<?php

function estado(){
	
	$id = $_POST['bdid'];
	$newestado = $_POST['newestado'];
	$analista = $_POST['newanalista'];
		require_once 'bdconnect.php';
        	$db =  new database();
                	$query = $db->connect()->prepare("UPDATE casos SET id_estado_caso = '$newestado', fecha_actualizacion = now()  WHERE id = '$id' ");
                	$query ->execute();
                $db = new database();
                	$query = $db->connect()->prepare("INSERT INTO auditoria (analista, id_estado, id_caso, fecha )
           		VALUES ('$analista', '$newestado', '$id', now()) ");
                	$query ->execute();
	return ;
}
estado();
?>