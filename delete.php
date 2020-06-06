<?php include 'head.php';?>
<?php require 'session.php';?>
<div class="content-body">
    <h1>Delete</h1>
    <?php
    $login_user = $_SESSION['login_user'];

    if (isset($_POST['submit'])) {
    $id = $_POST['id'];

    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    // sql to delete a record
    $sql = "DELETE FROM post WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
      echo "<div class='alert alert-success' role='alert'>
      Succesfully Deleted!
        </div>";
    } else {
      echo "<div class='alert alert-danger' role='alert'>
      Error on Deletion
        </div>" . $conn->error;
    }
    }

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT id, posted_by, post_date, post_title, post_body FROM post WHERE posted_by = '$login_user'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_array($result)) {
        echo "
        <div class='content-post jumbotron'>
        <h1 class='display-4'>$row[post_title]</h1>
        <p class='lead'><strong>Posted by</strong>: $row[posted_by] <strong>Date:</strong> $row[post_date]</p>
        <form name='delete' method = 'POST' action = 'delete.php'>
        <input type = 'hidden' value = '$row[id]' name = 'id' />
        <input type = 'hidden' value = '$row[post_title]' name = 'title' />
        <input type = 'hidden' value = '$row[post_body]' name = 'body' />
        <button type='submit' class='btn btn-primary' name = 'submit'>Delete</button>
        </form></div>
        ";
      }
    } else {
      echo "0 results";
    }
    $conn->close();
    ?>
</div>

<?php include 'footer.php';?>
