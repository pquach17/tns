<?php
	include 'sqlhelper.php';
	require_once '/resources/config.php';
	
	define("TABLE_DISH", "Dish");
	define ("TABLE_CATEGORY", "Category");
	
	$helper = new SqlHelper($config["db"]["host"], $config["db"]["username"], $config["db"]["password"], $config["db"]["dbname"]);
	$helper->create_table(TABLE_CATEGORY, 
						 "id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			 			  name NVARCHAR(50) NOT NULL");
	$helper->create_table(TABLE_DISH, 
						"id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
						 name NVARCHAR(50) NOT NULL,
						 ingredient NVARCHAR(1000),
						 price SMALLMONEY,
						 spicy BIT,
						 vegie BIT,
						 image varchar(100)
						 category INT FOREIGN KEY REFERENCES ".TABLE_CATEGORY."(id)");
	$helper->close();
?>