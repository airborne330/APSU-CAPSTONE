<?php
	require('central_concessions_db.php');
	session_start();
	//$Product_ID = filter_input(INPUT_POST,'Product_ID',FILTER_VALIDATE_INT);
		if(!isset($_SESSION['username']))
	{
    	$_SESSION['username'] = filter_input(INPUT_POST, 'username');
	}
		$query = "SELECT * FROM employee 
			WHERE Emp_ID = :username";
				
	$statement6 = $db->prepare($query);
	$statement6->bindValue(':username', $_SESSION['username'], PDO::PARAM_STR); //bind query headings to session username and password
	$statement6->execute();
	$user = $statement6;
	/**********************************************************************************************************/
	
	$query = "SELECT DISTINCT vendors.Vendor_ID,category.Category_Name
FROM vendors JOIN products on vendors.Vendor_ID=products.VendorID
JOIN category ON products.Category_ID=category.Category_ID
ORDER BY vendors.Vendor_ID";				
	$statement5 = $db->prepare($query);
	//$statement->bindValue(':Product_ID', $Store_ID); //bind query headings to session username and password
	$statement5->execute();
	$vendor = $statement5;

/**************************************************************************************************************/

	$query = "SELECT DISTINCT v.Vendor_ID, v.Vendor_Name FROM vendors v, products p, store_inventory s 
				WHERE v.Vendor_ID = p.VendorID AND p.ProductID = s.Product_ID";				
	$statement1 = $db->prepare($query);
	//$statement->bindValue(':Product_ID', $Store_ID); //bind query headings to session username and password
	$statement1->execute();
	$vendors = $statement1;

/**************************************************************************************************************/
	$query = "SELECT DISTINCT Store_ID FROM store_inventory";				
	$statement = $db->prepare($query);
	//$statement->bindValue(':Product_ID', $Store_ID); //bind query headings to session username and password
	$statement->execute();
	$stores = $statement;

/**************************************************************************************************************/
	$query = "SELECT DISTINCT s.Store_ID, p.VendorID, p.Product_Name, s.Qty FROM store_inventory s, products p WHERE s.Product_ID = p.ProductID";				
	$statement = $db->prepare($query);
	//$statement->bindValue(':Product_ID', $Store_ID); //bind query headings to session username and password
	$statement->execute();
	$stores2 = $statement;

/**************************************************************************************************************/

	$query = "SELECT * FROM products";				
	$statement4 = $db->prepare($query);
	//$statement->bindValue(':Product_ID', $Store_ID); //bind query headings to session username and password
	$statement4->execute();
	$products = $statement4;

	$query = "SELECT DISTINCT p.ProductID, p.Product_Name FROM products p, store_inventory s WHERE p.ProductID = 											s.Product_ID";				
	$statement2 = $db->prepare($query);
	//$statement->bindValue(':Product_ID', $Store_ID); //bind query headings to session username and password
	$statement2->execute();
	$products2 = $statement2;


	$query = "SELECT * FROM transaction ORDER BY TransactionID DESC";			
	$statement3 = $db->prepare($query);
	//$statement->bindValue(':Product_ID', $Store_ID); //bind query headings to session username and password
	$statement3->execute();
	$transaction = $statement3;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add New Transaction</title>
</head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="main.css" rel="stylesheet" type="text/css">
  <body>
 	  <br>
  	  <li id="link_back"><a href="manager.php" id="back_manager">Manager Menu</a></li>
  	  <br><br>
  	  	  	  <?php foreach($user as $u) : ?>
  	  	<h1 id="add_employee_title"><?php echo $u['Emp_fname']." ". $u['Emp_lname']." "; ?>Transactions</h1><br>
  	  	<?php endforeach; ?>
  	    <h3 id="add_employee_title">Add New Transaction</h3>
  <form id="add_employee_form" method="POST" action="newstoretransaction.php" onsubmit="myFunction()">
          <label id="label">Store ID:</label><br>
     	  <select id="Store_ID" name="Store_ID" style="width: 300px;">
		  <option>Select Store:</option>
		               <?php foreach($stores as $s) : ?>
			 
				 <option value="<?php echo $s['Store_ID']; ?>"><?php echo $s['Store_ID']; ?></option>
			  
           <?php endforeach; ?>
	  </select>
	  <br>
	<label id="label">Product ID by Name:</label><br>
    	  <select id="ProductID" name="ProductID" style="width: 300px;" onChange="getCity('findprice.php?ProductID='+this.value)">
		  <option>Select Product:</option> 
		               <?php foreach($products2 as $p) : ?>
			 
				 <option value="<?php echo $p['ProductID']; ?>"><?php echo $p['Product_Name']; ?></option>
			  
           <?php endforeach; ?>
	  </select>
    <br>
	<label id="label">Item Price:</label><br>
    <!--<input id="Item_Price" type="text" name="Item_Price" size="45">-->
       <select name="Item_Price" id="Item_Price">
	<option>Price</option>
        </select>
    <br>
    <label id="label">Order Date:</label><br>
    <input id="Order_Date" type="date" name="Order_Date" size="45" value="sysdate">
    <br>
    <label id="label">Quantity:</label><br>
    <input id="Qty" type="text" name="Qty" size="45">
    <br><br>
    <input type="submit" value="Submit Transaction">        
  </form>

  <br>
	  <form id="add_employee_form"action="printtransaction.php" method="post">
	  	<label id="label">Select Tranaction To Print:</label><br>
    	  <select id="TransactionID" name="TransactionID" style="width: 300px;">
		  <option>Select Transaction:</option>
		               <?php foreach($transaction as $tran) : ?>
			 
				 <option value="<?php echo $tran['TransactionID']; ?>"><?php echo $tran['TransactionID']; ?></option>
			  
           <?php endforeach; ?>
	  </select>
	  <input type="submit" value="Print Transaction"> 

	  </form>
<div class="col-md-6">
<h2 id="location_header">Product by Price</h2>
  <table>
  			<table style="width:100%" id="orders_table">
				<th width="193">Product Name</th>
				<th width="193">Product ID</th>
                <th width="324">Item Price</th>           
            </tr>
            	  <?php foreach($products as $product) : ?>
            <tr>			
            	<td><?php echo $product['Product_Name']; ?></td>
            	<td><?php echo $product['ProductID']; ?></td>
                <td><?php echo $product['Item_Price']; ?></td>
           </tr>
         <?php endforeach; ?>
	  </table>
	  </div>
	  <div class="col-md-6">
	  <h2 id="location_header">Product Available by Store</h2>
  <table>
  			<table style="width:100%" id="orders_table">
				<th width="193">Store ID</th>
                <th width="324">Vendor ID</th> 
                <th width="324">Product Name</th>
                <th width="324">Qty</th>          
            </tr>
            	  <?php foreach($stores2 as $st2) : ?>
            <tr>			
            	<td><?php echo $st2['Store_ID']; ?></td>
            	<td><?php echo $st2['VendorID']; ?></td>
                <td><?php echo $st2['Product_Name']; ?></td>
                <td><?php echo $st2['Qty']; ?></td>
           </tr>
         <?php endforeach; ?>
	  </table>
	  </div>
	  <br>


</body>
<script>
function myFunction() {
    alert("The Transaction was Successful");
}
</script>
<script>
function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
	}
	
	
	
	function getCity(strURL) {		
		
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('Item_Price').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
				
	}
</script>
</html>