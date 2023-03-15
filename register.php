<?php include('./include/header.php'); ?>

<?php
if (isset($_POST['__CHECK__'])) {
  saveData();
} else {
  showForm();
}

function saveData()
{
  $connection = mysqli_connect("localhost", "root", "", "lumanti_web_app");
  if (!$connection) {
    die("Cannot connect to the database server" . mysqli_connect_error());
  }
  $query = "insert into user(Username, Password)
    values('$_POST[username]', '$_POST[password]')
    ";
  mysqli_query($connection, $query);
  if (!$query) {
    die("Query error: " . mysqli_error($connection));
  }
  mysqli_close($connection);
  echo "<h2>Data Inserted Successfully</h2>";
  showForm();
}

function showForm()
{
  echo <<<__REGISTER__
  <!-- Register Container -->
  <div class='log-contains'>
    <div class="login-container">
      <h2>Register</h2>
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
              <button type='submit'>Register</button>
            </td>
          </tr>
        </table>
      </form>
      <div>
        <p>Already have an account? <a href="login.php" class='acc-button'>Login</a></p>
      </div>
    </div>
  </div>
__REGISTER__;
}
?>
</body>

</html>