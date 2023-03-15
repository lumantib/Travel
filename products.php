<?php include('./include/header.php'); ?>

<!-- For calling products from database -->
<?php
$connection = mysqli_connect("localhost", "root", "", "lumanti_web_app");
if (!$connection) {
    die("Connection failed..." . mysqli_connect_error());
}
$query = "select * from products ";
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
        <div class='image-div'>
            <img src="./image/$row[image]" class="product-image" alt='image'/>
            </div>
            <div class="product-info">
                <span>Name: $row[Product]</span>
                <span>Price: $row[Price]</span>
                <a class="btn" href='product.php?id=$row[ID]&Product=$row[Product]&Price=$row[Price]&image=$row[image]'>Details</a>
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