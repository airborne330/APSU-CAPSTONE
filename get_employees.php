<?php
	
	require_once('central_concessions_db.php');
	//session_start();
	if(!isset($_SESSION['Store_ID']))
	{
    	$_SESSION['Store_ID'] = filter_input(INPUT_POST, 'Store_ID');
	}
		$query = "SELECT * FROM employee,employee_location
					WHERE employee.Emp_ID = employee_location.Emp_ID
					AND employee_location.Store_ID = :Store_ID";

		$statement=$db->prepare($query);
		$statement->bindValue(':Store_ID', $_SESSION['Store_ID'], PDO::PARAM_STR);
		$statement->execute();
		$employee = $statement;
		
		foreach($employee as $em)
	{
		$items = $em['Emp_ID']; //this stores the title of the user. Might want to use a title id in the tables
	}
	
	if(!isset($items) || $items== NULL)
	{
		include('no_employees.php');
	}else
	{
		include('employee_details.php');
	}
	//ob_start();
?>