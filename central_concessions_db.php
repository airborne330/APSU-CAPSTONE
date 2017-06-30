<?php
	
	//creates variables related to database
	$dsn = 'mysql:host=austinholmes.net.mysql;dbname=austinholmes_net';
	$username = 'austinholmes_net';
	$password = 'anthony1114';

	try
	{
		//try to log in
		$db = new PDO($dsn, $username, $password);
		//echo 'got it!';
	} 
	
	catch (PDOException $e) 
	{
		//if login fails, change $error_message to tell user what went wrong
		$error_message = $e->getMessage();
		include('error_login.php');
		exit();
	}