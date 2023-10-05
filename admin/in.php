<?php  
 $connect = mysqli_connect("localhost", "root", "", "dorms");  
 $query = "SELECT * FROM students ORDER BY id desc";  
 
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
     
</style>

       <?php
        include_once 'admin-header.php';
        ?>
        <br><br><br><br>
      <body>  
          
           <br /><br />  
           <div class="container" style="width:900px;">  
                <h2 align="center">Income</h2>  

                <div class="col-md-3">  
                     <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" />  
                </div>  
                <div class="col-md-3">  
                     <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" />  
                </div>  
                <div class="col-md-5">  
                     <input type="button" name="filter" id="filter" value="Filter" class="btn btn-info" /> 
                     <a href="stu-section.php" class="btn btn-primary">Back</a> 
                </div>  
               
                <div style="clear:both"></div>                 
                <br />  
                <div id="order_table">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="5%">ID</th>  
                               <th width="30%">Name</th>  
                               <th width="43%">Course and Section</th>  
                               <th width="10%">Payment</th>  
                               <th width="12%">Semester</th>  
                          </tr>  
                     <?php  
                     
                     while($row = mysqli_fetch_array($result)) 
                     {  

                     ?>  
                          <tr>  
                               <td><?php echo $row["id"]; ?></td>  
                               <td><?php echo $row["name"]; ?></td> 
                               <td><?php echo $row["course_section"]; ?></td>  
                               <td><?php echo $row["value"]; ?></td>  
                               <td><?php echo $row["sem"]; ?></td>


                          </tr>  
                     <?php  
                     }  
                     

                     ?>

                     </table>  
                     <tfoot>
                         <?php
                          $sql = "SELECT SUM(value) from students";
                     $result = $connect->query($sql);
                    //display data on web page
                    while($row = mysqli_fetch_array($result)){
                    echo "<div class='info'><strong>Total Income:</strong> <span>".$row['SUM(value)']."</span></div>";
                    
                      echo "<br>";
                 }
                      ?>
                     </tfoot> 

                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
      $(document).ready(function(){  
           $.datepicker.setDefaults({  
                dateFormat: 'yy-mm-dd'   
           });  
           $(function(){  
                $("#from_date").datepicker();  
                $("#to_date").datepicker();  
           });  
           $('#filter').click(function(){  
                var from_date = $('#from_date').val();  
                var to_date = $('#to_date').val();  
                if(from_date != '' && to_date != '')  
                {  
                     $.ajax({  
                          url:"filter.php",  
                          method:"POST",  
                          data:{from_date:from_date, to_date:to_date},  
                          success:function(data)  
                          {  
                               $('#order_table').html(data);  
                          }  
                     });  
                }  
                else  
                {  
                     alert("Please Select Date");  
                }  
           });  
      });  
 </script>