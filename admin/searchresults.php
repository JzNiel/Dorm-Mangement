<?php 

  session_start();

  require 'connect.php';
  require 'functions.php';


  if(isset($_SESSION['email'], $_SESSION['password'])) {

?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Search Result - Student Information System</title>

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

  <?php include 'admin-header.php'; ?>


  <br><br><br><br><br>

  <section>

    <?php 

      if(isset($_GET['search'])) {

        $s = clean($_GET['searchbox']);

        $query = "SELECT studentno, name, course_section, dorm, room, date,
        FROM students WHERE name = '$s'";
    ?>

    <div class="container">
      <strong class="title">Search results for "<?php echo $s; ?>".</strong>


    


    <?php

        if($result = mysqli_query($con, $query)) {

          if(mysqli_num_rows($result) == 0) {

            echo "<p>No results matches to your query.</p>";
            echo "</div>";

          } else {
            echo "</div>";
            echo "<ul class='profile-results'>";

            while($row = mysqli_fetch_assoc($result)) {

          ?>

              <li>
                <div class="result-box box-left">
                  <div class='info'><strong>Student No:</strong> <span><?php echo $row['studentno']; ?></span></div>
                  <div class='info'><strong>Student Name:</strong> <span><?php echo $row['name']; ?></span></div>
                  <div class='info'><strong>Course:</strong> <span><?php echo $row['course_section']; ?></span></div>
                  <div class='info'><strong>Year Level:</strong> <span><?php echo $row['dorm'] . ", ".$row['room']; ?></span></div>
                  <div class='info'><strong>Date Joined:</strong> <span><?php echo $row['date']; ?></span></div>
                </div>
              </li>

          <?php

            }

            echo "</ul>";

          }

        } else {
          die("Error with the query");
        }

      }

    ?>
  
    <div class="container">
      <a href="stu-section.php">Go back to My Profile</a>
    </div>
    

  </section>


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

  mysqli_close($con);

?>