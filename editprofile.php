<?php 

  session_start();

  require 'connect.php';
  require 'functions.php';

  if(isset($_POST['update'])) {

    $name = clean($_POST['name']); 
    $course_section = clean($_POST['course_section']);
    $sex = clean($_POST['sex']); 
    $school_year = clean($_POST['school_year']);
    $address = clean($_POST['address']);
    $dorm = clean($_POST['dorm']);
    $room = clean($_POST['room']);
    $sem = clean($_POST['sem']); 

    $query = "UPDATE students SET name = '$name', course_section = '$course_section', sex = '$sex', school_year = '$school_year', dorm = '$dorm', room = '$room', sem = '$sem'
    WHERE id='".$_SESSION['userid']."'";

    if($result = mysqli_query($con, $query)) {

      $_SESSION['prompt'] = "Profile Updated";
      header("location:profile.php");
      exit;

    } else {

      die("Error with the query");

    }

  }

  if(isset($_SESSION['username'], $_SESSION['password']))

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


<body>

  <br>

   <br>
  <br> <br>

     <div class="container bg-light rounded-4 p-5">
         <div class="row justify-content align-items-center">

      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        
        <small class="my-2 text-muted"></small>
      <h3>Edit Profile</h3>
          

           <div class="form-group">
          <label>Student No:</label>
          <?php 
            $query = "SELECT studentno FROM students WHERE id = '".$_SESSION['userid']."'";
            $result = mysqli_query($con, $query);
            $row = mysqli_fetch_row($result);

            echo "<p>".$row[0]."</p>";
          ?>
<div class="row">
          <div class="account-info col-sm-6">
          
            <fieldset>
                    <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" class="form-control" name="name" placeholder="Full Name" required>
              </div>

              <div class="form-group">
                <label for="course_section">Course Year & Section</label>
                <input type="text" class="form-control" name="course_section" placeholder="Course Year & Section" required>
              </div>

              <div class="form-group">
                <label for="sex">Gender</label>
                <select class="form-control" name="sex">
                  <option>Male</option>
                  <option>Female</option>
                </select>
              </div>

              <div class="form-group">
                <label for="school_year">School Year</label>
                <input type="text" class="form-control" name="school_year" placeholder="School Year" required>
              </div>
            </fieldset>
          </div>

          <div class="account-info col-sm-6">
          
            <fieldset>
              <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address" placeholder="Address" required>
              </div>

              <div class="form-group">
                <label for="dorm">Dorm</label>
                <select class="form-control" name="dorm">
                  <option>Zeus</option>
                  <option>Poseidon</option>
                  <option>Hera</option>
                  <option>Aphrodite</option>
                  <option>Athena</option>
                </select>
              </div>

              <div class="form-group">
                <label for="roomm">Room</label>
                <select class="form-control" name="room">
                  <option>Room 1</option>
                  <option>Room 2</option>
                  <option>Room 3</option>
                  <option>Room 4</option>
                  <option>Room 5</option>
                  <option>Room 6</option>
                  <option>Room 7</option>
                  <option>Room 8</option>
                  <option>Room 9</option>
                  <option>Room 10</option>
                </select>
              </div>

              <div class="form-group">
                <label for="sem">Semester</label>
                <input type="text" class="form-control" name="sem" placeholder="Semester" required>
              </div>
              </fieldset>
            </div>
            </div>
            <br>
          
        
        <div class="form-footer ">
          <input class="btn btn-primary" type="submit" name="update" value="Update Profile">
           <a class="btn btn-primary" href="profile.php">Go back</a>
        </div>
        

      </form>
    </div>
   </div>

	<script src="assets/js/jquery-3.1.1.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/main.js"></script>
</body>
</html>