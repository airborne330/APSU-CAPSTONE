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
	 
	  <h1 id="add_employee_title">Add New Vendor</h1>
	 
  <form id="add_employee_form" method="get" action="newvendor.php">
	<label id="label">Vendor Name:</label><br>
    <input id="Vendor_Name" type="text" name="Vendor_Name" size="45">
    <br>
	<label id="label">Vendor Street:</label><br>
    <input id="Vendor_Street" type="text" name="Vendor_Street" size="45">
    <br>
    <label id="label">Vendor City:</label><br>
    <input id="Vendor_City" type="text" name="Vendor_City" size="45">
    <br>
    <label id="label">Vendor State:</label><br>
    <input id="Vendor_State" type="text" name="Vendor_State" size="45"><label id="label">(ex.TN,FL)</label>
    <br>
    <label id="label">Vendor Zipcode:</label><br>
    <input id=Vendor_Zip type="text" name="Vendor_Zip" size="45"><label id="label">(ex.00000)</label>
    <br><br>
    <input type="submit" value="Submit Vendor">       
      <input name="reset" type="reset" src="images/reset_button.jpg" class="reset_button" />   
  </form>
	</body>
	
</html>
	 