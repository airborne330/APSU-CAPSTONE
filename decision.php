<?php
	
	require_once('central_concessions_db.php');
	session_start();
	if(!isset($_SESSION['username']) && !isset($_SESSION['password']))
	{
    	$_SESSION['username'] = filter_input(INPUT_POST, 'username');
    	$_SESSION['password'] = filter_input(INPUT_POST, 'password');
	}
	
	$query = "SELECT * FROM employee 
				WHERE Emp_ID = :username 
				AND Password = :password
				ORDER BY Emp_ID";
				
	$statement = $db->prepare($query);
	$statement->bindValue(':username', $_SESSION['username'], PDO::PARAM_STR);
	$statement->bindValue(':password', $_SESSION['password'], PDO::PARAM_STR);
	$statement->execute();
	$employees = $statement;
  
	foreach($employees as $em)
	{
		$jobtitle = $em['Emp_Job']; //this stores the title of the user. Might want to use a title id in the tables
	}
	
	if($jobtitle == "Manager")
	{
		include('manager.php');
	}
	else if($jobtitle == "Employee")
	{
		include('employee.php');
	}
	else
	{
	    include("error_login.php");
	}
  ?>
