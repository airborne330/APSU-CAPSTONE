<?php
$country=$_REQUEST['ProductID'];
$link = mysql_connect('austinholmes.net.mysql', 'austinholmes_net', 'anthony1114'); //changet the configuration in required
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db('austinholmes_net');
$query="select Item_Price FROM products WHERE ProductID=$country";
$result=mysql_query($query);

?>
<select name="Item_Price" id="Item_Price">
<option>Price</option>
<?php while($row=mysql_fetch_array($result)) { ?>
<option value="<?php echo $row['Item_Price']?>"><?php echo $row['Item_Price']?></option>
<?php } ?>
</select>
