<!DOCTYPE>
<html>
<head>


</head>

<body>

<?php
		
	
$page_title='Add Contact';
// connect to the database

require 'connection.php';
$conn    = Connect();
echo"<h2>Add Remindder</h2>";

$User_ID    = $conn->real_escape_string($_POST['User_ID']);
$Title   = $conn->real_escape_string($_POST['Title']);
$Massage    = $conn->real_escape_string($_POST['Massage']);
$Date   = $conn->real_escape_string($_POST['Date']);

$query = "INSERT INTO `reminder` (`User_ID` , `Title`, `Massage` , `Date`) VALUES ('$User_ID' , '$Title' , '$Massage' , '$Date')";

$success = $conn->query($query);

if (!$success) {
    die("Couldn't enter data to reminder: ".$conn->error);
 }

else
	echo "Thank You For Adding reminder <br>";
 
$conn->close();
?>

<b><b>
<th>
<p><a href="reminderList.php"><center>Reminder List</center></a></p>
<p><a href="form.php"><center>Main menu</center></a></p>
</th>