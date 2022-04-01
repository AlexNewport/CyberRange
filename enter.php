<!DOCTYPE html>
<html>
<head>
	<title>Enter an Order</title>
</head>
<body>
<a href = "index.php">Product Stock Search</a>
<a href = "orders.php">Order Search</a>
<a href = "enter.php">Enter an Order</a>
<a href = "upload.php">Upload a Custom Product</a>

<br><br>

<form method="post">
<label>Product Name or ID</label>
<input type="text" name="productEntry">
<br>
<label>Your ID</label>
<input type="text" name="clientEntry">
<br>
<label>Quantity</label>
<input type="text" name="quantityEntry">
<br>
<input type="submit" name="entrySubmit">
</form>
</body>
</html>

<?php
if (isset($_POST["entrySubmit"])) {
	//Establishes connection to the database
	$con = new PDO("mysql:host = localhost;dbname=Search", 'citadmin','citadmin');
	
	//Acquiring the next orderId we can use
	$sql = "SELECT MAX(orderId) + 1 AS nextId FROM Orders";
	foreach($con -> query($sql) as $row)
		$next = $row['nextId'];
	
	//Creating variables to store the user input that will be inserted into the database
	$product = $_POST["productEntry"];
	$client = $_POST["clientEntry"];
	$quantity = $_POST["quantityEntry"];
	
	
	if ($quantity > 0) {
		//Converting product name to product ID (if necessary)
		if (!is_numeric($product)) {
			$sql = "SELECT productId FROM Products WHERE name = '$product'";
			if ($con -> query($sql) == True)
				foreach($con -> query($sql) as $row)
					$product = $row['productId'];
			else
				print "Invalid product name";
		}
	
		//Generating the total price
		$sql = "SELECT price FROM Products WHERE productId = '$product'";
		foreach($con -> query($sql) as $row)
					$totalPrice = $row['price'] * $quantity;
	
		$sql = "INSERT INTO Orders VALUES ('$next', '$product', '000', '$client', CURRENT_DATE(), '$quantity', '$totalPrice')";
		if ($con -> query($sql) == True)
			print "Purchase successful! A payment of $" . number_format($totalPrice, 2) . " has been withdrawn from your account";
		else
			print "Error: " . $sql . "<br>" . $con -> error;
	}
	else
		print "Please enter a valid quantity";
}
?>
