

<?php    
header('Location: form.php');    
?>


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
echo"<h2>Add Contact</h2>";

//initializing all the variable
$User_ID=$Category=$First_Name=$Last_Name=$Gender=$Company_Name=$Job_Title=$Company_Address=$City=$Country=$Image=$Additional=$Email_ID=$Facebook_ID=$Phone_Number=$Web_Page='';


$User_ID    = $conn->real_escape_string($_POST['User_ID']);
$Category   = $conn->real_escape_string($_POST['Category']);
$First_Name    = $conn->real_escape_string($_POST['First_Name']);
$Last_Name    = $conn->real_escape_string($_POST['Last_Name']);
$Gender    = $conn->real_escape_string($_POST['Gender']);
$Company_Name    = $conn->real_escape_string($_POST['Company_Name']);
$Job_Title    = $conn->real_escape_string($_POST['Job_Title']);
$Company_Address    = $conn->real_escape_string($_POST['Company_Address']);
$City    = $conn->real_escape_string($_POST['City']);
$Country    = $conn->real_escape_string($_POST['Country']);
$Image    = $conn->real_escape_string($_POST['Image']);
$Additional    = $conn->real_escape_string($_POST['Additional']);
$Email_ID    = $conn->real_escape_string($_POST['Email_ID']);
$Facebook_ID    = $conn->real_escape_string($_POST['Facebook_ID']);
$Phone_Number    = $conn->real_escape_string($_POST['Phone_Number']);
$Web_Page    = $conn->real_escape_string($_POST['Web_Page']);
$salary  = $conn->real_escape_string($_POST['salary']);


//INSERT THE CONTACT INTO THE DB

$query1 = "INSERT INTO `user`(`User_ID`, `Category`, `First_Name`, `Last_Name`, `Gender`, `Company_Name`, `Job_Title`, `Company_Address`, `City`, `Country`, `Image`, `Additional`)VALUES( '$User_ID ','$Category','$First_Name','$Last_Name','$Gender','$Company_Name','$Job_Title ','$Company_Address','$City','$Country','$Image','$Additional ')";
$query2 = "INSERT INTO `contact`(`User_ID`,`Email_ID`, `Facebook_ID`, `Phone_Number`, `Web_Page`) VALUES ( ' $User_ID ','$Email_ID','$Facebook_ID','$Phone_Number','$Web_Page')";
$query3 = "INSERT INTO `salary` (`User_ID` , `salary`) VALUES ('$User_ID' , '$salary')";



$success1 = $conn->query($query1);
$success2 = $conn->query($query2);
$success3 = $conn->query($query3);

 if (!$success1) {
    die("Couldn't enter data to user: ".$conn->error);
 }
 if (!$success2) {
    die("Couldn't enter data to user: ".$conn->error);
 }
 if (!$success3) {
    die("Couldn't enter data to user: ".$conn->error);
 }

else
	echo "Thank You For Adding contact <br>";
 
$conn->close();


?>
