


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







<?php




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

$deleteID = $_GET['delete'];
$sql = "DELETE FROM tasks_table where task_id= ".$deleteID."";
//echo $deleteID;


$taskAllocated = False;


//need to delete task id for the volunteer times table first before can delete the task name
$volunteers_table_results=mysqli_query($db,"SELECT * FROM volunteer_times_table where task_id= ".$deleteID."");
while($rowvolunteers=mysqli_fetch_array($volunteers_table_results)) {
	$taskidvoltable = $rowvolunteers['task_id'];
	
	
	//$taskAllocated = False;
	
	/*$tasks_table_results=mysqli_query($db,"SELECT * FROM tasks_table where task_id= ".$deleteID."");
    while($rowtasks=mysqli_fetch_array($tasks_table_results)) {
		$taskid = $rowtasks['task_id'];
		
	}*/
	
	
	
	
	if($deleteID == $taskidvoltable) {
		$taskAllocated = True;
		echo "The Task cannot be deleted because its allocated to a volunteer";
		//break;
		
	}
	
	/*if ($deleteID != $taskidvoltable AND $taskAllocated == False) {
		$deletevoltabletaskid = "DELETE FROM volunteer_times_table where task_id= ".$deleteID."";		
		//execute the query
        if(mysqli_query($db,$deletevoltabletaskid))
			header("refresh:1; url=ManageTaskName.php");
        else
			echo "Not Deleted";
    }*/
	
		
}



if ($taskAllocated == False) {
	$deletevoltabletaskid = "DELETE FROM volunteer_times_table where task_id= ".$deleteID."";		
	//delete the one on volunteer_times_table
	echo "Task Successfully Deleted";
	if(mysqli_query($db,$deletevoltabletaskid))
		header("refresh:2; url=ManageTaskName.php");
	else
		echo "Not Deleted";
	
	
	
	// delete the one on task table
	if(mysqli_query($db,$sql))
		header("refresh:3; url=ManageTaskName.php");
	else
		echo "Not Deleted";
}


















?>