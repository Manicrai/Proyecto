<?php
	session_start();

	function documentar(){
		$id = $_POST['dbid'];
		$comentario = $_POST['dbco'];
		$nombre = $_SESSION['bdsolicitante'];
			require_once 'bdconnect.php';
			$db =  new database();
				$query = $db->connect()->prepare("INSERT INTO comentarios (nombre, comentario, id_casos) VALUES ('$nombre', '$comentario', '$id') ");
				$query -> execute();
				
	}
	documentar();