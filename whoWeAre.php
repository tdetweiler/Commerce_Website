<!--
	Author: Eric Lund, Todd Detweiler
	Date: February 14th, 2013
	Revision: Session ID's and Cookies, March 10th, 2013
	Revision: Database Addition, April 1st, 2013
	This page is the Who We Are for South Sound Circles
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
		<title>Who Are We?</title>
	</head>
	
	<body>

	<?php include 'leftMenu.php';?> <!-- Include the side bar by calling the external php class -->
	<script language="javascript" type="text/javascript">
		document.getElementById("whoWeAre").style.backgroundColor="#004a80";
		document.getElementById("whoWeAre").style.fontSize="9pt";
		document.getElementById("whoWeAre").style.fontWeight="bold";
		document.getElementById("whoWeAre").textContent="\u221A Who We Are \u221A";
	</script>
	
<div class="mainInformation">

	<center><h1>Who We Are</h1></center>
	
	<table border="1" width = "100%">
	<tr>
	<td><img src="WhoAreWePhotos/PICT0157.JPG" alt="South Sound Math Circles Logo" height="188px"></td>
	<td>Leigh Cobb</td>
	</tr>
	<tr>
	<td><img src="WhoAreWePhotos/PICT0158.JPG" alt="South Sound Math Circles Logo" height="188px"></td>
	<td>Bryan Dorner</td>
	</tr>
	<tr>
	<td><img src="WhoAreWePhotos/PICT0159.JPG" alt="South Sound Math Circles Logo" height="188px"></td>
	<td>Celine Dorner</td>
	</tr>
	<tr>
	<td><img src="WhoAreWePhotos/PICT0160.JPG" alt="South Sound Math Circles Logo" height="188px"></td>
	<td>Rob Felix</td>
	</tr>
	<tr>
	<td><img src="WhoAreWePhotos/PICT0161.JPG" alt="South Sound Math Circles Logo" height="188px"></td>
	<td>Billy Harris</td>
	</tr>
	<tr>
	<td><img src="WhoAreWePhotos/PICT0162.JPG" alt="South Sound Math Circles Logo" height="188px"></td>
	<td>Paul McCreary</td>
	</tr>
	<tr>
	<td><img src="WhoAreWePhotos/PICT0163.JPG" alt="South Sound Math Circles Logo" height="188px"></td>
	<td>David Scott</td>
	</tr>
	</table>

	<center>
<!-- 		Leigh Cobb<br/>
		<img src="WhoAreWePhotos/PICT0157.JPG" alt="South Sound Math Circles Logo" height="188px">
		Bryan Dorner
		Celine Dorner
		Rob Felix
		Billy Harris
		Paul McCreary
		David Scott -->
	</center>


<br/>
	<!--Copyright Symbol-->
	<br/>
	&copy; 2013 Eric Lund, Todd Detweiler
	</div> <!--end main information div-->

	</body>
	
</html>
