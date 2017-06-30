<?php
	require('central_concessions_db.php');

	$query = "SELECT * FROM employee;";
	$statement = $db->prepare($query);
	$statement->execute();
	$employee = $statement;

	$query = "SELECT * FROM store_location;";
	$statement1 = $db->prepare($query);
	$statement1->execute();
	$store = $statement1;
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
	   <select onchange="location = this.options[this.selectedIndex].value;" id="link_back" style="width:225px;">
    <option>Please select a page</option>
    <option value="http://austinholmes.net/manager.php">Manager Menu</option>
    <option value="http://austinholmes.net/orders.php">Orders Page</option>
    <option value="http://austinholmes.net/inventorypage.php">Store Inventory Page</option>
    <option value="http://austinholmes.net/stores.php">Stores Page</option>
    <option value="http://austinholmes.net/vendorpage.php">Vendor Page</option>
    <option value="http://austinholmes.net/reports.php">Reports Page</option>
</select> 
 <!--<li id="link_back"><a href = "manager.php" id="back_manager">Manager Menu</a></li>-->
        <div class="form-container">
          <img class="logo" src="images/Central_Concessions.jpg" alt="Logo">

          <form id="login-form" action="get_employees.php" method="post">
            <h2>Get Employees</h2>
            <label>Store ID</label><br>
                    <select name="Store_ID">
             <?php foreach($store as $s) : ?>
			 
				 <option value="<?php echo $s['Store_ID']; ?>"><?php echo $s['Store_ID']; ?></option>
			  
           <?php endforeach; ?>
           </select> 
            <br><br>
            <input type="submit" value="submit" id="submit-button"/><br><br>
			  <li id="add_employee"><a href="addemployee.php" id="add">Add New Employee</a></li>
         <br>
         <li id="add_employee"><a href="emplocation.php" id="add">Edit Employee Locations</a></li>			  
          </form>
         	<br>
          <form id="login-form" action="employeeclock.php" method="post">
          <label>Employee Timeclock</label>
           <br>
            <input type="submit" value="Lookup" id="submit-button"/><br>
 
			</form>
        <br>
        <h1 id="location_header">All Employees</h1>
   
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
				<td><form action="deleteEmployee.php" method="get">
                		<input type ="hidden" name ="Emp_ID" value ="<?php echo $em['Emp_ID']; ?>"/>
                        <input type ="submit" value = "Delete" />
                
               </form></td>
             </tr>
         <?php endforeach; ?>
        </table>
        <br>
      <form method="post" action="exportallemployee.php">
     <input type="submit" name="export" class="btn btn-success" value="Export" />
    </form>
        </div>
</div>
			</section>
		 </div>
	 	
	</div>
</body>
</html>