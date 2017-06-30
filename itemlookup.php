<?php
	require('central_concessions_db.php');
	if(isset($_GET['Vendor_ID'])){
		$vendor = filter_input(INPUT_GET, 'Vendor_ID',FILTER_VALIDATE_INT);
		
		if($vendor != "Select Vendor:"){
			$query = "SELECT ProductID,Product_Name,Item_Cost,Item_Price,Exp_Date,Category_ID FROM products WHERE VendorID = :Vendor_ID";
			$statement = $db->prepare($query);
        	$statement->bindValue(':Vendor_ID', $vendor, PDO::PARAM_STR);
			$statement->execute();
			$vendors = $statement;
		}
	}
?>


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
		 <li id="link_back"><a href = "vendor.php" id="back_manager">Vendor Page</a></li>

						<h1 id="location_header">Items By Vendor</h1>
   
	   <table style="width:100%" id="orders_table">
        	<tr>
            	<th width="auto">Product ID</th>
               <th width="auto">Product Name</th>
               <th width="auto">Item Cost</th>
                <th width=auto>Item Price</th>
                <th width="auto">Expiration Date</th>
				<th width="auto">Category ID</th>
           		              
            </tr>
            <?php foreach ($vendors as $v) : ?>
            <tr>
            	<td><?php echo $v['ProductID']; ?></td>
               	<td><?php echo $v['Product_Name']; ?></td>
               	<td><?php echo $v['Item_Cost']; ?></td>
                <td><?php echo $v['Item_Price']; ?></td>
                <td><?php echo $v['Exp_Date']; ?></td>
                <td><?php echo $v['Category_ID']; ?></td>    
		   </tr>
           <?php endforeach; ?>
	</table>
	<button onclick="window.print()">Print this page</button>
	</body>
	
</html>