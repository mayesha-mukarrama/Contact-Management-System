<!DOCTYPE html>
<html>
<body>

 <b>
</b>
<br>
<br>
<center>
<table border="1">
	 <tr>
	 <p><h3>Choose your option</h3></p>
       <td><a href="<?php echo $_SERVER['PHP_SELF'] . "?fucntion=0";?>"> Group By  </a></td>
        <td><a href="<?php echo $_SERVER['PHP_SELF'] . "?fucntion=1";?>"> last two entry </a></td>
        <td><a href="<?php echo $_SERVER['PHP_SELF'] . "?fucntion=2";?>"> First entry  </a></td>
        <td><a href="<?php echo $_SERVER['PHP_SELF'] . "?fucntion=3";?>"> Maximum </a></td>
        <td><a href="<?php echo $_SERVER['PHP_SELF'] . "?fucntion=4";?>"> Minimum </a></td>
		<td><a href="<?php echo $_SERVER['PHP_SELF'] . "?fucntion=5";?>"> Midium </a></td>
		<td><a href="<?php echo $_SERVER['PHP_SELF'] . "?fucntion=6";?>"> Now </a></td>
		<td><a href="<?php echo $_SERVER['PHP_SELF'] . "?fucntion=7";?>"> Round Figure </a></td>
		
		
		</tr>
</table>
		<br><br><p><a href="form.php"><center>Main menu</center></a></p>	
	
</center>
	
	
<?php
// connect to the database

require 'connection.php';
$conn    = Connect();


        echo "        <h2>Function of Database</h2>
        <hr />
        <p />
        <table border = '2'>
                <tr>
                    <td>First_Name</td>
	                <td>Last_Name</td>
	                <td>Email_ID</td>
	                <td>salary</td>
					
                </tr>\r\n";

        $fucntion="";
        if(isset($_GET['fucntion'])) {
            switch ($_GET['fucntion'] ) {
            case 0:
			
                        echo"<h3>Group by</h3>";
                        $fucntion = "SELECT user.First_Name,user.Last_Name,contact.Email_ID, 
						COUNT(salary.salary) AS salary
						FROM salary INNER JOIN user ON user.User_ID=salary.User_ID 
						INNER JOIN contact ON salary.User_ID=contact.User_ID 
						GROUP BY First_Name,Last_Name,Email_ID";
                        break;
            case 1:
			            echo"<h3>Last two entry</h3>";
                        $fucntion = " SELECT First_Name,Last_Name,contact.Email_ID,salary.salary FROM user
                        INNER JOIN contact ON user.User_ID=contact.User_ID
                         INNER JOIN salary ON user.User_ID=salary.User_ID   
                         ORDER BY First_Name DESC
                         LIMIT 2;";
                        break;
            case 2:
			            echo"<h3>First Entry</h3>";
                        $fucntion =  "SELECT First_Name,Last_Name,contact.Email_ID,salary.salary
                        FROM user
                        INNER JOIN contact ON user.User_ID=contact.User_ID
						INNER JOIN salary ON user.User_ID=salary.User_ID                      
                        LIMIT 1";
                        break;
            case 3:
			            echo"<h3>Max Salary</h3>";
                        $fucntion = " SELECT a.First_Name, a.Last_Name, b.Email_ID, s.salary
                        FROM user a, salary s,contact b
                        WHERE a.User_ID = s.User_ID And b.User_ID= a.User_ID
                        AND s.salary IN
                       (SELECT MAX(salary) as salary
                        FROM salary) "; 
                        break;
            case 4: 
			            echo"<h3>Min salary</h3>";
                        $fucntion =  "SELECT a.First_Name, a.Last_Name, b.Email_ID, s.salary
                        FROM user a, salary s,contact b
                        WHERE a.User_ID = s.User_ID And b.User_ID= a.User_ID
                        AND s.salary IN
                       (SELECT MIN(salary) as salary
                        FROM salary) "; 
                        break;
            case 5:    
			            echo"<h3>Midium of salaries</h3>";
                        $fucntion =  "SELECT  user.First_Name, user.Last_Name,contact.Email_ID ,MID(salary,1,2) as salary
                        FROM salary
                        INNER JOIN user ON user.User_ID = salary.User_ID
                        INNER JOIN contact on contact.User_ID=salary.User_ID";
                        break;
            case 6:
			            echo"<h3>date of salaries</h3>";
                        $fucntion =  "SELECT  user.First_Name, user.Last_Name,contact.Email_ID ,salary, NOW() as salary
                        FROM salary
                        INNER JOIN user ON user.User_ID = salary.User_ID
                        INNER JOIN contact on contact.User_ID=salary.User_ID";
						break;
						
			case 7:
			            echo"<h3>round figure of salaries</h3>";
                        $fucntion =  "SELECT  user.First_Name, user.Last_Name,contact.Email_ID , ROUND(salary,1) as salary
                        FROM salary
                        INNER JOIN user ON user.User_ID = salary.User_ID
                        INNER JOIN contact on contact.User_ID=salary.User_ID";
						break;
					
            }
        }
        $result = mysqli_query($conn,$fucntion)
		 or die($conn -> error);
	if($result)
	{
	
        while($row = mysqli_fetch_array($result)) {
            echo "            <tr>\r\n";
            echo "                <td>" . $row['First_Name'] . "</td>\r\n";
            echo "                <td>" . $row['Last_Name'] . "</td>\r\n";
            echo "                <td>" . $row['Email_ID'] . "</td>\r\n";
            echo "                <td>" . $row['salary'] . "</td>\r\n";
           
           
            echo "            </tr>\r\n";
        }
        echo "        </table>\r\n"; 
    }
	else
	{
		echo "Please select a fuction";
	}
    mysqli_close($conn);
	
?>

<br>
<br>
<th>
            <p><a href="form.php"><center>Main menu</center></a></p>
            </th>
       
 </body>
</html>