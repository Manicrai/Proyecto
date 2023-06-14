<?php
	session_start();

	function insert_coment(){
		$id = $_SESSION['bdid'];
		$comentario = $_POST['dbco'];
		$nombre = $_SESSION['bdsolicitante'];
			require_once 'bdconnect.php';
			$db =  new database();
				$query = $db->connect()->prepare("INSERT INTO comentarios (nombre, comentario, id_casos) VALUES ('$nombre', '$comentario', '$id') ");
				$queri = $db->connect()->prepare("UPDATE casos SET fecha_actualizacion = now() WHERE id = '$id' ");
				$query -> execute();
				$queri -> execute();
	}
	insert_coment();