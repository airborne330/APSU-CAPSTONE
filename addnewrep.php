<!DOCTYPE html>
<html>
<head>
	<title>Vendors</title>	
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
  <link href="main.css" rel="stylesheet" type="text/css">
  
</head>
<body>
	 <li id="link_back"><a href = "vendorpage.php" id="back_manager">Vendor Page</a></li>
	 
  	 <h1 id="add_employee_title">Add New Vendor Representative</h1>
  <form id="add_employee_form" method="get" action="newrep.php">
	<label id="label">Rep First Name:</label><br>
    <input id="firstname" type="text" name="firstname" size="45">
    <br>
	<label id="label">Rep Last Name:</label><br>
    <input id="lastname" type="text" name="lastname" size="45">
    <br>
    <label id="label">Rep Phone Number:</label><br>
    <input id="phone" type="text" name="phone" size="45"><label id="label">(ex. 000-000-0000)</label>
    <br>
      <label id="label">Vendor ID:</label><br>
    <input id="Vendor_ID" type="text" name="Vendor_ID" size="45">
    <br><br>
    <input type="submit" value="Submit Vendor Rep">       
     <input name="reset" type="reset" src="images/reset_button.jpg" class="reset_button" />    
  </form>

	</body>
	
</html>