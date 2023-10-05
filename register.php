<?php 

  session_start();

  require 'connect.php';
  require 'functions.php';


  if(isset($_POST['register'])) {

    $email = clean($_POST['email']); 
    $pword = clean($_POST['password']); 
    $studno = clean($_POST['studentno']); 
    $name = clean($_POST['name']); 
    $course_section = clean($_POST['course_section']);
    $sex = clean($_POST['sex']); 
    $school_year = clean($_POST['school_year']);
    $address = clean($_POST['address']);
    $dorm = clean($_POST['dorm']);
    $room = clean($_POST['room']);
    $sem = clean($_POST['sem']); 
 


    $query = "SELECT email FROM students WHERE email = '$email'";
    $result = mysqli_query($con,$query);

    if(mysqli_num_rows($result) == 0) {

      $query = "SELECT studentno FROM students WHERE studentno = '$studno'";
      $result = mysqli_query($con,$query);

      if(mysqli_num_rows($result) == 0) {


        $query = "INSERT INTO students   (email, password, studentno, name, course_section, sex, school_year, address, dorm, 
          room, sem)
        VALUES ('$email', '$pword', '$studno', '$name', '$course_section', '$sex', '$school_year','$address', '$dorm','$room',
         '$sem')";

        if(mysqli_query($con, $query)) {

          $_SESSION['prompt'] = "Account registered. You can now log in.";
          header("location:index.php");
          exit;

        } else {

          die("Error with the query");

        }

      } else {

        $_SESSION['errprompt'] = "That student number already exists.";

      }

    } else {

      $_SESSION['errprompt'] = "Username already exists.";

    }

  } 

?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Register - Student Information System</title>
<link rel="shortcut icon" type="x-icon" href="1.png">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head>
<body>

  <section class="center-text">
    
    <strong>Register</strong>

    <div class="registration-form box-center clearfix">

    <?php 
        if(isset($_SESSION['errprompt'])) {
          showError();
        }
    ?>

      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        
        <div class="row">
          <div class="account-info col-sm-6">
          
            <fieldset>
              <legend>Account Info</legend>
              
              <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" name="email" placeholder="Email Address" required>
              </div>

              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password" required>
              </div>

            </fieldset>
            

          </div>

          <div class="personal-info col-sm-6">
            
            <fieldset>
              <legend>Personal Info</legend>
              
              <div class="form-group">
                <label for="studentno">Student ID</label>
                <input type="text" class="form-control" name="studentno" placeholder="Student ID" required>
              </div>

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

        
        
        <a href="index.php">Go back</a>
        <input class="btn btn-primary" type="submit" name="register" value="Register">



      </form>
    </div>

  </section>


	<script src="assets/js/jquery-3.1.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>

<?php 

  unset($_SESSION['errprompt']);
  mysqli_close($con);

?>