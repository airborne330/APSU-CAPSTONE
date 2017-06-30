<?php
require('central_concessions_db.php');
	session_start();
	//$Product_ID = filter_input(INPUT_POST,'Product_ID',FILTER_VALIDATE_INT);
	$query = "SELECT DISTINCT vendors.Vendor_ID,category.Category_Name
FROM vendors JOIN products on vendors.Vendor_ID=products.VendorID
JOIN category ON products.Category_ID=category.Category_ID
ORDER BY vendors.Vendor_ID";				
	$statement5 = $db->prepare($query);
	//$statement->bindValue(':Product_ID', $Store_ID); //bind query headings to session username and password
	$statement5->execute();
	$vendor = $statement5;
/**************************************************************************************************************/

	$query = "SELECT Vendor_ID, Vendor_Name FROM vendors ";				
	$statement1 = $db->prepare($query);
	//$statement->bindValue(':Product_ID', $Store_ID); //bind query headings to session username and password
	$statement1->execute();
	$vendors = $statement1;
/**************************************************************************************************************/

	$query = "SELECT Category_ID, Category_Name FROM category ";				
	$statement2 = $db->prepare($query);
	//$statement->bindValue(':Category_ID', $Category_Name); //bind query headings to session username and password
	$statement2->execute();
	$category = $statement2;
/**************************************************************************************************************/

	$query = "SELECT DISTINCT Qty_Status FROM products ";				
	$statement3 = $db->prepare($query);
	//$statement->bindValue(':Product_ID', $Qty_Status); //bind query headings to session username and password
	$statement3->execute();
	$status = $statement3;



?>

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
<br>
 <li id="link_back"><a href="inventorypage.php" id="back_manager">Inventory Page</a></li>
   <h1 id="add_employee_title">Add New Product</h1>
  <form id="add_employee_form" method="get" action="newproduct.php">
	<label id="label">Product Name:</label><br>
    <input id="prod_name" type="text" name="prod_name" size="45">
    <br>
    <label id="label">Purchase Cost:</label><br>
    <input id="cost" type="text" name="cost" size="45">
    <br>
    <label id="label">Sale Price:</label><br>
    <input id="price" type="text" name="price" size="45">
     <br>
    <label id="label">Expiration Date:</label><br>
	  <input id="date" type="date" name="date" size="45" value="sysdate">
     <br>
    <label id="label">Quantity on Hand:</label><br>
    <input id="qty" type="text" name="qty" size="45">
     <br>
    <label id="label">Category ID:</label><br>
    <select id="Category_ID" name="category" style="width: 300px;">
		  <option>Select Category:</option>
		               <?php foreach($category as $c) : ?>
			 
			<option value="<?php echo $c['Category_ID']; ?>"><?php echo $c['Category_Name'].' '."(". $c['Category_ID'].")"; ?></option>
			  
           <?php endforeach; ?>
	  </select>

     <br>
    <label id="label">Status:</label><br>
    <select id="Status_ID" name="status" style="width: 300px;">
		  <option>Select Status:</option>
		               <?php foreach($status as $s) : ?>
			 
				 <option value="<?php echo $s['Qty_Status']; ?>"><?php echo $s['Qty_Status']; ?></option>
			  
           <?php endforeach; ?>
	  </select>

    <br>
    <label id="label">Vendor By Name:</label><br>
         	  <select id="Vendor_ID" name="vendor" style="width: 300px;">
		  <option>Select Vendor:</option>
		               <?php foreach($vendors as $v) : ?>
			 
				 <option value="<?php echo $v['Vendor_ID']; ?>"><?php echo $v['Vendor_Name'].' '."(". $v['Vendor_ID'].")"; ?></option>
			  
           <?php endforeach; ?>
	  </select>
    <br><br>
    <input type="submit" value="Submit New Product">           
  </form>
</body>
</html>