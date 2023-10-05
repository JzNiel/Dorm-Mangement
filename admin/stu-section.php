<?php
session_start();
if (!isset($_SESSION['logged'])) {
    header("location: login.php");
}

include 'includes/stu.php';
$records = json_decode(get($conn));

?>

<!DOCTYPE html>
<html lang="en">

<head>  
           <title>Logbook</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
           <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">  
           <link rel="shortcut icon" type="x-icon" href="1.png">
      </head> 


      <style>

.container h2{
        text-align: center;
  padding: 0 0 20px 0;
  border-bottom: 1px solid silver;
  font-size: 40px;
  color: black;
      } 

th {

    background-color: #B6FCFF;
}
          
tr:hover {background-color: #D6EEEE;}


::-webkit-scrollbar {
    width: 6px;
}

::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
}

::-webkit-scrollbar-thumb {
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
}

      </style>

 <?php
        include_once 'admin-header.php';
        ?>
        <br><br><br><br>

<body>

   


      <br /><br />  
           <div class="container" style="width:1200px;">  
                <h2 align="center">Student List</h2> 

                <?php 
                require 'connect.php';
                if(isset($_POST['search'])){
                    $searchKey = $_POST['search'];
                    $sql = "SELECT name FROM students WHERE name LIKE '%$searchKey%'";

                }else{ 
                    $sql = "SELECT * FROM students";
                    $searchKey = "";
                }

                $result = mysqli_query($con, $sql);

                ?>

                <form action="" method="POST"> 
                    <div class="col-md-6">
                        <input type="text" name="search" class='form-control' placeholder="Search By Name" value=" <?php echo $searchKey; ?>" > 
                    </div>
                    <div class="col-md-6 text-left">
                        <button class="btn">Search</button>
                    </div>
                </form>

                <div style="clear:both"></div>                 
                <br />  
                <div id="order_table">  
                     <table class="table table-bordered table-secondary">
                    <thead>
                        <tr>
                            <th width="30%">Full Name</th>
                            <th width="20%">Course Year & Section</th>
                            <th width="5%">Sex</th>
                            <th width="10%">School Year</th>
                            <th width="40%">Permanent Address</th>
                            <th width="15%">Assigned Dorm</th>
                            <th width="15%">Semester</th>
                            <th width="15%">Points</th>
                            <th width="15%">Edit points</th>
                            
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        sort($records);
                        foreach ($records as $record) {
                            echo "
                                    <tr>
                                    <td>$record->name</td>
                                    <td>$record->course_section</td>
                                    <td>$record->sex</td>
                                    <td>$record->school_year</td>
                                    <td>$record->address</td>
                                    <td>$record->dorm , $record->room</td>
                                    <td>$record->sem</td>
                                    <td>$record->point</td>
                                    <td>
                                     <a class'btn' href='edit-stu.php?id=$record->id'>Update Status</a>
                                    </td>
                                    </tr>
                                ";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
</body>

</html>