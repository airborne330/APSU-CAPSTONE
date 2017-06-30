<?php
//export.php  
$connect = require('central_concessions_db.php');

$output = '';
if(isset($_POST["export"]))
{
 $query = "
		SELECT ProductID, Product_Name, Qty_on_Hand
		FROM products
		WHERE Qty_on_Hand < 100
	  ";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
 	<tr>
           	<th>Product ID</th>
		<th>Product Name</th>
                <th>Qty On Hand</th>         
        </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
	    <tr>  
                <td>'.$row["ProductID"].'</td>  
                <td>'.$row["Product_Name"].'</td>  
                <td>'.$row["Qty_on_Hand"].'</td>  
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