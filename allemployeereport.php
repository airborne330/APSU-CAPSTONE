<?php
	require('central_concessions_db.php');
	
		session_start();
	//$Product_ID = filter_input(INPUT_POST,'Product_ID',FILTER_VALIDATE_INT);
	$query = "SELECT * FROM employee";
		
	$statement = $db->prepare($query);
	$statement->execute();
	$employee = $statement;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Bids Report</title>
    <link href="main.css" rel="stylesheet">
  </head>
 <body>
 <li id="link_back"><a href = "reports.php" id="back_manager">Reports</a></li><br><br>
 	<table>
 <table style="width:100%" id="orders_table">
           		<th width="193">Emp ID</th>
				<th width="193">First Name</th>
                <th width="324">Last Name</th>
				<th width="300">Job Title</th>
                <th width="218">Seasonal</th>
                <th width="218">Pay</th>           
            </tr>
            	  <?php foreach($employee as $em) : ?>
            <tr>
            	<td><?php echo $em['Emp_ID']; ?></td>				
            	<td><?php echo $em['Emp_fname']; ?></td>
                <td><?php echo $em['Emp_lname']; ?></td>
                <td><?php echo $em['Emp_Job']; ?></td>
                <td><?php echo $em['Seasonal'];?></td>
                <td><?php echo $em['Pay'];?></td>
           </tr>
         <?php endforeach; ?>
	  </table>
 <form method="post" action="exportallemployeereport.php">
     <input type="submit" name="export" class="btn btn-success" value="Export" />
    </form>
</body>
</html>