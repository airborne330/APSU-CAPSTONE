<?php
//export.php  
$connect = mysqli_connect("austinholmes.net.mysql", "austinholmes_net", "anthony1114", "austinholmes_net");
$output = '';
if(isset($_POST["export"]))
{
 	$query = "SELECT * FROM employee";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    	<tr>
                    	 <th>Employee ID</th>  
                         <th>Employee First Name</th>  
                         <th>Employee Last Name</th>  
						 <th>Employee Job title</th>
						 <th>Password</th>
						 <th>Seasonal</th>
						 <th>pay</th>
						 <th>Status</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["Emp_ID"].'</td>  
                         <td>'.$row["Emp_fname"].'</td>  
                         <td>'.$row["Emp_lname"].'</td>  
       					 <td>'.$row["Emp_Job"].'</td>  
                         <td>'.$row["Password"].'</td>
						  <td>'.$row["Seasonal"].'</td>
						  <td>'.$row["Pay"].'</td>
						  <td>'.$row["Status"].'</td>
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