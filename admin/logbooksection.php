<?php
session_start();
if (!isset($_SESSION['logged'])) {
    header("location: login.php");
}

include 'includes/logbook.php';
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
           <div class="container" style="width:900px;">  
                <h2 align="center">Logbook</h2> 


                <div style="clear:both"></div>                 
                <br />  
                <div id="order_table">  
                     <table class="table table-bordered table-secondary">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        sort($records);
                        foreach ($records as $record) {
                            echo "
                                    <tr>
                                    <td>$record->name</td>
                                    <td>$record->type</td>
                                    <td>$record->date</td>
                                    </tr>
                                ";
                        }
                        ?>
                    </tbody>
                </table>
    </div>        
</body>

</html>