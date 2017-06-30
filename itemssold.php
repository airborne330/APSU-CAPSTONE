<?php
	require('central_concessions_db.php');


$query = "SELECT Store_ID,transaction.ProductID,transaction.Item_Price,products.Item_Cost,count(transaction.ProductID) AS Items_Sold,SUM(Qty) AS Amount_Sold
FROM transaction JOIN vendors ON transaction.Vendor_ID = vendors.Vendor_ID
JOIN products ON vendors.Vendor_ID = products.VendorID
GROUP BY Store_ID,ProductID,Item_Price;";

		$statement=$db->prepare($query);
		$statement->execute();
		$itemsSold = $statement;

?>
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
 <li id="link_back"><a href = "stores.php" id="back_manager">Store Page</a></li>
 
  
  <br>
<h1 id="location_header">Amount Sold per Store</h1>
   
	   <table style="width:100%" id="orders_table">
        	<tr>
            	<th width="auto">Store ID</th>
               <th width="auto">Product ID</th>
               <th width="auto">Item Price</th>
               <th width="auto">Item Cost</th>
                <th width=auto>Items Sold</th>
                <th width="auto">Amount Sold</th>            
           		              
            </tr>
            <?php foreach ($itemsSold as $is) : ?>
            <tr>
            	<td><?php echo $is['Store_ID']; ?></td>
               	<td><?php echo $is['ProductID']; ?></td>
               	<td><?php echo $is['Item_Price']; ?></td>
               	<td><?php echo $is['Item_Cost']; ?></td>
                <td><?php echo $is['Items_Sold']; ?></td>
                <td><?php echo $is['Amount_Sold']; ?></td>    
             </tr>
           <?php endforeach; ?>
        </table>
  <br>         
	</body>
</html>