<?php

	function usuario(){
		$usuario = $_POST['ausuario'];
		$cedula = $_POST['acedula'];
			require_once 'bdconnect.php';
			$db =  new database();
				$query = $db->connect()->prepare("SELECT * FROM usuarios WHERE usuario = '$usuario' AND cedula = '$cedula' ");
            	$query->execute();
            	$row = $query->fetch(PDO::FETCH_NUM);
            		if ($row == true) {
            		echo "si";
            	
            }
	}
	usuario();
?>