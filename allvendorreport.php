<?php
	require('central_concessions_db.php');
	
		session_start();
	//$Product_ID = filter_input(INPUT_POST,'Product_ID',FILTER_VALIDATE_INT);
	$query = "SELECT * FROM vendors";
		
	$statement = $db->prepare($query);
	$statement->execute();
	$vendors = $statement;
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
           		<th width="193">Vendor ID</th>
				<th width="193">Company Name</th>
                <th width="324">Street</th>
				<th width="300">City</th>
                <th width="218">State</th>
                <th width="218">Zip Code</th>            
            </tr>
            	  <?php foreach($vendors as $vendor) : ?>
            <tr>
            	<td><?php echo $vendor['Vendor_ID']; ?></td>				
            	<td><?php echo $vendor['Vendor_Name']; ?></td>
                <td><?php echo $vendor['Vendor_Street']; ?></td>
                <td><?php echo $vendor['Vendor_City']; ?></td>
                <td><?php echo $vendor['Vendor_State'];?></td>
                <td><?php echo $vendor['Vendor_Zip'];?></td>
           </tr>
         <?php endforeach; ?>
	  </table>
 <form method="post" action="allvendorexport.php">
     <input type="submit" name="export" class="btn btn-success" value="Export" />
    </form>
</body>
</html>