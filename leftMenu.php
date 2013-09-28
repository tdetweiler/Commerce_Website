<!--
	Author: Eric Lund, Todd Detweiler
	Date: February 14th, 2013
	Revision: Session ID's and Cookies, March 10th, 2013
	Revision: Database Addition, April 1st, 2013
	This page makes the left menu for each page. 
-->

<?php
	$conn = mysql_connect('localhost', 'tdetweiler', "")
                 or die ("Could not connect to server." . mysql_error());
             mysql_select_db('group6S13data', $conn)
                 or die ("Cannot open database." . mysql_error());
	$selectAll = "SELECT * FROM department";
	$departments = mysql_query($selectAll, $conn)
			or die("can't retrieve records." . mysql_error());

	//if(isset($_SESSION['loggedIn'])){			//delete this later, just a checker
	#echo $_SESSION['loggedIn'];
	//}
	if(!isset($_SESSION['loggedIn']))
	{//Check to see if the logged in variable exists. If not then create it and set it equal to false.
	$_SESSION['loggedIn'] = 'false';
	}

	if($_SESSION['loggedIn'] == 'false'){ //The user is not logged in
		echo" 
		 <div class='topBanner' style='vertical-align: middle'>
		 </div> <!--End top banner-->
		 <div class='sideNav'><center>
		 <br/>
		 <ul id='navlist'>
		 <li><a id = 'homePage' href='index.php'>Home Page</a></li>
		 <li><a id = 'whoWeAre' href='whoWeAre.php'>Who We Are</a></li>
		 <li><a id = 'contactUs' href='contactUs.php'>Contact Us</a></li>
		 <li><a id = 'upcomingEvents' href='upcomingEvents.php'>Upcoming Events</a></li>
		 <li><a id = 'externalLinks' href='externalLinks.php'>External Links</a></li>
		 <li><a id = 'customerInfo' href='customerInfo.php'>Customer Info</a></li>
		 <li><a id = 'privacyStatement' href='privacyStatement.php'>Privacy Statement</a></li>
		 <li><a id = 'viewCart' href='viewCart.php'>View Cart</a></li>
		 </ul>
		 <br/>
		 <center><span style = 'color:white;'>Departments</span></center>
		 <ul id='navlist'>";
		 //this while loop will display a link for all departments that we have in our database.
		 while($theRecord = mysql_fetch_array($departments, MYSQL_BOTH)){
		 $theDepartment = $theRecord["DepartmentName"];
		 echo"<li><a id = '$theDepartment' href='loadData.php?dest=$theDepartment';>$theDepartment</a></li>";
		 }
		 echo"</ul>
		 <br/>
		 <div class = 'loginDiv'>";
		if(($_SESSION['failedLogIn']) == true) //If they failed to log, tell them.
		{
			echo "<span id = 'invalid'>Invalid Account! Try Again</span>";
		}
	 	echo "<form name = 'logInForm' id = 'logInForm' class ='login' action = 'phpValidate.php'  class='myForm'>	<!--once the log in button is clicked then run the logIn.php -->
		<h3>User Name</h3>      <input type = 'text' size = '20' name = 'UserName' /><br />
		<h3>Password</h3>     <input type = 'password' size = '20' name = 'PasswordField' /><br /><br/>		        
		<input type = 'submit' name = 'submitButton' value = 'Log In' onclick='validateLogIn()'/>
		</form>
		<a href = customerInfo.php> <input type = 'button' name = 'createAccount' value = 'Create Account'></a>
		</div>";
		}

		else{ //Otherwise they are logged in so display the log out button
		echo "<div class='topBanner' style='vertical-align: middle;'>
		     </div> <!--End top banner-->
		      <div class='sideNav'><center>
		      <br/>
		      <ul id='navlist'>
		      <li><a id = 'homePage' href='index.php'>Home Page</a></li>
			  <li><a id = 'whoWeAre' href='whoWeAre.php'>Who We Are</a></li>
			  <li><a id = 'contactUs' href='contactUs.php'>Contact Us</a></li>
			  <li><a id = 'upcomingEvents' href='upcomingEvents.php'>Upcoming Events</a></li>
			  <li><a id = 'externalLinks' href='externalLinks.php'>External Links</a></li>
			  <li><a id = 'customerInfo' href='customerInfo.php'>Customer Info</a></li>
			  <li><a id = 'privacyStatement' href='privacyStatement.php'>Privacy Statement</a></li>
			 <li><a id = 'viewCart' href='viewCart.php'>View Cart</a></li>
		      </ul>
		      <br/>
		      <center><span style = 'color:white;'>Departments</span></center>
			  <ul id='navlist'>";
			  //this while loop will display a link for all departments that we have in our database.
			  while($theRecord = mysql_fetch_array($departments, MYSQL_BOTH)){
				$theDepartment = $theRecord["DepartmentName"];
				echo"<li><a id = theDepartment href='loadData.php?dest=$theDepartment';>$theDepartment</a></li>";
				}
			  echo"</ul>
		      <br/>
		      <div class = 'loginDiv'>
		      <h3> Welcome ";
		echo $_SESSION['name'];
		echo "! </h3>
		      <br/>
			 <form name = 'logout' action = 'logOut.php' id = 'logOut' class= 'myForm'>	
			 <input type = 'submit' name = 'submitButton' value = 'Log Out'/>
			 </form>
			 </div>";
		} //end else

		#validation images
		echo "	<div class='compliantImages'>
			<br/>
			<br/>
			<!-- XHTML Compliant Images -->
			<a href='http://validator.w3.org/check?uri=index.html'>
			<img src='http://www.w3.org/Icons/valid-xhtml10' alt='Valid XHTML 1.0 Transitional' height='31' width='88' />
			</a>
			
			<!-- CSS Compliant Image -->
			<a href='http://jigsaw.w3.org/css-validator/check/myStyling.css'>
			    <img style='border:0;width:88px;height:31px'
			        src='http://jigsaw.w3.org/css-validator/images/vcss'
			        alt='Valid CSS!' />
			</a>
		</div> <!--End compliant images div-->
		</center></div> <!--End side nav div--> ";

		// echo "<div class = 'footer'>
		// 		&copy; 2013 Eric Lund, Todd Detweiler 
		// 		</div>";
		
	?>