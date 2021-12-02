<?php
//Start or resume a session
session_start();


$SES =  $_SESSION['uname'];
echo "<b>Logged In as:<b>      " .$SES. "<br />"; //.$_SESSION['uname'];


//If not set gor back to loginorganiser
if ( !isset($_SESSION['uname']) && $_SESSION['uname'] == '' )
{
	header('Location: LoginOrganiser.php');
	exit;
}
?>


<!DOCTYPE html>
<html>
<head>
  <title>Manage Time Slots</title>


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
<center><h3><strong>View Activity Log</strong></h3></center>
<form name="ViewActivityLog">


<br>
<a href=OrganiserTimeSlots.php>Back to Volunteers Slot</a>


<p><a href="Logout.php">Log Out</a></p>





<?php
//include 'AllocateTask.php';
//connect to database
@ $db = new mysqli('localhost', 'root', '', 'assignment_1');

if (mysqli_connect_error()) 
{//display the details of any connection errors
	echo'Error connecting to database:<br/>'.mysqli_connect_error();
	exit;
}

echo '<table style="width:100%"><tr>';
echo '<th>Log ID</th><th>Log Time</th><th>Log Action</th><th>Log Details</th>';
echo '</tr>';

$logs_results=mysqli_query($db,"SELECT * FROM logs ORDER by log_time DESC");
while($rowlogs=mysqli_fetch_array($logs_results))
{
	//echo "<table>";
	echo "<tr>";
    echo "<td>" .$rowlogs["log_id"]. "</td>";
    echo "<td>" .$rowlogs["log_time"]. "</td>";
	echo "<td>" .$rowlogs["log_action"]. "</td>";
	echo "<td>" .$rowlogs["log_details"]. "</td>";
	
	
	
	
	
}

echo '</table>';


?>

<br>
<center><a href=OrganiserTimeSlots.php>Back to Volunteers Slot</a></center>


<center><p><a href="logoutorganiser.php">Log Out</a></p></center>


</form> 
</body>
</html>




