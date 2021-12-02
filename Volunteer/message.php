
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







<!DOCTYPE html>
<html>
<head>
<title>View Message Page</title>
<style type="text/css">
	th, td{border: 1px solid black; width: 150px;}
	</style>
</head>

<body>
<h2><a href="logout.php">Logout</a></h2>
<form action="responsemessage.php" method="post">
<hr>
<h1><strong>Your Messages:</strong></h1>
<?php




/////////////////////////////////////////
/////////////////////////////////////////
/////////////////////////////////////////

@ $db = new mysqli('localhost', 'root', '', 'assignment_1');


if (mysqli_connect_error())
{//display the details of any connection errors
	echo'Error connecting to database:<br/>'.mysqli_connect_error();
	exit;
}











//////////////////////////////////
/////////////////////////////////



//$sql="SELECT * FROM messages WHEREV ORDER BY Date";



$sql="SELECT * FROM messages WHERE email='$SES'ORDER BY Date";
$result=$db->query($sql);
$row=$result->num_rows;



$result=$db->query($sql);
$row=$result->num_rows;
if($row==0)
{
	echo "There are no message to show<br/>";
}else{
	
	
	
//Create the table show messages to Volunteer
	echo '<table><tr>';
	echo '<th>Date</th><th>Organiser Name</th><th>Message</th><th>Your Response</th>';
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
		//echo '<td>'.$rows['MessageID'].'</td>';
			
        			
		if($rows['Response']==null)
		{
			echo '<td><a href="responsemessage.php?respond_id='.$rows['MessageID'].'">Respond</a></td></tr>';
		} else{
			echo '<td>'.$rows['Response'].'</td></tr>';
		}
		  
	}
	echo '</table>';
}
?>
</form>
<br>

<a href="VolunteerTimeSlots.php">Back</a>
</body>
</html>