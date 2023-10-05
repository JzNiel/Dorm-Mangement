<?php 

  session_start();

  require 'connect.php';
  require 'functions.php';

  if(isset($_SESSION['email'], $_SESSION['password'])) {

?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Profile</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="shortcut icon" type="x-icon" href="1.png">

  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
 <style>
body{
         max-height: 100vh;
         background-color: white;
      }


      .container h3{
        text-align: left;
  padding: 0 0 20px 0;
  border-bottom: 1px solid silver;
  font-size: 30px;
  color: black;
      } 

        .mb-3 label{
            color: black;
        }
</style> 

</head>


  <?php include 'header.php'; ?>
  <br>
  <br>

   <br>
  <br> <br>
  <br> <br>
  <br>

<body>


  <div class="container bg-light rounded-4 p-5">
         <div class="row justify-content align-items-center">

    
    <form action="" method="post">

      <h3>My Profile

      
       </h3>

      
    


      <?php

        if(isset($_SESSION['prompt'])) {
          showPrompt();
        }


        $query = "SELECT * FROM students WHERE email = '".$_SESSION['email']."' AND password = '".$_SESSION['password']."'";

        ;

        if($result = mysqli_query($con, $query)) {

          $row = mysqli_fetch_assoc($result);

        } else {

          die("Error with the query in the database");

        }

      ?>
      <div class="col-sm-6">
        <fieldset>
         <div class='mb-3 form-control shadow-none rounded-pull' ><?php echo "<strong>Student No:</strong> <span>".$row['studentno']."</span>";?></div>
          <div class='mb-3 form-control shadow-none rounded-pull'><?php echo"<strong>Student Name:</strong> <span>".$row['name']."</span>";?></div>
         <div class='mb-3 form-control shadow-none rounded-pull'><?php  echo "<strong>Course Year & Section:</strong> <span>".$row['course_section']."</span>";?></div>
          <div class='mb-3 form-control shadow-none rounded-pull'><?php echo "<strong>Gender:</strong> <span>".$row['sex']."</span>";?></div>
          <div class='mb-3 form-control shadow-none rounded-pull'><?php echo "<strong>Points:</strong> <span>".$row['point']."</span>";?></div>
        </fieldset>
        </div>
        <div class="col-sm-6">
        <fieldset>
          <div class='mb-3 form-control shadow-none rounded-pull'><?php echo "<strong>School Year:</strong> <span>".$row['school_year']."</span>";?></div>
          <div class='mb-3 form-control shadow-none rounded-pull'><?php echo "<strong>Address:</strong> <span>".$row['address']."</span>";?></div>
          <div class='mb-3 form-control shadow-none rounded-pull'><?php echo "<strong>Dorm:</strong> <span>".$row['dorm'].",".$row['room'] ."</span>";?></div>
          <div class='mb-3 form-control shadow-none rounded-pull'><?php echo "<strong>Semester:</strong> <span>".$row['sem']."</span>";?></div>
        </fieldset>
      </div>
      

   
  <script src="assets/js/jquery-3.1.1.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>

<?php


  } else {
    header("location:index.php");
    exit;
  }

  unset($_SESSION['prompt']);
  mysqli_close($con);

?>