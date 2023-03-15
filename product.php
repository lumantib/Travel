<?php include('./include/header.php'); ?>

<?php
// For Viewing
if (isset($_GET['id'])) {
	$connection = mysqli_connect("localhost", "root", "", "lumanti_web_app");
	if (!$connection) {
		die("Connection error" . mysqli_connect_error());
	}

	$query = "select * from products where id='$_GET[id]'";
	$result = mysqli_query($connection, $query);
	if (!$result) {
		die("Query failed..." . mysqli_error($connection));
	}
	$row = mysqli_fetch_assoc($result);
}

// For purchasing
if (isset($_GET['purchase'])) {
	$connection = mysqli_connect("localhost", "root", "", "lumanti_web_app");
	if (!$connection) {
		die("Cannot connect to the database server" . mysqli_connect_error());
	}
	$query = "insert into purchased(Product_ID, Product, Price, image, Username)
  values('$_GET[id]', '$_GET[Product]', '$_GET[Price]','$_GET[image]', '$username')
  ";
	mysqli_query($connection, $query);
	if (!$query) {
		die("Query error: " . mysqli_error($connection));
	}
	mysqli_close($connection);
	echo "<h2>Package Purchased</h2>";
}


echo <<<__HTML__

<div class="items-container">
    <div class="items-contains">
<div class='product-item-container'>
<div class-'image-div'>
	<img src="./image/$row[image]" class="product-image" />
	</div>
	<div class="product-info">
		<span>Name: $row[Product]</span>
		<span>Price: $row[Price]</span>
		<a class="btn" href='product.php?id=$row[ID]&Product=$row[Product]&Price=$row[Price]&image=$row[image]&purchase=true'>Purchase</a>
	</div>
</div>
</div>
</div>
__HTML__;
?>
</body>

</html>