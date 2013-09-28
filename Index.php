<!--
	Author: Eric Lund, Todd Detweiler
	Date: February 14th, 2013
	Revision: Session ID's and Cookies, March 10th, 2013
	Revision: Database Addition, April 1st, 2013
	This page is the Home Page for South Sound Circles
-->

<?php 
	session_start();		//This will start the session

	//becuase we send the user to the homepage when they try to log-in, lets just put the following code here.
	if(!isset($_SESSION['failedLogIn'])) //If failedLogedIn is NOT set
	{
		//Set it to false
		$_SESSION['failedLogIn'] = false;
	}
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
		<title>South Sound Circles</title>

		<script language="javascript" type="text/javascript">

		 function validateLogIn()
		 {
		 	if(logInForm.UserName.value == "")
		 	{
		 		alert("Please enter your username\nIf you do not have a account, create one!")
		 		return false;
		 	}
		 	if(logInForm.UserName.value != "" && logInForm.PasswordField.value == "")
		 	{
		 		alert("Please enter your password\nIf you do not have a account, create one!")
		 		return false;
		 	}
		 	return true;
		 }
		 </script>

	</head>
	
	<body>
		
	<?php include 'leftMenu.php';?> <!-- Include the side bar by calling the external php class -->
	    <script language="javascript" type="text/javascript">
			document.getElementById("homePage").style.backgroundColor="#004a80";
			document.getElementById("homePage").style.fontSize="9pt";
			document.getElementById("homePage").style.fontWeight="bold";
			document.getElementById("homePage").textContent="\u221A Home Page \u221A";
		</script>


	<div class="mainInformation" style = "background-image: url(SSC.jpg);">
	
	<center><h3>Welcome To South Sound Circles</h1></center>

	<!-- The line below is just a print statment to see the value of failedLogIn. -->
	<!-- <?php echo $_SESSION['failedLogIn'];?> -->

	South Sound Circles is a group of mathematicians and mathematics teachers who have been running mathematical problem solving workshops since 2009.  These workshops can be tailored for a wide range of participants from elementary school students to high school math teachers to college students to adults wanting to get more comfortable with a subject they have not used in some time. 
	<br/>
	<br/>
	The mathematical problem solving is not a particular set of formulas but are exercises in one how to approach and solve a problem that is not like the ones in the textbook.  It is the most valuable and transferable of mathematical skills, but is not typically found in the standard curriculum.   
	<br/>
	<br/>



    <br/>
	<!--Copyright Symbol-->
	<br/>
	&copy; 2013 Eric Lund, Todd Detweiler 
	</center>
	
	</div> <!--end main information div-->
	
	</body>
	
</html>
