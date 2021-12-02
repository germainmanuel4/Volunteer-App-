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





<?php
//include 'AllocateTask.php';
//connect to database
@ $db = new mysqli('localhost', 'root', '', 'assignment_1');

if (mysqli_connect_error()) 
{//display the details of any connection errors
	echo'Error connecting to database:<br/>'.mysqli_connect_error();
	exit;
}





if(isset($_POST['submit'])){
	
	//echo "Allocated Task or Description already saved";
	
	$edit =  $_POST['edit'];
	$description = $_POST['description'];
	//$taskname = $_POST['taskname'];
	$taskid = $_POST['taskid'];
	$task = 1;
	$timeid2 = $_POST['timeid2'];
	//$volunteeremail = $_POST['volunteer_email'];
	//$selectedTask = $_POST['Tasks'];
	//$tasks = $_POST['Tasks'] as $select;
	$select = "";
	$volunteer_email = $_POST['volunteer_email'];
	$timeslotname = $_POST['timeslotname'];
	$tasktablename = $_POST['tasktablename'];
	
	
	
////////////////////////////////////////////////////////////////////////	
    if($taskid == null) {
		
		if(!empty($_POST['Tasks'])) {    // this is to check if array is empty (to avoid undefined variable error)
			//echo "Given Array is not empty"; 
			
			foreach ($_POST['Tasks'] as $select)
			{
				//echo "You selected :" .$select; // Displaying Selected Value
			}
					
		}
		
		//$SES allocated .$select. to jbloggs@stuff.com on Day 1, Morning”
		
		//$volunteer_times_table_results=mysqli_query($db,"SELECT * FROM volunteer_times_table where vol_time_id= ".$voltimeid."");
		//while($rowvolunteerstimetable=mysqli_fetch_array($volunteer_times_table_results))		
		//{
			
			//$description = $rowvolunteerstimetable['description'];	
			
			
			$tasks_table_results=mysqli_query($db,"SELECT * FROM tasks_table");
		    while($rowvolunteerstasktable=mysqli_fetch_array($tasks_table_results))		
		    {
				$taskstablename = $rowvolunteerstasktable['task_name'];
				
			    
				if($select == $taskstablename) {
					
					$taskidtaskstable = $rowvolunteerstasktable['task_id'];
					
					$log_action = "$SES, allocated $select to $volunteer_email on $timeslotname";
                    $log_details = "Organiser Allocating Task to volunteer";
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
					
					
					
					
					
		
					$inserttaskid = "UPDATE volunteer_times_table SET task_id=".$taskidtaskstable." WHERE vol_time_id= ".$edit."";
					//"UPDATE volunteer_times_table SET task_id=".$task.", description='$description' WHERE vol_time_id= ".$voltimeid."";
			        if(mysqli_query($db,$inserttaskid)) {
						header("refresh:1; url=OrganiserTimeSlots.php");
				    }else{
						echo "Task ID Not Updated";
					//$sql = "INSERT INTO volunteer_times_table  (volunteer_email, time_id) VALUES ('jbloggs@stuff.com', ".$timeslotid.")";
				    }
					
				}
				
			}
			
			
		//}
		
		
	}	
	
	
	
	
	
	
	 if($taskid != null) {
		
		if(!empty($_POST['Tasks'])) {    // this is to check if array is empty (to avoid undefined variable error)
			//echo "Given Array is not empty"; 
			
			foreach ($_POST['Tasks'] as $select)
			{
				//echo "You selected :" .$select; // Displaying Selected Value
			}
			
			
			
		}
		    
		
		
		
		//$volunteer_times_table_results=mysqli_query($db,"SELECT * FROM volunteer_times_table where vol_time_id= ".$voltimeid."");
		//while($rowvolunteerstimetable=mysqli_fetch_array($volunteer_times_table_results))		
		//{
			
			//$description = $rowvolunteerstimetable['description'];	
			
			
			$tasks_table_results=mysqli_query($db,"SELECT * FROM tasks_table");
		    while($rowvolunteerstasktable=mysqli_fetch_array($tasks_table_results))		
		    {
				$taskstablename = $rowvolunteerstasktable['task_name'];
				
			    
				if($select == $taskstablename) {
					
					$taskidtaskstable = $rowvolunteerstasktable['task_id'];
					
					//$taskidtaskstable = $rowvolunteerstasktable['task_id'];
					
					$log_action = "$SES, allocated $select to $volunteer_email on $timeslotname";
                    $log_details = "Organiser Allocating Task to volunteer";
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
					
					
					
					
					
					
					
					
					
					$inserttaskid = "UPDATE volunteer_times_table SET task_id=".$taskidtaskstable." WHERE vol_time_id= ".$edit."";
					//"UPDATE volunteer_times_table SET task_id=".$task.", description='$description' WHERE vol_time_id= ".$voltimeid."";
			        if(mysqli_query($db,$inserttaskid)) {
						header("refresh:1; url=OrganiserTimeSlots.php");
				    }else{
						echo "Task ID Not Updated";
					//$sql = "INSERT INTO volunteer_times_table  (volunteer_email, time_id) VALUES ('jbloggs@stuff.com', ".$timeslotid.")";
				    }
					
				}
				
			}
			
			
		//}
		
		
	}	
	
	
	
	
	
	
	
	if($description == null) {
		
		
		
		
		
		$taskidtaskstable = $rowvolunteerstasktable['task_id'];
					
		/*$log_action = "$SES, changed $taskname description for $volunteer_email";
        $log_details = "Organiser Allocating Task to volunteer";
		//INSERT INTO `logs`(`log_action`, `log_details`) VALUES ("Registration", "newly Registered")
		$querylogs = "INSERT INTO logs (log_action, log_details) VALUES ('$log_action', '$log_details')";
        $logs = $db->query($querylogs);
        if ($logs)
        {
						//echo '<p>User details inserted into database Successfully</p>';
        }else{
			echo '<p>Error inserting details. Error message:</p>';
            echo '<p>'.$db->error.'</p>';
        }*/
		
		
		
		
        
		
		
		$inserttaskid = "UPDATE volunteer_times_table SET description='$description' WHERE vol_time_id= ".$edit."";
		//"UPDATE volunteer_times_table SET task_id=".$task.", description='$description' WHERE vol_time_id= ".$voltimeid."";
		if(mysqli_query($db,$inserttaskid)) {
			header("refresh:1; url=OrganiserTimeSlots.php");
		}else{
			echo "1Description  Not Updated";
					//$sql = "INSERT INTO volunteer_times_table  (volunteer_email, time_id) VALUES ('jbloggs@stuff.com', ".$edit.")";
		}	
		
	}
	
	

	if($description != null) {
		
		
		
		
		
		
		$taskidtaskstable = $rowvolunteerstasktable['task_id'];
					
	    $log_action = "$SES, changed $tasktablename description for $volunteer_email";
        $log_details = "Organiser Allocating Task to volunteer";
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
		
		
		
		

		
		
		$inserttaskid = "UPDATE volunteer_times_table SET description='$description' WHERE vol_time_id= ".$edit."";
		//"UPDATE volunteer_times_table SET task_id=".$task.", description='$description' WHERE vol_time_id= ".$voltimeid."";
	    if(mysqli_query($db,$inserttaskid)) {
			header("refresh:1; url=OrganiserTimeSlots.php");
	    }else{
			echo "2Description Not Updated";
					//$sql = "INSERT INTO volunteer_times_table  (volunteer_email, time_id) VALUES ('jbloggs@stuff.com', ".$timeslotid.")";
		}	
		
	}
	
	
	
	
	

	
	//this if no condition trigger means no input just user clicking submit button
	header("refresh:1; url=OrganiserTimeSlots.php");
	



	
	

}


	
	



?>




</body>
</html>
