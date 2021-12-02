
<?php
//Start or resume a session
session_start();

$SES =  $_SESSION['uname'];
//echo "<b>Logged In as:<b>      " .$SES. "<br />"; //.$_SESSION['uname'];
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
  <title>Allocate Tasks(Organiser-only)</title>


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

<br>

<form name="AllocateTask"  method="post"  action="updateAllocatedTask.php" >

<?php

//include 'OrganiserTimeSlots.php';

//connect to database
@ $db = new mysqli('localhost', 'root', '', 'assignment_1');
mysqli_select_db($db, "dropdown");

if (mysqli_connect_error())
{//display the details of any connection errors
	echo'Error connecting to database:<br/>'.mysqli_connect_error();
	exit;
}

?>




<?php

        
        
		$edit = $_GET['edit'];
		
        $volunteer_times_table_results=mysqli_query($db,"SELECT * FROM volunteer_times_table where vol_time_id= '$edit'");
		while($rowvolunteerstimetable=mysqli_fetch_array($volunteer_times_table_results))		
		{
			$task_id_vol = $rowvolunteerstimetable['task_id'];
			$description = $rowvolunteerstimetable['description'];
			
			
			$tasks_table_results=mysqli_query($db,"SELECT * FROM tasks_table");
            while($rowtaskstable=mysqli_fetch_array($tasks_table_results))
            {
				$task_id_table = $rowtaskstable['task_id'];
				//$taskname = $rowtaskstable['task_name'];
				
				//if(!empty($_POST['Tasks'])) {    // this is to check if array is empty (to avoid undefined variable error)
			//echo "Given Array is not empty"; 
				if ($task_id_table == $task_id_vol) {
					
					$tasktablename = $rowtaskstable['task_name'];
								 
                }
				
				
				if (empty($tasktablename)) {
					$tasktablename = "Choose from dropdown";
					
				}
				
				
				
		
				
				if ($task_id_vol == null) {
					
					$tasktablename = null;
					//$taskid = "Not Allocated";
							 
                }
				
				if ($description == null) {
					
					$description = null;
					
					//$taskid = "Not Allocated";
							 
                }
				
				
				
				//break;
	        }
			
			
		}
		
	    
	
		
		$volunteer_times_table_results=mysqli_query($db,"SELECT * FROM volunteer_times_table where vol_time_id= '$edit'");
		while($rowvolunteerstimetable=mysqli_fetch_array($volunteer_times_table_results))		
		{
			$volunteer_email = $rowvolunteerstimetable['volunteer_email'];
			
			//$description = $rowvolunteerstimetable['description'];
			//$firstname = $rowvolunteerstimetable['firstname'];
			//$surname = $rowvolunteerstimetable['surname'];
			$timeid2 = $rowvolunteerstimetable['time_id'];
			$taskid = $rowvolunteerstimetable['task_id'];
			
			
			$volunteers_table_results=mysqli_query($db,"SELECT * FROM volunteers_table");
            while($rowvolunteers=mysqli_fetch_array($volunteers_table_results))
            {   
		        $email = $rowvolunteers['email'];
				
				
		        if ($email == $volunteer_email) {
					
					$firstname = $rowvolunteers['firstname'];
			        $surname = $rowvolunteers['surname'];
					$email = $rowvolunteers['email'];
					
					
					$time_slots_table_results=mysqli_query($db,"SELECT * FROM time_slots_table");
                    while($rowvolunteers=mysqli_fetch_array($time_slots_table_results))
					{
						
						$timeslotid = $rowvolunteers['time_slot_id'];
						
						if($timeid2 == $timeslotid){
						
							$timeslotname = $rowvolunteers['time_slot_name'];
							
							//$timeslotid = $rowvolunteers['time_slot_id'];
							
							break;
								
						}
										
				    }
						
				}
				          
				//break;
	        }
				
		}
		
		

        //echo <a href=clearButton.php?delete='.$voltimeid; 
		//echo '<center><a href=clearButton.php?delete='.$voltimeid.' onclick="return confirm(\'Are you sure?\');">Clear Slot</a></td></center>';

			
  

?>

<br>
<br>

<a href=OrganiserTimeSlots.php>   Back to Volunteers Slot</a>  <p><a href="logoutorganiser.php">Log Out</a></p>




<center><input type="hidden" name="edit" style="width: 50px;" value="<?php print $edit; ?>"></center>


<input type="hidden" name ="timeid2" value="<?php print $timeid2; ?>"/>

<input type="hidden" name ="taskid" value="<?php print $taskid; ?>"/>

<input type="hidden" name ="tasktablename" value="<?php print $tasktablename; ?>"/>

<center><?php echo "<b>Logged In as:<b>      " .$SES. "<br />"; ?></center>
<br>
<br>



<tr style="background-color: #FFFFF;">
    <center>Volunteer Name:   <?php echo "$firstname    ",   "  $surname" ?></center>
</tr>




<input type="hidden" name ="volunteer_email" value="<?php print $volunteer_email; ?>"/>
<input type="hidden" name ="timeslotname" value="<?php print $timeslotname; ?>"/>


<br>


<tr style="background-color: #FFFFF;">
    <center>Time Slot:    <?php print $timeslotname; ?></center>
</tr>

<br>




<br>



<?php //echo '<center><a href=clearButton.php?delete='.$edit.' onclick="return confirm(\'Are you sure?\');">Clear Task & description</a></td></center>'; ?>

	


  



<br>
<center><td>Task Name</td></center>

<center><select name="Tasks[]" multiple>
<?php

/*<option value= "<?php echo $row["task_name"]; ?>" > <?php echo $row["task_name"]; ?> </option>
	  <?php*/
$res=mysqli_query($db,"SELECT * FROM tasks_table");
while($row=mysqli_fetch_array($res))
{
	$taskidtaskstable = $row["task_id"];
	$tasknametaskstable = $row["task_name"];
   // $color1 = "red";
	//echo "<option value='$tasknametaskstable' style='background:$color1;'>$tasknametaskstable</option>";
	$samename = false;
	        
		
	//$SES =  $_SESSION['uname'];
	
    $volt_table=mysqli_query($db,"SELECT * FROM volunteer_times_table where vol_time_id= '$edit'");
    while($rowvoltable=mysqli_fetch_array($volt_table)) {
		
		$taskidvoltimetable = $rowvoltable["task_id"];
		$color1 = "green";
		
		

		if ($taskidvoltimetable == $taskidtaskstable and $samename == false) {
			$taskname = $row['tasks_table'];
			echo "<option value='$tasknametaskstable' style='background:$color1;'>$tasknametaskstable</option>";
	        $samename = true;
			//echo "<center><td>Task Name<option value='$tasknametaskstable'>$tasknametaskstable</option></td></center>";
			break;
			
				
		} elseif($taskidvoltimetable != $taskidtaskstable and $samename == false) {
			
			echo "<option value='$tasknametaskstable'>$tasknametaskstable</option>";
			$samename = true;
			break;
		}
		
		
	}
}
	
	
?>

</select></center>
<br>






<center><td><input name="newtaskname" type="hidden" style="width: 200px;" maxlength="100" value="<?php echo $taskname; ?>"/></td></center>
	
<tr>






<?php

/*<option value= "<?php echo $row["task_name"]; ?>" > <?php echo $row["task_name"]; ?> </option>
	  <?php*/
$res=mysqli_query($db,"SELECT * FROM tasks_table");
while($row=mysqli_fetch_array($res))
{
	$taskidtaskstable = $row["task_id"];
	$tasknametaskstable = $row["task_name"];
   // $color1 = "red";
	//echo "<option value='$tasknametaskstable' style='background:$color1;'>$tasknametaskstable</option>";
	$samename = false;
	        
		
	//$SES =  $_SESSION['uname'];
	
    $volt_table=mysqli_query($db,"SELECT * FROM volunteer_times_table where vol_time_id= '$edit'");
    while($rowvoltable=mysqli_fetch_array($volt_table)) {
		
		$taskidvoltimetable = $rowvoltable["task_id"];
		$color1 = "green";
		
		

		if ($taskidvoltimetable == $taskidtaskstable and $samename == false) {
			//$taskname = $row['tasks_table'];
			//echo "<option>$tasknametaskstable</option>";
	        $samename = true;
			//echo "<center><td>$tasknametaskstable</td></center>";
			break;
			
		}else{
			$samename = false;
			break;
			
		}
		
	}
	
}
	


?>





<tr>
<center><b><p>Description:</p></b></center>
<center><textarea name="description" rows="3" cols="40" type="text"><?php echo $description;  ?></textarea></center>
</tr>

 
<br>



<tr style="background-color: #FFFFFF;"> 
      <center><td> <input type="submit" name="submit" value="Submit"; /></td></center>  
</tr>	
</form> 

<br>




<form name="clearButton"  method="post"  action="clearButton.php">




<input type="hidden" name="edit"  value="<?php print $edit; ?>">




<input type="hidden" name ="timeid2" value="<?php print $timeid2; ?>"/>

<input type="hidden" name ="taskid" value="<?php print $taskid; ?>"/>

<input type="hidden" name ="tasktablename" value="<?php print $tasktablename; ?>"/>

<input type="hidden" name ="volunteer_email" value="<?php print $volunteer_email; ?>"/>
<input type="hidden" name ="timeslotname" value="<?php print $timeslotname; ?>"/>

<center><td> <input type="submit" name="submit" value="Clear Slot"; onclick="return confirm('Are you sure?')";/></td></center> 


</form>

			
 


			




</tr>



</body>
</html>