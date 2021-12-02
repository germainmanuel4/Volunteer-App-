

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
if ( !isset($_SESSION['uname']) || $_SESSION['uname'] == '' || $_SESSION['access'] == 1 )
{
	header('Location: LoginVolunteer.php');
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



<body style="background-color:powderblue;">

<center><h3><strong>Manage Time Slots Page</strong></h3></center>
<form name="VolunteerTimeSlots" action="addTask.php" method="post">








<?php

//connect to database
@ $db = new mysqli('localhost', 'root', '', 'assignment_1');
mysqli_select_db($db, "dropdown");

if (mysqli_connect_error())
{//display the details of any connection errors
	echo'Error connecting to database:<br/>'.mysqli_connect_error();
	exit;
}

//execute the query


// show how many rows the query returned





//start table in which our user list will be shown
echo '<table style="width:100%"><tr>';
echo '<th>Time Slots</th><th>Allocated Tasks</th><th>Details</th><th>Remove</th>';
echo '</tr>';



//loop through the results and display them




/////////////////////////////////////////////////
/// code for your time slots//////////////////
////////////////////////////////////////////////

//use the emailaddress as a session variable
//loop through all the time slot , allocated task, details where the email is same as session variable


//READ from database  (no need to check if time_id is equals to time_slots table, meaning if the chosen time_id is available on the time slots_table, because the selected values are from the database

$SES =  $_SESSION['uname'];
echo "<b>Logged In as:<b> " .$SES; //.$_SESSION['uname'];
//echo $SE;

$hasMatch = false;

//$volunteer_times_table_results=mysqli_query($db,"SELECT * FROM volunteer_times_table where volunteer_email='.$SES.'          ");
$volunteer_times_table_results=mysqli_query($db,"SELECT * FROM volunteer_times_table where volunteer_email='$SES' ORDER BY time_id ASC");          
while($rowvolunteertimes=mysqli_fetch_array($volunteer_times_table_results))
{
	$variable1 = $rowvolunteertimes['time_id'];
	$taskidvol = $rowvolunteertimes['task_id'];
	
	
	
    $time_slots_table_results=mysqli_query($db,"SELECT * FROM time_slots_table");
    while($rowtimeslots=mysqli_fetch_array($time_slots_table_results))
    {
		
		$variable2 = $rowtimeslots['time_slot_id'];
		if ($variable1 == $variable2) {
			$hasMatch = true;
			$tasks_table_results=mysqli_query($db,"SELECT * FROM tasks_table");
            while($rowtaskslots=mysqli_fetch_array($tasks_table_results))
            {   
		        
				$taskid = $rowtaskslots['task_id'];
				if ($taskidvol == $taskid){   // if task volunteer table equals to task id tasks table
					$taskname = $rowtaskslots['task_name'];
					
					
					echo "<tr>";
		            echo "<td>" .$rowtimeslots["time_slot_name"]. "</td>";
		            echo "<td>" .$taskname. "</td>";
		            //echo "<td>" .$rowvolunteertimes["task_id"]. "</td>";
		            echo "<td>" .$rowvolunteertimes["description"]. "</td>";
	                //echo "<td><a href=delete.php?delete=".$rowvolunteertimes['time_id'].">Remove</a></td>";
			
			
			        //$timeslot = $rowtimeslots["time_slot_name"];
	                echo '<td><a href=delete.php?delete='.$variable1.' onclick="return confirm(\'Are you sure?\');">Remove</a></td>';
			
			
		            break;
						
				}
				
				if ($taskidvol == ""){   // if task volunteer table equals to task id tasks table
					$taskname = null;
					$description = null;
					
					
					echo "<tr>";
		            echo "<td>" .$rowtimeslots["time_slot_name"]. "</td>";
		            echo "<td>" .$taskname. "</td>";
		            //echo "<td>" .$rowvolunteertimes["task_id"]. "</td>";
		            echo "<td>" .$description. "</td>";
	                //echo "<td><a href=delete.php?delete=".$rowvolunteertimes['time_id'].">Remove</a></td>";
			        
					//$timeslot = $rowtimeslots["time_slot_name"];
	                echo '<td><a href=delete.php?delete='.$variable1.' onclick="return confirm(\'Are you sure?\');">Remove</a></td>';
			
			
		            break;
						
				}
				
				
				
			}

				
        }
		
		
	
					
		
		
		
		
	}
	

	
	//first while loop loopan ang volunteer times
	   //fetch rowvolunteertimes[time_id"]
}	
	            //second loop loopan ang time_slots     
				    //fetch rowtimeslots['time_slot_id']
	
	



if ($hasMatch == false){ 
    $taskname = "choose available days on the dropdown";
    $description = "choose available days on the dropdown";
    $timeslotname = "choose available days on the dropdown";		
		
    echo "<tr>";
	echo "<td>" .$timeslotname. "</td>";
    echo "<td>" .$taskname. "</td>";
    echo "<td>" .$description. "</td>";
	echo "<td>" .$description. "</td>";                
			
        
}




// create a drop down menu and an add button
// read whats in the database loop through and ouput whats in the database time_slot

echo '</table>';

echo '<br>';









?>


<br>
























<br>

<p>Choose available timeslots to add</p>





<select name="Color[]" multiple>
<?php
$res=mysqli_query($db,"SELECT * FROM time_slots_table");
while($row=mysqli_fetch_array($res))
{
	/*?>
	<option><?php echo $row["time_slot_name"]; ?></option>
	<?php*/
	
	?>
	<option value= "<?php echo $row["time_slot_name"]; ?>" > <?php echo $row["time_slot_name"]; ?> </option>
	<?php
	
	//option 
}

?>

</select>





<tr style="background-color: #FFFFFF;"> 
      <td> <input type="submit" name="submit" value="Submit" /></td>    


<br>
<br>

<a href=editVolunteer.php>Edit Details</a>

<br>
<br>
<a href=message.php>Message</a>

<br>

<p><a href=Logout.php>Log Out</a></p>

 
	  


</tr>


</form> 
</body>
</html>








