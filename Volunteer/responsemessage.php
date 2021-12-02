
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
	<title>Respond to Message Page</title>
	<style>

body {background-color: black;}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text]{
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus{
  background-color: #ddd;
  outline: none;
}

/* Set a styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.change {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.change:hover {
  opacity: 1;
}

/* Set text color to links */
a {
  color: blue;
}

</style>
</head>

<?php

 
@ $db = new mysqli('localhost', 'root', '', 'assignment_1');


if (mysqli_connect_error())
{//display the details of any connection errors
	echo'Error connecting to database:<br/>'.mysqli_connect_error();
	exit;
}







if(isset($_GET['respond_id']))
{
	$respond_query="SELECT * FROM messages WHERE MessageID=".$_GET['respond_id'];
	$respond_result=$db->query($respond_query);
	$Rrow=$respond_result->fetch_assoc();
}









if(isset($_POST['Respond']))
{
	$respond=$_POST['respond'];
	
	$sql="UPDATE messages SET Response='".$respond."'WHERE MessageID=".$_GET['respond_id'];
	$update=$db->query($sql);
	if($update)
	{
		echo '<div style="color: white;">Respond to Message Successfully! </div>';
		header('Location: message.php');	
		exit;
	}
	else
	{
		echo '<p>Error UPDATE Respond Message. Error message:</>';
		echo '<p>'.$db->error.'</p>';
	}

}
?>

<body>

<form method="post" action="">
 <div class="container">
    <center><h1>Respond to Message</h1></center>
	<a href="logout.php">Logout</a>
    <hr>
	
	<label for="message"><b>Message:</b></label><?php echo $Rrow['Message']."<br/>";?>
	
	<label for="respond"><br/><b>Respond Message:</b></label>
    <input type="text" placeholder="Enter Respond Message" name="respond" maxlength="250"  required>
	<button type="submit" name="Respond" class="change">Respond</button>
</div>
<a href="message.php">Back</a>

</form>
</body>
</html>