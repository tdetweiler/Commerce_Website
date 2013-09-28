

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
	
				<!--
				Author: Eric Lund, Todd Detweiler
				Date: April 5th, 2013
				This page is to load the larger images and description for our products.
				-->
	
	<head>
		
		<!-- declare the character encoding-->
		<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
		
		<!--******************************************* -->
		<!-- a link to external style sheet -->
		<link href="Styling.css" rel="stylesheet" type="text/css" />
		
		<!--Title-->
		<title>Product Display</title>
	</head>
	
	<body>

	<?php include 'leftMenu.php';?> <!-- Include the side bar by calling the external php class -->
	<script language="javascript" type="text/javascript">
	var dpt = "<?php echo $_GET['dest']; ?>";
		document.getElementById(dpt).style.backgroundColor="#004a80";
		document.getElementById(dpt).style.fontSize="9pt";
		document.getElementById(dpt).style.fontWeight="bold";
		document.getElementById(dpt).textContent="\u221A" + dpt + "\u221A";
	</script>
	
<div class="mainInformation">



	<?php 

		//Setup the connection to the database
		$conn = mysql_connect('localhost', 'tdetweiler', "")
                 or die ("Could not connect to server." . mysql_error());
             mysql_select_db('group6S13data', $conn)
                 or die ("Cannot open database." . mysql_error());

      //get the image name to be displayed via the query string
	  $theImageName = $_GET['image'];

	  //Get the product decription
	  $select = "SELECT Description FROM product WHERE Image = '$theImageName'";
	  $records2 = mysql_query($select, $conn)
	        or die("Can't retrieve records..." . mysql_error());	
	  $theDescription = mysql_fetch_array($records2, MYSQL_BOTH);
	  //echo "$theDescription[0]";

 	  //display the image
      $theImageName2 = "ProductImages/".$theImageName; //add the ProductImages/ so we pull from correct dir.
      //echo "<img src ='$theImageName2'>";

      //Get the product name for title
      $select = "SELECT ProductName FROM product WHERE Image = '$theImageName'";
	  $records2 = mysql_query($select, $conn)
	        or die("Can't retrieve records..." . mysql_error());	
	  $theRecord = mysql_fetch_array($records2, MYSQL_BOTH);
	  //echo "$theRecord[0]";
?>

	<input type="button" value="Back" onclick="goBack()" style = "position:relative; height:25px;">
	<center><h1 id = "mainTitle"></h1>
	<script language="javascript" type="text/javascript">
	function goBack()
	{
	  window.history.back()
	}
	var dpt = "<?php echo $theRecord[0]; ?>";
	document.getElementById("mainTitle").textContent=dpt;
	</script>

	<?php
	//display the product desciption and the larger image
	echo "$theDescription[0]";
	echo "<br/>";
	echo "<br/>";
	echo "<img src ='$theImageName2'>";
	?>

	
	</center>

</body>
</html>


