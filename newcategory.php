<?php
		require('central_concessions_db.php');

ob_start();
	if(isset($_GET['cat_name']) && isset($_GET['cat_description']))
	{
	    $name = filter_input(INPUT_GET, 'cat_name');
	    $description = filter_input(INPUT_GET, 'cat_description');
	    
	    if($name != "" && $description != "")
	    {
	        $query ="INSERT INTO category () VALUES(NULL, :cat_name, :cat_description);";
			$statement = $db->prepare($query);
        	$statement->bindValue(':cat_name', $name, PDO::PARAM_STR);
        	$statement->bindValue(':cat_description', $description, PDO::PARAM_STR);
           	$statement->execute();
			include('Store_inventory.php');
			//echo 'SUCCESS!';

		}
			if ($_GET['cat_name'] == "") {
        die('<script type="text/javascript">
			alert("Must Enter a Category Name");
			location.replace("addnewcategory.php")
			</script>');
	}
		if ($_GET['cat_description'] == "") {
        die('<script type="text/javascript">
			alert("Must Enter a Category Name");
			location.replace("addnewcategory.php")
			</script>');
	}
	}
?>