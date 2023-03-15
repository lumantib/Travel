<?php
error_reporting(0);

$msg = "";

// If upload button is clicked ...
if (isset($_POST['upload'])) {

    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./image/" . $filename;

    $connection = mysqli_connect("localhost", "root", "", "lumanti_web_app");
    if (!$connection) {
        die("Cannot connect to the database server" . mysqli_connect_error());
    }
    $query = "insert into products(Product, Price, image)
    values('$_POST[Product]', '$_POST[Price]', '$filename')";

    mysqli_query($connection, $query);
    if (!$query) {
        die("Query error: " . mysqli_error($connection));
    }
    // Now let's move the uploaded image into the folder: image
    if (move_uploaded_file($tempname, $folder)) {
        echo "<h3>  Image uploaded successfully!</h3>";
    } else {
        echo "<h3>  Failed to upload image!</h3>";
    }
    mysqli_close($connection);
}


?>

<!DOCTYPE html>
<html>

<head>
    <title>Image Upload</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
    <div id="content">
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
                <input class="form-control" type="input" name="Product" value="" />
            </div>
            <div class="form-group">
                <input class="form-control" type="input" name="Price" value="" />
            </div>
            <div class="form-group">
                <input class="form-control" type="file" name="uploadfile" value="" />
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit" name="upload">UPLOAD</button>
            </div>
        </form>
    </div>
    <div id="display-image">
        <?php
        $query = " select * from image ";
        $result = mysqli_query($db, $query);

        while ($data = mysqli_fetch_assoc($result)) {
        ?>
            <img src="./image/<?php echo $data['filename']; ?>">

        <?php
        }
        ?>
    </div>
</body>

</html>