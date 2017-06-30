<?php
		require('central_concessions_db.php');
		session_start();

ob_start();
	if(isset($_GET['Emp_ID']) && isset($_GET['Store_ID']))
	{
	    $Emp_ID = filter_input(INPUT_GET, 'Emp_ID');
		$StoreID = filter_input(INPUT_GET,'Store_ID');
	    
	    if($Emp_ID != "" && $StoreID != "")
	    {
	        $query = 
	                "INSERT INTO employee_location VALUES(NULL, :Emp_ID,:Store_ID);";
			$statement = $db->prepare($query);
        	$statement->bindValue(':Emp_ID', $Emp_ID, PDO::PARAM_STR);
			$statement->bindValue(':Store_ID', $StoreID, PDO::PARAM_STR);
           	$statement->execute();
			include("employee_lookup.php");

		}
	}
?>