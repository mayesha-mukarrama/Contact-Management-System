 <?php

 require 'connection.php';
    $conn    = Connect();
 
 
if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `user`
	
	WHERE CONCAT(`User_ID`, `Category`, `First_Name`, `Last_Name`, `Gender`, `Company_Name`, `Job_Title`, `Company_Address`, `City`, `Country`, `Image`, `Additional`) LIKE '%".$valueToSearch."%'";
	
    $search_result = $conn->query($query);
    
}
 else {
    $query = "SELECT * FROM `users`";
    $search_result = $conn->query($query);
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title>Search throught table</title>
        
    </head>
    <body>
        
        <form action="<?php $_PHP_SELF ?>" method="post">
		<h3><center>Please enter a word to search</h3></center>
            <center><input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
            <input type="submit" name="search" value="Filter"><br><br>
            <br>
	        <th>
            <p><a href="form.php">Main menu</a></p>
            </th><br>
			</center>
            <table border = "2">
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
                </tr>

      <!-- populate table from mysql database -->
                <?php 
				
				
				if (@mysqli_num_rows($search_result) > 0) {
	while ($row = mysqli_fetch_array($search_result,MYSQLI_ASSOC))  :?>
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
                    <td><?php echo $row['Image'];?></td>
					<td><?php echo $row['Additional'];?></td>
                   <!--<td><?php echo $row['Email_ID'];?></td>
                    <td><?php echo $row['Facebook_ID'];?></td>
					<td><?php echo $row['Phone_Number'];?></td>
                    <td><?php echo $row['Web_Page'];?></td>-->
                </tr>
				
				</table>
                <?php endwhile;}?>
            
        </form>
        
    </body>
</html>