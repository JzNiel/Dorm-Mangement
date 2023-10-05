<?php
    session_start();

    if(isset($_SESSION['logged'])) {
    }

    include 'includes/admin.php';

    if(isset($_POST['submit'])) {
        $username = $conn->real_escape_string($_POST['username']);
        $password = $conn->real_escape_string($_POST['password']);
        $password = md5($password);
        $res = json_decode(admin($conn, $username, $password));
        if(sizeof($res) > 0) {
            $_SESSION['username'] = $username;
            $_SESSION['logged'] = true;
            $_SESSION['id'] = $res[0]->id;
            header("location: stu-section.php");
        }
        else{
      $error[] = 'incorrect username or password!';
   }
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
      <h3>Login Now</h3>
       <?php
                    if(isset($error)){
                        foreach($error as $error){
                            echo '<span class="error-msg">'.$error.'</span>';
                        };
                    };
                    ?>
       <div class="mb-3">
      <input type="text" name="username" required value="" placeholder="Username" class="form-control shadow-none rounded-pull">
      </div>

      <div class="mb-3">
      <input type="password" name="password"required value="" placeholder="Password" class="form-control shadow-none rounded-pull">
      </div>

      <button class="btn btn-primary shadow-none rounded-pull" type="submit" name="submit">Login</button>
      <br>
   </form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    </div>
         </div>
   </div>
</body>
</html>