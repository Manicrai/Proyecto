<?php

function categoria(){
	$id = $_POST['bdid'];
	$newcategoria = $_POST['newcategoria'];
	$analista = $_POST['newanalista'];
		require_once 'bdconnect.php';
        	$db =  new database();
                	$query = $db->connect()->prepare("UPDATE casos SET id_categoria = '$newcategoria', fecha_actualizacion = now()  WHERE id = '$id' ");
                	$query ->execute();
                $db = new database();
                	
	return ;
}
categoria();
?>