<?php
    session_start();

    //if(!isset($_SESSION['logged'])) {
        //header("location: login.php");
    

    include 'admin/includes/leave.php';
    $records = json_decode(get($conn));

    if(isset($_POST['add'])) {

        date_default_timezone_set("Singapore");
        $date = date("YmdHis");
        
        $name = $conn->real_escape_string($_POST['name']);
        $letter = $conn->real_escape_string($_POST['letter']);
        $status = $conn->real_escape_string($_POST['status']);
        

        add($conn, $name, $letter, $status);
        header("location: add-leave.php");
        }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Leave Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="shortcut icon" type="x-icon" href="1.png">
    <link rel="stylesheet" href="css/style.css">

<style>
      body{
         max-height: 100vh;
         background-color: white;
      }


      .container h3{
        text-align: center;
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
<br>
<body>


   
<div class="container bg-light rounded-4 p-5">
         <div class="row justify-content align-items-center">


      <div class="col-lg-6">
         <img src="1.png" class="img-fluid" alt="">
      </div>
      <div class="col-lg-6">

   <form method="post">
    <small class="my-2 text-muted"></small>
      <h3>Leave Form</h3>
      
      <div class="mb-3">
      <input type="text" name="name" placeholder="Name" class="form-control shadow-none rounded-pull">
          </div>
      
      <div class="mb-3">
      <input type="text" name="letter" placeholder="Letter" class="form-control shadow-none rounded-pull">
          </div>

        <div class="align-left">
      <button class="btn btn-primary" type="submit" name="add">Request Now</button>
      <a href="leavesection.php" class="btn btn-primary">Back</a>
      </div><br><br>
      <br>
<br>

   </form>

</div>
</div>
</div>

</body>
</html>