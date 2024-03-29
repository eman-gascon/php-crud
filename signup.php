<?php require_once("conn.php"); ?>
<?php include 'head.php';?>
<div class="content-body">
<h1>Sign Up</h1>

<?php
if (isset($_POST['submit']))
{
//Set Variables
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, md5($_POST['password']));
$repassword = mysqli_real_escape_string($conn, md5($_POST['repassword']));
$email = mysqli_real_escape_string($conn, $_POST['email']);
$usernameLength = mysqli_real_escape_string($conn, strlen($username));
$passwordLength = mysqli_real_escape_string($conn, strlen($password));

//Validation
if ($username === "") {
  echo "
  <div class='alert alert-danger' role='alert'>
Username is required!
  </div>";
}
elseif ($password === "") {
  echo "
  <div class='alert alert-danger' role='alert'>
Passwored is required!
  </div>";
}
elseif  ($repassword === "") {
  echo "
  <div class='alert alert-danger' role='alert'>
Retype passwored is required!
  </div>";
}
elseif  ($email === "") {
  echo "
  <div class='alert alert-danger' role='alert'>
Email is required!
  </div>";
}
elseif  ($usernameLength <= 3) {
  echo "
  <div class='alert alert-danger' role='alert'>
Username too short! Must be 3 characters in length.
  </div>";
}
elseif  ($passwordLength <= 3) {
  echo "
  <div class='alert alert-danger' role='alert'>
Password too short! Must be 3 characters in length.
  </div>";
}
//Check if Password and Retype Password Match
elseif  ($password != $repassword) {
  echo "
  <div class='alert alert-danger' role='alert'>
Password and Retype Password does not match, please try again!
  </div>";
}

elseif ($_SESSION["captcha"] != $_POST["captcha"])
{
    //CAPTHCA is valid; proceed the message: save to database, send by e-mail …
    echo '<div class="alert alert-danger">CAPTHCA is not valid</div>';
}
else  {
      //Insert Data to DB
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      } else {
      $query_username = mysqli_query($conn, "SELECT * FROM user WHERE username ='".$username."'");
      $query_email = mysqli_query($conn, "SELECT * FROM user WHERE email ='".$email."'");

      $sql = "INSERT INTO user (username , password, email) VALUES ('$username' , '$password' , '$email')";

      if (mysqli_num_rows($query_username) > 0) {
        echo "
        <div class='alert alert-danger' role='alert'>
      Username already exists!
        </div>";
      }
      if (mysqli_num_rows($query_email) > 0) {
        echo "
        <div class='alert alert-danger' role='alert'>
      Email already exists!
        </div>";
      }
      elseif (mysqli_query($conn, $sql)) {
        echo "
        <div class='alert alert-success' role='alert'>
      Succesfully saved!
        </div>";
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
      mysqli_close($conn);
      }
    }
}
?>
  <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" onsubmit="validateCaptcha()">
  <div class="form-group">
    <label for="Username">Username: </label>
    <input type="text" class="form-control" id="username" placeholder="Enter Username" name = "username">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" placeholder="Enter Password" name = "password">
  </div>

  <div class="form-group">
    <label for="RePassword">Retype Password</label>
    <input type="password" class="form-control" id="RePassword" placeholder="Enter Retype Password" name = "repassword">
  </div>

  <div class="form-group">
    <label for="Name">E-mail: </label>
    <input type="email" class="form-control" id="email" placeholder="Enter E-mail" name = "email">
  </div>

<div class="form-group captcha">
<label for="pwd">Please Enter 3 Black Symbols</label>
<img src="captcha.php" alt="captcha image" id = "captcha">
<input type="text" name="captcha" size="3″ maxlength="3″ class="form-control">
</div>


  <div class=" form-group">
    <button type="submit" class="btn btn-primary" name = "submit" onclick="alert(ValidCaptcha())";>Submit</button>
    <button type="reset" class="btn btn-primary">Clear</button>
</div>
</form>
</div>

<?php include 'footer.php';?>
