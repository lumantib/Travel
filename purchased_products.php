<?php include('./include/header.php'); ?>

<!-- For calling products from database -->
<?php
$connection = mysqli_connect("localhost", "root", "", "lumanti_web_app");
if (!$connection) {
    die("Connection failed..." . mysqli_connect_error());
}
$query = "select * from purchased where Username='$username' ";
$result = mysqli_query($connection, $query);

if (!$result) {
    die("Query failed..." . mysqli_error($connection));
};
?>

<div class="items-container">
    <div class="items-contains">
        <div class="product-item-contains">

            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo <<<__PRODUCT__
        <div class='product-item-container'>
            <img src="./image/$row[image]" class="product-image" />
            <div class="product-info">
                <span>Name:  $row[Product]</span>
                <span>Price: $row[Product]</span>
                <button class="btn">Purchaseed</button>
            </div>
        </div>
__PRODUCT__;
            }
            ?>
        </div>
    </div>
</div>
</body>

</html>