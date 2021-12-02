
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
  <title>TChange Task Name(Organiser)</title>


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
<h3><strong>Change Task Name:</strong></h3>
<form name="changetaskname" action="checkeditManageTimeSlots.php" method="post">




	 
	 

<?php




//connect to database
//select database
@ $db = new mysqli('localhost', 'root', '', 'assignment_1');


if (mysqli_connect_error())
{//display the details of any connection errors
	echo'Error connecting to database:<br/>'.mysqli_connect_error();
	exit;
}


//get edit id
$editTask = $_GET['edit'];


$taskstable=mysqli_query($db,"SELECT * FROM tasks_table");
while($tasks=mysqli_fetch_array($taskstable))
{
	
	$taskid = $tasks['task_id'];
	

    if($editTask == $taskid ) {
		$taskname = $tasks['task_name'];
		
	}
					
							
}

	

?>


<tr style="background-color: #FFFFF;">
    <td>Edit ID:</td>
	<td><input name="editid" type="text" style="width: 200px;" maxlength="100" value="<?php echo $editTask; ?>" /> *cannot be changed</td>
</tr>


<br>
<br>


<tr style="background-color: #FFFFF;">
    <td>Task name:</td>
	<td><input name="taskname" type="text" style="width: 200px;" maxlength="100" value="<?php  echo $taskname;  ?>" />change task name</td>
</tr>






<br>
<br>

<tr style="background-color: #FFFFFF;"> 
      <td> <input type="submit" name="submit" value="Submit" /></td>    


<br>
<br>

<a href=ManageTaskName.php>Manage Task Name</a>


<br>
<br>

<a href=logout.php>Log Out</a>


</tr>


</form> 
</body>
</html>





