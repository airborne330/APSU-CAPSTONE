<!DOCTYPE html>
<html>
<head>
	<title>Add New Employee</title>
</head>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
  <link href="main.css" rel="stylesheet" type="text/css">
<body><br>
<li id="link_back"><a href="employee_lookup.php" id="back_manager">Employee Lookup</a></li>
	<h1 id="add_employee_title">Add Employee</h1>
<form id="add_employee_form" method="get" action="insertemployee.php">
	<label id="label">First Name:</label><br>
    <input id="first" type="text" name="first" size="45">
    <br>
	<label id="label">Last Name:</label><br>
    <input id="last" type="text" name="last" size="45">
    <br> 
	<label id="label">Job Title</label> <br>
    <select id=job name="job">
		<option>Option:</option>
		<option>Manager</option>
		<option>Employee</option>
	</select>
    <br>
    <label id="label">Seasonal:</label> <br>
    <select id=seasonal name="seasonal">
		<option>Option:</option>
		<option>Y</option>
		<option>N</option>
	</select>
    <br>
	<label id="label">Password:</label>
   <br>
    <input id="pass" type="text" name="pass" size="45">
    <br>
    
	<label id="label">Pay:</label>
   <br>
    <input id="pay" type="text" name="pay" size="45"> 
    <br>
    <label id="label">Status:</label>
 	<br>
	    <select id=status name="status">
		<option>Option:</option>
		<option>out</option>
		<option>in</option>
	</select>
    <br>
    <br><br>
    <input type="submit" value="Add Employee">  
       <input name="reset" type="reset" src="images/reset_button.jpg" class="reset_button">     
        
  </form>
</body>
</html>