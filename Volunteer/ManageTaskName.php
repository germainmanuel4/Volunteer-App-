

<?php
//Start or resume a session
session_start();

$SES =  $_SESSION['uname'];
echo "<b>Logged In as:<b>      " .$SES. "<br />"; //.$_SESSION['uname'];
//echo "<br /> ";



$SES =  $_SESSION['uname'];
$SE =  $_SESSION['access'];
//echo $SE;

//If the "uname" session variable is not set or is empty and access level not a volunteer, redirect to login page
if ( !isset($_SESSION['uname']) || $_SESSION['uname'] == '' || $_SESSION['access'] == 2 )
{
	header('Location: LoginOrganiser.php');
	exit;
}



?>










<!DOCTYPE html>
<html>
<head>
  <title>Manage Tasks(Organiser-only)</title>


<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
  text-align: left;    
}
</style>


</head>




<body>
<h3><strong>Current Tasks:</strong></h3>
<form name="ManageTimeSlots" action="addNewTask.php" method="post">







<?php


// connect database
@ $db = new mysqli('localhost', 'root', '', 'assignment_1');
mysqli_select_db($db, "dropdown");

if (mysqli_connect_error())
{//display the details of any connection errors
	echo'Error connecting to database:<br/>'.mysqli_connect_error();
	exit;
}


echo '<table style="width:100%"><tr>';
echo '<th>Task Name</th></th><th>Edit</th><th>Delete</th>';
echo '</tr>';

/////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////

$taskstable=mysqli_query($db,"SELECT * FROM tasks_table");
while($tasks=mysqli_fetch_array($taskstable))
{
	$taskname = $tasks['task_name'];
	$taskid = $tasks['task_id'];
	
	
						
    echo "<tr>";
	echo "<td>" .$taskname. "</td>";
	echo "<td><a href=editManageTimeSlots.php?edit=".$taskid.">Edit</a></td>";
	echo '<td><a href=deleteManageTimeSlots.php?delete='.$taskid.'    
	onclick="return confirm(\'Are you sure?\');">Delete</a></td>';
    
	
							
    }

	echo '</table>';	

	
					

?>

<br>
<br>

<tr style="background-color: #FFFFF;">
    <td>Add New Task:</td>
	<td><input name="newtaskname" type="text" style="width: 200px;" maxlength="100"/> </td>
</tr>


<tr style="background-color: #FFFFFF;"> 
      <td> <input type="submit" name="submit" value="Add" /></td>    
</tr>




<br>
<br>

<a href=OrganiserTimeSlots.php>Back to Volunteers Slot</a>

</tr>


<br>

<p><a href="logout.php">Log Out</a></p>


</form> 
</body>
</html>






