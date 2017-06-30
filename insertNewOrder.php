<?php
		require('central_concessions_db.php');
		session_start();

ob_start();
	if(isset($_GET['ProductID']) && isset($_GET['Item_Price']) && isset($_GET['Order_Date']) && isset($_GET['Qty']) && isset($_GET['Store_ID']) && isset($_GET['Vendor_ID']))
	{
	    $ProductID = filter_input(INPUT_GET, 'ProductID');
	    $Item_Cost = filter_input(INPUT_GET, 'Item_Price');
		$Order_Date = filter_input(INPUT_GET,'Order_Date');
		$Qty = filter_input(INPUT_GET,'Qty');
		$Store_ID = filter_input(INPUT_GET,'Store_ID');				
		$Vendor_ID = filter_input(INPUT_GET,'Vendor_ID');
	    
	    if($ProductID != "" && $Item_Cost != "" && $Order_Date != "" && $Qty != "" && $Store_ID != "" && $Vendor_ID != "")
	    {
	        $query ="INSERT INTO orders (Order_ID,ProductID,Item_Price,Order_Date,Qty,Store_ID,Vendor_ID) VALUES(NULL, :ProductID, :Item_Price, :Order_Date, :Qty, :Store_ID, :Vendor_ID);";
			$statement = $db->prepare($query);
        	$statement->bindValue(':ProductID', $ProductID, PDO::PARAM_STR);
        	$statement->bindValue(':Item_Price', $Item_Cost, PDO::PARAM_STR);
			$statement->bindValue(':Order_Date', $Order_Date, PDO::PARAM_STR);
			$statement->bindValue(':Qty', $Qty, PDO::PARAM_STR);
			$statement->bindValue(':Store_ID', $Store_ID, PDO::PARAM_STR);			
			$statement->bindValue(':Vendor_ID', $Vendor_ID, PDO::PARAM_STR);
           	$statement->execute();
			include('orders.php');
			//echo 'SUCCESS!';

		}
			if ($_GET['ProductID'] == 'Select Product:') {
        die('<script type="text/javascript">
			alert("Must select a Product");
			location.replace("neworder.php")
			</script>');
	}
	if ($_GET['Item_Price'] == "") {
        die('<script type="text/javascript">
			alert("Must Enter an Item Price");
			location.replace("neworder.php")
			</script>');
	}
	if ($_GET['Order_Date'] == "") {
        die('<script type="text/javascript">
			alert("Must Enter a Date of Order");
			location.replace("neworder.php")
			</script>');
	}
	if ($_GET['Qty'] == "") {
        die('<script type="text/javascript">
			alert("Must Enter a Quantity of Order");
			location.replace("neworder.php")
			</script>');
	}
	if ($_GET['Store_ID'] == "") {
        die('<script type="text/javascript">
			alert("Must Enter a Store ID");
			location.replace("neworder.php")
			</script>');
	}
			if ($_GET['Vendor_ID'] == "") {
        die('<script type="text/javascript">
			alert("Must Enter a Vendor ID");
			location.replace("neworder.php")
			</script>');
	}
	}
?>