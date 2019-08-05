<?php

/**
 * 
 */
class DbConnect
{
	private $con;

	function __construct()
	{
		require_once "Constants.php";
	}

	function connect(){
		$this->con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

		if (mysqli_connect_errno()) {
			echo "Failed to connect to MYSQL: ".mysqli_connect_errno();
		}

		return $this->con;
	}

	// Add more connect function if you used more than 2 database
}