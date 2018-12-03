<html>
   
   <head>
      <title>Delete a Record from MySQL Database</title>
   </head>
   
   <body>
      <?php
         if(isset($_POST['delete'])) {
			 
            require 'connection.php';
            $conn    = Connect();
            
            if(! $conn ) {
               die('Could not connect: '. $conn->error);
            }
				
            $User_ID = $_POST['User_ID'];
            
            $sql1 = "DELETE FROM user WHERE User_ID='$User_ID'";
            $sql2 = "DELETE FROM contact WHERE User_ID='$User_ID'";
			$sql3 = "DELETE FROM salary WHERE User_ID='$User_ID'";
            
            
            
            $success1 = $conn->query($sql1);
			$success2 = $conn->query($sql2);
			$success3 = $conn->query($sql3);
		 
            if(!$success1)
            {
			 die("Couldn't delete data from user: ".$conn->error);
               
            }
			if (!$success2) 
			{
            die("Couldn't delete data from contact: ".$conn->error);
            }
			if (!$success3) 
			{
            die("Couldn't delete data from salary: ".$conn->error);
            }  
		    else
			{
				header("Location:form.php");
			}
            
            echo "Deleted data successfully\n";
            
            $conn->close();
         }else {
            ?>
               <form method = "post" action = "contacts.php">
			   <center><h3>Please enter a user Id to be deleted</h3>
                  <table border = "0">
                     
                     <tr>
                        <td>User ID</td>
                        <td><input name = "User_ID" type = "text" 
                           id = "User_ID"></td>
                       
                        <td> </td>
                     </tr>
                     
                     <tr>
                        <td> </td>
                        <td>
                           <input name = "delete" type = "submit" 
                              id = "delete" value = "Delete">
                        </td>
                     </tr>
                     </center>
                  </table>
               </form>
            <?php
         }
      ?>
      
   </body>
</html>