<?php
//export.php  
$connect = require('central_concessions_db.php');

$output = '';
if(isset($_POST["export"]))
{
 $query = "
		SELECT O.Order_Date, O.Order_ID, O.Vendor_ID, V.Vendor_Name, O.Item_Price, O.Qty 
		FROM orders O, vendors V
		WHERE O.Vendor_ID = V.Vendor_ID
		ORDER BY O.Order_Date
	  ";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
 	<tr>
           	<th>Order Date</th>
		<th>Order ID</th>
                <th>Vendor ID</th>
		<th>Vendor Name</th>
                <th>Item Price</th>
                <th>Qty</th>          
        </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
	    <tr>  
                <td>'.$row["Order_Date"].'</td>  
                <td>'.$row["Order_ID"].'</td>  
                <td>'.$row["Vendor_ID"].'</td>  
       		<td>'.$row["Vendor_Name"].'</td>  
                <td>'.$row["Item_Price"].'</td>
		<td>'.$row["Qty"].'</td>
           </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}

?>