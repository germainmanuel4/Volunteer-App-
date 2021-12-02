

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







<!DOCTYPE html>
<html>
<head>
  <title>Add Days to an event </title>


<style>

</style>


</head>




<body>
<center><h3><strong>Add days to an Event</strong></h3></center>








<?php

//connect to database
@ $db = new mysqli('localhost', 'root', '', 'assignment_1');

if (mysqli_connect_error())
{//display the details of any connection errors
	echo'Error connecting to database:<br/>'.mysqli_connect_error();
	exit;
}






$input = $_POST['selectedvalue'];
//echo $selectedvalue;

//server validation
//check if a digit
//check if empty 

if (empty($input) || !is_numeric($input) ) {
	$error_message = 'Invalid input.';
	//echo "Invalid day input ";
}

if (intval($input) < 1 or intval($input) >= 15) {
	$error_message = 'Invalid Input.';
	//echo "Invalid day input";
}

if (!empty($error_message)) 
{
	
	echo "</br>";
	echo "</br>";
	echo ' <a href="javascript: history.back();">Back To Add</a>.';
	echo "<center>Invalid Input, Try again</center>";
}
	





$threerows = 1;
$sixrows = 2;
$ninerows = 3;
$twelverows = 4;
$fifteenrows = 5;
$eighteenrows = 6;
$twentyonerows = 7;
$twentyfourrows = 8;
$twentysevenrows = 9;
$thirthyrows =10;
$thirthythreerows =11;
$thirthysixrows =12;
$thirthyninerows =13;
$fourthytwo =14;

$rowcount = 0;
$counter = 0;
//$numofloops = $rowcount - 1;




// to get the number of rows default 
$time_slots_table_results=mysqli_query($db,"SELECT * FROM time_slots_table");    
while($rowtimeslots=mysqli_fetch_array($time_slots_table_results))	

{

	$rowcount = $rowcount + 1;	
	

}



$starting = 0;
$number = 0;
   

//$rowcount = 1;
    	
if ($rowcount == 3)   //if 3 rows , start day is 1 only
{
	$starting = 1;  //1 day only	
}	
	
if ($rowcount == 6)   // if 6 rows, days are 1, 2
{
	$starting = 2;  //2 days only		
}	
    
if ($rowcount == 9) // if 9 rows, days are 1, 2, 3
{
	$starting = 3;  //3 days only
}
	


   	
if ($rowcount == 12)   //if 12 rows , start day is 1 only
{
	$starting = 4;  //4 day only	
}	
	
if ($rowcount == 15)   // if 15 rows, days are 
{
	$starting = 5;  //5 days only		
}	
    
if ($rowcount == 18) // if 18 rows, days are 6
{
	$starting = 6;  //6 days
}





   	
if ($rowcount == 21)   //if 21 rows , start day is 1 only
{
	$starting = 7;  //7 day only	
}	
	
if ($rowcount == 24)   // if 24 rows, days are 1, 2
{
	$starting = 8;  //8 days only		
}	
    
if ($rowcount == 27) // if 27 rows, days are 1, 2, 3
{
	$starting = 9;  //9 days only
}




   	
if ($rowcount == 30)   
{
	$starting = 10;  //10 day only	
}	
	
if ($rowcount == 33)   
{
	$starting = 11;  //11 days only		
}	
    
if ($rowcount == 36) 
{
	$starting = 12;  //12 days only
}




   	
if ($rowcount == 39)   
{
	$starting = 13;  //13 days only	
}	
	
if ($rowcount == 42)  
{
	$starting = 14;  //14 days only	
    	
}	




// loop to insert
	
$loop3 = 0;
$comparestarting = 0;
$secondloopcount = 0;
//$input = 1;
$userinput = $input;





$number = $starting; // refer to use variable starting


//while($starting != $userinput){
	while ($comparestarting < $userinput) {     //anu ginagawa nito, iniikutan ang kung anung starting ng number dapat example, 4, 5, 6 ng 123
	       //$userinput = 4;
		   $number = $number + 1;
		   //$starting = $starting + 1;
	       $comparestarting = $comparestarting + 1;      
	       $userinput = $userinput + 1;
	       $loop3 = 0;
	       
		   $userinput = $input;

	
	if ($number > 14){  // if number greater than 14 days stop the loop
	    echo "<center>Maximum 14 days reached cannot add more days.</center>"; 
	     break;
	
		
	}		

	 
    
	while ($loop3 < 3) { // iniikutan ng tatlong beses lang lage
		
		//echo $number;     //can insert three rows here	
		
		$morning = strval($number);
		$afternoon = strval($number);
		$night = strval($number);
		
		$daymorning = "Day " .$morning. ", Morning";
		$dayafternoon = "Day ".$afternoon. ", Afternoon";
		$daynight = "Day " .$night. ", Night";
		
		
	
		$loop3 = $loop3 + 1;
	}
	$secondloopcount = $secondloopcount + 1; //loop para malaman ung bilang ng ikot na ikumpara sa user input
	
	
	if ($loop3 == 3) {
			
			/*echo $daymorning;
			echo "</br>";
			echo $dayafternoon;
			echo "</br>";
			echo $daynight;
			echo "</br>";*/
			
			$sql = "INSERT INTO time_slots_table  (time_slot_name) VALUES ('$daymorning'), ('$dayafternoon'), ('$daynight')";
					if(mysqli_query($db,$sql)) 
		            //header("refresh:1; url=VolunteerTimeSlots.php");
				    echo "";
				
				else 
					echo "Time Slot  name added";

			
	}
	
	echo "</br>";
	echo "</br>";
	echo "<center>Added days Successfully!!</center>"; 
	echo "<center>$daymorning</center>"; 
	echo "<center>$dayafternoon</center>"; 
	echo "<center>$daynight</center>"; 
	
	echo "</br>";
	echo "</br>";
	
    //echo ' <a href="javascript: history.back();">Back to Add days</a>.';
		
			
	}	
	
	
	echo ' <a href="javascript: history.back();">Back to Add days</a>.';
		
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	//////////////////////////////////////////////////
	//code to delete a day that are not allocated to any volunteer
	//////////////////////////////////////////////////
	
$last3rows = $rowcount - 3;
$delete = false;
$volrowcounter = 0;	
	
$volunteer_times_table=mysqli_query($db,"SELECT * FROM volunteer_times_table");          
while($rowvolunteers=mysqli_fetch_array($volunteer_times_table)) 
		
{
	$vol_time_id = $rowvolunteers['time_id'];
	$volrowcounter = $volrowcounter + 1;
	
	
	$counter2ndloop = 0;
	$times_slots_table=mysqli_query($db,"SELECT * FROM time_slots_table");          
    while($rowtimeslots=mysqli_fetch_array($times_slots_table)) 
    {
		$time_id = $rowtimeslots['time_slot_id'];
		$time_slot_name = $rowtimeslots['time_slot_name'];
		
		$counter2ndloop = $counter2ndloop + 1;
		
		if ($vol_time_id == $time_id and  $rowcount > 3 and $volrowcounter >= $last3rows) {
			
			$delete = true;
			
		}
		
		
		if ($counter2ndloop >= 3 and $delete == true) {
			
			$times_slots_table_two=mysqli_query($db,"SELECT * FROM time_slots_table");          
            while($rowtimeslotstwo=mysqli_fetch_array($times_slots_table_two)) 
				
				$time_slot_name2 = $rowtimeslotstwo['time_slot_name'];
				
				if($time_slot_name == $time_slot_name2) {
					
					echo "last three rows deleted";  
					
				}
			
				
			
		    }
					
		 
		}
	
		
	}
		

	
	
	
	
	
	

?>



</br>
</br>

<a href=OrganiserTimeSlots.php>Back to Organiser Time Slot</a>

</br>

<p><a href="logoutvolunteer.php">Log Out</a></p>

 
	  


</tr>


</form> 
</body>
</html>

