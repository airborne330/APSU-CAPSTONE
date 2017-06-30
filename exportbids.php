<?php
//export.php  
$connect = mysqli_connect("austinholmes.net.mysql", "austinholmes_net", "anthony1114", "austinholmes_net");
$output = '';
if(isset($_POST["export"]))
{
 	$query = "SELECT * FROM bids";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    	<tr>Bid ID</th>  
                         <th>Bid Street</th>  
                         <th>Bid City</th>  
						 <th>Bid State</th>
						 <th>Bid Status</th>
						 <th>Rent</th>
						 <th>License</th>
						 <th>Inspect</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["BidID"].'</td>  
                         <td>'.$row["Bid_Street"].'</td>  
                         <td>'.$row["Bid_City"].'</td>  
       					 <td>'.$row["Bid_State"].'</td>  
                         <td>'.$row["BidStatus"].'</td>
						  <td>'.$row["rent"].'</td>
						  <td>'.$row["license"].'</td>
						  <td>'.$row["inspect"].'</td>
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