









<!DOCTYPE html>
<html>
<head>
  <title>Add task</title>
</head>

<body>







<?php
include 'VolunteerTimeSlots.php';
//connect to database
@ $db = new mysqli('localhost', 'root', '', 'assignment_1');

if (mysqli_connect_error())
{//display the details of any connection errors
	echo'Error connecting to database:<br/>'.mysqli_connect_error();
	exit;
}


	
	
	
	
	
	
	


if(isset($_POST['submit'])){
	// As output of $_POST['Color'] is an array we have to use foreach Loop to display individual value
    foreach ($_POST['Color'] as $select)
	{
		echo "You selected :" .$select; // Displaying Selected Value
	
		
		////////////////////////////////////////////////////////////////////////
		// code should be inside here to access the submitted value aka $.select
	    ////////////////////////////////////////////////////////////////////////
		
	    	
	
        $uniqueSlot = True;
        $time_id_is_null = False;
		
		 //global $uniqueSlot;
		 //global $time_id_is_null;
		
		// Select all from time SLOTS table
		$time_slots_table_results=mysqli_query($db,"SELECT * FROM time_slots_table");
		while($rowtimeslots=mysqli_fetch_array($time_slots_table_results))
			
		    
		{   $timeslotid = $rowtimeslots['time_slot_id'];   // time slot id
		    $timeslotname = $rowtimeslots['time_slot_name'];
		    
		    
            $SES =  $_SESSION['uname'];
			if ($select == $timeslotname) {
				$volunteer_times_table_results=mysqli_query($db,"SELECT * FROM volunteer_times_table where volunteer_email ='$SES'"); // addon query here the email 
		        while($rowvolunteertimes=mysqli_fetch_array($volunteer_times_table_results)) 
					
				{   $volunteeremail = $rowvolunteertimes['volunteer_email'];
					$timeid = $rowvolunteertimes['time_id'];
					//echo $timeslotid;
					//echo $timeid;
					
					
					if ($timeid == $timeslotid) {
						echo "            , Time slot already chosen choose different slots";
						$uniqueSlot = False;
						//break;
										
					}
					
					//if($volunteeremail == 'jbloggs@stuff' AND $timeid == NUll) {
						//$time_id_is_null = True;
						
					//}
							
				}
				
				//after the loop decide if there should be an insert to database 
				// this is if volunteer name in database has a time_id, this means insert a new volunteer name and a new time slotID
				//if($uniqueSlot == TRUE and $time_id_is_null == FALSE) 
				if($uniqueSlot == True) {
					$sql = "INSERT INTO volunteer_times_table  (volunteer_email, time_id) VALUES ('$SES', ".$timeslotid.")";
					
					
					$log_action = "$SES, Added a timeslot, $timeslotname";
	                $log_details = "Volunteer Adding TimeSlots";
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
					
					
					
		
					
					
					
					
					if(mysqli_query($db,$sql)) 
						
						header("refresh:1; url=VolunteerTimeSlots.php");
						
					else 
						echo "Time ID Slot not added";
	
                }
							
			}
					
		}

	}
	
}




/*// this is if volunteer name in database has no time_id means volunteer name has no time id yet
				if($uniqueSlot == TRUE and $time_id_is_null == True AND $volunteer_email == 'jbloggs@stuff') {
					$sql = "INSERT INTO volunteer_times_table  (time_id) VALUES (".$timeslotid.")";
					if(mysqli_query($db,$sql)) 
		            header("refresh:1; url=VolunteerTimeSlots.php");
		            	
                else 
					echo "Time ID Slot not added";
	
                }*/
				
				
			

?>






</body>
</html>

