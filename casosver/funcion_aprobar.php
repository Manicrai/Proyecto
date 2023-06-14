<?php

require_once 'bdconnect.php';

function aprovado(){
	$id =$_POST['dbid'];
	$motivo =$_POST['dbmotivo'];
	$db =  new database();
		$query = $db->connect()->prepare("UPDATE casos SET aprobacion = 'Aprobado', comentario_aprobacion = '$motivo', fecha_actualizacion = now(), id_estado_caso = '1' WHERE id = '$id' " );
		$query -> execute();
		$row = $query->fetch(PDO::FETCH_NUM);
		$aprobar = row[14];
		if ($aprobar = 'aprobado') {
			return ;
		}
	return;
}
aprovado();