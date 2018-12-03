<html>
<body>
<?php 
	$page_title='View Contacts';
	
	require 'connection.php';
    $conn    = Connect();
	
		
	//RETRIEVE CONTACTS FROM DATABASE
	 $query1 = "SELECT * FROM user
    INNER JOIN contact
    ON user.User_ID=contact.User_ID" ;
	
	//Left JOIN
	$query = "SELECT * FROM user
    Left JOIN contact
    ON user.User_ID=contact.User_ID" ;
	
	//Right join
	$query = "SELECT * FROM user
    RIGHT JOIN contact
    ON user.User_ID=contact.User_ID" ;
	
	//Full join
	$query = "SELECT * FROM user
    Full outer JOIN contact
    ON user.User_ID=contact.User_ID" ;
	
	//Nested query
	$query=" SELECT *
	FROM user where EXISTS 
	(SELECT * from contact where user.User_ID = contact.User_ID )";
	
	//Equi join
	$query = "SELECT * FROM user
    JOIN contact
    ON user.User_ID=contact.User_ID";
	
    	$result = mysqli_query($conn, $query1)      
    or die($conn -> error);
	
	
	
?>

<b>
<center>All contacts</center>
</b>
<br>
<br>
<br>
	        <th>
            <p><a href="form.php"><center>Main menu</center></a></p>
            </th><br>
	 <table border="2">
	 <tr>
	  
	  <td>First_Name</td>
	  <td>Last_Name</td>
	  <td>Category</td>
	  <td>Gender</td>
	  <td>Company_Name</td>
	  <td>Job_Title</td>
	  <td>Company_Address</td>
	  <td>City</td>
	  <td>Country</td>
	  <td>Image</td>
	  <td>Additional</td>
	  <td>Email_ID</td>
	  <td>Facebook_ID</td>
	  <td>Phone_Number</td>
	  <td>Web_Page</td>
	  <td></td><td></td>"
    </tr>
	

 <?php                
	//USE WHILE LOOP TO PRINT OUT ALL THE RESULTS FROM THE DATABASE
	
	
	while($row = mysqli_fetch_array($result))  :?>
                <tr>
                    <td><?php echo $row['First_Name'];?></td>
                    <td><?php echo $row['Last_Name'];?></td>
                    <td><?php echo $row['Category'];?></td>
                    <td><?php echo $row['Gender'];?></td>
					<td><?php echo $row['Company_Name'];?></td>
                    <td><?php echo $row['Job_Title'];?></td>
                    <td><?php echo $row['Company_Address'];?></td>
					<td><?php echo $row['City'];?></td>
                    <td><?php echo $row['Country'];?></td>
                    <td><?php echo "<img src='/Image/".$row['Image']."'/>";?></td>
					<td><?php echo $row['Additional'];?></td>
                    <td><?php echo $row['Email_ID'];?></td>
                    <td><?php echo $row['Facebook_ID'];?></td>
					<td><?php echo $row['Phone_Number'];?></td>
                    <td><?php echo $row['Web_Page'];?></td>
					<td><a href='edit_contact.php?id="<?php echo $row['User_ID'];?>"'>Edit</a></td>
                    <td><a href='trash_contacts.php?id="<?php echo $row['User_ID'];?>"'>Delete</a></td>
                </tr>
				
				
                <?php endwhile;
	
	echo" </table>";
	
?>

<?php $conn->close(); ?>
</body>
</html>