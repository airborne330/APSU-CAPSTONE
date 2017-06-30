<?php
if(isset($_POST['search1']))
{
    $ValueSearch = $_POST['value1'];
    $query = "SELECT * FROM `employee` WHERE Emp_ID = '".$ValueSearch."'";
    $SearchResult = filterTable($query);
}
else if(isset($_POST['search2']))
{
    $ValueSearch = $_POST['value2'];
    $query = "SELECT * FROM `employee` WHERE Emp_lname = '".$ValueSearch."'";
    $SearchResult = filterTable($query);
}
else if(isset($_POST['search3']))
{
    $ValueSearch = $_POST['value3'];
    $query = "SELECT * FROM `employee` WHERE Emp_Job = '".$ValueSearch."'";
    $SearchResult = filterTable($query);
}
else if(isset($_POST['search4']))
{
	$ValueSearch = $_POST['value4'];
    $query = "SELECT * FROM `employee` WHERE Seasonal = '".$ValueSearch."'";
    $SearchResult = filterTable($query);
}
else if(isset($_POST['all']))
{
    $query = "SELECT * FROM `employee`";
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
$query1 = "SELECT Emp_ID FROM `employee` ORDER BY Emp_ID";

// mysql select query2
$query2 = "SELECT DISTINCT Emp_lname FROM `employee`ORDER BY Emp_lname";

// mysql select query3
$query3 = "SELECT DISTINCT Emp_Job FROM `employee` ORDER BY Emp_Job";

// mysql select query4
$query4 = "SELECT DISTINCT Seasonal FROM `employee` ORDER BY Seasonal";

// mysql select query5
$query5 = "SELECT * FROM `employee` ORDER BY Emp_ID";

// for method 1

$result1 = mysqli_query($connect, $query1);
$result2 = mysqli_query($connect, $query2);
$result3 = mysqli_query($connect, $query3);
$result4 = mysqli_query($connect, $query4);
$result5 = mysqli_query($connect, $query4);

?>

<!doctype html>
<html>
    <head>
    <meta charset="utf-8">
    <title>Employee Report</title>
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
		
		<h2>Employee Report</h2><br><br>
		
	<form action='EmployeeReport.php' method='POST'>
    <p>&nbsp;&nbsp;Select Employee by Employee ID:

    <select name='value1'>
	
			<option value=''>...</option>

        <?php while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[0];?>"><?php echo $row1['Emp_ID'];?></option>

        <?php endwhile;?>
		
	</select>&nbsp;&nbsp;

    <input type='submit' name='search1' value='Search Employee ID'></p><br>
	
	    <p>&nbsp;&nbsp;Select Employee by Last Name:

    <select name='value2'>
	
			<option value=''>...</option>

        <?php while($row1 = mysqli_fetch_array($result2)):;?>

            <option value="<?php echo $row1[0];?>"><?php echo $row1['Emp_lname'];?></option>

        <?php endwhile;?>
		
	</select>&nbsp;&nbsp;

    <input type='submit' name='search2' value='Search Last Name'></p><br>
		
	    <p>&nbsp;&nbsp;Select Employee by Job Title:

    <select name='value3'>
	
			<option value=''>...</option>

        <?php while($row1 = mysqli_fetch_array($result3)):;?>

            <option value="<?php echo $row1[0];?>"><?php echo $row1['Emp_Job'];?></option>

        <?php endwhile;?>
		
	</select>&nbsp;&nbsp;

    <input type='submit' name='search3' value='Search Job Title'></p><br>
			
	    <p>&nbsp;&nbsp;Select Employee by Seasonal Yes(Y) or No(N):

    <select name='value4'>
	
			<option value=''>...</option>

        <?php while($row1 = mysqli_fetch_array($result4)):;?>

            <option value="<?php echo $row1[0];?>"><?php echo $row1['Seasonal'];?></option>

        <?php endwhile;?>
		
	</select>&nbsp;&nbsp;

    <input type='submit' name='search4' value='Search Seasonal'></p><br>

	<p>&nbsp;&nbsp;Select All Employees:&nbsp;&nbsp; <input type='submit' name='all' value='All'></p><br>
	
    <table style="width:100%" id="orders_table">

        <tr>

            <th width="193">Employee ID</th>

            <th width="193">First Name</th>

            <th width="193">Last Name</th>

            <th width="193">Job Title</th>

            <th width="193">Seasonal</th>
			
			<th width="193">Pay</th>
			
        </tr>

        <?php while (@$row = mysqli_fetch_array($SearchResult)):?>

            <tr>

                <td><?php echo $row['Emp_ID'];?></td>

                <td><?php echo $row['Emp_fname'];?></td>

                <td><?php echo $row['Emp_lname'];?></td>

                <td><?php echo $row['Emp_Job'];?></td>

                <td><?php echo $row['Seasonal'];?></td>
				
				<td><?php echo $row['Pay'];?></td>
			
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