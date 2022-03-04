<!DOCTYPE html>
<html>
<head>
	<title>Order Search</title>
</head>
<body>
<a href = "index.php">Product Stock Search<a>
<a href = "orders.php">Order Search<a>
<a href = "enter.php">Enter an Order<a>

<br><br>

<form method="post">
<label>Order Search</label>
<input type="text" name="orderSearch">
<input type="submit" name="orderSubmit">
</form>
</body>
</html>

<?php
if (isset($_POST["orderSubmit"])) {
	$test = False;
	
	$str = $_POST["orderSearch"];
	
	$con = new PDO("mysql:host = localhost;dbname=Search", 'citadmin','citadmin');
	$sql = "SELECT * FROM Orders WHERE orderId = '$str' OR employeeId = '$str'
		OR productId = '$str' OR clientId = '$str'";
	
	print "<table border = '1'>";
	foreach ($con -> query($sql) as $row) {
		if ($test == False)
			print "<tr><td>Order ID</td><td>Product ID</td><td>Employee ID</td><td>clientId
				</td><td>Date</td><td>Quantity</td><td>Total Sale</td></tr>";
		$test = True;
		print "<tr><td>" . $row['orderId'] . "</td><td>" . $row['productId'] . "</td><td>" . $row['employeeId'] .
			"</td><td>" . $row['clientId'] . "</td><td>" . $row['date'] . "</td><td>" . $row['quantity'] .
			"</td><td>" . $row['totalPrice'] . "</td></tr>";
	}
	
	print "</table>";
	
	if ($test == False) {
		echo "No matches found";
	}
}
?>
