
<!DOCTYPE html>
<html>
<head>
  <title>Volunteer Registration Results</title>
</head>

<body>
<?php
//connect to database
@ $db = new mysqli('localhost', 'root', '', 'assignment_1');

if (mysqli_connect_error())
{//display the details of any connection errors
	echo'Error connecting to database:<br/>'.mysqli_connect_error();
	exit;
}

    
	//create short variable names from the data received from the form
	//$username = $_POST['username'];
	//$real_name = $_POST['real_name'];
	//$email = $_POST['email'];
	//$birth_year = $_POST['birth_year'];
	//$country = $_POST['country'];
	//$password = $_POST['password'];
	
	////////////////////////////////////////////////
	////////////////////////////////////////////////
	$email	 = $_POST['emailaddress'];	
	$firstname = $_POST['firstname'];
	$surname = $_POST['surname'];
	$addressline1 = $_POST['addressline1'];
	$addressline2 = $_POST['addressline2'];
	$suburb = $_POST['suburb'];
	$postcode = $_POST['postcode'];
	$phonenumber = $_POST['phonenumber'];
	$birthday = $_POST['birthday'];
	$access_level = 2;
	
	
	
	
	//$YOB = $_POST['YOB'];
	//$MOB = $_POST['MOB'];
	//$DOB = $_POST['DOB'];
	//$Birthdate = $_POST['YOB'] . '-' . $_POST['MOB']  . '-' . $_POST['DOB'];
	
	$password = $_POST['password'];
	$confirmpassword = $_POST['confirmpassword'];
	
	////////////////////////////////////////////////////
	////////////////////////////////////////////////////

	
	//we create this variable and set it to an empty string... if it remains empty by the end
	//of our validation code, then there was no error found
	$error_message ='';
	
	//first we'll check if any of our required fields are empty all at once
	if (empty($email) || empty($firstname) || empty($surname) || empty($addressline1) || empty($suburb) || empty($postcode) || empty($phonenumber) || empty($birthday) || empty($password)  || empty($confirmpassword)  )
	{
	  $error_message = 'One of the required fields was blank.';
	}
	
	
	
	// to check valid email address
	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
	  $error_message = 'The email address is not valid';
    }
	
	// now we'll check if the password is long enough
	elseif (strlen($password) <5)
	{
		$error_message ='Your password is not long enough.';
	}
	
	
	
		
	
	// now we'll check if the email address already exists in the databasse
	$email_query = " SELECT email FROM volunteers_table WHERE email ='".$email."'";
	$email_results = $db->query($email_query);
	
	if ($email_results->num_rows > 0)
	{
		$error_message ='Your email address already exists, choose another.';
	}
	
	////////////////////////////////////////
	////////////////////////////////////////
	////////////////////////////////////////
	
	
	
	
	
	
	
	
	// if the error_message variable is not empty (i.e. an error has been found)
	if ($error_message != '')
	{
	//we'll just provide the user with the error message and a back link if there is an error
	//the exit command tells the server/PHP to stop processing the script at that point
		echo 'Error:'. $error_message. ' <a href="javascript: history.back();">Go Back</a>.';
		echo '</body></html>';
		exit;
	}
	else
	{
		//if there was no error, show success message
		//(and then the script continues to the HTML section that displays the results)
		echo '<p><strong>Form submitted successfully!</strong></p>';
	
	
	
	
	
	
	
////////////////////////////////////////////////
///////////////////////////////////////////////
	
			
	//$query = "INSERT  INTO volunteers_table VALUE ('".$email."', '".$first_name."','".$surname."', '".$address_ln_1."', '".$address_ln_2."', '".$suburb."', '".$postcode."', '".$phonenumber."', '".$postcode."')";
	$query = "INSERT  INTO volunteers_table(email,firstname,surname,addressLine1,addressLine2,suburb,postcode,phonenumber,birthday,password,access_id) VALUES('$email', '$firstname','$surname', '$addressline1', '$addressline2', '$suburb', '$postcode', '$phonenumber', '$birthday', '$password', '$access_level')";
	$result = $db->query($query);
	
	
	
	

	if ($result)
	{
		echo '<p>User details inserted into database Successfully</p>';
	}
	else
	{
		echo '<p>Error inserting details. Error message:</p>';
		echo '<p>'.$db->error.'</p>';
	}
	
	}	
	
	/////////////////////////////////////////////////
	/////////////////////////////////////////////////
	/////////////////////////////////////////////////
	
	//Insert the logs here  /////////////////////////
	
	////////////////////////////////////////////////
	////////////////////////////////////////////////
	////////////////////////////////////////////////
	
	
	$log_action = "Newly Registered Volunteer email = .$email.";
	$log_details = "Volunteer Registration";
	
	//INSERT INTO `logs`(`log_action`, `log_details`) VALUES ("Registration", "newly Registered")
	
	$querylogs = "INSERT INTO logs (log_action, log_details) VALUES ('$log_action', '$log_details')";
	$logs = $db->query($querylogs);
	
	
	if ($logs)
	{
		echo '<p>User details inserted into database Successfully</p>';
	}
	else
	{
		echo '<p>Error inserting details. Error message:</p>';
		echo '<p>'.$db->error.'</p>';
	}
	
		
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	////////////Maybe not needed//
	/*// add another query to insert one newly registered email to volunteer name in volunteers table
	$insertemail = "INSERT  INTO volunteer_times_table VALUE ('$email')";
	$result = $db->query($insertemail);*/
	
	
	
	
?>

















<h3><strong>New User Details:</strong></h3>
  <table style="width: 500px; border: 0px;" cellspacing="1" cellpadding="1">
    <tr>
      <td colspan="2"><strong>Personal Details</strong></td>
    </tr>
    <tr style="background-color: #FFFFFF;"> 
      <td>Email Address</td>
      <td> 
        <?php echo $email; ?></td>
    </tr>
    <tr style="background-color: #FFFFFF;"> 
      <td>First Name</td>
      <td> 
        <?php echo $firstname; ?></td>
    </tr>
    <tr style="background-color: #FFFFFF;"> 
      <td>Last Name</td>
      <td> 
        <?php echo $surname; ?></td>
    </tr>
    <tr style="background-color: #FFFFFF;"> 
      <td>Date Of Birth</td>
      <td> 
        <?php echo $addressline1; ?></td>
    </tr>
    <tr style="background-color: #FFFFFF;"> 
      <td>Suburb</td>
      <td> 
        <?php echo $suburb; ?></td>
    </tr>
     
	
	<tr style="background-color: #FFFFFF;"> 
      <td>Postcode</td>
      <td> 
        <?php echo $postcode; ?></td>
    </tr>
	
	<tr style="background-color: #FFFFFF;"> 
      <td>Phonenumber</td>
      <td> 
        <?php echo $phonenumber; ?></td>
    </tr>
	
	<tr style="background-color: #FFFFFF;"> 
      <td>Birthday</td>
      <td> 
        <?php echo $birthday; ?></td>
    </tr>
	
	
	<tr style="background-color: #FFFFFF;"> 
      <td>Password</td>
      <td> 
        <?php echo $password; ?></td>
    </tr>
	
	<tr style="background-color: #FFFFFF;"> 
      <td>Confirmpassword</td>
      <td> 
        <?php echo $confirmpassword; ?></td>
    </tr>
    
  </table>
  
  
  
  <form method="post" action="VolunteerRegistration.php">
	<p><a href="VolunteerRegistration.php">Back to Volunteer Registration Form</a></p>
	<br />
  </form>
  
  
  
  <p><a href="LoginMainPage.php">Back to Login main Page</a></p>
  
</body>
</html>











