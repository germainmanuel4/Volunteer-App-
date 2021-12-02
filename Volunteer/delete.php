
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
if ( !isset($_SESSION['uname']) || $_SESSION['uname'] == '' || $_SESSION['access'] == 1 )
{
	header('Location: LoginVolunteer.php');
	exit;
}



?>










<?php


//include 'VolunteerTimeSlots.php';


//connect to database
//select database
@ $db = new mysqli('localhost', 'root', '', 'assignment_1');


if (mysqli_connect_error())
{//display the details of any connection errors
	echo'Error connecting to database:<br/>'.mysqli_connect_error();
	exit;
}

////////////////////////////////
///////////////////////////////



//select query

$delete = $_GET['delete'];
//$timeslot = $_GET['timeslot'];

$sql = "DELETE FROM volunteer_times_table where time_id= ".$delete."";



$time_slots_table_results=mysqli_query($db,"SELECT * FROM time_slots_table");
while($rowvolunteers=mysqli_fetch_array($time_slots_table_results))
{
	$timeslotname = $rowvolunteers['time_slot_name'];
	$timeslotid = $rowvolunteers['time_slot_id'];
	if($timeslotid == $delete){
		
		$timeslotname = $rowvolunteers['time_slot_name'];
	    
		break;
								
	}
										
}





$log_action = "$SES, Removed a timeslot with time slot = $timeslotname";
$log_details = "Volunteer Removing TimeSlots";
//INSERT INTO `logs`(`log_action`, `log_details`) VALUES ("Registration", "newly Registered")
	
	
$querylogs = "INSERT INTO logs (log_action, log_details) VALUES ('$log_action', '$log_details')";
$logs = $db->query($querylogs);
if ($logs)
{
	//echo '<p>User details inserted into database Successfully</p>';
}else{
	echo '<p>Error inserting details. Error message:</p>';
    echo '<p>'.$db->error.'</p>';
}







//execute the query
if(mysqli_query($db,$sql))
	
	header("refresh:1; url=VolunteerTimeSlots.php");
else
	echo "Not Deleted";






?>