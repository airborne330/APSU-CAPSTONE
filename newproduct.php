<?php
		require('central_concessions_db.php');
$now =  new DateTime();
ob_start();
	if(isset($_GET['prod_name']) && isset($_GET['cost']) && isset($_GET['price']) && isset($_GET['date']) && isset($_GET['qty']) && isset($_GET['category']) && isset($_GET['status']) && isset($_GET['vendor']))
	{
	    $productName = filter_input(INPUT_GET, 'prod_name');
	    $cost = filter_input(INPUT_GET, 'cost');
		$price = filter_input(INPUT_GET,'price');
		$date = filter_input(INPUT_GET,'date');
		$Qty = filter_input(INPUT_GET,'qty');	
		$category = filter_input(INPUT_GET,'category');
		$status = filter_input(INPUT_GET,'status');
		$vendor = filter_input(INPUT_GET,'vendor');
	    
	    if($productName != "" && $cost != "" && $price != "" && $date != "" && $Qty != ""  && $category != ""  && $status != ""  && $vendor != "")
	    {
	        $query ="INSERT INTO products(ProductID, Product_Name, Item_Cost, Item_Price, Exp_Date, Qty_on_Hand,Category_ID,Qty_Status,VendorID) VALUES (NULL,:prod_name,:cost,:price,:date,:qty,:category,:status,:vendor);";
			$statement = $db->prepare($query);
        	$statement->bindValue(':prod_name', $productName, PDO::PARAM_STR);
        	$statement->bindValue(':cost', $cost, PDO::PARAM_STR);
			$statement->bindValue(':price', $price, PDO::PARAM_STR);
			$statement->bindValue(':date', $date, PDO::PARAM_STR);
			$statement->bindValue(':qty', $Qty, PDO::PARAM_STR);	
			$statement->bindValue(':category', $category, PDO::PARAM_STR);	
			$statement->bindValue(':status', $status, PDO::PARAM_STR);	
			$statement->bindValue(':vendor', $vendor, PDO::PARAM_STR);	
           	$statement->execute();
			include('inventorypage.php');
			//echo 'SUCCESS!';

		}
		if ($_GET['prod_name'] == "") {
        die('<script type="text/javascript">
			alert("Must Enter a Product Name");
			location.replace("addnewproduct.php")
			</script>');
	}
		if ($_GET['cost'] == "") {
        die('<script type="text/javascript">
			alert("Must Enter a Product Cost");
			location.replace("addnewproduct.php")
			</script>');
	}
		if ($_GET['price'] == "") {
        die('<script type="text/javascript">
			alert("Must Enter a Product Price");
			location.replace("addnewproduct.php")
			</script>');
	}
			if ($_GET['date'] == "") {
        die('<script type="text/javascript">
			alert("Must Enter a Date");
			location.replace("addnewproduct.php")
			</script>');
	}
		if (new DATETIME($_GET['date']) < $now) {
        die('<script type="text/javascript">
			alert("Must Enter a Valid Date");
			location.replace("addnewproduct.php")
			</script>');
	}
		if ($_GET['qty'] == "") {
        die('<script type="text/javascript">
			alert("Must Enter a Quantity");
			location.replace("addnewproduct.php")
			</script>');
	}
		if ($_GET['qty'] >= 0) {
        die('<script type="text/javascript">
			alert("Must Enter a Positive Quantity");
			location.replace("addnewproduct.php")
			</script>');
	}
		if ($_GET['category'] == "") {
        die('<script type="text/javascript">
			alert("Must Enter a Category ID");
			location.replace("addnewproduct.php")
			</script>');
	}
		if ($_GET['status'] == "") {
        die('<script type="text/javascript">
			alert("Must Enter a Status of stock on hand");
			location.replace("addnewproduct.php")
			</script>');
	}
		if ($_GET['vendor'] == "") {
        die('<script type="text/javascript">
			alert("Must Enter a Vendor ID");
			location.replace("addnewproduct.php")
			</script>');
	}
	}
?>