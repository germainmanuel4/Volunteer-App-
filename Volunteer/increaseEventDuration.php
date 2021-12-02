
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
  <title>Time Slots (Organiser)</title>


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




<body>
<center><h3><strong>Add Days to volunteer</strong></h3></center>
<form name="increaseEventDuration" action="processEventDuration.php" method="post" onsubmit=" return Validate()">


<br>
<br>
<br>


   
<?php //<select name="Color[]" multiple>  ?>   
<center><select id="ddlView" name="selectedvalue" required>
<option value="0">Select</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>

</select>        
		
        <input type="submit" value="Submit" /></center>
		<br>
		
		
		
	
        <script type="text/javascript">
            function Validate()
            {
                var e = document.getElementById("ddlView");
                var strUser = e.options[e.selectedIndex].value;

                var strUser1 = e.options[e.selectedIndex].text;
                if(strUser == 0 || strUser == "0" || strUser == "")
                {
                    alert("Please select a duration");
					return false;
                }
				
				
				
				
            }
			
		
        </script> 
		
		
		
		<br>
		
        
        


<br>







<center><a href=OrganiserTimeSlots.php>Back to Volunteers Slot</a></center>

</tr>


<br>

<center><p><a href="logoutorganiser.php">Log Out</a></p></center>

</body>

</html>









