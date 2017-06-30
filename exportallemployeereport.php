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
                         <th>First Name</th>  
                         <th>Last Name</th>  
						 <th>Job Title</th>
						 <th>Seasonal</th>
						 <th>Pay</th>
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
                         <td>'.$row["Seasonal"].'</td>
						  <td>'.$row["Pay"].'</td>
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=All_Employees.xls');
  echo $output;
 }
}

?>