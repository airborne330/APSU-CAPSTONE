<?php
			require('central_concessions_db.php');

			$query = "SELECT * FROM products";

		$statement=$db->prepare($query);
		$statement->execute();
		$products = $statement;

		$query = "SELECT * FROM category";

		$statement1=$db->prepare($query);
		$statement1->execute();
		$category = $statement1;
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
	<h1 id="location_header">Categories</h1>
   
	   <table style="width:100%" id="orders_table">
        	<tr>
            	<th width="auto">Category ID</th>
               <th width="auto">Category Name</th>
               <th width="auto">Category Description</th>          
            </tr>
            <?php foreach ($category as $c) : ?>
            <tr>
            	<td><?php echo $c['Category_ID']; ?></td>
               	<td><?php echo $c['Category_Name']; ?></td>
               	<td><?php echo $c['Category_Description']; ?></td>     
             </tr>
           <?php endforeach; ?>
        </table>
          <br>
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
  <h1 id="location_header">Products</h1>
   
	   <table style="width:100%" id="orders_table">
        	<tr>
            	<th width="auto">Product ID</th>
               <th width="auto">Product Name</th>
               <th width="auto">Purchase Cost</th>
                <th width=auto>Sale Price</th>
                <th width="auto">Expiration Date</th>
				<th width="auto">Quantity in Stock</th>
          		<th width="auto">Category ID</th>
           		 <th width="auto">Status</th>  
           		 <th width="auto">Vendor ID</th>           
            </tr>
            <?php foreach ($products as $product) : ?>
            <tr>
            	<td><?php echo $product['ProductID']; ?></td>
               	<td><?php echo $product['Product_Name']; ?></td>
               	<td><?php echo $product['Item_Cost']; ?></td>
                <td><?php echo $product['Item_Price']; ?></td>
                <td><?php echo $product['Exp_Date']; ?></td>
                <td><?php echo $product['Qty_on_Hand']; ?></td>  
                <td><?php echo $product['Category_ID']; ?></td> 
                <td><?php echo $product['Qty_Status']; ?></td> 
                <td><?php echo $product['VendorID']; ?></td>      
             </tr>
           <?php endforeach; ?>
        </table>
          <br>
   <div class="col-md-6">
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
    <input id="date" type="text" name="date" size="45">
     <br>
    <label id="label">Quantity on Hand:</label><br>
    <input id="qty" type="text" name="qty" size="45">
     <br>
    <label id="label">Category ID:</label><br>
    <input id="category" type="text" name="category" size="45">
     <br>
    <label id="label">Status:</label><br>
    <input id="status" type="text" name="status" size="45">
    <br>
    <label id="label">Vendor ID:</label><br>
    <input id="vendor" type="text" name="vendor" size="45">
    <br><br>
    <input type="submit" value="Submit Category">           
  </form>
	</div>
	<div class="col-md-6">
		 <h1 id="add_employee_title">Update Product Quantity</h1>
  <form id="add_employee_form" method="get" action="updateProduct.php">
	<label id="label">Quatity On Hand:</label><br>
    <input id="Qty_on_Hand" type="text" name="Qty_on_Hand" size="45">
    <br>
    <label id="label">Product ID:</label><br>
    <input id="productid" type="text" name="productid" size="45">
    <br><br>
    <input type="submit" value="Submit Product Update">           
  </form>
  <br>
  <li id="link_back"><a href = "employee.php" id="back_manager">Employee Menu</a></li>
	</div>
  <br> <br>
    
</body>
</html>