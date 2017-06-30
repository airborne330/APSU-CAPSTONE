<?php 
	require('central_concessions_db.php');
	session_start();
	$total_price_sum = 0; 
$With_tax = 0;
$total = 0;
$inID = filter_input(INPUT_POST,'inventoryID',FILTER_VALIDATE_INT);
		

	$query = "SELECT inventoryID,Store_ID,Order_Date,Product_ID,Qty,Item_Price,SUM(Qty * Item_Price) AS Total
FROM store_inventory
WHERE inventoryID = :inventoryID
GROUP BY inventoryID,Product_ID,Item_Price,Store_ID,Qty,Order_Date";				
				
	$statement = $db->prepare($query);
	$statement->bindValue(':inventoryID', $inID); //bind query headings to session username and password
	$statement->execute();
	$orders = $statement;	

unset($inID);
?>
<!DOCTYPE html>
<html id="Transaction">
<head>
	<title>Transaction</title>
</head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
  <link href="main.css" rel="stylesheet" type="text/css">
  <body id="Transaction">
<li id="link_back"><a href="orders.php" id="back_manager">Orders Page</a></li>
 <br><br>
  <table>
  			<table style="width:100%" id="Trans_table">
           		<th width="193">Inventory ID</th>
				<th width="193">Store ID</th>
                <th width="324">Order Date</th>
				<th width="300">Product_ID</th>
                <th width="218">Qty</th> 
               <th width="218">Item_Price</th>
               <th width="218">Total</th>             
            </tr>
            	  <?php foreach($orders as $order) : ?>
            <tr>
            	<td><?php echo $order['inventoryID']; ?></td>				
            	<td><?php echo $order['Store_ID']; ?></td>
               <td><?php echo $order['Order_Date']; ?></td>
                <td><?php echo $order['Product_ID']; ?></td>
                <td><?php echo $order['Qty']; ?></td>
                <td><?php echo $order['Item_Price']; ?></td>
                <td><?php echo $order['Total'];?></td>
       	<?php 
                    $selling_price = $order['Total'];
					$With_tax = ($selling_price * .09) + $With_tax;
                    $selling_price_float = floatval($selling_price);
                    $total_price_sum= $total_price_sum + $selling_price_float;
					$total = $total_price_sum + $With_tax;
				?>
           </tr>
         <?php endforeach; ?>
	  </table>
	  <br>
	     	 	<div class="pull-right">
		<div class="span">
			<div class="alert alert-success"><i class="icon-credit-card icon-large"></i>Before Tax: $<?php echo $total_price_sum
	; ?><br>&nbsp;Tax Amount(9%):&nbsp;$<?php echo $With_tax ?><br>&nbsp;Total:&nbsp;$<?php echo $total; ?></div>
		</div>
	</div>
	  <form>
		  <button id="printbutton" onclick="window.print();">Print Receipt</button
	  </form>
</body>
</html>