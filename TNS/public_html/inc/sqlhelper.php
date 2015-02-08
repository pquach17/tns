<?php
include 'contentvalues.php';

	class SqlHelper
	{
		 private $connection;
		 
		 public function __construct($host, $user, $password, $dbname)
		 {
		 	$this->connection = mysqli_connect($host, $user, $password, $dbname);
		 	if($connection->connect_error)
		 		die("Connection failed: ". $connection->connect_error);
		 }
		
		 public function create_table($tablename, $schema)
		 {
		 	$query = "CREATE TABLE IF NOT EXISTS $tablename($schema)";
		 	if($connection->query($query))
		 		return TRUE;
		 	else 
		 		return FALSE;
		 }
		 
		 public function insert($tablename, $contentvalues)
		 {
		 	$array = $contentvalues->get_contents;
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
		 		return FALSE;
		 }
		 
		 public function close()
		 {
		 	$this->connection.close();
		 }
	}
?>