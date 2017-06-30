<?php
	require('central_concessions_db.php');
	session_start();
	//$Product_ID = filter_input(INPUT_POST,'Product_ID',FILTER_VALIDATE_INT);
	$query = "SELECT * FROM products";
				
				
	$statement = $db->prepare($query);
	//$statement->bindValue(':Product_ID', $Store_ID); //bind query headings to session username and password
	$statement->execute();
	$products = $statement;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add New Order</title>
</head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
  <link href="main.css" rel="stylesheet" type="text/css">
  <body>
 	  <br>
  	  <li id="link_back"><a href="login.php" id="back_manager">Back to login</a></li>
	  <h1 id="noentry">You did not Enter the correct Credentials</h1>
	  <p id="noentry">Please go back to login page and try again or contact your administrator</p>
</body>
</html>