<!DOCTYPE html>
<html>
<head>
	<title>Stores</title>	
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
  <link href="main.css" rel="stylesheet" type="text/css">
</head>
<body>
 <li id="link_back"><a href = "bids.php" id="back_manager">Bids Page</a></li>
  <h1 id="add_employee_title">Add Bid</h1>
  <form id="add_employee_form" method="get" action="addbid.php">
	<label id="label">Bid Street:</label><br>
    <input id="street" type="text" name="street" size="45">
    <br>
    <label id="label">Bid City:</label><br>
    <input id="city" type="text" name="city" size="45">
    <br>
    <label id="label">Bid State:</label><br>
    <input id="state" type="text" name="state" size="45"><label id="label">(i.e. TN,KY)</label>
     <br>
     <label id="label">Bid Status:</label><br>
	  <input id="status" type="text" name="status" size="45"><label id="label">('Y' or 'N')</label>
     <br>
    <label id="label">Rent Cost:</label><br>
    <input id="rent" type="text" name="rent" size="45">
     <br>
    <label id="label">License Cost:</label><br>
    <input id="license" type="text" name="license" size="45">
     <br>
    <label id="label">Inspection Cost:</label><br>
    <input id="inspect" type="text" name="inspect" size="45">
    <br><br>
    <input type="submit" value="Add Store Bid">   
    <input name="reset" type="reset" src="images/reset_button.jpg" class="reset_button" />        
  </form>
  <br><br>
 
</body>

</html>