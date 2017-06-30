<?php
		require('central_concessions_db.php');

	if(isset($_GET['first']) && isset($_GET['last']) && isset($_GET['job']) && isset($_GET['pass']) && isset($_GET['seasonal']) && isset($_GET['pay']) && isset($_GET['status']))
	{
	    $first_name = filter_input(INPUT_GET, 'first');
	    $last_name = filter_input(INPUT_GET, 'last');
		$job_title = filter_input(INPUT_GET,'job');
		$seasonal = filter_input(INPUT_GET,'seasonal');
		$pass = filter_input(INPUT_GET,'pass');	
		$pay = filter_input(INPUT_GET,'pay');
		$status = filter_input(INPUT_GET,'status');
	    
	    if($first_name != "" && $last_name != "" && $job_title != "Option:" && $pass != "" && $seasonal != "Option:"  && $pay != "" && $status != "Option:")
	    {
	        $query = "INSERT INTO employee (Emp_ID, Emp_fname, Emp_lname, Emp_Job, Password, Seasonal,Pay,Status) VALUES(NULL, :first, :last, :job,:pass,:seasonal,:pay,:status);";
			$statement = $db->prepare($query);
        	$statement->bindValue(':first', $first_name, PDO::PARAM_STR);
        	$statement->bindValue(':last', $last_name, PDO::PARAM_STR);
			$statement->bindValue(':job', $job_title, PDO::PARAM_STR);			
			$statement->bindValue(':pass', $pass, PDO::PARAM_STR);
			$statement->bindValue(':seasonal', $seasonal, PDO::PARAM_STR);
			$statement->bindValue(':pay', $pay, PDO::PARAM_STR);
			$statement->bindValue(':status', $status, PDO::PARAM_STR);
           	$statement->execute();
			include("employee_lookup.php");

		}
	if($_GET['first'] == "") {
       die('<script type="text/javascript">
			alert("Must Enter a First Name");
			location.replace("addemployee.php")
			</script>');
	}
			if($_GET['last'] == "") {
       die('<script type="text/javascript">
			alert("Must Enter a Last Name");
			location.replace("addemployee.php")
			</script>');
	}
		if($_GET['job'] == "Option:") {
       die('<script type="text/javascript">
			alert("Must Enter a Job Title");
			location.replace("addemployee.php")
			</script>');
	}
		if($_GET['pass'] == "") {
       die('<script type="text/javascript">
			alert("Must Enter a Password");
			location.replace("addemployee.php")
			</script>');
	}
		if($_GET['status'] == "Option:") {
       die('<script type="text/javascript">
			alert("Must Enter a Status of out or in");
			location.replace("addemployee.php")
			</script>');
	}
				if($_GET['seasonal'] == "Option:") {
       die('<script type="text/javascript">
			alert("Must Enter choose a whether employee is seasonal or not");
			location.replace("addemployee.php")
			</script>');
	}
		if($_GET['pay'] == "") {
       die('<script type="text/javascript">
			alert("Must Enter a pay amount");
			location.replace("addemployee.php")
			</script>');
	}
		if(is_string($_GET['pay'])) {
       die('<script type="text/javascript">
			alert("Must Enter a Valid pay amount");
			location.replace("addemployee.php")
			</script>');
	}
	}
?>