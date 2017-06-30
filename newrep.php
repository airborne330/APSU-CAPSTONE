<?php
		require('central_concessions_db.php');

ob_start();
	if(isset($_GET['firstname']) && isset($_GET['lastname']) && isset($_GET['phone']) && isset($_GET['Vendor_ID']))
	{
	    $firstName = filter_input(INPUT_GET, 'firstname');
	    $lastName = filter_input(INPUT_GET, 'lastname');
		$phone = filter_input(INPUT_GET,'phone');
		$vendor = filter_input(INPUT_GET,'Vendor_ID');
	    
	    if($firstName != "" && $lastName != "" && $phone != "" && $vendor != "")
	    {
	        $query ="INSERT INTO vendor_rep () VALUES(NULL, :firstname, :lastname, :phone, :Vendor_ID);";
			$statement = $db->prepare($query);
        	$statement->bindValue(':firstname', $firstName, PDO::PARAM_STR);
        	$statement->bindValue(':lastname', $lastName, PDO::PARAM_STR);
			$statement->bindValue(':phone', $phone, PDO::PARAM_STR);
			$statement->bindValue(':Vendor_ID', $vendor, PDO::PARAM_STR);
           	$statement->execute();
			include('vendor.php');
			//echo 'SUCCESS!';

		}
	}
	if($_GET['firstname'] == "")
	{
		 die('<script type="text/javascript">
			alert("Must enter a first name");
			location.replace("addnewrep.php")
			</script>');
	}
	if($_GET['lastname'] == "")
	{
		 die('<script type="text/javascript">
			alert("Must enter a last name");
			location.replace("addnewrep.php")
			</script>');
	}
if(!preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $_GET['phone']) || $_GET['phone']=="")
	{
		 die('<script type="text/javascript">
			alert("Must enter a valid Phone Number");
			location.replace("addnewrep.php")
			</script>');
	}
	if($_GET['Vendor_ID'] == "")
	{
		 die('<script type="text/javascript">
			alert("Must enter a valid vendor");
			location.replace("addnewrep.php")
			</script>');
	}
?>