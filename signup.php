<?php require_once("conn.php"); ?>
<?php include 'head.php';?>
<div class="content-body">
<h1>Sign Up</h1>

<?php
if (isset($_POST['submit']))
{
//Set Variables
$username = $_POST['username'];
$password = md5($_POST['password']);
$repassword = md5($_POST['repassword']);
$email = $_POST['email'];

$usernameLength = strlen($username);
$passwordLength = strlen($password);

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
}
if ($repassword === "") {
  echo "
  <div class='alert alert-danger' role='alert'>
Retype passwored is required!
  </div>";
}
if ($email === "") {
  echo "
  <div class='alert alert-danger' role='alert'>
Email is required!
  </div>";
}
if ($usernameLength <= 3) {
  echo "
  <div class='alert alert-danger' role='alert'>
Username too short! Must be 3 characters in length.
  </div>";
}
if ($passwordLength <= 3) {
  echo "
  <div class='alert alert-danger' role='alert'>
Password too short! Must be 3 characters in length.
  </div>";
}


//Check if Password and Retype Password Match
else {

if ($password != $repassword) {
  echo "
  <div class='alert alert-danger' role='alert'>
Password and Retype Password does not match, please try again!
  </div>";
} else {
//Insert Data to DB
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql = "INSERT INTO user (username , password, email)
VALUES ('$username' , '$password' , '$email')";

if (mysqli_query($conn, $sql)) {
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


  <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
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

  <button type="submit" class="btn btn-primary" name = "submit">Submit</button>
</form>
</div>

<?php include 'footer.php';?>
