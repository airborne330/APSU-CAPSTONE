<?php
//export.php  
$connect = mysqli_connect("austinholmes.net.mysql", "austinholmes_net", "anthony1114", "austinholmes_net");
$output = '';
if(isset($_POST["export"]))
{
 	$query = "SELECT * FROM `products` WHERE Exp_Date <= DATE(NOW()) + INTERVAL 7 DAY";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>Product ID</th>  
                         <th>Product Name</th>  
                         <th>Item Cost</th>  
						 <th>Item Price</th>
						 <th>Expiration Date</th>
						 <th>Quantity on Hand</th>
						 <th>cateogry ID</th>
						 <th>Status</th>
						 <th>Vendor ID</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["ProductID"].'</td>  
                         <td>'.$row["Product_Name"].'</td>  
                         <td>'.$row["Item_Cost"].'</td>  
       					 <td>'.$row["Item_Price"].'</td>  
                         <td>'.$row["Exp_Date"].'</td>
						  <td>'.$row["Qty_on_Hand"].'</td>
						 <td>'.$row["Category_ID"].'</td>
						<td>'.$row["Qty_Status"].'</td>
						<td>'.$row["VendorID"].'</td>
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=current_inventory.xls');
  echo $output;
 }
}

?>