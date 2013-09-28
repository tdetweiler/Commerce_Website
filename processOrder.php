<!--
	Author: Eric Lund, Todd Detweiler
	Date: April 19, 2013
	This page is to create the process order page for south sound circles that will ask for customer info.
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
		<title>Process Order</title>
	</head>
	
	<body>
	
	<?php include 'leftMenu.php';?> <!-- Include the side bar by calling the external php class -->
	<script language="javascript" type="text/javascript">
			document.getElementById("viewCart").style.backgroundColor="#004a80";
			document.getElementById("viewCart").style.fontSize="9pt";
			document.getElementById("viewCart").style.fontWeight="bold";
			document.getElementById("viewCart").textContent="\u221A View Cart \u221A";
	</script>
	
	<div class="mainInformation">

	<center><h1 id = "mainTitle"></h1></center>
	<script language="javascript" type="text/javascript">
	var dpt = "<?php echo $_GET['dest']; ?>";
	document.getElementById("mainTitle").textContent=dpt + " Department";
	</script>

	
	
	</body>
	
</html>
