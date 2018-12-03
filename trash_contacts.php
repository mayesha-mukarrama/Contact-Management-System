



<html>
   
   <head>
      <title>Delete a Record from MySQL Database</title>
   </head>
   
   <body>
      <?php
	  require 'connection.php';
            $conn    = Connect();
			
			
         if(isset($_GET['id'])!="") {
                     
            
				
            $User_ID = $_GET['id'];
            
            $sql1 = "DELETE FROM user WHERE User_ID='$User_ID'";
            $sql2 = "DELETE FROM contact WHERE User_ID='$User_ID'";
            
            $success1 = $conn->query($sql1);
			$success2 = $conn->query($sql2);
		 
            if(!$success1)
            {
			 die("Couldn't enter data to user: ".$conn->error);
               
            }
			if (!$success2) 
			{
            die("Couldn't enter data to user: ".$conn->error);
            }  
		
			else
			{
				header("Location:form.php");
			}
        }
		$conn->close();
?>

</body>
</html>
      
   </body>
</html>