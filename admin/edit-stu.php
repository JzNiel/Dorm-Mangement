<?php
    session_start();

    if(!isset($_SESSION['logged'])) {
        header("location: login.php");
    }
    if(!isset($_GET['id'])) {
        header("location: stu-section.php");

    }

    include 'includes/stu.php';


    $id = $_GET['id'];
    $record = json_decode(get_id($conn, $id));
    $records = json_decode(get($conn));


    if(isset($_POST['update'])) {
        date_default_timezone_set("Singapore");
        $date = date("YmdHis");

        $name = $conn->real_escape_string($_POST['name']);
        $point = $conn->real_escape_string($_POST['point']);

        if ($name != null ) {
            $name = $name;
        }
        else{
            $name = $record[0]->name;
        }
            update($conn, $name, $point, $id);
            header("location: stu-section.php");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>

   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="shortcut icon" type="x-icon" href="1.png">

    <style>
      body{
         max-height: 100vh;
         margin: 100px auto;
         background-color: white;
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

   <form action="" method="post">
      <small class="my-2 text-muted"></small>
      <h3>Points of Students</h3>
       <?php
                    if(isset($error)){
                        foreach($error as $error){
                            echo '<span class="error-msg">'.$error.'</span>';
                        };
                    };
                    ?>


                <div class="mb-3">
                        <input type="text" name="name" required class=" form-control shadow-none rounded-pull"
                        value="<?php echo $record[0]->name; ?>">
                    </div>
                   
                    <div class="mb-3">
                        <input type="'text', 'number'" name="point" required class="form-control shadow-none rounded-pull"
                        value="<?php echo $record[0]->point; ?>">
                    </div>


                    <button class="btn btn-primary" type="submit" name="update">Update-now</button>
                    <a href="stu-section.php" class="btn">Back</a><br><br>
            </form>
        
    </div>
</body>
</html>