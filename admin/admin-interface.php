<?php
session_start();
if(!isset($_SESSION['logged'])) {
    header("location: log/login.php");
}

include 'includes/admin.php';

?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Ocean of Knowledge - Home</title>

  </head>

  <body>
    <?php
    include_once 'admin-header.php';
    ?>

    
  </body>

  </html>