<?php
// connect to the database

require 'connection.php';
$conn    = Connect();
if( empty($_GET['reminder_id']) )
{
?>
<html>
<head><title>List of Reminders</title></head>
<body>
<table width="90%" border="0" align="center">
<tr>
<td><a href='reminder.php'>Add new Reminder</a></td>
</tr>
<?php
$query =  "SELECT * FROM reminder" ;
$result = mysqli_query($conn, $query)      
    or die($conn -> error);
$row = mysqli_num_rows( $result );
if(empty($row))
{
echo"No Reminders setup";
}
while($row = mysqli_fetch_array($result))
{
$User_ID = $row["User_ID"];
$Title = $row["Title"];
$Date = $row["Date"];

echo("
<tr>
<td width='60%'>$User_ID</td>
<td width='60%'>$Title</td>
<td width='30%'>$Date</td>
</tr>
");
}

?>
<br>
<br>
<th>
            <p><a href="form.php"><center>Main menu</center></a></p>
            </th>
</table>
</body>
</html>

<?php
}
?>