
<?php
//Start or resume a session
session_start();

$SES =  $_SESSION['uname'];
echo "<b>Logged In as:<b>      " .$SES. "<br />"; //.$_SESSION['uname'];
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













<?php

{
	//connect to database
	@ $db = new mysqli('localhost', 'root', '', 'assignment_1');
	if (mysqli_connect_error())
    {
		echo'Error connecting to database:<br/>'.mysqli_connect_error();
		exit;
    }
	
		
	$SES =  $_SESSION['uname'];

	
	$volunteers_results=mysqli_query($db,"SELECT * FROM volunteers_table where email='$SES'");
    while($rowvolunteersslots=mysqli_fetch_array($volunteers_results))	
		
	
    {
		
		
		
		if ($rowvolunteersslots['email'] == $SES){
			$addressline1= $rowvolunteersslots['addressline1'];
		    $addressline2 = $rowvolunteersslots['addressline2'];
		    $suburb = $rowvolunteersslots['suburb'];
			$postcode = $rowvolunteersslots['postcode'];
		    $phonenumber = $rowvolunteersslots['phonenumber'];
			$password = $rowvolunteersslots['password'];
		    
			
		
		    
			
			//echo '<a href="javascript: history.back();">Back</a>.';
			
			
					
		}
	}
}



?>
















<?php
//if button with the name uploadfilesub has been clicked



if(isset($_POST['uploadfilesub'])) {
//declaring variables
$filename = $_FILES['uploadfile']['name'];
$filetmpname = $_FILES['uploadfile']['tmp_name'];
//folder where images will be uploaded
$folder = 'image/';
//function for saving the uploaded images in a specific folder
move_uploaded_file($filetmpname, $folder.$filename);
//inserting image details (ie image name) in the database
$sql = "UPDATE volunteers_table SET image_dir='$filename' where email='$SES'";
$qry = mysqli_query($db, $sql);
if( $qry) {
header('Location: editVolunteer.php');
} 
}

?>



<a href="VolunteerTimeSlots.php">Back to Volunteer Main</a>





<!DOCTYPE html>
<html>
<head>
<title>Edit User Form</title>
<script language ="JavaScript" type="text/javascript">
  function ValidateForm()
    {
		
		
	
	  
	 //check address must not be empty
	 //check address line 1 must only have 30 characters 
	 if (document.newUserForm.addressline1.value == '')
	  {
	    alert('Address Line 1 field cannot be blank.');
		//document.newUserForm.AddressLine1.focus();
		return false;
	  }
	  
	 
	
    // check suburb not empty
    if (document.newUserForm.suburb.value == '')
	  {
	    alert('suburb field cannot be blank.');
		//document.newUserForm.Suburb.focus();
		return false;
	  }
	
	
	
	//check postcode not empty	
	//check postcode if an int and equal to 4 digits
	
	
	if (document.newUserForm.postcode.value == '')
    {
      alert('Postcode must have 4 digits at least.');
      //document.newUserForm.PostCode.focus();
      return false;
    }

	
	
	if (isNaN(document.newUserForm.postcode.value))
	  {
	    alert('Postcode must have 4 digits at least.');
		
		return false;
	  }
	  
	  
	  
	var a = document.newUserForm.postcode.value;
	var postcode = a.toString();
	
	
	if (postcode.length > 4)
	  {
	    alert('postcode must only have 4 digits.');
		
		return false;
	  }   
	
	  
	 /////////////////////////////////////////////////////////////////////
     /////////////////////////////////////////////////////////////////////	 
	  
    //check if not empty
	//check if only digits
	//check if length of digit maximum 15 digits
    
	  
	if (document.newUserForm.phonenumber.value == '')
	  {
	    alert('phone number cannot be blank.');
		//document.newUserForm.Phonenumber.focus();
		return false;
	  }  
	  
	  
	if (isNaN(document.newUserForm.phonenumber.value))
	  {
	    alert('phone number should all be digits.');
		//document.newUserForm.Phonenumber.focus();
		return false;
	  }
	  
    var n = document.newUserForm.phonenumber.value;
	var phone = n.toString();
	
	
	if (phone.length > 10)
	  {
	    alert('phone number can only have maximum 10 digits.');
		//document.newUserForm.Phonenumber.focus();
		return false;
	  }   
	  

	
	  
	 
	 
    //check if password is empty
	
    if (document.newUserForm.password.value == '')
    {
      alert('Password fields cannot be blank.');
      //document.newUserForm.Password.focus();
      return false;
    }

    
     
	//check if confirm password is not empty
	//check if confirm password matches the password above
    if (document.newUserForm.password.value != document.newUserForm.confirmpassword.value)
    {
      alert('Confirm Password field do not match.');
      //document.newUserForm.ConfirmPassword.focus();
      return false;
    } 
	
	
	  
	  return true;
	}
	
	
	
  </script>

</head>



<body>










<style>
img {
  border-radius: 80%;
}
body {background-color: green;}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=number]:focus, input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=number]:focus, input[type=password]:focus {
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

/* Set a grey background color and center the text of the "login" section */
.login {
  background-color: #f1f1f1;
  text-align: center;
}
</style>



<form action="" method="post" enctype="multipart/form-data" >
<!--input tag for file types should have a "type" attribute with value "file"-->
<center><input type="file" name="uploadfile" />
<input type="submit" name="uploadfilesub" value="upload" /></center>
</form>




<form name="editVolunteerForm" method="post"   action="checkEditDetails.php" onsubmit="return ValidateForm()">  
<div class="container">

<?php


$result= $db->query("SELECT * FROM volunteers_table where email='$SES'");
		while($row = $result->fetch_assoc()){
			$images_field= $row['image_dir'];
			$image_show= "/Volunteer/image/$images_field";
			$style = "width:200px";
			
			echo "<div align=center><img src=". $image_show." style=".$style."></div>";
			echo "<style> img{ 
				  width: 40%;
				  border-radius: 50%;	
			}</style>";
	  }
	?>
    <center><h1>Edit Profile</h1></center>
	<a href="logout.php">Logout</a>
    <hr>

	<label for="addressline1"><b>Address 1:</b></label>
    <input type="text" placeholder="Enter Address " name="addressline1" value="<?php echo $addressline1; ?>"required>
	
	<label for="addressline2"><b>Address 2:</b></label>
    <input type="text" placeholder="Enter Address(Optional)" name="addressline2" value="<?php echo $addressline2; ?>"option>
	
	<label for="suburb"><b>Suburb:</b></label>
    <input type="text" placeholder="Enter Suburb" name="suburb" value="<?php echo $suburb; ?>"required>
	
	<label for="postcode"><b>PostCode:</b></label>
    <input type="number" placeholder="Enter Post Code(4 digit)" name="postcode" value="<?php echo $postcode; ?>"required>
	
	<label for="phonenumber"><b>Phone Number:</b></label>
    <input type="number" placeholder="Enter Phone Number:" name="phonenumber" value="<?php echo $phonenumber; ?>"required>
	<br>
	<br>
    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Password have at least 6 character" name="password" required>

    <label for="confirmpassword"><b>Confirm Password</b></label>
    <input type="password" placeholder="Confirm Password" name="confirmpassword" required>
    
    <button type="submit" name="update" class="change">Update</button>
	
  </div>

</form>
</html>








