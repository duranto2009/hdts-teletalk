<?php  
 if(!empty($_FILES["employee_file"]["name"]))  
 {  
      require '../scripts/Connection/connection.php';  
      $output = '';  
      $allowed_ext = array("csv");  
      $extension = end(explode(".", $_FILES["employee_file"]["name"]));  
      if(in_array($extension, $allowed_ext))  
      {  
           $file_data = fopen($_FILES["employee_file"]["tmp_name"], 'r');  
           fgetcsv($file_data);  
           while($row = fgetcsv($file_data))  
           {  
                $username = $conn->real_escape_string($row[0]);  
                $user_email = $conn->real_escape_string($row[1]);  
                $phone = $conn->real_escape_string($row[2]);  
                $password = $conn->real_escape_string($row[3]);  
                $full_name = $conn->real_escape_string($row[4]);
                $skill_id = $conn->real_escape_string($row[5]);  
                $unit = $conn->real_escape_string($row[6]);  
                $department = $conn->real_escape_string($row[7]);  
                //$ = $conn->real_escape_string($row[4]);


                $query = "  
                INSERT INTO user  
                     (username,
                      user_email,
                      phone,
                      password,
                      full_name,
                      skill_id,
                      unit,
                      department)  
                     VALUES ('$username',
                              '$user_email',
                              '$phone',
                              '$password',
                              '$full_name',
                              '$skill_id',
                              '$unit',
                              '$department')  
                ";  
                $conn->query($query);  
           }  
           $select = "SELECT * FROM user ORDER BY id DESC";  
           $result = $conn->query($select);  
           $output .= '  
                <table class="table table-bordered">  
                     <tr>  
                          <th width="5%">ID</th>  
                          <th width="25%">Name</th>  
                          <th width="35%">Address</th>  
                          <th width="10%">Gender</th>  
                          <th width="20%">Designation</th>  
                          <th width="5%">Age</th>  
                     </tr>  
           ';  
           while($row = $result->fetch_array())  
           {  
                $output .= '  
                     <tr>  
                       <td>'.$row["id"].'</td>  
                       <td>'.$row["username"].'</td>  
                       <td>'.$row["user_email"].'</td>  
                       <td>'.$row["phone"].'</td>  
                       <td>'.$row["password"].'</td>  
                       <td>'.$row["full_name"].'</td>  
                       <td>'.$row["skill_id"].'</td>
                       <td>'.$row["unit"].'</td>
                       <td>'.$row["department"].'</td>  
                     </tr>  
                ';  
           }  
           $output .= '</table>';  
           echo $output;  
      }  
      else  
      {  
           echo 'Error1';  
      }  
 }  
 else  
 {  
      echo "Error2";  
 }  
 ?>  