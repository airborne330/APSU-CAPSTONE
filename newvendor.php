<?php
		require('central_concessions_db.php');

ob_start();
	if(isset($_GET['Vendor_Name']) && isset($_GET['Vendor_Street']) && isset($_GET['Vendor_City']) && isset($_GET['Vendor_State']) && isset($_GET['Vendor_Zip']))
	{
	    $VendorName = filter_input(INPUT_GET, 'Vendor_Name');
	    $street = filter_input(INPUT_GET, 'Vendor_Street');
		$city = filter_input(INPUT_GET,'Vendor_City');
		$state = filter_input(INPUT_GET,'Vendor_State');
		$zip = filter_input(INPUT_GET,'Vendor_Zip');				
	    
	    if($VendorName != "" && $street != "" && $city != "" && $state != "" && $zip != "")
	    {
	        $query ="INSERT INTO vendors(Vendor_ID, Vendor_Name, Vendor_Street, Vendor_City, Vendor_State, Vendor_Zip) VALUES (NULL,:Vendor_Name,:Vendor_Street,:Vendor_City,:Vendor_State,:Vendor_Zip);";
			$statement = $db->prepare($query);
        	$statement->bindValue(':Vendor_Name', $VendorName, PDO::PARAM_STR);
        	$statement->bindValue(':Vendor_Street', $street, PDO::PARAM_STR);
			$statement->bindValue(':Vendor_City', $city, PDO::PARAM_STR);
			$statement->bindValue(':Vendor_State', $state, PDO::PARAM_STR);
			$statement->bindValue(':Vendor_Zip', $zip, PDO::PARAM_STR);			
           	$statement->execute();
			include('vendor.php');
			//echo 'SUCCESS!';

		}
	if ($_GET['Vendor_Name'] == "") {
        die('<script type="text/javascript">
			alert("Must Enter a Vendor Name");
			location.replace("addnewvendor.php")
			</script>');
	}
		if ($_GET['Vendor_Street'] == "") {
        die('<script type="text/javascript">
			alert("Must Enter a Vendor Street Location");
			location.replace("addnewvendor.php")
			</script>');
	}
		if ($_GET['Vendor_City'] == "") {
        die('<script type="text/javascript">
			alert("Must Enter a Vendor City");
			location.replace("addnewvendor.php")
			</script>');
	}
		if ($_GET['Vendor_State'] == "") {
        die('<script type="text/javascript">
			alert("Must Enter a Vendor State");
			location.replace("addnewvendor.php")
			</script>');
	}
		if (strlen($_GET['Vendor_State']) < '2' || strlen($_GET['Vendor_State']) > '2') {
        die('<script type="text/javascript">
			alert("Vendor State Must be Two Letter Abbreviation");
			location.replace("addnewvendor.php")
			</script>');
	}
			if ($_GET['Vendor_Zip'] == "") {
        die('<script type="text/javascript">
			alert("Must Enter a Vendor Zip Code");
			location.replace("addnewvendor.php")
			</script>');
	}
			if (strlen($_GET['Vendor_Zip']) < '5' || strlen($_GET['Vendor_Zip']) > '5') {
        die('<script type="text/javascript">
			alert("Must Enter a Valid 5 digit Zip Code");
			location.replace("addnewvendor.php")
			</script>');
	}
	}
?>