<?php
    require_once('central_concessions_db.php');	
	session_start();
	
	/* 
	    The following code is for defining user permissions based on the current user. If the user has a manager title, they get full permissions. 
	    If they are a supervisor, they can search through the records but not modify or add. If they are an employee, 
	    they cannot view the page at all.
	*/
	
	$username = $_SESSION['username'];
// 	echo $username;
			
	$query = "SELECT * FROM employee 
			WHERE Emp_ID = :username 
			ORDER BY Emp_ID";
				
	$statement = $db->prepare($query);
	$statement->bindValue(':username', $_SESSION['username'], PDO::PARAM_STR); //bind query headings to session username and password
	$statement->execute();
	$employees = $statement->fetchAll();
  
	foreach($employees as $em)
	{
		$title = $em['Emp_Job']; //this stores the title of the user. Might want to use a title id in the tables
		$fname = $em['Emp_fname'];
		$lname = $em['Emp_lname'];
	}
    
   // Query EMPLOYEE_TIMEKEEPING TABLE
    // $queryEmpTime = "SELECT *
    //                 FROM timeclock
    //                WHERE Emp_ID = :username
    //                ORDER BY Emp_ID";
                    
    //$statement1 = $db->prepare($queryEmpTime);
	//$statement1->bindValue(':username', $_SESSION['username'], PDO::PARAM_STR);
 	//$statement1->execute();
 	//$empTimeStatement = $statement1->fetchAll();
 	//foreach($empTimeStatement as $ets)
 	//{
	 //   $todays_date = $ets['Today_Date'];
 	 //   $time_in = $ets['Time_In'];
 	 //   $time_out = $ets['Time_Out'];
 	//}
	
	// Query EMPLOYEE_STATUS TABLE
	$queryEmpStatus = "SELECT * FROM employee
                    WHERE Emp_ID = :username
                    ORDER BY Emp_ID";
                    
    $statement2 = $db->prepare($queryEmpStatus);
	$statement2->bindValue(':username', $_SESSION['username'], PDO::PARAM_STR);
	$statement2->execute();
	$empStatusStatement = $statement2->fetchAll();
	foreach($empStatusStatement as $ess)
	{
	    $status = $ess['Status'];
	}
	
	// Check status on page load and change button accordingly
	$clock_in_out = "";
	$class_clock_button = "";
	if ($status == "out")
	{
	    $clock_in_out = "Clock IN";
	    $class_clock_button = "c-green";
	}
	else if ($status == "in")
	{
	    $clock_in_out = "Clock OUT";
	    $class_clock_button = "c-red";
	}
    // Set time zone
    date_default_timezone_set("America/Chicago");
    
    $date = date('F j, Y');
    $dbDate = date('Y-m-d');
    $dbTime = date('H:i:s');
    //$time = date("g:i:s A");
    
    ob_start();
?>

<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <title>Timekeeping</title>
	<link href="main.css" rel="stylesheet">
   <link href="forms.css" rel="stylesheet">
    
    <script>
        
        // Clock function
        function updateClock( )
        {
          var currentTime = new Date ( );
        
          var currentHours = currentTime.getHours ( );
          var currentHours24 = currentTime.getHours ( ); // 24 hour time
          var currentMinutes = currentTime.getMinutes ( );
          var currentSeconds = currentTime.getSeconds ( );
        
          // Pad the minutes and seconds with leading zeros, if required
          currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
          currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;
        
          // Choose either "AM" or "PM" as appropriate
          var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";
        
          // Convert the hours component to 12-hour format if needed
          currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;
        
          // Convert an hours component of "0" to "12"
          currentHours = ( currentHours == 0 ) ? 12 : currentHours;
        
          // Compose the string for display
          var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;
          var currentTimeString24 = currentHours24 + ":" + currentMinutes + ":" + currentSeconds;
        
          // Update the time display
          document.getElementById("clock").firstChild.nodeValue = currentTimeString;
          document.getElementById("dbTime").value = currentTimeString24;
        }
                
    </script>
  </head>
  <body onload="updateClock(); setInterval('updateClock()', 1000 )">
    <div class="page-wrap">

        <div class="form-container">
          <section>
            <h1>Timekeeping</h1>
            <nav class="columns-2">
              <ul>
                <li><a href="employee.php">Employee Menu</a></li>
                <li><a class="logout-button" href="index.php">Logout</a></li>
              </ul>
            </nav>

            <!-- SEARCH -->
            <form>
              <fieldset>
                <legend>Clock</legend>
                <p class="emp-name"><?php echo $fname . " " . $lname; ?></p>
                
                <p class="f-20px"><?php echo $date; ?></p>
                
                <p><span id="clock" class="f-20px">&nbsp;</span></p>
                <br><br>
                <p id="notifyStatus" class="f-20px">You are Clocked <?php echo $status; ?></p>
                <!-- <p id="" class="f-20px">This is the date format to send to the database <?php echo $dbDate; ?></p>-->
                <!--<p id="" class="f-20px">This is the time format to send to the database <?php echo $dbTime; ?></p>-->
                <input id="Status" type="hidden" value="<?php echo $status; ?>">
                <input id="dbDate" type="hidden" value="<?php echo $dbDate; ?>">
                <input id="dbTime" type="hidden" value="<?php echo $dbTime; ?>">
                <!--<input id="dbTime" type="hidden" value="<?php echo $dbTime; ?>">-->
                <br><br>
                
                <div class="form-columns-2 row">
                    <input id="clockInOutButton" class="<?php echo $class_clock_button; ?>" type="button" value="<?php echo $clock_in_out; ?>" onclick="clockInOut();">
                </div>
              </fieldset>
            </form>
            
            <script>
                
                function clockInOut() 
    			{
        			var ajaxRequest;
        			try
        			{
        				ajaxRequest = new XMLHttpRequest();
        			} 
        			catch (e)
        			{
        				try
        				{
        					ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
        				} 
        				catch (e) 
        				{
        					try
        					{
        						ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
        					} 
        					catch (e)
        					{
        						alert("Browser error.");
        						return false;
        					}
        				}
        			}
        			
        			var clockInOutButton = document.getElementById("clockInOutButton");
        			var status = document.getElementById("Status");
        			var notifyStatus = document.getElementById("notifyStatus");
        			var dbDate = document.getElementById("dbDate").value;
        			var dbTime = document.getElementById("dbTime").value
        			
        			//console.log(status);
        // 			var queryString = "?status=" + status.value;
        			var queryString = "?Status=" + status.value + "&dbDate=" + dbDate + "&dbTime=" + dbTime;
        			
    				//var queryString = "?first_name=" + first_name + "&last_name=" + last_name + "&dob=" + dob + "&street=" + street + "&city=" + city + "&state=" + state + "&zip_code=" + zip_code + "&phone=" + phone + "&email=" + email;
    				    
        			ajaxRequest.open("GET", "timekeep_edit.php" + queryString, true);
        			ajaxRequest.send(null);
        			
        			ajaxRequest.onreadystatechange = function() 
        			{
    				    if (ajaxRequest.readyState == 4) 
    				    {
    				        //alert(ajaxRequest.responseText);
                            
    				        var response = ajaxRequest.responseText;
    				        alert("You are Clocked " + response);
    				        status.value = response;
    				        //clockInOutButton.value = "Clock " + response;
    				        if (status.value == "in")
    				        {
    				            clockInOutButton.className = "";
    				            clockInOutButton.style.color = "red";
    				            clockInOutButton.value = "Clock OUT";
    				            notifyStatus.innerHTML = "You are Clocked IN";
    				        }
    				        if (status.value == "out")
    				        {
    				            clockInOutButton.className = "";
    				            clockInOutButton.style.color = "green";
    				            clockInOutButton.value = "Clock IN";
    				            notifyStatus.innerHTML = "You are Clocked OUT";
    				        }
    				    }
        			};
        			
        			
    			};
			
			</script>
            
          </section>
        </div> <!-- END class="form-container" -->
    </div> <!-- END class="page-wrap" -->
  </body>
</html>