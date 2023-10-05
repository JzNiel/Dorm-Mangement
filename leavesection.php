<?php  
 $connect = mysqli_connect("localhost", "root", "", "dorms");  
 $query = "SELECT * FROM leave_form ORDER BY id desc";  
 
 $result = mysqli_query($connect, $query);
 //$result = $connect->query($sql, $connect, $query);  


 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Income</title>  
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
        include_once 'header.php';
        ?>
        <br><br><br><br>
      <body>  
          
           <br /><br />  
           <div class="container" style="width:900px;">  
                <h2 align="center">Leave Form of Students</h2>
                <a href="add-leave.php" class="btn btn-info">Request Now</a>   
               
                <div style="clear:both"></div>                 
                <br />  
                <div id="order_table">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="20%">Name</th>  
                               <th width="30%">Letter</th>  
                               <th width="10%">Status</th>  
                                 
                          </tr>  
                     <?php  
                     
                     while($row = mysqli_fetch_array($result)) 
                     {  

                     ?>  
                          <tr>  
                               
                               <td><?php echo $row["name"]; ?></td> 
                               <td><?php echo $row["letter"]; ?></td>  
                               <td><?php echo $row["status"]; ?></td> 

                          </tr>  

                          <?php  
                     }  
                     

                     ?>
               
                     </table>  
               
                </div>  
           </div>  
      </body>  
 </html>  
 