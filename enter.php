<!DOCTYPE html>
<html lang="en">
<head>
	<title>Order Entry</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/style.css">
</head>
<body>
<section class="section-a">
  <div class="container">
    <div class="container-a">
      <div class="overlay">
        <div class="container-ab">
          <h1>Order Entry</h1>
          <p>
            Made for the testing of SQL Injections
          </p>
        </div>
      </div>
    </div>
	
    <div class="container-b">
     	<div class="container-ba">
     	
    	<a href = "index.php">Product Stock Search</a>
	<a href = "orders.php">Order Search</a>
	<a href = "enter.php">Enter an Order</a>
	<a href = "upload.html">Upload a Custom Product</a>
        <form method="post">
        	Product Name or ID: <input type="text" name="productEntry"><br>
        	Your ID: <input type="text" name="clientEntry"><br>
        	Quantity: <input type="text" name="quantityEntry"><br>
        	<button class="btn-primary" type="submit" name="entrySubmit">Submit</button>
        </form>
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
	$stop = 0;
	
	if ($quantity > 0) {
		//Converting product name to product ID (if necessary)
		if (!is_numeric($product)) {
			$sql = "SELECT productId FROM Products WHERE name = '$product';";
				foreach($con -> query($sql) as $row){
					if (is_null($row['productId'])) {
						print "Invalid product name";
						$stop = 1;
					}
					else
						$product = $row['productId'];
				}
		}
		
		//Making sure there is enough product in stock
		$sql = "SELECT stock FROM Products WHERE productId = '$product';";
		if ($con -> query($sql) == True)
			foreach($con -> query($sql) as $row) {
				if (is_null($row['stock'])) {
					print "Invalid product ID";
					$stop = 1;
				}
				else if ($row['stock'] < $quantity) {
					$diff = $quantity - $row['stock'];
					print "Error: the product has " . $diff . " less stock than you requested";
					$stop = 1;
				}
			}
		else {
				print "Connection error";
				$stop = 1;
		}
				
		if ($stop == 0) {
			//Generating the total price
			$sql = "SELECT price FROM Products WHERE productId = '$product'";
			foreach($con -> query($sql) as $row) {
				$totalPrice = $row['price'] * $quantity;
			}
			$sql = "INSERT INTO Orders VALUES ('$next', '$product', '000', '$client', CURRENT_DATE(), '$quantity', '$totalPrice')";
			if ($con -> query($sql) == True)
				print "Purchase successful! A payment of $" . number_format($totalPrice, 2) . " has been withdrawn from your account";
			else
				print "Invalid entry";
		}
	}
	else
		print "Please enter a valid quantity";
}
?>
