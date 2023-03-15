<?php include('./include/header.php'); ?>

<?php
function saveUser()
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $connection = mysqli_connect("localhost", "root", "", "lumanti_web_app");
    if (!$connection) {
        die("Cannot connect to the database server" . mysqli_connect_error());
    }

    $query = "select * from user where username='$username' and password='$password'";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query error: " . mysqli_error($connection));
    }
    if (!mysqli_num_rows($result)) {
        echo "<h2>Invalid Login Credentials</h2>";
        showForm();
    } else {
        $_SESSION['user1'] = mysqli_fetch_assoc($result);
        header("Location: http://localhost/College/Web%20App/LumantiWebApp/travel_package/products.php");
    }
    mysqli_close($connection);
}
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'logout') {
        unset($_SESSION['user1']);
        header("Location: http://localhost/College/Web%20App/LumantiWebApp/travel_package/login.php");
    }
}

if (isset($_POST['__CHECK__'])) {
    saveUser();
} else {
    showForm();
}

function showForm()
{
    echo <<<__LOGIN__
        <!-- Login Container -->
        <div class='log-contains'>
            <div class="login-container">
                <h2>Login</h2>
                <form action="$_SERVER[PHP_SELF]" method="POST">
                    <table>
                        <tr>
                            <td>Username:</td>
                            <td><input placeholder="Username" name='username'/></td>
                        </tr>
                        <tr>
                            <td>Password:</td>
                            <td><input placeholder="Password" name='password'/></td>
                        </tr>
                        <input type="hidden" value="1" name='__CHECK__' />
                        <tr>
                            <td>
                                <button type='submit'>Login</button>
                            </td>
                        </tr>
                    </table>
                </form>
                <div>
                    <p>Don't have an account? <a href="register.php" class='acc-button'>Register</a></p>
                </div>
            </div> 
        </div>
__LOGIN__;
}

?>
</body>

</html>