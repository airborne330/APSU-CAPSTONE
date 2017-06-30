<!DOCTYPE html>
<html>
<head>
	<title>Products</title>	
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
  <link href="main.css" rel="stylesheet" type="text/css">
</head>
<body>
 <li id="link_back"><a href="inventorypage.php" id="back_manager">Inventory Page</a></li>
  <h1 id="add_employee_title">Add New Category</h1>
	  <form id="add_employee_form" method="get" action="newcategory.php">
	<label id="label">Category Name:</label><br>
    <input id="cat_name" type="text" name="cat_name" size="45">
    <br>
    <label id="label">Category Description:</label><br>
    <input id="cat_description" type="text" name="cat_description" size="45">
    <br><br>
    <input type="submit" value="Submit Category">           
  </form>
  <br>
</body>
</html>
