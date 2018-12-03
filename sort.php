<!DOCTYPE html>

    <head>
        <title>Sorted database Display</title>
    </head>
    <body>
	
	<center>
    <table border="2">
	 <tr>
	
	 <p /><h3>Choose your option to be sorted</h3>
        <td><a href="<?php echo $_SERVER['PHP_SELF'] . "?sort=0";?>">First_Name</a></td>
        <td><a href="<?php echo $_SERVER['PHP_SELF'] . "?sort=1";?>">Last_Name</a></td>
        <td><a href="<?php echo $_SERVER['PHP_SELF'] . "?sort=2";?>">City</a></td>
        <td><a href="<?php echo $_SERVER['PHP_SELF'] . "?sort=3";?>">Country</a></td>
        <td><a href="<?php echo $_SERVER['PHP_SELF'] . "?sort=4";?>">Gender</a></td>
	
	</tr>
</table>
</center>
	
	
	
<?php
// connect to the database

require 'connection.php';
$conn    = Connect();


        echo "        <h1>Sorted Database</h1>
        <hr />
        <p />
        <table border = '2'>
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
	                <td>Additional</td>
	                
                </tr>\r\n";

        $sort = "";
        if(isset($_GET['sort'])) {
            switch ($_GET['sort'] ) {
            case 0: 
                        $sort = " ORDER BY First_Name ASC"; 
                        break;
            case 1:
                        $sort = ' ORDER BY Last_Name DESC';
                        break;
            case 2:
                        $sort = ' ORDER BY City DESC';
                        break;
            case 3:
                        $sort = ' ORDER BY Country DESC'; 
                        break;
            case 4: 
                        $sort = ' ORDER BY Gender DESC';
                        break;
                  
            }
        }
        $result = mysqli_query($conn, "SELECT * FROM `user`" . $sort);
        while($row = mysqli_fetch_array($result)) {
            echo "            <tr>\r\n";
            echo "                <td>" . $row['First_Name'] . "</td>\r\n";
            echo "                <td>" . $row['Last_Name'] . "</td>\r\n";
			echo "                <td>" . $row['Category'] . "</td>\r\n";
            echo "                <td>" . $row['Gender'] . "</td>\r\n";
			echo "                <td>" . $row['Company_Address'] . "</td>\r\n";
			echo "                <td>" . $row['Company_Name'] . "</td>\r\n";
			echo "                <td>" . $row['Job_Title'] . "</td>\r\n";
            echo "                <td>" . $row['City'] . "</td>\r\n";
            echo "                <td>" . $row['Country'] . "</td>\r\n";
            echo "                <td>" . $row['Additional'] . "</td>\r\n";
           
            echo "            </tr>\r\n";
        }
        echo "        </table>\r\n"; 
    
    mysqli_close($conn);

?>

<br>
<br>
<th>
            <p><a href="form.php"><center>Main menu</center></a></p>
            </th>
       
 </body>
</html>