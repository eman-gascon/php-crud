<?php include 'head.php';?>
<? session_start(); ?>
<?php require 'session.php';?>
<div class="content-body">
  <h1>Create Post</h1>
  <?php
  if (isset($_POST['submit']))
  {
    $postTitle = mysqli_real_escape_string($conn, $_POST['PostTitle']);
    $postBody = mysqli_real_escape_string($conn,$_POST['PostBody']);
    $postDate = date("j F Y");
    $postLoginUser = $_SESSION['login_user'];
  if ($postTitle === "") {
    echo "
    <div class='alert alert-danger' role='alert'>Title is required!</div>";
  }
  if ($postBody === "") {
    echo "
    <div class='alert alert-danger' role='alert'>Post body is required!</div>";
  } else {
//Insert Data to DB
  if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
  }
  $sql = "INSERT INTO post (posted_by, post_date , post_title, post_body)
VALUES ('$postLoginUser' , '$postDate' , '$postTitle' , '$postBody')";

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
}//End If isset

  ?>
  <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
  <div class="form-group">
    <label for="PostTitle">Title:</label>
    <input type="text" class="form-control" id="PostTitle" name = "PostTitle" placeholder="">
  </div>
  <div class="form-group">
    <label for="PostBody">Body</label>
    <textarea class="form-control" id="PostBody" cols = "5" rows="3" name = "PostBody"></textarea>
  </div>
  <button type="submit" class="btn btn-primary" name = "submit">Post</button>
  <button type="reset" class="btn btn-primary">Clear</button>
 </form>
</div>

<?php include 'footer.php';?>
