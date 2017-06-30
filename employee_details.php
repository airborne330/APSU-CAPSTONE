<?php
	require('central_concessions_db.php');
	//require('deleteEmployee.php');

	$Emp_ID = filter_input(INPUT_POST,'Emp_ID',FILTER_VALIDATE_INT);
	$Store_ID = filter_input(INPUT_POST,'Store_ID',FILTER_VALIDATE_INT);
	//DELETE the Employee

	$query='DELETE FROM employee WHERE Emp_ID = :Emp_ID';
	$statement=$db->prepare($query);
	$statement->bindValue(':Emp_ID',$Emp_ID);
	$statement->execute();
	$statement->closeCursor();
/*-----------------------------------------------------------------------------------------------------------*/
			$query = "SELECT * FROM employee_location,employee
					WHERE employee.Emp_ID = employee_location.Emp_ID
					AND employee_location.Store_ID = :Store_ID";
				
	$statement1 = $db->prepare($query);
	$statement1->bindValue(':Store_ID', $Store_ID); //bind query headings to session username and password
	$statement1->execute();
	$employee = $statement1;
	
/*-----------------------------------------------------------------------------------------------------*/
	/*foreach($employee as $em)
	{
		$items = $em['Store_ID']; //this stores the title of the user. Might want to use a title id in the tables
	}*/

//ob_start();
?>
<!DOCTYPE>
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
<section>
	<li id="link_back"><a href = "employee_lookup.php" id="back_manager">Employee Lookup</a></li>
	<h1 id="location_header">Employee Information</h1>
   
	   <table style="width:100%" id="orders_table">
        	<tr>
           		<th width="auto">Employee ID</th>
            	<th width="auto">Employee First Name</th>
                <th width="auto">Employee Last Name</th>
                <th width="auto">Employee Job Title</th> 
                <th width="auto">Password</th> 
                <th width="auto">Seasonal</th> 
                <th width="auto">Pay</th> 
                <th width="auto">Status</th> 
				<th width="auto">&nbsp;</th>
             
            </tr>
            <?php foreach($employee as $em) : ?>
            <tr>
            	<td><?php echo $em['Emp_ID']; ?></td>
            	<td><?php echo $em['Emp_fname']; ?></td>
                <td><?php echo $em['Emp_lname']; ?></td>
                <td><?php echo $em['Emp_Job']; ?></td>
                 <td><?php echo $em['Password']; ?></td>
                  <td><?php echo $em['Seasonal']; ?></td>
                   <td><?php echo $em['Pay']; ?></td>
                <td><?php echo $em['Status']; ?></td>
				<td><form action="employee_details.php" method="post" onSubmit="return confirm('are you sure?')">
                		<input type ="hidden" name ="Emp_ID" value ="<?php echo $em['Emp_ID']; ?>"/>
                        <input type="button" name="delete" value="Delete"/>                
               </form></td>
             </tr>
         <?php endforeach; ?>
        </table>
        <br>
      <form method="post" action="exportemployee.php">
     <input type="submit" name="export" class="btn btn-success" value="Export" />
    </form>

	</section>
	</body>
	
	
</html>
