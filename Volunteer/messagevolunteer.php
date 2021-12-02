<!DOCTYPE html>
<html>
<head>
<title>Message Volunteer Page</title>
<style type="text/css">
	th, td{border: 1px solid black; width: 150px;}
	</style>
</head>

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


@ $db = new mysqli('localhost', 'root', '', 'assignment_1');


if (mysqli_connect_error())
{//display the details of any connection errors
	echo'Error connecting to database:<br/>'.mysqli_connect_error();
	exit;
}



?>


<?php

if (isset($_POST['send']))
{
	$message = $_POST['message'];
	$email = $_POST['volunteername'];
	//$username=$_POST['username'];
	$insert="INSERT INTO messages(email, username, Message) VALUES('$email','$SES','$message')";
	$result_insert=$db->query($insert);
}
?>

<body>
<h2><a href="logout.php">Logout</a></h2>

<center><h1>Message to Volunteer</h1></center>
<hr>
<h1><strong>Message Volunteer:</strong></h1>
<form action="" method="post">
<tr style="background-color: #FFFFFF;"> 
      <td>Message:</td>
      <td> 
        <input type="text" placeholder="Enter message" name="message" style="width: 500px;" maxlength="400" required>
		<select name='volunteername'><?php
		$vName_query='SELECT * FROM volunteers_table ORDER BY firstname';
		$vName_results=$db->query($vName_query);
			for($i=0;$i < $vName_results->num_rows ; $i++)
			{
				$vName_row=$vName_results->fetch_assoc();
				echo '<option value="'.$vName_row['email'].'">';
				echo $vName_row['firstname'].' '.$vName_row['surname'].'</option>';
			}
		?></select></td>
    </tr>
<input type="submit" name="send" value="Send Message">
</form>
<h1><strong>Current Messages:</strong></h1>
<?php
$sql='SELECT * FROM messages ORDER BY Date';
$result=$db->query($sql);
$row=$result->num_rows;
if($row==0)
{
	echo "There are no message to show";
}else{
	
//Create the table show all messages
	echo '<table><tr>';
	echo '<th>Date</th><th>Organiser Name</th><th>Message</th><th>Volunteer Name</th><th>Response</th>';
	echo '</tr>';

	while($rows=$result->fetch_assoc())
	{
		echo '<tr><td>'.$rows['Date'].'</td>';
		
		$organiser_query="SELECT * FROM organisers_table WHERE username='".$rows['username']."'";
		$organiser_results=$db->query($organiser_query);
		echo '<p>'.$db->error.'</p>';
		$organiser_row=$organiser_results->fetch_assoc();
		echo '<td>'.$organiser_row['firstname'].' '.$organiser_row['surname'].'</td>';
		
		echo '<td>'.$rows['Message'].'</td>';
		
		$volunteer_query="SELECT * FROM volunteers_table WHERE email='".$rows['email']."'";
		$volunteer_results=$db->query($volunteer_query);
		echo '<p>'.$db->error.'</p>';
		$volunteer_row=$volunteer_results->fetch_assoc();
		echo '<td>'.$volunteer_row['firstname'].' '.$volunteer_row['surname'].'</td>';
		
		echo '<td>'.$rows['Response'].'</td></tr>';
	}
	
	echo '</table>';
}

?>

<a href="OrganiserTimeSlots.php">Back</a>
</body>
</html>