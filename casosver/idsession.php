<?php
	session_start();
	function guardar_id(){
		$id = $_POST['bdid'];
		$_SESSION['bdid'] = $id;
		return  ;
	}
	guardar_id();