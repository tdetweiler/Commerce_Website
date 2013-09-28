<!--
	Author: Eric Lund, Todd Detweiler
	Date: February 14th, 2013
	Revision: Session ID's and Cookies, March 10th, 2013
	Revision: Database Addition, April 1st, 2013
	This page is the Contact Us for South Sound Circles
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
		<title>Contact Us</title>
	</head>
			<script language="javascript" type="text/javascript">
		     <!--
		     		//Fill the fields quickly for testing...
					function validate()         
		            {
		            	 //If any of the fields are blank
		                 if (document.info.username.value == "" ||
		                 	document.info.email.value == "" ||
		                 	document.info.message.value == "")
		                 {		          
		                      alert ("Please double check to make sure all of the fields are filled in.");
		                      return false;
		                 }
						
						 // make sure the names and city do not have any symbols in them, only letters
						 var nameValidation = /^[A-Za-z]+$/;
						 if(!nameValidation.test(document.info.username.value)){
							info.username.style.background = 'Yellow';
							alert("Please enter a valid name!");
							return false;
						}

						 // Credit to w3 schools for a good email validator, makes sure it has a @ and a 
						 // . in it, not near the front or to close to the end and the . comes after the @
							var emailChecker= /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
								if(!emailChecker.test(document.info.email.value)){
							  info.email.style.background = 'Yellow';
							  alert("Not a valid e-mail address");
							  return false;
							  }

		               return true; // validation passed!
		            }

		            function clearForm()
		            {
		            	document.info.username.value = "";
		            	document.info.email.value = "";
		            	document.info.message.value = "Type your message here";

		            	info.email.style.background = 'White';
		            	info.username.style.background = 'White';
		            	info.message.style.background = 'White';
		            }
		    -->    
	       </script>

	
	<body>

	<?php include 'leftMenu.php';?> <!-- Include the side bar by calling the external php class -->
	<script language="javascript" type="text/javascript">
			document.getElementById("contactUs").style.backgroundColor="#004a80";
			document.getElementById("contactUs").style.fontSize="9pt";
			document.getElementById("contactUs").style.fontWeight="bold";
			document.getElementById("contactUs").textContent="\u221A Contact Us \u221A";
	</script>
	<div class="mainInformation">

	<div id="stylized" class="myform">
	<form name="info" id="info" action = "eMail.php" class="myForm">
		<h1>Contact Us</h1>
		<p>Fill out the form provided below</p>

	<label>Your e-Mail Address
    <span class="small">Include Full Address</span>
    </label>
	<input type = "text" size = "30" name = "email" /><br /><br/>	
    
	<label>Your Name
    <span class="small">First and Last</span>
    </label>
	<input type = "text" size = "30" name = "username" /><br /><br/>	

    </label>

    <textarea name="message" rows = "10" cols = "400" style = 'resize:none;'>Type your message here.
    </textarea>
    <center>
     <input type = "submit" class = "custom" name = "submitButton" value = "Send now!" onclick="return validate();"/>
     <input type="button" class = "custom" name="clearFormData" value="Clear Fields" onclick="clearForm();"/>
 </center>
  </div>
</form>
	
	<div style = "position:static; padding-top:260px; ">
		David Scott, Professor<br/>
		Department of Mathematics & Computer Science #1043<br/>
		University of Puget Sound<br/>
		1500 N. Warner St.<br/>
		Tacoma WA 98416<br/>
		phone: 253.879.3565<br/>
		fax: 253.879.3352<br/>
		scott@pugetsound.edu
	</div>

	</div> <!--end main information div-->
	
	</body>
	
</html>
