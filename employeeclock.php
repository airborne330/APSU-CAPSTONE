<?php
	require('central_concessions_db.php');
	$query = "SELECT Shift_ID,employee_location.Emp_ID,Emp_fname,Emp_lname,Today_Date,Time_In,Time_Out,Store_ID
	FROM timeclock, employee_location, employee
	WHERE timeclock.Emp_ID = employee.Emp_ID
	AND employee.Emp_ID = employee_location.Emp_ID;";
	$statement = $db->prepare($query);
	$statement->execute();
	$timeclock = $statement;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Employee Lookup</title>
    <link href="main.css" rel="stylesheet">
  </head>
<body>
	 	  <div class="page-wrap" id="content">
	 	  <br>
 <li id="link_back"><a href = "employee_lookup.php" id="back_manager">Employee Lookup Page</a></li>
	</div>
	<br><br><br>
				<h1 id="location_header">Employee Timeclock</h1>
		   <table style="width:100%" id="orders_table">
        	<tr>
           		<th width="auto">Shift ID</th>
            	<th width="auto">Employee ID</th>
                <th width="auto">Employee First name</th>
               	<th width="auto">Employee  Last name</th>
                <th width="auto">Date</th>
                <th width="auto">Time In</th> 
                <th width="auto">time Out</th> 
                <th width="auto">Store Location ID</th> 
             
            </tr>
            <?php foreach($timeclock as $time) : ?>
            <tr>
            	<td><?php echo $time['Shift_ID']; ?></td>
            	<td><?php echo $time['Emp_ID']; ?></td>
               <td><?php echo $time['Emp_fname']; ?></td>
               <td><?php echo $time['Emp_lname']; ?></td>
                <td><?php echo $time['Today_Date']; ?></td>
                <td><?php echo $time['Time_In']; ?></td>
                 <td><?php echo $time['Time_Out']; ?></td>
				<td><?php echo $time['Store_ID']; ?></td>  
             </tr>
         <?php endforeach; ?>
        </table>
        <br>
	</body>
</html>