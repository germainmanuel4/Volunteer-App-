
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
  <title>Time Slots (Organiser)</title>


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



<body style="background-color:powderblue;">

<h3><strong>Volunteer Time Slots Page</strong></h3>
<form name="OrganiserTimeSlots" action="AllocateTask.php" method="post">







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
echo '<th>Time Slots</th><th>Volunteer Name</th><th>Allocated Tasks</th><th>Details</th><th>Edit</th>';
echo '</tr>';

/////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////


$volunteer_times_table_results=mysqli_query($db,"SELECT * FROM volunteer_times_table order by time_id ASC");
while($rowvolunteertimes=mysqli_fetch_array($volunteer_times_table_results))
{
	$variable1 = $rowvolunteertimes['time_id'];
	$volunteeremail = $rowvolunteertimes['volunteer_email'];
	$taskidvolunteerstable = $rowvolunteertimes['task_id'];
	$description  = $rowvolunteertimes['description'];
	
	
    $time_slots_table_results=mysqli_query($db,"SELECT * FROM time_slots_table");
    while($rowtimeslots=mysqli_fetch_array($time_slots_table_results))
    {
		
		
		$variable2 = $rowtimeslots['time_slot_id'];
		if ($variable1 == $variable2) {
			
	        
			echo "<tr>";
			echo "<td>" .$rowtimeslots["time_slot_name"]. "</td>";
			
			
			
			
			$volunteers_results=mysqli_query($db,"SELECT * FROM volunteers_table");
            while($rowvolunteers=mysqli_fetch_array($volunteers_results))
			{
				$email = $rowvolunteers['email'];
				$firstname = $rowvolunteers['firstname'];
				$surname = $rowvolunteers['surname'];
				
				if ($volunteeremail == $email){
					
					//echo first name and surname
					echo "<td>" .$firstname. " " .$surname. "</td>";
					
					 
					$taskstable=mysqli_query($db,"SELECT * FROM tasks_table");
                    while($tasks=mysqli_fetch_array($taskstable))
			        {
						
						$taskname = $tasks['task_name'];
						$taskid = $tasks['task_id'];
						
						if($taskidvolunteerstable == $taskid){
								
						echo "<td>" .$tasks["task_name"]. "</td>";
						echo "<td>" .$description. "</td>";	
						echo "<td><a href=AllocateTask.php?edit=".$rowvolunteertimes['vol_time_id'].">Edit</a></td>";
						
						//} else {
							//echo "<td>Not Allocated</td>";
						    //echo "<td>Not Allocated</td>";	
						    //echo "<td><a href=delete.php?delete=".$rowvolunteertimes['vol_time_id'].">Edit</a></td>";
								
					    }
						
						if($taskidvolunteerstable == ""){
							echo '<td><div style="color: red;">No Task Allocated</div></td>';
							echo '<td><div style="color: red;">Must have an allocated task</div></td>';
						    echo "<td><a href=AllocateTask.php?edit=".$rowvolunteertimes['vol_time_id'].">Edit</a></td>";	
							break;
						}
						
						
						
						
							
					}
								
				}
						
			
			}
			
			
			
			
			
			
			
        }
	}
}

	

echo '</table>';






// select from volunteer time slots, time_slot, volunteer_name, allocated_task, details, edit

//echo them in a while loop not in a form 

?>


<br>
<br>


<a href=ManageTaskName.php>Manage Tasks</a>


<br>
<p><a href="increaseEventDuration.php">Increase event duration</a></p>

<p><a href="messagevolunteer.php">Message</a></p>

<p><a href="showlogs.php">Show all login activity</a></p>

<p><a href="logout.php">Log Out</a></p>






</form> 
</body>
</html>

