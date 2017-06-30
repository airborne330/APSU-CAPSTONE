<?php
	require('central_concessions_db.php');
session_start();
			$query = "SELECT SUM(Qty) AS Total,Product_ID,Store_ID
FROM store_inventory
GROUP BY store_ID,Product_ID
ORDER BY Product_ID DESC";
			$statement = $db->prepare($query);
			$statement->execute();
			$Stores = $statement;
	
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
		 <li id="link_back"><a href = "stores.php" id="back_manager">Stores Page</a></li>

						<h3 id="location_header">Number of each item carried by Stores</h3>
   
	   <table style="width:100%" id="orders_table">
        	<tr>
            	<th width="auto">Total</th>
               <th width="auto">Product ID</th>
          	 <th width="auto">Store ID</th>
           		              
            </tr>
            <?php foreach ($Stores as $s) : ?>
            <tr>
            	<td><?php echo $s['Total']; ?></td>
               	<td><?php echo $s['Product_ID']; ?></td>  
               	<td><?php echo $s['Store_ID']; ?></td> 
		   </tr>
           <?php endforeach; ?>
	</table>
	<button onclick="window.print()">Print this page</button>
	</body>
	
</html>