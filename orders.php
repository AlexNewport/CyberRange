<!DOCTYPE html>
<html lang="en">
<head>
	<title>Order Search</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/style.css">
</head>
<body>
<section class="section-a">
  <div class="container">
    <div class="container-a">
      <div class="overlay">
        <div class="container-ab">
          <h1>Order Search</h1>
          <p>
            Made for the testing of SQL Injections
          </p>
        </div>
      </div>
    </div>
	
    <div class="container-b">
     	<div class="container-ba">
     	
    	<a href = "index.php">Product Search</a>
	<a href = "orders.php">Order Search</a>
	<a href = "enter.php">Enter an Order</a>
	<a href = "upload.html">Upload a Custom Product</a>
        <form method="post">
        	Order Search: <input type="text" name="orderSearch">
        	<button class="btn-primary" type="submit" name="orderSubmit">Submit</button>
        </form>
        <?php
if (isset($_POST["orderSubmit"])) {
	$test = False;
	
	$str = $_POST["orderSearch"];
	
	$con = new PDO("mysql:host = localhost; dbname=Search", 'citadmin','citadmin');
	$sql = "SELECT * FROM Orders WHERE orderId = '$str' OR employeeId = '$str'
		OR productId = '$str' OR clientId = '$str' OR date = '$str';";
	
  	print "<div class='table-con'>";
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
  print "</div>";
	
	if ($test == False) {
		echo "No matches found";
	}
}
?>
