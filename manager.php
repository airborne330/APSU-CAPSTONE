<?php
	include('central_concessions_db.php');

	//$Emp_ID = filter_input(INPUT_POST,'username',FILTER_VALIDATE_INT);
	//$pass = filter_input(INPUT_POST,'password',FILTER_VALIDATE_INT);
	session_start();
	/* 
	    The following code is for defining user permissions. If the user has a manager title, they get full permissions. 
	    If they are a supervisor, they can search through the records but not modify or add. If they are an employee, 
	    they cannot view the page at all.
	*/
	
	$query = "SELECT * FROM employee 
			WHERE Emp_ID = :username 
			AND Password = :password
			ORDER BY Emp_ID";
				
	$statement = $db->prepare($query);
	$statement->bindValue(':username', $_SESSION['username'], PDO::PARAM_STR); //bind query headings to session username and password
	$statement->bindValue(':password', $_SESSION['password'], PDO::PARAM_STR);
	//$statement->bindValue(':username', $Emp_ID);
	//$statement->bindValue(':password', $pass);
	$statement->execute();
	$employees = $statement;
  
	foreach($employees as $em)
	{
		$title = $em['Emp_Job']; //this stores the title of the user. Might want to use a title id in the tables
	}
		
    ob_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Manager Menu</title>
    <link href="main.css" rel="stylesheet">
  </head>
  <body>
    <div class="page-wrap">

        <div class="form-container">
          <section>

            <h1 id="managerPageName">Manager Menu</h1>
            <nav id="managerNav">
             <div class= 'col-md-12'>
              <ul>
                  <li><a href="timekeeping.php">Timekeeping</a></li>
                  	<li><a href="manager_transaction.php">Transaction</a></li>
                <li><a href="orders.php">Orders</a></li>
                <li><a href="employee_lookup.php">Employees</a></li>
                <li><a href="inventorypage.php">Inventory</a></li>
                <li><a href="stores.php">Stores</a></li>
                <li><a href="bids.php">Bids</a></li>
                <li><a href="vendorpage.php">Vendors</a></li>
                <li><a href="reports.php">Reports</a></li>
                <li><a class="logout-button" href="index.php">Logout</a></li>
              </ul>
			</div>
            </nav>
            <br>
            <div class="col-md-12">
            <a class="change-password" href="manager_change_password_form.php">Change Password</a>
			 </div>
          </section>

        </div>
    </div> <!-- END class="page-wrap" -->
    <?php
   /*$manager_menu_permissions = ob_get_clean();
    
    if($title != "Manager")
    {
        include("error_permissions.php");
    }
    else
    {
        echo $manager_menu_permissions;
    }*/
?>
  </body>
</html>