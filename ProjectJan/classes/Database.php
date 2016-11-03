<?php
	require('config/db.php');
	
	class MySqlDatabaseClass
	{
		//Fields
		private $db_connection;
		
		//Properties
		public function getDb_connection() { return $this->db_connection; }
		
		
		//Constructor
		public function __construct()
		{
			$this->db_connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		
		}	
		
		//Methods
		public function fire_query($query)
		{
			$result = mysqli_query($this->db_connection, $query);
			return $result;
		}
	}
	
	$database = new MySqlDatabaseClass();
?>
