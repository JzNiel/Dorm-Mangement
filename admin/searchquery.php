<?php 


	require 'connect.php';
	require 'functions.php';

	$s = clean($_GET['s']);

	$query = "SELECT studentno, name, course_section, sex, dorm, date,CONCAT(name) as name 
	FROM students WHERE CONCAT(name) LIKE '".$s."%'";

	if($result = mysqli_query($con, $query)) {

		if(mysqli_num_rows($result) == 0) {
			echo "<ul><li class='none'>No results to display</li></ul>";
		} else {

			echo "<ul>";

			while($row = mysqli_fetch_assoc($result)) {
				echo "<li>";
				echo "<span class='name'>".$row['name']."</span>";

				echo "<div class='details'>";

				echo "<span><strong>#: </strong>".$row['studentno']."</span>";
				echo "<span><strong>course: </strong>".$row['course_section']."</span>";
				echo "<span><strong>yr level: </strong>".$row['dorm']."</span>";

				echo "</div></li>";

			}

			echo "</ul>";

		}

	} else {
		die("Error with the query");
	}

	mysqli_close($con);

?>
