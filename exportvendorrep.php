<?php
//export.php  
$connect = mysqli_connect("austinholmes.net.mysql", "austinholmes_net", "anthony1114", "austinholmes_net");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM vendor_rep";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>Rep ID</th>  
                         <th>First Name</th>  
                         <th>Last Name</th>  
       <th>Phone</th>
       <th>Vendor ID</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["Rep_ID"].'</td>  
                         <td>'.$row["Rep_Fname"].'</td>  
                         <td>'.$row["Rep_Lname"].'</td>  
       					 <td>'.$row["Rep_Phone"].'</td>  
                         <td>'.$row["VendorID"].'</td>
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
