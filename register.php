<?php 

$page_title = 'Sign Up Now';
?>

<form  action="signin.php"  method="POST"> 

<br/><br/><br/>
<h3>Create a FREE account.</h3>

<label>User_ID</label>
<input type="text" placeholder="Enter User_ID" value="" required name="User_ID" >
<label>Password <span class="smallred">Min.6 characters</span></label>
<input type="password" placeholder="Enter password" required value="" name="pass" maxlength="20">

<input type="submit" value="CREATE FREE ACCOUNT" name="submit" class="tiny radius button"/> </br>
Returning user?
<a href="signin.php" class=""> Sign in </a>

</form>
 
