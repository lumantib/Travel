<?php session_start(); 
if (isset($_SESSION['user1'])) {
    $username=$_SESSION['user1']['Username'];
}
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Travel Package</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./CSS/index.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="./CSS/product.css?v=<?php echo time(); ?>" />
</head>

<body>
    <!-- Navbar Content -->
    <div class="navbar-container">
        <div class="navbar-contains">
            <div>
                <img src='./images/plane.jpg' alt="logo" class="nav-image">
            </div>
            <div>
                <a href="products.php">Products</a>
                <a href="purchased_products.php">Purchased Products</a>
            </div>
            <div>
                <?php
                if (!isset($_SESSION['user1'])) {
                    echo "<a href='login.php'>Login</a>";
                } else {
                    echo $_SESSION['user1']['Username'];
                    echo "<a href='login.php?action=logout'>Logout</a>";
                }
                ?>
            </div>
        </div>
    </div>