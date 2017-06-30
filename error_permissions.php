<?php
    require_once('central_concessions_db.php');
	session_start();
	/* 
	    The following code is for defining user permissions based on the current user. If the user has a manager title, they get full permissions. 
	    If they are a supervisor, they can search through the records but not modify or add. If they are an employee, 
	    they cannot view the page at all.
	*/
	$Emp_ID = filter_input(INPUT_POST,'Emp_ID',FILTER_VALIDATE_INT);
	$pass = filter_input(INPUT_POST,'Password',FILTER_VALIDATE_INT);

	$query = "SELECT * FROM employee 
			WHERE Emp_ID = :username 
			AND Password = :password
			ORDER BY Emp_ID";
				
	$statement = $db->prepare($query);
	$statement->bindValue(':username',$Emp_ID); //bind query headings to session username and password
	$statement->bindValue(':password',$pass);
	$statement->execute();
	$employees = $statement;
  
	foreach($employees as $em)
	{
		$title = $em['Emp_Job']; //this stores the title of the user. Might want to use a title id in the tables
}
?>


  <div class="error-message">

    <h1>No Access!</h1>
    <p class="c-red">You don't have access to the requested page.</p>
    
    <nav>
      <ul>
        <li><a class="c-green" href="index.php">Login</a></li>
      </ul>
    </nav>

  </div>
  
  <?php
  
   /* $full_permissions = ob_get_clean(); //store output buffered html chunk in $manager_employee_permissions
	if($title == "Manager" || $title == "Employee") //if user's title is manager, print the employee page, if not, print insufficient permissions
	{
		echo $full_permissions;
	}
	else
	{
	    include("error_permissions_full.php");
	}*/
?>