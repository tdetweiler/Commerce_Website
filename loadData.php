<!--
	Author: Eric Lund, Todd Detweiler
	Date: April 1, 2013
	Revision: Database Addition, April 1st, 2013
	This page is to create the department page using our database for South Sound Circles
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
		<title>Department</title>
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

	<center><h1 id = "mainTitle"></h1></center>
	<script language="javascript" type="text/javascript">
	var dpt = "<?php echo $_GET['dest']; ?>";
	document.getElementById("mainTitle").textContent=dpt + " Department";
	</script>

	<?php 	
		
		$conn = mysql_connect('localhost', 'tdetweiler', "")
                 or die ("Could not connect to server." . mysql_error());
             mysql_select_db('group6S13data', $conn)
                 or die ("Cannot open database." . mysql_error());
		$theDepartmentName = $_GET['dest'];
		$selectAll = "SELECT * FROM department WHERE DepartmentName = '$theDepartmentName'";
		$records = mysql_query($selectAll, $conn)
			        or die("Can't retrieve records..." . mysql_error());
					
			//dumpRecords($records);  // debugging
		 
		 while($theRecord = mysql_fetch_array($records, MYSQL_BOTH))
		 {
			 $theDepartment = $theRecord["DepartmentID"];
		 } 


		  // $records now contains a record for each flower required for this bouquet and the quantity
	    //echo "<br /><br /><br />";
		//echo "<table border = '1'>";
	  

        $select = "SELECT * FROM departmentProduct WHERE DepartmentID = '$theDepartment'";
		$records = mysql_query($select, $conn)
			        or die("Can't retrieve records..." . mysql_error());
		
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
            			echo  "<th>" . "Add to Cart" . "</th>";
            		}
            		else if ($i != 3)
            		{
            			echo  "<th>" . mysql_field_name($temp,$i) . "</th>";
            		}
			    	
		    }			
			echo "</tr>";
			
			
					
					
	    while($theRecord = mysql_fetch_array($records, MYSQL_BOTH))
		 {
			 $product = $theRecord["ProductID"];
			  $select = "SELECT * FROM product WHERE ProductID = $product";
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
			    		"<center><form name = 'addToCart' action = 'addToCart.php?ID=$theRecord[ProductID]' method = 'post' id = 'addToCart' class = 'myForm'>
						<input type = 'submit' name = 'submit button' value = 'Add To Cart'/>
						</form></center>"
			    		. " </td>\n" ;		
			    		//echo "$i";	
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

?>


<br/>
	<!--Copyright Symbol-->
	<br/>
	&copy; 2013 Eric Lund, Todd Detweiler
	</div> <!--end main information div-->

	</body>
	
</html>




