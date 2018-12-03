<html>
   
   <head>
      <title>Update a Record in MySQL Database</title>
   </head>
   
   <body>
      <?php
         if(isset($_POST['update'])) {
            require 'connection.php';
            $conn    = Connect();
            
            if(! $conn ) {
               die('Could not connect: '. $conn->error);
            }
            
            $User_ID = $_POST['User_ID'];
            $First_Name = $_POST['First_Name'];
            
            $sql = "UPDATE user ". "SET First_Name = '$First_Name' ". 
               "WHERE User_ID = '$User_ID'" ;
           
            $result = $conn->query($sql);
            
            if(! $result ) {
               die('Could not update data: ' . $conn->error);
            }
            echo "Updated data successfully\n";
            
            
         }else {
            ?>
               <form method = "post" action = "contacts.php">
			   
			   <center><h2>Enter first name to be updated</h2>
                  <table border =" 0">
                  
                     <tr>
                        <td>User ID</td>
                        <td><input name = "User_ID" type = "text" 
                           id = "User_ID"></td>
                     </tr>
                  
                     <tr>
                        <td>First Name</td>
                        <td><input name = "First_Name" type = "text" 
                           id = "First_Name"></td>
                     </tr>
                  
                     <tr>
                       
                        <td> </td>
                     </tr>
                  
                     <tr>
                  
                        <td>
                           <input name = "update" type = "submit" 
                              id = "update" value = "Update">
                        </td>
                     </tr>
                  
                  </table>
				  </center>
               </form>
            <?php
         }
      ?>
      
   </body>
</html>