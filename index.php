<!DOCTYPE html>
<html>
<head>
	<title>Product Stock Search</title>
  <link rel="stylesheet" href="css/style.css" />
</head>
<body>

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
        <input type="submit" name="productSubmit">
        </form>
        <?php
if (isset($_POST["productSubmit"])) {
	$test = False;
	
	$str = $_POST["productSearch"];
	
	$con = new PDO("mysql:host = localhost; dbname=search", 'citadmin','citadmin');
	$sql = "SELECT productId, name, stock FROM Products WHERE name LIKE '%$str%';";
	
  print "<div style='overflow:auto; width:400px; height: 500px;'>";
	print "<table border = '1'>";
	foreach ($con -> query($sql) as $row) {
		if ($test == False)
			print "<tr><td>Product ID</td><td>Product Name</td><td>Stock Available</td></tr>";
		$test = True;
		print "<tr><td>" . $row['productId'] . "</td><td>" . $row['name'] . "</td><td>" . $row['stock'] . "</td></tr>";
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
