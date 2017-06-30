<?php
//export.php  
$connect = mysqli_connect("austinholmes.net.mysql", "austinholmes_net", "anthony1114", "austinholmes_net");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM vendors";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>Vendor ID</th>  
                         <th>Vendor Name</th>  
                         <th>Street</th>  
       <th>City</th>
       <th>State</th>
	   <th>Zip Code</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["Vendor_ID"].'</td>  
                         <td>'.$row["Vendor_Name"].'</td>  
                         <td>'.$row["Vendor_Street"].'</td>  
       					 <td>'.$row["Vendor_City"].'</td>  
                         <td>'.$row["Vendor_State"].'</td>
						  <td>'.$row["Vendor_Zip"].'</td>
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


