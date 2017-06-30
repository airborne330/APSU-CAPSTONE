<?php
		require('central_concessions_db.php');

ob_start();
	if(isset($_GET['password']) && isset($_GET['id']))
	{	
		$username = filter_input(INPUT_GET,'id');
	   $pass = filter_input(INPUT_GET, 'password');
		
		if (strlen($_GET['password']) <= '8') {
        die('<script type="text/javascript">
			alert("Your Password Must Contain At Least 9 Characters!");
			location.replace("employee_change_password_form.php")
			</script>');
			
    }
    elseif(!preg_match("#[0-9]+#",$pass)) {
        	die('<script type="text/javascript">
			alert("Your Password Must Contain At Least 1 number!");
			location.replace("employee_change_password_form.php")
			</script>');
    }
    elseif(!preg_match("#[A-Z]+#",$hashedPW)) {
			die('<script type="text/javascript">
			alert("Your Password Must Contain At Least 1 UPPERCASE character!");
			location.replace("employee_change_password_form.php")
			</script>');
    }
    elseif(!preg_match("#[a-z]+#",$pass)) {
            die('<script type="text/javascript">
			alert("Your Password Must Contain At Least 1 lowercase character!");
			location.replace("employee_change_password_form.php")
			</script>');
    }else{
		echo('<script type="text/javascript">
			alert("Success!");
			location.replace("employee_change_password_form.php")
			</script>');
	}
	
}
		
	    if($pass != "" && $username != "")
	    {
	        $query ="UPDATE employee SET Password = :password WHERE Emp_ID = :id;";
			$statement = $db->prepare($query);
        	$statement->bindValue(':id', $username, PDO::PARAM_STR);
        	$statement->bindValue(':password', $pass, PDO::PARAM_STR);			
           	$statement->execute();
			include('login.php');
			//echo 'SUCCESS!';

		}
	
?>