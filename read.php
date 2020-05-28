<?php include 'head.php';?>
<?php require 'session.php';?>
<div class="content-body">
    <h1>Read</h1>
    <?php
    $login_user = $_SESSION['login_user'];
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT posted_by, post_date, post_title, post_body FROM post WHERE posted_by = '$login_user'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_array($result)) {
        echo "
        <div class='content-post jumbotron'>
        <h1 class='display-4'>$row[post_title]</h1>
        <p class='lead'><strong>Posted by</strong>: $row[posted_by] <strong>Date:</strong> $row[post_date]</p>
        <hr class='my-4'>
        <p class='lead'>$row[post_body]</p></div>";
      }
    } else {
      echo "0 results";
    }
    $conn->close();
    ?>
</div>

<?php include 'footer.php';?>
