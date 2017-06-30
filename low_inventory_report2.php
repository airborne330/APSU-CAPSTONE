<?php 
if(isset($_POST['search']))
{
	$QtyToSearch = $_POST['QtyToSearch'] ? $_POST['QtyToSearch'] : false;
	$query = "SELECT * FROM `products` WHERE `Qty_on_Hand` < '" .$QtyToSearch . "' ";
	$search_result = filterTable($query);
}
else {
	$query = "SELECT `ProductID`, `Product_Name`, `Qty_on_Hand` FROM `products`";
	$search_result = filterTable($query);
}

	function filterTable($query)
	{
		
		$connect = mysqli_connect("austinholmes.net.mysql", "austinholmes_net", "anthony1114", "austinholmes_net");
		$filter_Result = mysqli_query($connect, $query);
		return $filter_Result;
		
	}
	
	
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Low Inventory Report Search</title>
    <link href="main.css" rel="stylesheet">

</head>
	<body>
	<style>
		h2	{font-size: 50px;
			color: #ffffff;
			text-transform: uppercase;
			font-weight: normal;
			line-height: 1;
			text-align: center;
			margin: 0px 50px 0 50px;
			padding-top: 0px; }
		p {color:#ffffff;}
	</style>
	<li id="link_back"><a href = "reports.php" id="back_manager">Reports</a></li><br><br>
		
		<h2>Low Inventory Report Search</h2><br><br>
		
		<form action="low_inventory_report2.php" method="post">
			<p>&nbsp;&nbsp;Display Inventory Below This Amount &nbsp;<input type="text" name="QtyToSearch" 
			placeholder="Qty To Search"></p><br>
			&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="search" value="Filter"><br><br>
			
			<table style="width:100%" id="orders_table"> 			
				<tr>
					<th width="193">Product ID</th>
					<th width="193">Product Name</th>
					<th width="324">Qty On Hand</th>          
				</tr>
					<?php while($row = mysqli_fetch_array($search_result)): ?>
					<tr>
						<td><?php echo $row['ProductID']; ?></td>
						<td><?php echo $row['Product_Name']; ?></td>
						<td><?php echo $row['Qty_on_Hand']; ?></td>
					</tr>
					<?php endwhile; ?>
			</table>
		</form>
		<SCRIPT LANGUAGE="JavaScript"> 
			if (window.print) {
			document.write('<form><input type=button name=print value="Print Page"onClick="window.print()"></form>');
			}
		</script>

		
	
	</body>
</html>