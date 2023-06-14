<?php

class database {
	private $db_host;
	private $db_user;
	private $db_password;
	private $db_name;

	public function __construct(){

 		$this->db_host="localhost"; //localhost server 
		$this->db_user="root"; //database username
		$this->db_password=""; //database password 
        $this->db_name="consultorio"; //database name
    }

    function connect(){
    try
		{
		$connection = "mysql:host=" . $this->db_host . ";dbname=" . $this->db_name;
		$options = [
			PDO::ATTR_ERRMODE  => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_EMULATE_PREPARES => false,
		];

		$pdo = new pdo ($connection, $this->db_user, $this->db_password, $options);

		return $pdo;
		} catch(pdoexception $e){
			print_r("Error connection :" . $e->getMessage());
			}
		}
	}


?>