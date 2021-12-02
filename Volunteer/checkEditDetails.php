<?php
//Start or resume a session
session_start();


$SES =  $_SESSION['uname'];
echo "<b>Logged In as:<b> " .$SES; //.$_SESSION['uname'];

//If the "uname" session variable is not set or is empty, redirect to login page
if ( !isset($_SESSION['uname']) || $_SESSION['uname'] == '' )
{
	header('Location: LoginVolunteer.php');
	exit;
}



?>




<?php

//include 'editVolunteer.php';


//connect to database
@ $db = new mysqli('localhost', 'root', '', 'assignment_1');

if (mysqli_connect_error())
{//display the details of any connection errors
	echo'Error connecting to database:<br/>'.mysqli_connect_error();
	exit;
}



   
$addressline1 = $_POST['addressline1'];
$addressline2 = $_POST['addressline2'];
$suburb = $_POST['suburb'];
$postcode = $_POST['postcode'];
$phonenumber = $_POST['phonenumber'];
$password = $_POST['password'];
$confirmpassword = $_POST['confirmpassword'];








//we create this variable and set it to an empty string... if it remains empty by the end
	//of our validation code, then there was no error found
$error_message ='';
	
	//first we'll check if any of our required fields are empty all at once
if (empty($addressline1) || empty($suburb) || empty($phonenumber) || empty($password)  || empty($confirmpassword)  )
{
	$error_message = 'One of the required fields was blank.';
}
	
	$phone = strlen($phonenumber);
	
	if (strlen($phone) > 12)
	{
	  $error_message = 'invalid phone number .';
	  echo $phone;
	}
	
	
    
	if (strlen($password) < 5)
	{
		$error_message ='Your password is not long enough.';
	}
	
	if ($password != $confirmpassword)
	{
	  $error_message = 'Password and confirm password did not match.';
	}
	
	
	
	
	
    

	
	// now we'll check if the email address already exists in the databasse
	$email_query = " SELECT email FROM volunteers_table WHERE email ='$SES'";
	$email_results = $db->query($email_query);
	
	
	
	
	// if the error_message variable is not empty (i.e. an error has been found)
	if ($error_message != '')
	{
	//we'll just provide the user with the error message and a back link if there is an error
	//the exit command tells the server/PHP to stop processing the script at that point
		echo "<br/ >";
		echo 'Error:   '. $error_message. ' <a href="javascript: history.back();">Go Back</a>.';
		echo '</body></html>';
		exit;
	}
	else
	{
		//if there was no error, show success message
		//(and then the script continues to the HTML section that displays the results)
		echo '<p><strong>Form submitted successfully!</strong></p>';
		
	
	
	
	

	
	$query = "UPDATE volunteers_table SET addressline1= '".$addressline1."', addressline2='".$addressline2."',suburb='".$suburb."', postcode='".$postcode."', phonenumber='".$phonenumber."' WHERE email= '$SES'";
	$result = $db->query($query);
	
	if ($result)
	{
		echo '<p>User details updated into database Successfully</p>';
		echo '<a href="javascript: history.back();">Go Back to Edit details</a>.';
		
	}
	else
	{
		echo '<p>Error updating details details. Error message:</p>';
		echo '<p>'.$db->error.'</p>';
		echo '<a href="javascript: history.back();">Go Back to edit details</a>.';
		
		
	}
	
	}	
		
	

?>


<br>
<br>


<a href=VolunteerTimeSlots.php>Go to Time Slots </a>
  











