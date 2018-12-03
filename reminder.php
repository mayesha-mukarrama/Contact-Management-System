<?php

// connect to the database

require 'connection.php';
$conn    = Connect();

?>
<html>

<head><title>Add Reminders</title></head>
<body>
<form action="reminderInsert.php" method="POST">
<table border='0' align='center'>

<tr>
<td>User ID:</td>
<td>
<input name="User_ID" type="text" maxlength="255" />
</td>
</tr>

<tr>
<td>Title:</td>
<td>
<input name="Title" type="text" maxlength="255" />
</td>
</tr>

<tr>
<td>Massage</td>
<td>
<textarea name="Massage" rows="5" /></textarea>
</td>
</tr>

<tr>
<td>Date</td>
<td>
<input name="Date" type="text" maxlength="255" />
</td>
</tr>

</select>
</td>
</tr>
<tr>
<td> </td>
<td>

<input name="submit" type="submit" value="Add" />
<br>
<br>

</td>
</tr>
</table>



<b><b>
<th>
<p><a href="reminderList.php"><center>Reminder List</center></a></p>
<p><a href="form.php"><center>Main menu</center></a></p>
</th>

</form>
</body>
</html>
