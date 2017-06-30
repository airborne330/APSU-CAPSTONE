<?php
	require('central_concessions_db.php');
	
	$Bid_ID = filter_input(INPUT_POST,'Bid_ID',FILTER_VALIDATE_INT);
	$query="DELETE FROM bids WHERE BidID = :Bid_ID";
	$statement4=$db->prepare($query);
	$statement4->bindValue(':Bid_ID',$Bid_ID);
	$statement4->execute();
	$statement4->closeCursor();
/*------------------------------------------------------------------------------------------------*/
$query = "SELECT * FROM bids";

		$statement1=$db->prepare($query);
		$statement1->execute();
		$bids = $statement1;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Bids</title>	
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>  
  <link href="main.css" rel="stylesheet" type="text/css">
</head>

<body>
<li id="link_back"><a href = "manager.php" id="back_manager">Manager Menu</a></li>
<br></br><br></br>
<h1 id="location_header">Bids</h1>
   
	   <table style="width:100%" id="orders_table">
        	<tr>
            	<th width="auto">Bid ID</th>
               <th width="auto">Bid Street</th>
               <th width="auto">Bid City</th>
                <th width=auto> Bid State</th>
                <th width=auto> Bid Status</th>
                <th width="auto">Rent Cost</th>
				<th width="auto">License Cost</th>
          		 <th width="auto">Inspection Cost</th>             
           		              
            </tr>
            <?php foreach ($bids as $b) : ?>
            <tr>
            	<td><?php echo $b['BidID']; ?></td>
               	<td><?php echo $b['Bid_Street']; ?></td>
               	<td><?php echo $b['Bid_City']; ?></td>
                <td><?php echo $b['Bid_State']; ?></td>
                <td><?php echo $b['BidStatus']; ?></td>
                <td><?php echo $b['rent']; ?></td>
                <td><?php echo $b['license']; ?></td>   
                <td><?php echo $b['inspect']; ?></td>    
				<td><form action="stores.php" method="post">
                		<input type ="hidden" name ="Bid_ID" value ="<?php echo $b['BidID']; ?>"/>
                        <input type="submit" name="delete" value="Delete"/>                
               </form></td> 
             </tr>
           <?php endforeach; ?>
        </table>
          <br>
     <form method="post" action="exportbids.php">
     <input type="submit" name="export" class="btn btn-success" value="Export" />
    </form>
     <div class="col-md-6">
  <form id="add_employee_form" method="get" action="addnewbid.php">
    <input type="submit" value="Add New Store Bid">           
  </form>
  <br><br>
	</div>
    <div class="col-md-6">
  <form id="add_employee_form" method="get" action="updatebidstatus.php">
    <input type="submit" value="Update Bid">           
  </form>
   <br><br>
</body>

</html>
