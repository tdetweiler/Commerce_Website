<!--
	Author: Eric Lund, Todd Detweiler
	Date: February 14th, 2013
	Revision: Session ID's and Cookies, March 10th, 2013
	Revision: Database Addition, April 1st, 2013
	This page sends out an email when a user logs out
-->
<?php
		//our log out php that will send an email to the user and then destroy the session and reload 
		//the index page.
		session_start();
		
		//Do the email sending by accessing the stored email from earlier
		$to = $_SESSION['email'];
		$subject = "Thank You!";
		$message = "Hello! Thank you for visiting our site!";
		$headers = "From: tdetweiler@pugetsound.edu";
		$headers .= "Reply-To: tdetweiler@pugetsound.edu";
		mail($to,$subject,$message,$headers);
		
		//Destroy the session
		session_destroy(); 
		
?>
<script>location.href='Index.php'</script>. 