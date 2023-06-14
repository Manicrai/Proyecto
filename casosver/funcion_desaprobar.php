<?php

require_once 'bdconnect.php';

function desaprobado(){

	$id =$_POST['dbid'];
	$motivo =$_POST['dbmotivo'];
	
	$db =  new database();
	$query = $db->connect()->prepare("UPDATE casos SET aprobacion = 'Rechazado', comentario_aprobacion = '$motivo', fecha_actualizacion = now(), id_estado_caso = '5' WHERE id = '$id' " );

	$query -> execute();
	$row = $query->fetch(PDO::FETCH_NUM);
	$aprobar = row[14];
	if ($aprobar = 'Desestimado') {
		return ;
	}
	return;
}
desaprobado();