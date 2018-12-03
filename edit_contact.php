<!DOCTYPE>
<html>
<head>


</head>

<body>

<?php 

require 'connection.php';
            $conn    = Connect();
            
            if(! $conn ) {
               die('Could not connect: '. $conn->error);
            }

			
if(isset($_GET['id']))
{
	
	
  $User_ID = $_GET['id'];
  if(isset($_POST['update']))
  {
	
	
    $Category   = $_POST['Category'];
    $First_Name    = $_POST['First_Name'];
    $Last_Name    = $_POST['Last_Name'];
    $Gender    = $_POST['Gender'];
    $Company_Name  = $_POST['Company_Name'];
    $Job_Title    = $_POST['Job_Title'];
    $Company_Address    = $_POST['Company_Address'];
    $City    = $_POST['City'];
    $Country    = $_POST['Country'];
    $Image    = $_POST['Image'];
    $Additional    = $_POST['Additional'];
    $Email_ID    = $_POST['Email_ID'];
    $Facebook_ID    = $_POST['Facebook_ID'];
    $Phone_Number    = $_POST['Phone_Number'];
    $Web_Page    = $_POST['Web_Page'];  
	  
	  
 
  $updated1= $conn->query("UPDATE user SET `Category`='$Category',`First_Name`='$First_Name',`Last_Name`='$Last_Name',`Gender`= '$Gender',`Company_Name`='$Company_Name',`Job_Title`='$Job_Title',`Company_Address`='$Company_Address',`City`= '$City',`Country`= '$Country',`Image`= '$Image',`Additional`= '$Additional' WHERE  User_ID='$User_ID'")or die();
  $updated2=$conn->query("UPDATE `contact` SET `Email_ID`='$Email_ID',`Facebook_ID`='$Facebook_ID',`Phone_Number`='$Phone_Number',`Web_Page`='$Web_Page' User_ID='$User_ID'")or die();
  
  if($updated1)
  {
  $msg="Successfully Updated!!";
  }
  if($updated2)
  {
  $msg="Successfully Updated!!";
  header('Location:contacts.php');
  }
  
  }
}
  //update ends here


  if(isset($_GET['id']))
  {
  $User_ID=$_GET['id'];
  
  
 $getselect=$conn->query("SELECT * FROM user 
 INNER JOIN contact 
 ON user.User_ID=contact.User_ID 
 WHERE user.User_ID ='$User_ID'");
 

  $profile=mysqli_fetch_array($getselect);
  
 
?>



  <form action="contacts.php" method="post">
  
 <b>
<center>Updated Contact</center>
</b>
<br>
<br>
    <p>
      First Name : 
      <input type="text" name="First_Name"
      value="<?php echo $profile['First_Name']; ?>" />
    </p>
	<p>
      Last Name : 
      <input type="text" name="Last_Name" required placeholder="Enter your name" 
      value="<?php echo $profile['Last_Name']; ?>"  />
    </p>
	 <p>
      Category : 
      <input type="text" name="Category" required placeholder="Enter your Category" 
      value="<?php echo $profile['Category']; ?>" />
    </p>
	<p>
      Company Name :
      <input type="text" name="Company_Name" required placeholder="Enter your Company Name" 
      value="<?php echo $profile['Company_Name']; ?>"/>
    </p>
	<p>
      Job Title :
      <input type="text" name="Job_Title" required placeholder="Enter your Job Title" 
      value="<?php echo $profile['Job_Title']; ?>" />
    </p>
	<p>
      Company Address :
      <input type="text" name="Company_Address" required placeholder="Enter your Company Address" 
      value="<?php echo $profile['Company_Address']; ?>" />
    </p>
	<p>
      City: 
      <input type="text" name="City" required placeholder="Enter your City" 
      value="<?php echo $profile['City']; ?>" />
    </p>
	<p>
      Country:
      <input type="text" name="Country" required placeholder="Enter your Country" 
      value="<?php echo $profile['Country']; ?>"/>
    </p>
	 <p>
      Image : 
      <input type="text" name="Image" required placeholder="Enter your Image" 
      value="<?php echo $profile['Image']; ?>" />
    </p>
	<p>
      Additional:
      <input type="text" name="Additional" required placeholder="Enter your Additional" 
      value="<?php echo $profile['Additional']; ?>" />
    </p>
	<p>
      Email ID : 
      <input type="text" name="Email_ID" required placeholder="Enter your Email ID" 
      value="<?php echo $profile['Email_ID']; ?>"/>
    </p>
	<p>
      Facebook ID : 
      <input type="text" name="Facebook_ID" required placeholder="Enter your Facebook ID" 
      value="<?php echo $profile['Facebook_ID']; ?>"/>
    </p>
	<p>
      Phone Number:
      <input type="text" name="Phone_Number" required placeholder="Enter your Phone Number" 
      value="<?php echo $profile['Phone_Number']; ?>" />
    </p>
	<p>
      Web Page:
      <input type="text" name="Web_Page" required placeholder="Enter your Web Page" 
      value="<?php echo $profile['Web_Page']; ?>" />
    </p>
    
	
    <p>
      <input type="submit" name="update" value="Update"/>
    </p>
  </form>

<?php  } ?>