







<!DOCTYPE html>
<html>
<head>
  <title>New Volunteer Registration Form</title>
  <script language ="JavaScript" type="text/javascript">
  function ValidateForm()
    {
		
		
	// check email if address empty
	if (document.newUserForm.emailaddress.value == '')
	 {  
	    alert('Email Address field cannot be blank.');
		//document.newUserForm.EmailAddress.focus();
		return false;
	  }
	  
	 
	 //check firstname not empty
	if (document.newUserForm.firstname.value == '')
	  {
	   alert('First name cannot be blank.');
		//document.newUserForm.FirstName.focus();
		return false;
	  }

    //check surname not empty
    if (document.newUserForm.surname.value == '')
	  {
	    alert('Surname field cannot be blank.');
		//document.newUserForm.SurName.focus();
		return false;
	  }
	  
	  
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
	  

	
	var bday = /([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/;
	
	if ( !bday.test(document.newUserForm.birthday.value) )
      {
		  alert('The Birth day format Field is not correctly formatted!');
          //document.theForm.theField.focus();
          return false;
      }
	
	  
	  
	  
	  
	   
	///////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////	
	  
	  
	  
 
	//check if date of birth not empty
	//check if format is correct or all digits
	
	
	 

	/*if (document.newUserForm.YOB.value == '')
	  {
		alert('Year of birth cannot be blank.');
		//document.newUserForm.YOB.focus();
		return false;
	  }
	  
	  
	 //if Year of Birth is not a number
	  
	if (isNaN(document.newUserForm.YOB.value))
	  {
	    alert('Year Of Birth should be digits only.');
		//document.newUserForm.PhoneNumber.focus();
		return false;
	  } 
	  
	if (document.newUserForm.YOB.value <= 1900)
	  {
		alert('Year of birth can only be 1900 or later.');
		//document.newUserForm.YOB.focus();
		return false;
	  }
	  
	  
	
	  
	
    //////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////
	  
	  
	
	  
	  
	if (document.newUserForm.MOB.value == '')
	  {
		alert('Month of birth cannot be blank.');
		//document.newUserForm.YOB.focus();
		return false;
	  }
	  
	
	
	if (isNaN(document.newUserForm.MOB.value))
	  {
	    alert('Month Of Birth should be digits only.');
		//document.newUserForm.PhoneNumber.focus();
		return false;
	  } 
	  
	  
	if (document.newUserForm.MOB.value == 01 || document.newUserForm.MOB.value == 02 || document.newUserForm.MOB.value == 03 || document.newUserForm.MOB.value == 04 || document.newUserForm.MOB.value == 05 || document.newUserForm.MOB.value == 06 || document.newUserForm.MOB.value == 07  || document.newUserForm.MOB.value == 08 ||  document.newUserForm.MOB.value == 09 || document.newUserForm.MOB.value == 10 || document.newUserForm.MOB.value == 11 || document.newUserForm.MOB.value == 12)
	  {
		
		//document.newUserForm.YOB.focus();
		
	  } else {
		  
		alert('Error Month of birth not allowed.');
		return false;  	  
	  }
	  
	

	  

	  
	
	  
	  
	  
	  
    ///////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////
	
	
	
	
	  
	if (document.newUserForm.DOB.value == '')
	  {
		alert('day of birth cannot be blank.');
		//document.newUserForm.YOB.focus();
		return false;
	  }
	 
	  
	  
	  
	if (isNaN(document.newUserForm.DOB.value))
	  {
	    alert('Day Of Birth should be digits only.');
		//document.newUserForm.PhoneNumber.focus();
		return false;
	  } 
	  
	 
	  
	if (document.newUserForm.DOB.value == 01 || document.newUserForm.DOB.value == 02 || document.newUserForm.DOB.value == 03 || document.newUserForm.DOB.value == 04 || document.newUserForm.DOB.value == 05 || document.newUserForm.DOB.value == 06 || document.newUserForm.DOB.value == 07  || document.newUserForm.DOB.value == 08 ||  document.newUserForm.DOB.value == 09 || document.newUserForm.DOB.value == 10 || document.newUserForm.DOB.value == 11 || document.newUserForm.DOB.value == 12 ||  document.newUserForm.DOB.value == 13 ||  document.newUserForm.DOB.value == 14 ||   document.newUserForm.DOB.value == 15 ||  document.newUserForm.DOB.value == 16 ||  document.newUserForm.DOB.value == 17 ||  document.newUserForm.DOB.value == 18 ||  document.newUserForm.DOB.value == 19 ||  document.newUserForm.DOB.value == 20 ||  document.newUserForm.DOB.value == 21 || document.newUserForm.DOB.value == 22 ||  document.newUserForm.DOB.value == 23 ||  document.newUserForm.DOB.value == 24 ||  document.newUserForm.DOB.value == 25 ||  document.newUserForm.DOB.value == 26 ||  document.newUserForm.DOB.value == 27 ||  document.newUserForm.DOB.value == 28 ||  document.newUserForm.DOB.value == 29 ||  document.newUserForm.DOB.value == 30 ||  document.newUserForm.DOB.value == 31)
	  {
		
		//document.newUserForm.YOB.focus();
		
	  } else {
		    
		alert('Error Day of birth not allowed.');
	    return false;  
	  } */
	  
	////////////////////////////////////////////////////////////	
    ////////////////////////////////////////////////////////////

      
	
	  
	  

	  
	  
	  
	  
	
	  
	 
	
    
	
	  
	  
	/*var dateinForm = document.newUserForm.YOB.value;
	
	
	var birthDay =  new Date(dateinForm);

	alert(birthDay);
	document.newUserForm.Password.focus();
	//alert(dateinForm);*/
	
	
	//pag hiwalayin lahat tungkol sa bday, monthform, year form, date form, ung form na gagawin dapat number ang nkalagay hndi letters example august.
    // step 2 pag my form na sa kada isa icheck ang bawat isa kung pasok sa limit
	// step 3 pag dugtungin
	//step 4 alamin panu ilagay sa database
	
	
	
	
	//check year if 4 digits and more than 1900
	
	
	
	
	//check month if 2 digits and 01 up to 12 only
	
	
	//check date if digits and 01 to 31 only 
	
	
	//combine date
	
	
	
	
	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	  
	/////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////
	 
	 
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
<h3><strong>New Volunteer Registration Form</strong></h3>
<form name="newUserForm" method="post" action="checkRegistration.php" onsubmit="return ValidateForm()">

  <table style="width: 500px; border: 0px;" cellspacing="1" cellpadding="1">
    
    <tr style="background-color: #FFFFFF;"> 
      <td>Email Address:</td>
      <td> 
        <input name="emailaddress" type="text" style="width: 200px;" maxlength="100" />*</td>
    </tr>
    <tr style="background-color: #FFFFFF;"> 
      <td>First Name:</td>
      <td> 
        <input name="firstname" type="text" style="width: 200px;" maxlength="100" />*</td>
    </tr>
	
	 <tr style="background-color: #FFFFFF;"> 
      <td>SurName:</td>
      <td> 
        <input name="surname" type="text" style="width: 200px;" maxlength="100" />*</td>
    </tr>
	
	
	<tr style="background-color: #FFFFFF;"> 
      <td>Address Line 1:</td>
      <td> <input name="addressline1" type="text" style="width: 200px;" maxlength="200" />*</td>
    </tr>
	
	
	<tr style="background-color: #FFFFFF;"> 
      <td>Address Line 2:</td>
      <td> <input name="addressline2" type="text" style="width: 200px;" maxlength="200" /></td>
    </tr>
    
    <tr style="background-color: #FFFFFF;"> 
      <td>Suburb:<small></td>
      <td><input name="suburb" type="text" style= "width: 100px;" maxlength="10"/>*</td>
    </tr>
	
	<tr style="background-color: #FFFFFF;"> 
      <td>Post Code: </td>
      <td> <input name="postcode" type="text" style="width: 200px;" maxlength="100" />*</td>
	</tr>	
    
	<tr style="background-color: #FFFFFF;"> 
      <td>Phone Number:</td>
      <td> <input name="phonenumber" type="text" style="width: 200px;" maxlength="100"/>*</td>
	
	
	
	<tr style="background-color: #FFFFFF;"> 
      <td>Birth Day.<small> (YYYY-MM-DD)</small></td>
      <td> 
        <input name="birthday" type="text" style="width: 100px;" maxlength="10" />*</td>
    </tr>
	
	 
	
	
	
	
	
	<tr style="background-color: #FFFFFF;"> 
      <td>Password: </td>
      <td> <input name="password" type="password" style="width: 200px;" maxlength="100" />*</td>
	</tr>	
	
	
	<tr style="background-color: #FFFFFF;"> 
      <td>Confirm Password: </td>
      <td> <input name="confirmpassword" type="password" style="width: 200px;" maxlength="100" />*</td>
	</tr>	
	
	
	
	
	
	<tr style="background-color: #FFFFFF;"> 
      <td> <input type="reset" name="reset" value="Reset" />
		<input type="submit" name="submit" value="Submit" /></td>
     
    </tr>
	
	
  
  </table>
</form>

  
  <br/>
  <br/>
  
  
  

	<p><a href="LoginMainPage.php">Back to Login Page</a></p>






</body>
</html>