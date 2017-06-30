<?php
	require('central_concessions_db.php');
	session_start();
	//$Product_ID = filter_input(INPUT_POST,'Product_ID',FILTER_VALIDATE_INT);
	$query = "SELECT * FROM products";
				
				
	$statement = $db->prepare($query);
	//$statement->bindValue(':Product_ID', $Store_ID); //bind query headings to session username and password
	$statement->execute();
	$products = $statement;

	$query = "SELECT * FROM products";
				
				
	$statement1 = $db->prepare($query);
	//$statement->bindValue(':Product_ID', $Store_ID); //bind query headings to session username and password
	$statement1->execute();
	$products2 = $statement1;
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
  <li id="link_back"><a href="orders.php" id="back_manager">Orders Page</a></li><br><br>
    <h1 id="add_employee_title">Add New Order</h1>
  <form id="add_employee_form" method="get" action="insertNewOrder.php">
	<label id="label">Product ID by Name:</label><br>
    <!--<input id="ProductID" type="text" name="ProductID" size="45">-->
	  <select id="ProductID" name="ProductID" style="width: 300px;">
		  <option>Select Product:</option>
		               <?php foreach($products2 as $p) : ?>
			 
				 <option value="<?php echo $p['ProductID']; ?>"><?php echo $p['Product_Name']; ?></option>
			  
           <?php endforeach; ?>
	  </select>
	  
    <br>
	<label id="label">Item Price:</label><br>
    <input id="Item_Price" type="text" name="Item_Price" size="45">
    <br>
    <label id="label">Order Date:</label><br>
    <input type="text" id="Order_Date" name="Order_Date" size="45">
    <br>
    <label id="label">Quantity:</label><br>
    <input id="Qty" type="text" name="Qty" size="45">
    <br>
    <label id="label">Store ID:</label><br>
    <input id=Store_ID type="text" name="Store_ID" size="45">
    <br>
    <label id="label">Vendor ID:</label><br>
    <input id="Vendor_ID" type="text" name="Vendor_ID" size="45">
    <br><br>
    <input type="submit" value="Submit Order">   
       <input name="reset" type="reset" src="images/reset_button.jpg" class="reset_button" />   
                 
  </form>
  <br>
   <form id="add_employee_form" method="get" action="ordervendor.php">
   <input type="submit" value="Order From Vendor">
	  </form>
  <table>
  			<table style="width:100%" id="orders_table">
           		<th width="193">Product ID</th>
				<th width="193">Product Name</th>
                <th width="324">Item Price</th>
				<th width="300">Expiration Date</th>
                <th width="218">Quantity on Hand</th>
                <th width="218">Vendor ID</th>
                <th width="218">Category ID</th> 
                <th width="218">Quantity Status</th>            
            </tr>
            	  <?php foreach($products as $product) : ?>
            <tr>
            	<td><?php echo $product['ProductID']; ?></td>				
            	<td><?php echo $product['Product_Name']; ?></td>
                <td><?php echo $product['Item_Price']; ?></td>
                <td><?php echo $product['Exp_Date']; ?></td>
                <td><?php echo $product['Qty_on_Hand'];?></td>
                <td><?php echo $product['VendorID'];?></td>
                <td><?php echo $product['Category_ID'];?></td>
                <td><?php echo $product['Qty_Status'];?></td>
           </tr>
         <?php endforeach; ?>
	  </table>
	  <br>
</body>
</html>