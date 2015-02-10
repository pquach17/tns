<?php
	include ('sqlhelper.php');
	require_once ('config.php');
	
	define("TABLE_DISH", "Dish");
	define ("TABLE_CATEGORY", "Category");
	
	$helper = new SqlHelper($config["db"]["host"], $config["db"]["username"], $config["db"]["password"], $config["db"]["dbname"]);
	$result = $helper->create_table(TABLE_CATEGORY, 
						 "id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			 			  name NVARCHAR(50) NOT NULL");
	
	if($result===TRUE)	
		echo "Table ".TABLE_CATEGORY." created successfully";
	else 
		die("Unable to create table ".TABLE_CATEGORY.": ".$result) ;
	$result = $helper->create_table(TABLE_DISH, 
						"id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
						 name VARCHAR(50) NOT NULL,
						 ingredient VARCHAR(1000),
						 price DECIMAL(3,2),
						 spicy BIT,
						 vegie BIT,
						 image varchar(100),
						 category INT UNSIGNED, 
						 FOREIGN KEY (category) REFERENCES ".TABLE_CATEGORY."(id)");
	if($result===TRUE)	
		echo "Table ".TABLE_DISH." created successfully";
	else 
		die("Unable to create table ".TABLE_CATEGORY.": ".$result);
		
	$helper->close();
?>