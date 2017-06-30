<?php
if(isset($_POST['search1']))
{
    $ValueSearch = $_POST['value1'];
    $query = "SELECT * FROM `products` WHERE ProductID = '".$ValueSearch."'";
    $SearchResult = filterTable($query);
}
else if(isset($_POST['search2']))
{
    $ValueSearch = $_POST['value2'];
    $query = "SELECT * FROM `products` WHERE Product_Name = '".$ValueSearch."'";
    $SearchResult = filterTable($query);
}
else if(isset($_POST['search3']))
{
    $ValueSearch = $_POST['value3'];
    $query = "SELECT * FROM `products` WHERE Category_ID = '".$ValueSearch."'";
    $SearchResult = filterTable($query);
}
else if(isset($_POST['search4']))
{
    $FirstQty = $_POST['FirstQty'];
	$SecondQty = $_POST['SecondQty'];
    $query = "SELECT * FROM `products` 
				WHERE `Qty_on_Hand` BETWEEN '".$FirstQty."' AND '".$SecondQty."'
				ORDER BY `Qty_on_Hand` ASC;";
    $SearchResult = filterTable($query);
}
else if(isset($_POST['all']))
{
    $query = "SELECT * FROM `products`";
    $SearchResult = filterTable($query);
}

function filterTable($query){
    $username="austinholmes_net";
    $password="anthony1114";
    $database="austinholmes_net";
    $connect = mysqli_connect("austinholmes.net.mysql",$username,$password,$database);
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}
?>
<?php

// php select option value from database

$hostname = "austinholmes.net.mysql";
$username = "austinholmes_net";
$password = "anthony1114";
$databaseName = "austinholmes_net";

// connect to mysql database

$connect = mysqli_connect($hostname, $username, $password, $databaseName);

// mysql select query1
$query1 = "SELECT ProductID FROM `products` ORDER BY ProductID";

// mysql select query2
$query2 = "SELECT Product_Name FROM `products`ORDER BY Product_Name";

// mysql select query3
$query3 = "SELECT DISTINCT Category_ID FROM `products` ORDER BY Category_ID";

// mysql select query4
$query4 = "SELECT * FROM `products` ORDER BY ProductID";

// for method 1

$result1 = mysqli_query($connect, $query1);
$result2 = mysqli_query($connect, $query2);
$result3 = mysqli_query($connect, $query3);
$result4 = mysqli_query($connect, $query4);

?>

<!doctype html>
<html>
    <head>
    <meta charset="utf-8">
    <title>Inventory Report</title>
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
		
		<h2>Inventory Report</h2><br><br>
		
	<form action='inventory_report.php' method='POST'>
    <p>&nbsp;&nbsp;Select Inventory by Product ID:

    <select name='value1'>
	
			<option value=''>...</option>

        <?php while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[0];?>"><?php echo $row1['ProductID'];?></option>

        <?php endwhile;?>
		
	</select>&nbsp;&nbsp;

    <input type='submit' name='search1' value='Search Product ID'></p><br>
	
	    <p>&nbsp;&nbsp;Select Inventory by Product Name:

    <select name='value2'>
	
			<option value=''>...</option>

        <?php while($row1 = mysqli_fetch_array($result2)):;?>

            <option value="<?php echo $row1[0];?>"><?php echo $row1['Product_Name'];?></option>

        <?php endwhile;?>
		
	</select>&nbsp;&nbsp;

    <input type='submit' name='search2' value='Search Product Name'></p><br>
		
	    <p>&nbsp;&nbsp;Select Inventory by Category ID:

    <select name='value3'>
	
			<option value=''>...</option>

        <?php while($row1 = mysqli_fetch_array($result3)):;?>

            <option value="<?php echo $row1[0];?>"><?php echo $row1['Category_ID'];?></option>

        <?php endwhile;?>
		
	</select>&nbsp;&nbsp;

    <input type='submit' name='search3' value='Search Category ID'></p><br>
			
	    <p>&nbsp;&nbsp;Sort Inventory by Qty on Hand:

   		<p>&nbsp;&nbsp;<label for="first_qty_amount">First Qty Amount : </label><input id="FirstQty" type="numeric" name="FirstQty" value="0" /></p>
		<p>&nbsp;&nbsp;<label for="second_qty_amount">Second Qty Amount : </label><input id="SecondQty" type="numeric" name="SecondQty" value="0" /></p>
		&nbsp;&nbsp;<input type="submit" name="search4" value="Search Qty on Hand"><br><br>

	<p>&nbsp;&nbsp;Select All Vendors:&nbsp;&nbsp; <input type='submit' name='all' value='All'></p><br>
	
    <table style="width:100%" id="orders_table">

        <tr>

            <th width="193">Product ID</th>

            <th width="193">Product Name</th>

            <th width="193">Item Cost</th>

            <th width="193">Item Price</th>

            <th width="193">Expiration Date</th>
			
			<th width="193">Quantity On Hand</th>
			
			<th width="193">Category ID</th>
			
			<th width="193">Status</th>
			
			<th width="193">Vendor ID</th>
			
        </tr>

        <?php while (@$row = mysqli_fetch_array($SearchResult)):?>

            <tr>

                <td><?php echo $row['ProductID'];?></td>

                <td><?php echo $row['Product_Name'];?></td>

                <td><?php echo $row['Item_Cost'];?></td>

                <td><?php echo $row['Item_Price'];?></td>

                <td><?php echo $row['Exp_Date'];?></td>
				
				<td><?php echo $row['Qty_on_Hand'];?></td>
				
				<td><?php echo $row['Category_ID'];?></td>
				
				<td><?php echo $row['Qty_Status'];?></td>
				
				<td><?php echo $row['VendorID'];?></td>
				
            </tr>

        <?php endwhile; ?>

    </table>

    </form><br><br>
	<script LANGUAGE="JavaScript"> 
		if (window.print) {
		document.write('<form><input type=button name=print value="Print Page"onClick="window.print()"></form>');
		}
	</script>
        

</body>

</html>