

<?php
//Start or resume a session
session_start();

$SES =  $_SESSION['uname'];
echo "<b>Logged In as:<b>      " .$SES. "<br />"; //.$_SESSION['uname'];
//echo "<br /> ";



//If the not set go back to organiser login page
if ( !isset($_SESSION['uname']) || $_SESSION['uname'] == '' )
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






//loop and get all the values using get id
//update it 

//include 'AllocateTask.php';
//$delete = $_GET['delete'];


$edit =  $_POST['edit'];



//$description = $_POST['description'];
//$taskname = $_POST['taskname'];
$taskid = $_POST['taskid'];
$task = 1;
$timeid2 = $_POST['timeid2'];
$select = "";
$volunteer_email = $_POST['volunteer_email'];
$timeslotname = $_POST['timeslotname'];
$tasktablename = $_POST['tasktablename'];	




$volunteer_times_table_results=mysqli_query($db,"SELECT * FROM volunteer_times_table where vol_time_id=".$edit." ");
while($rowvolunteertimes=mysqli_fetch_array($volunteer_times_table_results))
{
	
    $voltimeid = $rowvolunteertimes['vol_time_id'];
	//update it if time id equals to delete
	if($voltimeid == $edit) {
		
		
		
		//$taskidtaskstable = $rowvolunteerstasktable['task_id'];
					
	    $log_action = "$SES, cleared a task named $tasktablename for $volunteer_email for timeslot = $timeslotname ";
        $log_details = "Organiser Clearing Task to volunteer";
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
		
		
		
		
		
		
					
	    $inserttaskid = "UPDATE volunteer_times_table SET task_id=null, description=null WHERE vol_time_id= ".$edit."";
		//"UPDATE volunteer_times_table SET task_id=".$task.", description='$description' WHERE vol_time_id= ".$voltimeid."";
		if(mysqli_query($db,$inserttaskid)) {
			header("refresh:1; url=OrganiserTimeSlots.php");
		}else{
			echo "Task ID and description not deleted";
					
		}
	}

}












?>