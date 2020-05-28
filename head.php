<?php
include('conn.php');
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom CSS-->
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">

    <title>PHP CRUD</title>
  </head>
  <body>
  <div class="container">
  <div class="content-head">
  <div class="content-head-body">

<?php
//Change the hyperliks if the User is already login and show logut button
if(!isset($_SESSION['login_user'])){
   echo "<span id = 'loginSignUp'><a href = 'login.php'>Login</a> | <a href = 'signup.php'>Sign Up</a></span>";

} else {
     echo "<span id = 'loginSignUp'><a href = 'logout.php'>Logout</a></span>";
}
?>



  </div></div>

  <div class="navigation">

    <?php
    //Change the hyperliks if the User is already login and show logut button
    if(!isset($_SESSION['login_user'])){
      echo "
      <nav class='navbar navbar-expand-lg navbar-light bg-light'>
          <a class='navbar-brand' href='index.php'>HOME</a>
          <button class='navbar-toggler' type='button' data-toggle='collapse' data-target = '#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
          </button>
        </nav>
      ";

    } else {
         echo "
         <nav class='navbar navbar-expand-lg navbar-light bg-light'>
             <a class='navbar-brand' href='index.php'>HOME</a>
             <button class='navbar-toggler' type='button' data-toggle='collapse' data-target = '#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
               <span class='navbar-toggler-icon'></span>
             </button>
             <div class='collapse navbar-collapse'>
               <ul class='navbar-nav'>
                 <li class='nav-item'>
                   <a class='nav-link' href='create.php'>CREATE</a>
                 </li>
                 <li class='nav-item'>
                   <a class='nav-link' href='read.php'>READ</a>
                 </li>
                 <li class='nav-item'>
                   <a class='nav-link' href='update.php'>UPDATE</a>
                 </li>
                 <li class='nav-item'>
                   <a class='nav-link' href='delete.php'>DELETE</a>
                 </li>
               </ul>
             </div>
           </nav>
         ";
    }
    ?>





    </div>
