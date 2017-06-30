<?php
	
	include('central_concessions_db.php');
	session_start();
		if(!isset($_SESSION['username']) && !isset ($_SESSION['password']))
	{
    	$_SESSION['username'] = filter_input(INPUT_POST, 'username');
    	$_SESSION['password']= filter_input(INPUT_POST, 'password');
	}
	/* 
	    The following code is for defining user permissions. If the user has a manager title, they get full permissions. 
	    If they are a supervisor, they can search through the records but not modify or add. If they are an employee, 
	    they cannot view the page at all.
	*/
	$query = "SELECT * FROM employee 
			WHERE Emp_ID = :username";
				
	$statement = $db->prepare($query);
	$statement->bindValue(':username', $_SESSION['username'], PDO::PARAM_STR); //bind query headings to session username and password
	$statement->execute();
	$user = $statement;
	
	$query = "SELECT * FROM employee 
			WHERE Emp_ID = :username 
			AND Password = :password
			ORDER BY Emp_ID";
				
	$statement = $db->prepare($query);
	$statement->bindValue(':username', $_SESSION['username'], PDO::PARAM_STR); //bind query headings to session username and password
	$statement->bindValue(':password', $_SESSION['password'], PDO::PARAM_STR);
	$statement->execute();
	$employees = $statement;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Employee Information</title>	
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
  <link href="main.css" rel="stylesheet" type="text/css">
</head>
<body>
    <li id="link_back"><a href = "login.php" id="back_manager">Login Page</a></li>
    <li id="link_back"><a href = "employee.php" id="back_manager">Employee Page</a></li>
          <br>
           <h1 id="add_employee_title">New Password</h1>
	 
  <form id="add_employee_form" method="get" action="newpassword.php">
 	 <label id="label">Employee ID:</label><br>
    <!--<input id="id" type="text" name="id" size="45">-->
	      	  <select id="EmpID" name="EmpID" style="width: 300px;">
		  <option>Employee ID:</option>
		               <?php foreach($user as $u) : ?>
			 
				 <option value="<?php echo $_SESSION['username']; ?>"><?php echo $_SESSION['username']; ?></option>
			  
           <?php endforeach; ?>
	  </select>
    <br>
	<label id="label">New Password:</label><br>
    <input id="password" type="text" name="password" size="45">
    <br><br>
    <input type="submit" value="Submit Password">    
	  <h4 id="passrequire">Password Requirements</h4>   
        <ul>
			<li id="passrequire">At least 9 characters in length</li>
			<li id="passrequire">At least 1 number</li>
			<li id="passrequire">At least 1 uppercase letter</li>
			<li id="passrequire">At least 1 lowercase letter</li>
	  </ul>
  </form>
  <br>
	</body>
</html>