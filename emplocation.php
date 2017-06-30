<?php
	require_once('central_concessions_db.php');
	$Store_ID = filter_input(INPUT_POST,'Store_ID',FILTER_VALIDATE_INT);
	$query = "SELECT * FROM employee";
				
				
	$statement = $db->prepare($query);
	$statement->bindValue(':Store_ID', $Store_ID); //bind query headings to session username and password
	$statement->execute();
	$employee = $statement;

	$query = "SELECT * FROM store_location";
				
				
	$statement1 = $db->prepare($query);
	$statement1->execute();
	$store = $statement1;

	$query = "SELECT * FROM store_location";	
				
	$statement2 = $db->prepare($query);
	$statement2->execute();
	$stores = $statement2;
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add New Employee Location</title>
</head>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
  <link href="main.css" rel="stylesheet" type="text/css">
  <body>
   <li id="link_back"><a href="manager.php" id="back_manager">Manager Menu</a></li>
  	<table>
  			<table style="width:100%" id="orders_table">
           		<th width="193">Employee ID</th>
				<th width="193">Employee First Name</th>
                <th width="324">Employee Last Name</th>
				<th width="300">Employee Title</th>            
            </tr>
            	  <?php foreach($employee as $em) : ?>
            <tr>
            	<td><?php echo $em['Emp_ID']; ?></td>				
            	<td><?php echo $em['Emp_fname']; ?></td>
                <td><?php echo $em['Emp_lname']; ?></td>
                <td><?php echo $em['Emp_Job']; ?></td>
           </tr>
         <?php endforeach; ?>
	  </table>
	  <br>
	<div class="col-md-6">
	<h1 id="add_employee_title">Add Employee to Location</h1>
<form id="add_employee_form" method="get" action="insertEmpLocation.php">
	<label id="label">Employee ID:</label><br>
    <input id="Emp_ID" type="text" name="Emp_ID" size="auto">
    <br>
	<label id="label">Store ID:</label><br>
                    <select name="Store_ID">
             <?php foreach($store as $s) : ?>
			 
				 <option value="<?php echo $s['Store_ID']; ?>"><?php echo $s['Store_ID']; ?></option>
			  
           <?php endforeach; ?>
           </select> 
    <br><br>
    <input type="submit" value="Submit">         
  </form>
	  </div>
	  <div class="col-md-6">
	  	<h1 id="add_employee_title">Update Employee Location</h1>
<form id="add_employee_form" method="get" action="updateLocation.php">
	<label id="label">Employee ID:</label><br>
    <input id="Emp_ID" type="text" name="Emp_ID" size="auto">
    <br>
	<label id="label">Store ID:</label><br>
                       <select name="Store_ID">
             <?php foreach($stores as $s) : ?>
			 
				 <option value="<?php echo $s['Store_ID']; ?>"><?php echo $s['Store_ID']; ?></option>
			  
           <?php endforeach; ?>
           </select> 
    <br><br>
    <input type="submit" value="Submit">         
  </form
	  </div>
</body>
</html>