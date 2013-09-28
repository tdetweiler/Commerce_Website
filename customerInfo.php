<!--
	Author: Eric Lund, Todd Detweiler
	Date: February 14th, 2013
	Revision: Session ID's and Cookies, March 10th, 2013
	Revision: Database Addition, April 1st, 2013
	This page is the Coustmer Info for South Sound Circles
-->

<?php // For some pages, you will need to
// place php cookie processing here.
// Do not place ANY code (even blank lines)
// in front of this part. 

		session_start();
		$_SESSION['failedLogIn'] = false;
?>

<!-- This is the standard DOCTYPE tag we will use -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	
	<head>
		
		<!-- declare the character encoding-->
		<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
		
		<!--******************************************* -->
		<!-- a link to external style sheet -->
		<link href="Styling.css" rel="stylesheet" type="text/css" />
		
		<!--Title-->
		<title>Customer Information</title>
		<script language="javascript" type="text/javascript">
		     <!--
		     		//Fill the fields quickly for testing...
		     		function quickFill()
		     		{
						document.info.AccountName.value = "myAccount"; 
	                 	document.info.Password.value = "password"; 
	                 	document.info.LastName.value = "Smith"; 
	                 	document.info.FirstName.value = "John"; 
	                 	document.info.Organization.value = "South Sound"; 
	                 	document.info.OrganizationDropDown.value = "Teacher"; 
	                 	document.info.Address.value = "1234 N South St."; 
	                 	document.info.eMail.value = "email1@hi.com"; 
	                 	document.info.eMail2.value = "email2@hi.com"; 
	                 	document.info.PhoneNumber.value = "(123) 456-7890"; 
	                    document.info.PhoneNumber2.value = "(234) 764 - 8746";
		     		}

					//Clear all of the fields
		            function clearForm()
		            {
		                //clear form elements
							document.info.AccountName.value = ""; 
		                 	document.info.Password.value = ""; 
		                 	document.info.LastName.value = ""; 
		                 	document.info.FirstName.value = ""; 
		                 	document.info.Organization.value = ""; 
		                 	document.info.OrganizationDropDown.value = ""; 
		                 	document.info.Address.value = ""; 
		                 	document.info.eMail.value = ""; 
		                 	document.info.eMail2.value = ""; 
		                 	document.info.PhoneNumber.value = ""; 
		                    document.info.PhoneNumber2.value = "";
		            }

		            //basically a array.contains method
					function contains(a, obj) {
				    for (var i = 0; i < a.length; i++) {
				        if (a[i] == obj) {
				            return true;
				        }
				    }
				    	return false;
					}

					 // Reference: http://www.quirksmode.org/js/cookies.html
				    function makeCookiesBySeparateCookies()
				    {
				    	var formValues = ['LastName','FirstName','Address','City', 'State', 'PostalCode', 'PhoneNumber', 'AccountName', 'Password', 'eMail'];
					    var expirationDate=new Date();
					    expirationDate.setDate(expirationDate.getDate() + 1);      
				        for (i=0;i<document.info.elements.length;i++)
				        {

				        if(contains(formValues, document.info.elements[i].name) == true) // make sure we only grab the fields
				        {
				        	var cookieData=""; 
						   //get the data
						   cookieData=cookieData+ document.info.elements[i].name + "="+ escape(document.info.elements[i].value) + ";";									
						   // add exp time
						   cookieData = cookieData + "expires=" + expirationDate.toUTCString() ;
					       // now save the cookie 
					       document.cookie=cookieData;// escape encodes data so punctuation doesn't cause problems
				        }

					   }
						return true;
					}       

		            //validate the fields to make sure they are what we want
		            function validate()         
		            {
		            	 //If any of the fields are blank
		                 if (document.info.AccountName.value == "" ||
		                 	document.info.Password.value == "" ||
		                 	document.info.LastName.value == "" ||
		                 	document.info.FirstName.value == "" ||
		                 	document.info.Organization.value == "" ||
		                 	document.info.OrganizationDropDown.value == "" ||
		                 	document.info.Address.value == "" ||
		                 	document.info.eMail.value == "" ||
		                 	document.info.eMail2.value == "" ||
		                 	document.info.PhoneNumber.value == "" ||
		                    document.info.PhoneNumber2.value == "")
		                 {		          
		                      alert ("Please double check to make sure all of the fields are filled in.");
		                      return false;
		                 }
						 
						 //make sure the names and city do not have any symbols in them, only letters
						 var nameValidation = /^[A-Za-z]+$/;
						 if(!nameValidation.test(document.info.LastName.value)){
							info.LastName.style.background = 'Yellow';
							alert("Please enter a valid last name!");
							return false;
						 }
						 if(!nameValidation.test(document.info.FirstName.value)){
							info.FirstName.style.background = 'Yellow';
							alert("Please enter a valid last name!");
							return false;
						 }
						 if(!nameValidation.test(document.info.City.value)){
							info.City.style.background = 'Yellow';
							alert("Please enter a valid City name, only letters please!");
							return false;
						 }
						 
		                 //reg expression: length of 5, and only digits
		                 var zipValidator = /^\d{5}$/;
		                 if(!zipValidator.test(document.info.PostalCode.value))
		                 {
							info.PostalCode.style.background = 'Yellow';
		                 	alert("Make sure the postal code is 5 digits long and has only numeric values.");
		                 	return false;
		                 }
						 
						 //Credit for this phone number validation key goes to http://stackoverflow.com/questions/123559/a-comprehensive-regex-for-phone-number-validation
						var phone = /^(?:(?:\+?1\s*(?:[.-]\s*)?)?(?:\(\s*([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9])\s*\)|([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9]))\s*(?:[.-]\s*)?)?([2-9]1[02-9]|[2-9][02-9]1|[2-9][02-9]{2})\s*(?:[.-]\s*)?([0-9]{4})(?:\s*(?:#|x\.?|ext\.?|extension)\s*(\d+))?$/;
						if(!phone.test(document.info.PhoneNumber.value)){
							info.PhoneNumber.style.background = 'Yellow';
							alert("Please enter a valid phone number.");
							return false;
						}

						//Credit for this phone number validation key goes to http://stackoverflow.com/questions/123559/a-comprehensive-regex-for-phone-number-validation
						var phone = /^(?:(?:\+?1\s*(?:[.-]\s*)?)?(?:\(\s*([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9])\s*\)|([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9]))\s*(?:[.-]\s*)?)?([2-9]1[02-9]|[2-9][02-9]1|[2-9][02-9]{2})\s*(?:[.-]\s*)?([0-9]{4})(?:\s*(?:#|x\.?|ext\.?|extension)\s*(\d+))?$/;
						if(!phone.test(document.info.PhoneNumber2.value)){
							info.PhoneNumber.style.background = 'Yellow';
							alert("Please enter a valid phone number.");
							return false;
						}
						
						//make the username between 6 to 10 characters
						if(info.AccountName.value.length > 10 || info.AccountName.value.length<6) {
						 info.AccountName.style.background = 'Yellow';
						 alert('Please enter an Account name that is between 6-10 characters long');
						 return false;
						}
						
						//make sure the password is between 6 to 12 characters
						if(info.Password.value.length > 12 || info.Password.value.length<6) {
						 info.Password.style.background = 'Yellow';
						 alert('Please enter a password that is between 6-12 characters long');
						 return false;
						}
						
						 //Credit to w3 schools for a good email validator, makes sure it has a @ and a 
						 // . in it, not near the front or to close to the end and the . comes after the @
							var emailChecker= /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
								if(!emailChecker.test(document.info.eMail.value)){
							  info.eMail.style.background = 'Yellow';
							  alert("Not a valid e-mail address");
							  return false;
							  }

						//Credit to w3 schools for a good email validator, makes sure it has a @ and a 
						 // . in it, not near the front or to close to the end and the . comes after the @
							var emailChecker= /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
								if(!emailChecker.test(document.info.eMail2.value)){
							  info.eMail.style.background = 'Yellow';
							  alert("Your second e-mail address is not valid.");
							  return false;
							  }
							
					    makeCookiesBySeparateCookies();	  
		               return true; // validation passed!
		            }
		    -->    
	       </script>

	</head>
	
	<body>
	
	<?php include 'leftMenu.php';?> <!-- Include the side bar by calling the external php class -->
		<script language="javascript" type="text/javascript">
			document.getElementById("customerInfo").style.backgroundColor="#004a80";
			document.getElementById("customerInfo").style.fontSize="9pt";
			document.getElementById("customerInfo").style.fontWeight="bold";
			document.getElementById("customerInfo").textContent="\u221A Customer Info \u221A";
	</script>

     <div class="mainInformation">

     	<!-- Create the Form -->
		<div id="stylized" class="myform">
		
		<form name="info" id="info" action = "processedData.php" class="myForm">
		<h1>Sign-up form</h1>
		<p>Please enter all of the fields before submitting!</p>

		<label>Account Name
        <span class="small">Your username</span>
        </label> 
     	<input type = "text" size = "20" name = "AccountName" /><br /><br/>
     		        
     	<label>Password
        <span class="small">Make it secure!</span>
        </label> 
     	<input type = "password" size = "20" name = "Password" /><br /><br/>

		<label>Last Name
        <span class="small">Enter your Last name</span>
        </label>
		<input type = "text" size = "50" name = "LastName" /><br /><br/>

		<label>First
        <span class="small">Enter your First name</span>
        </label>
        <input type = "text" size = "50" name = "FirstName" /><br /><br/>

        <label>Organization
        <span class="small">Your Organization</span>
        </label>
		<input type = "text" size = "50" name = "Organization" /><br /><br/>

     	<label>Position
        <span class="small">Position In Organization</span>
        </label>
     	<select name = "OrganizationDropDown" style="margin-left: 10px">
               <option value = ""></option>
               <option value = "Teacher">Teacher</option>
               <option value = "Student">Student</option>
               <option value = "Administrator">Administrator</option>
               <option value = "Other">Other</option>
     	</select> <br/><br/><br/>

        <label>Address
        <span class="small">Enter Your Address</span>
        </label>         
     	<input type = "text" size = "50" name = "Address" /><br /><br/>

     	<label>City
        <span class="small">Enter Your City</span>
        </label>         
     	<input type = "text" size = "50" name = "City" /><br /><br/>

    	<label>State
        <span class="small">Choose Your State</span>
        </label>
     	<select name = "OrganizationDropDown" style="margin-left: 10px">
               <option value = ""></option>
               <option value = "Washington">WA</option>
               <option value = "Oregon">OR</option>
               <option value = "California">CA</option>
               <option value = "Nevada">NV</option>
     	</select> <br/><br/><br/>

     	<label>Zip Code
        <span class="small">Include area code</span>
        </label> 
		<input type = "text" size = "20" name = "AreaCode" /><br /><br/>

     	<label>Primary E-Mail
        <span class="small">Include full address</span>
        </label> 
     	<input type = "text" size = "50" name = "eMail" /><br /><br/>

     	<label>Secondary E-Mail
        <span class="small">Include full address</span>
        </label> 
     	<input type = "text" size = "50" name = "eMail2" /><br /><br/>

     	<label>Primary Phone
        <span class="small">Include area code</span>
        </label> 
		<input type = "text" size = "20" name = "PhoneNumber" /><br /><br/>

		<label>Second Phone
        <span class="small">Include area code</span>
        </label> 
		<input type = "text" size = "20" name = "PhoneNumber2" /><br /><br/>
     		        
        <input type = "submit" class = "custom" name = "submitButton" value = "Send now!" onclick="return validate();"/>

		<input type="button" class = "custom" name="fillFormData" value="Fill Fields" onclick="quickFill();"/>
        
        <input type="button" class = "custom" name="clearFormData" value="Clear Fields" onclick="clearForm();"/>
			
		<div class="spacer"></div>

		</form>
		</div>
    
	</div> <!--end main information div-->
	
	</body>
	
</html>
