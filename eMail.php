<!--
	Author: Eric Lund, Todd Detweiler
	Date: February 14th, 2013
	Revision: Session ID's and Cookies, March 10th, 2013
	Revision: Database Addition, April 1st, 2013
	This page sends an email to the web master
-->
<?php
		//our log out php that will send an email to the user and then destroy the session and reload 
		//the index page.
		session_start();
		
		//Do the email sending by accessing the stored email from earlier
		$to = 'riceay13@gmail.com';
		$subject = "Message from SSMC";
		$message = $_GET['message'];
		$headers = "From: ".$_GET['email'];
		$headers .= "Reply-To: riceay13@gmail.com";
		mail($to,$subject,$message,$headers);
		
		//Destroy the session
		
?>
<script>location.href='Index.php'</script>. 