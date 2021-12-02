
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

if(isset($_POST['submit'])){
	//select query
	$passedtaskname = $_POST['taskname'];
    $editTask = $_POST['editid'];
	
	
	
	
	/// there should be a loop that checks if the taskname is the same as the one on database, if so trigger an error message
	$tasks_table_results=mysqli_query($db,"SELECT * FROM tasks_table where task_id= ".$editTask."");
    while($rowtasks=mysqli_fetch_array($tasks_table_results)) {
		$taskid = $rowtasks['task_id'];
	    $taskname = $rowtasks['task_name'];
		
		if ($taskname == $passedtaskname || empty($passedtaskname)) {
			echo "Error: Task Names must be unique or cannot be empty";
			break;
		}else{
			$sql = "UPDATE tasks_table SET task_name='$passedtaskname' WHERE task_id= ".$editTask."";
		    //execute the query
			if(mysqli_query($db,$sql))
				
				header("refresh:1; url=ManageTaskName.php");
		
	        else
				echo "Task Name Not Updated";
		    echo " Successfully Updated";
	    }

	}
	
	
	
	

}

?>