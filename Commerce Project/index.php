<?php // For some pages, you will need to
// place php cookie processing here.
// Do not place ANY code (even blank lines)
// in front of this part. ?>

<!-- This is the standard DOCTYPE tag we will use -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	
	<head>
		<!--	
			CSCI 250 Assignment 3
			Author: Eric Lund & Todd Detweiler
			Date: February 28th, 2013
			This page is the main page for the "Brew The Best" website
		-->
		
		<!-- declare the character encoding-->
		<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
		
		<!--******************************************* -->
		<!-- a link to external style sheet -->
		<link href="myStyling.css" rel="stylesheet" type="text/css" />
		
		<!--Title-->
		<title>Welcome to Brew The Best</title>
	</head>
	
	<body>

		<!--Top title bar-->
		<center><h1 class="mySpecialHeader">Welcome to Brew The Best!</h1></center>
		
		<!--Left picture-->
		<p class="leftTitleImage"><img src="coffee1.jpg" alt="Bag of coffee beans and cup of coffee." width="250" height="169"></img></p>
		<!--http://www.freegreatpicture.com/files/105/16552-coffee-and-coffee-beans-close-up.jpg-->
		
		<!--Right picture-->
		<p class="rightTitleImage"><img src="coffee2.jpg" alt="Pile of coffee beans and cup of coffee." width="250"></img></p>
		<!--http://www.freegreatpicture.com/files/105/18271-coffee-and-coffee-beans.jpg-->
		
		<br/>
<!--		<br/>
		<br/>-->
		
		<!--Links to the product catalog and about out company page-->
		
		<center><a href="Departments.html"> <img class="myButtonLinks" src="productCatalogButton.jpg" alt="lol"/></a></center>
		<!--<center><a class="myLinks" href="Departments.html">Departments Page</a></center>-->
		<center><h3 class="mySecondSpecialHeader">Want to brew the best cup of java? <br/> You've came to the right place!</h3></center>
		<center><a href="about.html"> <img class="myButtonLinks" src="aboutOurCompanyButton.jpg" alt="lol"/></a></center>	
		<!--<center><a class="myLinks" href="about.html">About Our Company</a></center>-->
	
		<br/>
	
		<!--Table to display 3 example photos with links to the product catalog-->
		<table class="myTable" border="1" cellspacing="5">
			<tr>
				<th colspan="3" style="border: 0px; ;"> Brew The Best sells all of your common java supplies including coffee pots, french presses and the finest coffee beans </th>
			</tr>
			<tr class="myTableRow">
				<td class="myTableDetail"> Coffee Pots 
				<br/>
				<!--First photo-->
				<a href="Departments.html"><img src="coffeePot.jpg" alt="Coffee Pot" width="250"></img></a>
				<!--http://www.cheapoffer.info/pmd/1212/coffee-pot_2839.jpg?v=LzQxVyUyQlA1SEpVLUwuX0FBNTAwXy5qcGc=-->
				</td>
				<!--Second photo-->
				<td class="myTableDetail"> French Press
				<br/>
				<a href="Departments.html"><img src="frenchPress.jpg" alt="French Press" width="250"></img></a>
				<!--http://cdn.shopify.com/s/files/1/0126/1342/products/Kenya_4_Cup_French_Press_Coffeemaker.jpeg?636062-->
				 </td>
				<!--Third photo-->
				<td class="myTableDetail"> Coffee Beans 
				<br/>
				<a href="Departments.html"><img src="coffeeBag.jpg" alt="Coffee Beans Bag" width="250"></img></a>
				<!--http://savingnaturally.com/wp-content/uploads/2012/04/guatemala-organic-coffee.jpg-->
				</td>		
			</tr>
		</table>
		
		<!--Footer banner with links to privacy statement, email, and CSCI250 homepage-->
		<center><h1 class="myFooter">
		<a class="myLinksFooter" href="privacyStatement.html">Privacy Statement</a>
		|
		<a class="myLinksFooter" href="mailto:elund@pugetsound.edu?Subject=Hello%20again">E-mail Developer</a>
		|
		<a class="myLinksFooter" href="http://ibis.pugetsound.edu/CS250/cs250.html">CSCI250 Homepage</a>
		|
		<a class="myLinksFooter" href="CustomerInfo.html">Customer Info</a>
		</h1>
		<br/>
		<!-- XHTML Compliant Images -->
		<a href="http://validator.w3.org/check?uri=index.html">
		<img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Transitional" height="31" width="88" />
		</a>
		
		<!-- CSS Compliant Image -->
	    <a href="http://jigsaw.w3.org/css-validator/check/myStyling.css">
	        <img style="border:0;width:88px;height:31px"
	            src="http://jigsaw.w3.org/css-validator/images/vcss"
	            alt="Valid CSS!" />
	    </a>
		<!--Copyright Symbol-->
		<p id = "footer">
			&copy; 2013 Eric Lund, Todd Detweiler
		</p>	
		</center>
	</body>
	
</html>
