<!--
	Author: Eric Lund, Todd Detweiler
	Date: February 14th, 2013
	Revision: Session ID's and Cookies, March 10th, 2013
	Revision: Database Addition, April 1st, 2013
	This page is Privacy Statement for South Sound Circles
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
		<title>Privacy Statement</title>
	</head>
	
	<body>

	<?php include 'leftMenu.php';?> <!-- Include the side bar by calling the external php class -->
			    <script language="javascript" type="text/javascript">
			document.getElementById("privacyStatement").style.backgroundColor="#004a80";
			document.getElementById("privacyStatement").style.fontSize="9pt";
			document.getElementById("privacyStatement").style.fontWeight="bold";
			document.getElementById("privacyStatement").textContent="\u221A Privacy Statement \u221A";
		</script>
	
	<div class="mainInformation">
	
	<h3><center>Privacy Statement</center></h3>
	
	Here at Brew The Best your privacy is very important to us. You should feel very secure making any purchases and confident that your information will stay safe with us. We will not, <strong>under any circumstance</strong> sell or give your information to any third party.
	<br/>
	<br/>
	<strong>What information do we collect?</strong>
	<br/>
	We will collect any information that you give us. This includes which pages you visit on our server, your IP address and any information you give us when you make a purchase. All of the data will be stored securely on our servers.
	<br/>
	<br/>
	<strong>What is your information used for?</strong>
	<br/>
	Your information is used for us to help track what type of users visit our server. Information that we collect is used to help create a better website to improve the user experience. Your personal information is only used for making transactions.
	<br/>
	<br/>
	<strong>Who will have access to your information?</strong>
	<br/>
	Your information will only be seen and used by us. We will not sell your information.
	<br/>
	<br/>
	<strong>How can you correct errors made when making a purchase?</strong>
	<br/>
	Before your transaction is sent to us you will be prompted with a page to verify your information. You should be sure to double check that all information here is correct. If for some reason you still make a mistake you can email the webmaster with a request to remove your transaction.
	<br/>
	<br/>
	<strong>Additional Questions?</strong>
	<br/>
	Please feel free to email the webmaster by clicking the link below.
	</p>
	
<br/>
	<!--Copyright Symbol-->
	<br/>
	&copy; 2013 Eric Lund, Todd Detweiler
	</center>
	
	</div> <!--end main information div-->
	
	</body>
	
</html>
