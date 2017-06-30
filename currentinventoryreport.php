<?php
	require('central_concessions_db.php');
	
		session_start();
	//$Product_ID = filter_input(INPUT_POST,'Product_ID',FILTER_VALIDATE_INT);
	$query = "SELECT * FROM products";
		
	$statement = $db->prepare($query);
	$statement->execute();
	$orders = $statement;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Bids Report</title>
    <link href="main.css" rel="stylesheet">
  </head>
 <body>
 <li id="link_back"><a href = "reports.php" id="back_manager">Reports</a></li><br><br>
 	<table>
 <table style="width:100%" id="orders_table">
           		<th width="193">Product ID</th>
				<th width="193">Product Name</th>
                <th width="324">Item Cost</th>
				<th width="300">Item Price</th>
                <th width="218">Expiration Date</th>
                <th width="218">Quantity on Hand</th>
                <th width="218">Category ID</th> 
                <th width="218">Status</th>
                <th width="218">Vendor ID</th>             
            </tr>
            	  <?php foreach($orders as $order) : ?>
            <tr>
            	<td><?php echo $order['ProductID']; ?></td>				
            	<td><?php echo $order['Product_Name']; ?></td>
                <td><?php echo $order['Item_Cost']; ?></td>
                <td><?php echo $order['Item_Price']; ?></td>
                <td><?php echo $order['Exp_Date'];?></td>
                <td><?php echo $order['Qty_on_Hand'];?></td>
                <td><?php echo $order['Category_ID'];?></td>
                <td><?php echo $order['Qty_Status'];?></td>
                <td><?php echo $order['VendorID'];?></td>
           </tr>
         <?php endforeach; ?>
	  </table>
 <form method="post" action="inventoryreport.php">
     <input type="submit" name="export" class="btn btn-success" value="Export" />
    </form>
</body>
</html>