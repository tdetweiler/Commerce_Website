<!--
	Author: Eric Lund, Todd Detweiler
	Date: April 8th, 2013
	This page is to create the view cart page for South Sound Circles
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
		<title>View Cart</title>
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

	<?php 
		if(!isset($_SESSION['cart'])) // The user has no cart. 
		{
			echo "<h1>There are no items in your cart yet!</h1>";
		}
			
		else{
		
		$conn = mysql_connect('localhost', 'tdetweiler', "")
                 or die ("Could not connect to server." . mysql_error());
             mysql_select_db('group6S13data', $conn)
                 or die ("Cannot open database." . mysql_error());
		$theDepartmentName =  "Coffee Beans";
		$selectAll = "SELECT * FROM department WHERE DepartmentName = '$theDepartmentName'";
		$records = mysql_query($selectAll, $conn)
			        or die("Can't retrieve records..." . mysql_error());
	  

		//display a product 
		$select = "SELECT * FROM product";
		$temp = mysql_query($select, $conn)
			        or die("Can't retrieve records..." . mysql_error());
					
		echo "<center><table border = '1' align='right' style = 'width:100%'; 'alignment:center';><tr>";
		    $numColumns = mysql_num_fields($temp);
            for($i = 0; $i < $numColumns +1; $i++) { 
            		if($i == 5)
            		{
            			echo  "<th>" . "More Information" . "</th>";
            		}
            		else if($i == 7) //quanity
            		{
            			echo  "<th>" . "Quanity" . "</th>";
            		}
            		else if ($i != 3)
            		{
            			echo  "<th>" . mysql_field_name($temp,$i) . "</th>";
            		}
			    	
		    }			
			echo "</tr>";
			
			
					
					
	   
		 for($j = 0; $j < count($_SESSION['cart']); $j++){
			$temp = $_SESSION['cart'][$j];
			  $select = "SELECT * FROM product WHERE ProductID = '$temp[0]'";
			  $records2 = mysql_query($select, $conn)
			        or die("Can't retrieve records..." . mysql_error());
		
			while ($theRecord = mysql_fetch_array($records2, MYSQL_BOTH))
	    	{
	 		  echo "<tr>";
			  for ($i = 0; $i < mysql_num_fields($records2)+1; $i++)
			   {
			        // since we will need these values accessible on the client machine, 
			        // we make them input fields, but not editable
			   		if($i == 3) //thumbnail column
			    	{

			    		//$temp = "ProductImages/"	
			    		//echo "$i";	
			    	}
			    	if($i == 4) //thumbnail column
			    	{
			    		//$temp = "ProductImages/"
			    		echo "<td>"."<img src=ProductImages/$theRecord[$i]>"."</td>\n" ;		
			    		//echo "$i";	
			    	}
			    	else if($i == 5) // full image column
			    	{
			    		echo "<td>" .
			    		"<a href='displayLargeImage.php?image=$theRecord[$i]&dest=$theDepartmentName'><button type='button'>More Information</button></a>"
			    		. " </td>\n" ;		
			    		//echo "$i";	
			    	}
			    	else if($i == 7)
			    	{
			    		echo "<td>" .
			    		$temp[1]
			    		. " </td>\n";		
			    			
			    	}
			    	else if ($i != 3)
			    	{
			    		echo "<td>" . $theRecord[$i] . " </td>\n" ;	
			    	}
	
			   }
				   echo  "</tr>\n";
			}       			   
		 } 
		 echo "</table></center>";
		 }
		 
		 echo "<br/>";
		 echo  "&nbsp";
		 echo "<br/>";
		 echo "<a href = 'checkOut.php'><input type='button' value='Check Out' style = 'float:right; height:25px;''></a>";
		 echo "<br/>";
		 echo "<br/>";
		

?>


<br/>
	<!--Copyright Symbol-->
	<br/>
	&copy; 2013 Eric Lund, Todd Detweiler
	</div> <!--end main information div-->

	</body>
	
</html>




