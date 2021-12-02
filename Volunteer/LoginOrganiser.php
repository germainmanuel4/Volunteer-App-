<?php
//Start or resume a session
session_start();

?>

<?php

//If form has been submitted, check login credentials
if ( isset($_POST['username']) )
{

	@ $db = new mysqli('localhost', 'root', '','assignment_1');
	if (mysqli_connect_errno())
	{
		echo 'Could not connect the database - Please try again later';
		exit;
	}


    $username= $_POST['username'];
	$password= $_POST['password'];
	
	
	
	
	
    
	$query = "SELECT * FROM organisers_table WHERE username='".$username."' AND password='".$password."'";
	

	$results = $db->query($query);

	if ($results->num_rows == 0)
	{
		echo '<div style="color: red;">Invalid login.  Try again.</div>';
		
		$log_action = "UnSuccessfull Login Organiser email = $username";
	    $log_details = "Suspicious Organiser Login";
	
	    //INSERT INTO `logs`(`log_action`, `log_details`) VALUES ("Registration", "newly Registered")
	
	    $querylogs = "INSERT INTO logs (log_action, log_details) VALUES ('$log_action', '$log_details')";
		$logs = $db->query($querylogs);
	
	
	    if ($logs)
	    {
			//echo '<p>User details inserted into database Successfully</p>';
	    }
	    else
		{
			echo '<p>Error inserting details. Error message:</p>';
		    echo '<p>'.$db->error.'</p>';
	    }
		
		
		
		
		
	}
	else
	{
		//Log the user in
		$user = $results->fetch_assoc(); 
		
		
		
        
		//Set session variables then redirect to menu page
		//$new_string=trim($email);
		
		$_SESSION['uname'] = $user['username'];
		$_SESSION['access'] = $user['access_id'];
		
		
		
		
		//put the details in the log before going to organisers home page
		
		$log_action = "Successfull Login Organiser email = $username";
	    $log_details = "Organiser Login";
	
	    //INSERT INTO `logs`(`log_action`, `log_details`) VALUES ("Registration", "newly Registered")
	
	    $querylogs = "INSERT INTO logs (log_action, log_details) VALUES ('$log_action', '$log_details')";
		$logs = $db->query($querylogs);
	
	
	    if ($logs)
	    {
			//echo '<p>User details inserted into database Successfully</p>';
	    }
	    else
		{
			echo '<p>Error inserting details. Error message:</p>';
		    echo '<p>'.$db->error.'</p>';
	    }

		//$_SESSION['level'] = $user['level'];
		
		header('Location: OrganiserTimeSlots.php');
		exit;
	}
}
?>



<!DOCTYPE html>

<html>
<head>
    <title>Organiser LogIn</title>
</head>
<style>
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.back {
  width: auto;
  padding: 10px 18px;
  background-color: red;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and back button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .back {
     width: 100%;
  }
}
</style>
<body>
 <h2>Organiser Login:</h2>

<form method="post" action="LoginOrganiser.php">
  
  <div class="container">
    <label for="username"><b>UserName:</b></label>
    <input type="text" placeholder="Enter UserName" name="username" required>

    <label for="psw"><b>Password:</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
        
    <button type="submit">Login</button>
      </div>

  <div class="container" style="background-color:#f1f1f1">
	<button type="button" class="back" onclick="history.back();">Back</button>
  </div> 
</form>

</body>

</html>




 
  