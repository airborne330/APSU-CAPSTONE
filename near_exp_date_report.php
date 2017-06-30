<?php 
if(isset($_POST['search']))
{
	$DateToSearch = $_POST['DateToSearch'] ? $_POST['DateToSearch'] : false;
	$NumberDays = $_POST['NumberDays'];
	$query = "SELECT ProductID, Product_Name, Exp_Date, VendorID 
				FROM products
				WHERE Exp_Date >= DATE('" .$DateToSearch . "')
				AND Exp_Date <= DATE_ADD(DATE('" .$DateToSearch . "'), INTERVAL '" .$NumberDays . "' DAY)";
	$search_result = filterTable($query);
}
else {
	$query = "SELECT ProductID, Product_Name, Exp_Date, VendorID FROM products ";
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
    <title>Products Near Expiration Date</title>
    <link href="main.css" rel="stylesheet">
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
</head>
	<body>
	<li id="link_back"><a href = "reports.php" id="back_manager">Reports</a></li><br><br>
	
		<h2>Product Near Expiration Date Search</h2><br><br>
		
		<form action="near_exp_date_report.php" method="post">
			<p>&nbsp;&nbsp;<label for="search_date">Product Date From : </label><input id="DateToSearch" type="date"  
				name="DateToSearch" value="2017-01-01" /></p>
			<p>&nbsp;&nbsp;<label for="days_to_add">Number of Days From Date Selected : </label><input id="NumberDays" type="numeric"  
				name="NumberDays" value="0" /></p><br>
			&nbsp;&nbsp;<input type="submit" name="search" value="Filter"><br><br>
			
			<p><label>Date That Was Entered&nbsp;&nbsp;<?php echo @$DateToSearch ?></label></p>
			<p><label>Number Of Days Entered&nbsp;&nbsp;<?php echo @$NumberDays ?></label></p><br>
		
			<table style="width:100%" id="orders_table"> 			
				<tr>
					<th width="193">Product ID</th>
					<th width="193">Product Name</th>
					<th width="193">Expiration Date</th>
					<th width="193">Vendor ID</th>
				</tr>
					<?php while($row = mysqli_fetch_array($search_result)): ?>
					<tr>
						<td><?php echo $row['ProductID']; ?></td>
						<td><?php echo $row['Product_Name']; ?></td>
						<td><?php echo $row['Exp_Date']; ?></td>
						<td><?php echo $row['VendorID']; ?></td>
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