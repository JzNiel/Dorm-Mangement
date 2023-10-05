<?php  
 //filter.php  
 if(isset($_POST["from_date"], $_POST["to_date"]))  
 {  
      include 'includes/admin.php';

     $sql = "SElECT SUM(value) from students";
      $connect = mysqli_connect("localhost", "root", "", "dorms");  
      $output = '';  
      $query = "  
           SELECT * FROM students 
           WHERE date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'  
      ";  
      $total = 0;

      $sql = "SELECT SUM(value) from students";
      $result = $connect->query($sql);
      $result = mysqli_query($connect, $query);  
      $output .= '  
           <table class="table table-bordered  ">  
                <tr>  
                     <th width="30%">Total Income for this Semester</th>
                </tr>  
      ';  

  if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))
                $total += $row['value'];
          // $total += $row['value'];
            
           {  
                $output .= '  
                     <tr>  
                          <td>'. $total .'</td>  
                          
                ';  
           }  
      }  
      else  
      {  
           $output .= '  
                <tr>  
                     <td colspan="5">No Order Found</td>  
                </tr>  
           ';  
      }  
      $output .= '</table>';  
      echo $output;


    
}
 ?>



