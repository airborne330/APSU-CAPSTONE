<?php
		require('central_concessions_db.php');

ob_start();
	if(isset($_GET['street']) && isset($_GET['city']) && isset($_GET['state']) && isset($_GET['rent']) && isset($_GET['license']) && isset($_GET['inspect']))
	{
	    $street = filter_input(INPUT_GET, 'street');
	    $city = filter_input(INPUT_GET, 'city');
		$state = filter_input(INPUT_GET,'state');
		$rent = filter_input(INPUT_GET,'rent');
		$license = filter_input(INPUT_GET,'license');	
		$inspect = filter_input(INPUT_GET,'inspect');
	    
	    if($street != "" && $city != "" && $state != "" && $rent != "" && $license != ""  && $inspect != "")
	    {
	        $query ="INSERT INTO store_location(Store_ID, Loc_Street, Loc_City, Loc_State, Rent, License,Inspect) VALUES (NULL,:street,:city,:state,:rent,:license,:inspect);";
			$statement = $db->prepare($query);
        	$statement->bindValue(':street', $street, PDO::PARAM_STR);
        	$statement->bindValue(':city', $city, PDO::PARAM_STR);
			$statement->bindValue(':state', $state, PDO::PARAM_STR);
			$statement->bindValue(':rent', $rent, PDO::PARAM_STR);
			$statement->bindValue(':license', $license, PDO::PARAM_STR);	
			$statement->bindValue(':inspect', $inspect, PDO::PARAM_STR);		
           	$statement->execute();
			include('stores.php');
			//echo 'SUCCESS!';

		}
	if ($_GET['street'] == "") {
        die('<script type="text/javascript">
			alert("Muste Enter a street");
			location.replace("addnewstore.php")
			</script>');
	}
	if ($_GET['city'] == "") {
        die('<script type="text/javascript">
			alert("Must Enter a City");
			location.replace("addnewstore.php")
			</script>');
	}
	if ($_GET['state'] == "") {
        die('<script type="text/javascript">
			alert("Must Enter a State");
			location.replace("addnewstore.php")
			</script>');
	}
	if ($_GET['rent'] == "") {
        die('<script type="text/javascript">
			alert("Must Enter a Rental Fee");
			location.replace("addnewstore.php")
			</script>');
	}
	if ($_GET['license'] == "") {
        die('<script type="text/javascript">
			alert("Must Enter a License Cost");
			location.replace("addnewstore.php")
			</script>');
	}
			if ($_GET['inspect'] == "") {
        die('<script type="text/javascript">
			alert("Must Enter an Inpection Fee");
			location.replace("addnewstore.php")
			</script>');
	}
	}
?>