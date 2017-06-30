<?php
//export.php  
$connect = mysqli_connect("austinholmes.net.mysql", "austinholmes_net", "anthony1114", "austinholmes_net");
$output = '';
if(isset($_POST["export"]))
{
 	$query = "SELECT Order_ID,ProductID,Item_Price,Order_Date,Qty,Store_ID,Vendor_ID, SUM(Item_Price * Qty) Total FROM orders
	GROUP BY Order_ID,ProductID,Item_Price,Order_Date,Store_ID,Vendor_ID
	ORDER BY Order_ID";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>Order ID</th>  
                         <th>Product ID</th>  
                         <th>Item_Price</th>  
						 <th>Order Date</th>
						 <th>Quantity</th>
						 <th>Store ID</th>
						 <th>Vendor ID</th>
						 <th>Total</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["Order_ID"].'</td>  
                         <td>'.$row["ProductID"].'</td>  
                         <td>'.$row["Item_Price"].'</td>  
       					 <td>'.$row["Order_Date"].'</td>  
                         <td>'.$row["Qty"].'</td>
						  <td>'.$row["Store_ID"].'</td>
						 <td>'.$row["Vendor_ID"].'</td>
						<td>'.$row["Total"].'</td>
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=AllOrdersReport.xls');
  echo $output;
 }
}

?>