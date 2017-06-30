<?php
   require('central_concessions_db.php');

$Emp_ID = filter_input(INPUT_GET,'Emp_ID');

$query = "DELETE FROM employee WHERE Emp_ID = :Emp_ID;";
    $statement = $db->prepare($query);
    $statement->bindValue(':Emp_ID', $Emp_ID);
    $success = $statement->execute();
    $statement->closeCursor();
	include("employee_lookup.php");
?>