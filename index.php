<!DOCTYPE html>
<html lang="en">
<head>
	<title>Product Stock Search</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/style.css" />
</head>
<body>

<a href = "index.php">Product Stock Search</a>
<a href = "orders.php">Order Search</a>
<a href = "enter.php">Enter an Order</a>
<a href = "upload.php">Upload a Custom Product</a>

<section class="section-a">
  <div class="container">
    <div class="container-a">
      <div class="overlay">
        <div class="container-ab">
          <h1>Product Search</h1>
          <p>
            Made for the testing of Sql Injections
          </p>
        </div>
      </div>
    </div>
    
    <div class="container-b">
      <div class="container-ba">
        <form method="post">
        Product Search: <input type="text" name="productSearch">
        <button class="btn-primary" type="submit" name="productSubmit">Submit</button>
        </form>
        <?php
if (isset($_POST["productSubmit"])) {
	$test = False;
	
	$str = $_POST["productSearch"];
	
	$con = new PDO("mysql:host = localhost; dbname=Search", 'citadmin','citadmin');
	$sql = "SELECT productId, name, stock FROM Products WHERE name LIKE '%$str%';";
	
  	print "<div class='table-con'>";
	print "<table border = '1'>";
	foreach ($con -> query($sql) as $row) {
		if ($test == False)
			print "<tr><th>Product ID</th><th>Product Name</th><th>Stock Available</th></tr>";
		$test = True;
		print "<tr><td class='row'>" . $row['productId'] . "</td><td>" . $row['name'] . "</td><td>" . $row['stock'] . "</td></tr>";
	}
	
	print "</table>";
  print "</div>";
	
	if ($test == False) {
		echo "No matches found";
	}
}
?>

      </div>
    </div>
  </div>
</section>
<!-- 
<a href = "index.php">Product Stock Search<a>
<a href = "orders.php">Order Search<a>
<br><br>
<form method="post">
<label>Product Search</label>
<input type="text" name="productSearch">
<input type="submit" name="productSubmit">
</form> -->
</body>
</html>
