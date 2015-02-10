<?php
include 'contentvalues.php';

	class SqlHelper
	{
		 private $connection;
		 
		 public function __construct($host, $user, $password, $dbname)
		 {
		 	$this->connection = new mysqli($host, $user, $password, $dbname);
		 	if($this->connection->connect_error)
		 		die("Connection failed: ". $connection->connect_error);
		 }
		
		 public function create_table($tablename, $schema)
		 {
		 	$query = "CREATE TABLE IF NOT EXISTS $tablename($schema)";
		 	if($this->connection->query($query))
		 		return TRUE;
		 	else 
		 		return $this->connection->error;
		 }
		 
		 public function insert($tablename, $contentvalues)
		 {
		 	$array = $contentvalues->get_contents();
		 	$keys = array_keys($array);
		 	// create strings of array's keys and values
		 	// $columns is a string of array's key
		 	// $values is a string of array's values
		 	$columns = null;
		 	$values = null;
		 	foreach($keys as $key)
		 	{
		 		if($columns!=null)
		 		{
		 			$columns += ',';
		 			$values += ',';
		 		}
		 		$columns += $key;
		 		$values += $array[$key];
		 	}
		 	$query = "INSERT INTO $tablename($columns) VALUES($values)";
		 	if($connection->query($query))
		 		return TRUE;
		 	else 
		 		return $this->connection->error;
		 }
		 
		 public function update ($tablename, $wherecondition, $contentvalues)
		 {
		 	$array = $contentvalues->get_contents();
		 	$array_keys = array_keys($array);
		 	$whereclause = null;
		 	foreach ($array_keys as $key)
		 	{
		 		if($whereclause!=null)
		 			$whereclause += ",";
		 		$whereclause = "$key=$array[$key]";
		 	}
		 	$query = "UPDATE $tablename WHERE $whereclause";
		 	if($this->connection->query($query))
		 		return TRUE;
		 	else 
		 		return $this->connection->error;		 	
		 }
		 
		 public function close()
		 {
		 	$this->connection->close();
		 }
	}
?>