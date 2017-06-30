<?php
	
	require_once('central_concessions_db.php');
	session_start();
	$Store_ID = filter_input(INPUT_POST,'Store_ID',FILTER_VALIDATE_INT);
	if(!isset($_SESSION['Store_ID']))
	{
    	$_SESSION['Store_ID'] = filter_input(INPUT_POST, 'Store_ID');
	}
		$query = "SELECT * FROM store_inventory
					WHERE Store_ID = :Store_ID";

		$statement=$db->prepare($query);
		$statement->bindValue(':Store_ID', $_SESSION['Store_ID'], PDO::PARAM_STR);
		$statement->execute();
		$orders = $statement;
		
		foreach($orders as $order)
	{
		$items = $order['inventoryID']; //this stores the title of the user. Might want to use a title id in the tables
	}
	
	if(!isset($items) || $items== NULL)
	{
		include('no_orders.php');
	}else
	{
		include('order_details.php');
	}
	ob_start();
?>