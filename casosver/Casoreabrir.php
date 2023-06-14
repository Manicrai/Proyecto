<?php

require_once 'bdconnect.php';

function casoreabrir(){

	$id =$_POST['bdid'];
	
	$db =  new database();
	$query = $db->connect()->prepare("UPDATE casos SET  fecha_actualizacion = now(), id_estado_caso = '2' WHERE id = '$id' " );
	$query ->execute();

	return;
}
casoreabrir();