<?php
		require('central_concessions_db.php');
		session_start();
ob_start();

	if(isset($_GET['ProductID']) && isset($_GET['Qty']) && isset($_GET['Store_ID']))
	   {	
		$Store_ID = filter_input(INPUT_GET,'Store_ID');
		$ProductID = filter_input(INPUT_GET, 'ProductID');		
		$Qty = filter_input(INPUT_GET,'Qty');						
		
	    if($ProductID != "Select Product:" && $Qty != "" && $Store_ID != "")
	    {
	        $query ="INSERT INTO store_inventory (inventoryID,Store_ID,Product_ID,Qty) VALUES(NULL, :Store_ID,:ProductID,:Qty);";
			$statement = $db->prepare($query);
			$statement->bindValue(':Store_ID', $Store_ID, PDO::PARAM_STR);	
        	$statement->bindValue(':ProductID', $ProductID, PDO::PARAM_STR);			
			$statement->bindValue(':Qty', $Qty, PDO::PARAM_STR);	
           	$statement->execute();
			include('orders.php');
			//echo 'SUCCESS!';

		}

		
			if ($_GET['ProductID'] == 'Select Product:') {
        die('<script type="text/javascript">
			alert("Must select a Product");
			location.replace("storeqty.php")
			</script>');
	}
	if ($_GET['Qty'] == "") {
        die('<script type="text/javascript">
			alert("Must Enter a Quantity of Order");
			location.replace("storeqty.php")
			</script>');
	}
	if ($_GET['Store_ID'] == "") {
        die('<script type="text/javascript">
			alert("Must Enter a Store ID");
			location.replace("storeqty.php")
			</script>');
	}
	}

?>