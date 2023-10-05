<?php
    session_start();

    if(!isset($_SESSION['logged'])) {
        header("location: login.php");
    }
    if(!isset($_GET['id'])) {
        header("location: leavesection.php");

    }

    include 'includes/leave.php';
    $id = $_GET['id'];
    $record = json_decode(get_id($conn, $id));
    $records = json_decode(get($conn));

    if(isset($_POST['update'])) {
        date_default_timezone_set("Singapore");
        $date = date("YmdHis");

        $name = $conn->real_escape_string($_POST['name']);
        $letter = $conn->real_escape_string($_POST['letter']);
        $status = $conn->real_escape_string($_POST['status']);

        if ($letter != null ) {
            $letter = $letter;
        }
        else{
            $letter = $record[0]->letter;
        }
            update($conn, $name, $letter, $status, $id);
            header("location: leavesection.php");
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
    <title>Logbook</title>

    <link rel="shortcut icon" type="x-icon" href="1.png">
    

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

<body>

        <div class="container bg-light rounded-4 p-5">
         <div class="row justify-content align-items-center">


      <div class="col-lg-6">
         <img src="1.png" class="img-fluid" alt="">
      </div>
      <div class="col-lg-6">

            <form method="post" enctype="multipart/form-data">
                 <small class="my-2 text-muted"></small>
                <h3>Update Status</h3>

                <div class='mb-3 form-control shadow-none rounded-pull' ><?php echo "<strong>Name:</strong> <span>".$record[0]->name."</span>";?></div>

                <div class='mb-3 form-control shadow-none rounded-pull' ><?php echo "<strong>Letter:</strong> <span>".$record[0]->letter."</span>";?></div>

                
                <div class="mb-3">
                    <label>Please Approve or Reject Request</label><br>
                <select class="select" name="status">
                 <option value="Approved">Approve</option>
                 <option value="Rejected">Reject</option>
                    </select>
                </div>

                    <button class="btn btn-primary shadow-none rounded-pull" type="submit" name="update">Update Now</button>
                    <a href="leavesection.php" class="btn btn-primary">Back</a><br><br>
            </form>
        
    </div>
</body>
</html>