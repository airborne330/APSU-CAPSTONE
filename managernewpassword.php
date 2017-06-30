<?php
		require('central_concessions_db.php');
	
ob_start();
	if(isset($_GET['password']) && isset($_GET['EmpID']))
	{	
		$username = filter_input(INPUT_GET,'EmpID');
	    $pass = filter_input(INPUT_GET, 'password');
		
		if (strlen($_GET['password']) <= '8') {
        die('<script type="text/javascript">
			alert("Your Password Must Contain At Least 8 Characters!");
			location.replace("manager_change_password_form.php")
			</script>');
			
    }
    elseif(!preg_match("#[0-9]+#",$pass)) {
        	die('<script type="text/javascript">
			alert("Your Password Must Contain At Least 1 number!");
			location.replace("manager_change_password_form.php")
			</script>');
    }
    elseif(!preg_match("#[A-Z]+#",$pass)) {
			die('<script type="text/javascript">
			alert("Your Password Must Contain At Least 1 UPPERCASE character!");
			location.replace("manager_change_password_form.php")
			</script>');
    }
    elseif(!preg_match("#[a-z]+#",$pass)) {
            die('<script type="text/javascript">
			alert("Your Password Must Contain At Least 1 lowercase character!");
			location.replace("manager_change_password_form.php")
			</script>');
    }
}
		
	    if($pass != "" && $username != "")
	    {
	        $query ="UPDATE employee SET Password = :password WHERE Emp_ID = :EmpID;";
			$statement = $db->prepare($query);
        	$statement->bindValue(':EmpID', $username, PDO::PARAM_STR);
        	$statement->bindValue(':password', $pass, PDO::PARAM_STR);			
           	$statement->execute();
			include('login.php');
			//echo 'SUCCESS!';

		}
	
?>