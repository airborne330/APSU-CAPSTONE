<?php
		require('central_concessions_db.php');
		session_start();

ob_start();

	if(isset($_POST['ProductID']) && isset($_POST['Item_Price']) && isset($_POST['Order_Date']) && isset($_POST['Qty']) && isset($_POST['Store_ID']))
	{
	    $ProductID = filter_input(INPUT_POST, 'ProductID');
	    $Item_Cost = filter_input(INPUT_POST, 'Item_Price');
		$Order_Date = filter_input(INPUT_POST,'Order_Date');
		$Qty = filter_input(INPUT_POST,'Qty');
		$Store_ID = filter_input(INPUT_POST,'Store_ID');				
	    
	    if($ProductID != "" && $Item_Cost != "Price" && $Order_Date != "" && $Qty != "" && $Store_ID != "")
	    {
	        $query ="INSERT INTO transaction (TransactionID,ProductID,Item_Price,Qty,Order_Date,Store_ID) VALUES(NULL, :ProductID, :Item_Price,:Qty, :Order_Date, :Store_ID);";
			$statement = $db->prepare($query);
        	$statement->bindValue(':ProductID', $ProductID, PDO::PARAM_STR);
        	$statement->bindValue(':Item_Price', $Item_Cost, PDO::PARAM_STR);
			$statement->bindValue(':Order_Date', $Order_Date, PDO::PARAM_STR);
			$statement->bindValue(':Qty', $Qty, PDO::PARAM_STR);
			$statement->bindValue(':Store_ID', $Store_ID, PDO::PARAM_STR);			
           	$statement->execute();
			include('store_transaction.php');
			//echo 'SUCCESS!';

		}
			if ($_POST['ProductID'] == 'Select Product:') {
        die('<script type="text/javascript">
			alert("Must select a Product");
			location.replace("store_transaction.php")
			</script>');
	}
	if ($_POST['Order_Date'] == "") {
        die('<script type="text/javascript">
			alert("Must Enter a Date of Order");
			location.replace("store_transaction.php")
			</script>');
	}
	if ($_POST['Qty'] == "") {
        die('<script type="text/javascript">
			alert("Must Enter a Quantity of Order");
			location.replace("store_transaction.php")
			</script>');
	}
	if ($_POST['Store_ID'] == "") {
        die('<script type="text/javascript">
			alert("Must Enter a Store ID");
			location.replace("store_transaction.php")
			</script>');
	}
	}
?>