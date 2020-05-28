<?php require_once("conn.php"); ?>
<?php include 'head.php';?>

<div class="content-body">
    <h1>Login</h1>
    <?php
    if (isset($_POST['submit']))
    {
    //Set Variables
    $username = $_POST['username'];
    $password = md5($_POST['password']);


    //Validation
    if ($username === "") {
      echo "
      <div class='alert alert-danger' role='alert'>
    Username is required!
      </div>";
    }
    if ($password === "") {
      echo "
      <div class='alert alert-danger' role='alert'>
    Passwored is required!
      </div>";
    } else {
    //Query DB
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT id  FROM user
    WHERE username =  '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
      $_SESSION['login_user'] = $username;
      header("location: admin.php");
    } else {
      echo "
      <div class='alert alert-danger' role='alert'>
      Invalid Username or Password, please try again!
      </div>";
    }
 }
}
    ?>


      <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
      <div class="form-group">
        <label for="Username">Username: </label>
        <input type="text" class="form-control" id="username" placeholder="Enter Username" name = "username">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" placeholder="Enter Password" name = "password">
      </div>
      <button type="submit" class="btn btn-primary" name = "submit">Submit</button>
    </form>
</div>

<?php include 'footer.php';?>
