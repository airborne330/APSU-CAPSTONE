<?php
if(isset($_POST['search']))
{
    $ValueSearch = $_POST['value'];
    $query = "SELECT * FROM `bids` WHERE BidID LIKE '%".$ValueSearch."%'";
    $SearchResult = filterTable($query);
}
else if(isset($_POST['all']))
{
    $query = "SELECT * FROM `bids`";
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

// mysql select query
$query = "SELECT * FROM `bids`";

// for method 1

$result1 = mysqli_query($connect, $query);
?>

<!doctype html>
<html>
    <head>
    <meta charset="utf-8">
    <title>Bids Report</title>
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
		
		<h2>Bids Report</h2><br><br>
		
	<form action='bidsReport.php' method='POST'>
    <p>Please Select a Bid:
    <select name='value'>
	
			<option value=''>...</option>

        <?php while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[0];?>"><?php echo $row1[0];?></option>

        <?php endwhile;?>
		
	</select>&nbsp;&nbsp;

    <input type='submit' name='search' value='Search'></p><br>
	<p>&nbsp;&nbsp;Select All Bids:&nbsp;&nbsp; <input type='submit' name='all' value='All'></p><br>
	
    <table style="width:100%" id="orders_table">

        <tr>

            <th width="193">Bid ID</th>

            <th width="193">Bid Street</th>

            <th width="193">Bid City</th>

            <th width="193">Bid State</th>

            <th width="193">Bid Status</th>
			
			<th width="193">Rent Amount</th>
			
			<th width="193">Inspection Fee</th>
			
			<th width="193">Licensing Fee</th>
			
        </tr>

        <?php while (@$row = mysqli_fetch_array($SearchResult)):?>

            <tr>

                <td><?php echo $row['BidID'];?></td>

                <td><?php echo $row['Bid_Street'];?></td>

                <td><?php echo $row['Bid_City'];?></td>

                <td><?php echo $row['Bid_State'];?></td>

                <td><?php echo $row['BidStatus'];?></td>
				
				<td><?php echo $row['rent'];?></td>
				
				<td><?php echo $row['inspect'];?></td>
				
				<td><?php echo $row['license'];?></td>
				
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
