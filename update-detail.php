<?php include 'head.php';?>
<?php require 'session.php';?>
<div class="content-body">
    <h1>Update</h1>

    <?php
      if (isset($_POST['submit'])) {
      $id = $_POST['id'];
      $title = $_POST['title'];
      $body = $_POST['body'];

      if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
      }
      $sql = "UPDATE post SET post_title = '$title' , post_body = '$body' WHERE id = '$id'";

      if (mysqli_query($conn, $sql)) {
      echo "
      <div class='alert alert-success' role='alert'>
    Update Succesfully!
      </div>";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
  }
    ?>

    <?php
    if (isset($_GET['submit'])) {

    $id = $_GET['id'];
    $title = $_GET['title'];
    $body = $_GET['body'];
?>
    <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
    <input type = 'hidden' value = '<?php echo $id ?>' name = 'id' />
    <div class="form-group">
      <label for="PostTitle">Title:</label>
      <input type="text" class="form-control" id="PostTitle" name = "title" value = "<?php echo $title ?>"placeholder="">
    </div>
    <div class="form-group">
      <label for="PostBody">Body</label>
      <textarea class="form-control" id="PostBody" cols = "5" rows="3" name = "body"><?php echo $body ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary" name = "submit">Post</button>
    <button type="reset" class="btn btn-primary">Clear</button>
   </form>

<?php } ?>
</div>

<?php include 'footer.php';?>
