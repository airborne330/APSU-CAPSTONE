<?php
    require('central_concessions_db.php');	
	session_start();
	/* 
	    The following code is for defining user permissions based on the current user. If the user has a manager title, they get full permissions. 
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
	$statement->execute();
	$employees = $statement;
  
	foreach($employees as $em)
	{
		$title = $em['Emp_Job']; //this stores the title of the user. Might want to use a title id in the tables
	}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Employee Menu</title>
    <link href="main.css" rel="stylesheet">
  </head>
  <body>
  
            <h1 id="employeePageName">Employee Menu</h1>
           
  <nav id="employeeNav">
             <div class= 'col-md-12'>
              <ul>
                  <li><a href="employeetimekeeping.php">Timekeeping</a></li>
				<li><a href="store_transaction.php">Transaction</a></li>
                <li><a class="logout-button" href="index.php">Logout</a></li>
              </ul>
              </div>
            </nav>
            <div class='col-md-12' id='ChangePass'> <a class="change-password" href="employee_change_password_form.php">Change Password</a> </div>
            <br>
          </section>

        </div>
    </div> <!-- END class="page-wrap" -->
  </body>
</html>