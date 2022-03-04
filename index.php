<!DOCTYPE html>
<html>
<head>
	<title>Product Stock Search</title>
</head>
<body>
<a href = "index.php">Product Stock Search<a>
<a href = "orders.php">Order Search<a>
<a href = "enter.php">Order Entry<a>

<br><br>

<form method="post">
<label>Product Search</label>
<input type="text" name="productSearch">
<input type="submit" name="productSubmit">
</form>
</body>
</html>

<?php
if (isset($_POST["productSubmit"])) {
	$test = False;
	
	$str = $_POST["productSearch"];
	
	$con = new PDO("mysql:host = localhost;dbname=Search", 'citadmin','citadmin');
	$sql = "SELECT productId, name, stock FROM Products WHERE name LIKE '%$str%';";
	
	print "<table border = '1'>";
	foreach ($con -> query($sql) as $row) {
		if ($test == False)
			print "<tr><td>Product ID</td><td>Product Name</td><td>Stock Available</td></tr>";
		$test = True;
		print "<tr><td>" . $row['productId'] . "</td><td>" . $row['name'] . "</td><td>" . $row['stock'] . "</td></tr>";
	}
	
	print "</table>";
	
	if ($test == False) {
		echo "No matches found";
	}
}
?>
