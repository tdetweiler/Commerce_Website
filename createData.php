<?php
   // Add code to check for cookies enabled
    session_start();                  // this starts a session
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	
	<head>
	
		<!-- 
			This page demonstrates creating a mySQL database and tables through PHP.
						
			Author: Eric Lundt, Todd Detweiler
			Date: 2013.04.01
			
		-->
		
		<!-- declare the character encoding (recommended) -->
		<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />

		<title>PHP create tables</title>
		
	</head>
	<body>
	
	Creating database...

        <?php
        
             // set up the connection to the server
             $conn = mysql_connect('localhost', 'tdetweiler', "")
                 or die ("Could not connect to server." . mysql_error());
             echo "Connection successful...<br />";
             mysql_select_db('group6S13data', $conn)
                 or die ("Cannot open database." . mysql_error());
			 echo "Database open...<br />";
			 
			 // In case we re-run this then delete any earlier copies of the database.
			 //
			 $myQuery = "DROP TABLE IF EXISTS product;";
             mysql_query($myQuery, $conn);
			 $myQuery = "DROP TABLE IF EXISTS department;";
             mysql_query($myQuery, $conn);
			 $myQuery = "DROP TABLE IF EXISTS departmentProduct;";
			 mysql_query($myQuery, $conn);
			 $myQuery = "DROP TABLE IF EXISTS customer;";
			 mysql_query($myQuery, $conn);
			 $myQuery = "DROP TABLE IF EXISTS orderT;";
			 mysql_query($myQuery, $conn);
			 $myQuery = "DROP TABLE IF EXISTS orderDetail;";
             mysql_query($myQuery, $conn);
             echo "Creating table 'product'...<br />";
             
             // this is the product data we want to store
			 $productList = array( 
								array( "111", 
										"Light Roasted Java", 
										9.99, 
										"1 lb of rich flavor Java Coffee beans grown and processed with the regional style of Indonesia. 
										 A common favorite.",  
										 "coffee-beansThumbnail-Java.jpg", 
										 "coffee-beans-Java.jpg", 
										 1),
                                  array( "112", 
										"Colombian French Roast",     
										11.99, 
										"1 lb of finely roasted Colombian coffee beans. This blend has a rich, dark flavor with a slightly bitter taste.
										A vert standard pick for a black coffee lover.", 
										"frenchRoastColombianThumbnail.jpg", 
										"frenchRoastColombian.jpg", 
										1),
                                  array( "113",
										"Italian Roast Espresso",
										9.99,
										"1 lb of our heavy, rich, and dark roasted coffee. Italian roast is ideal for a nice espresso to wake you up in
										the morning. Dark coffee beans are in right now so this is a great pick to get that dark rich flavor!",
										"Italian_Roast_Thumbnail.jpg",
										"Italian_Roast.jpg",
										1 ),
                                  array("121",
										"Aluminum Coffee Pot",
										19.99,
										"A Stove-Top coffee pot for your classic brewing of espresso. Stove-Top coffee brewing is the classic Italian
										method of making espresso and gives a higher level of sensory qualities, perfecting the cup of coffee. This
										coffee pot makes on average 6 cups of espresso.",
										"Aluminium_Coffee_Maker_Thumbnail.jpg",
										"Aluminium_Coffee_Maker.jpg",
										2),
                                  array( "122",
										"Mr. Coffee coffeemaker",
										29.99,
										"A very simple and easy to use programmable coffee maker. Does not take much time to prepare and brews the coffee
										to a very fine taste.",
										"Mr_Coffee_Maker_Thumbnail.jpg",
										"Mr_Coffee_Maker.jpg",
										3),
								array("123",
										"Hamilton Beach Two Way Brewer",
										79.99,
										"A high quality coffee brewer that can brew single servings directly into a mug or brew a 12-cup pot to share! 
										This coffee maker is a hit built with durable steel and different brewing options from a basic to premium roast.
										This the Hamilton beach is a go to coffee maker, giving you all the luxuries of a coffee house at home.",
										"Hamilton_Thumbnail.jpg",
										"Hamilton.jpg",
										10),
								array(	"211",
										"14 oz Thermo Ceramic Mug",
										4.99,
										"Very standard desk mug. Built with insulated stainless steel that keeps your coffee warm and looks good all at
										the same time.",
										"Ceramic_Mug_Thumbnail.jpg",
										"Ceramic_Mug.jpg",
										1 ),
								array( "212",
										"16-ounce Contigo travel mug",
										9.99,
										"A very durable and popular travel mug. Contigos tumbler is an insulated stainless steel design with a no-spill
										designed top. Keeps your coffee hot, easy to hold, and looks good all at the same time.",
										"Contigo_Mug_Thumbnail.jpg",
										"Contigo_Mug.jpg",
										1),
								array(	"213",
										"16-ounce Reusable To-Go-Mug",
										7.99,
										"The copco reusable travel mug is created to replace your average paper and styrofoam coffee cups. Built in the
										same design as normal paper coffe cups, the copco is built from BPA-free plastic with a non-slip sleeve. With
										some insulation this coffee mug is supposed to act like a normal coffe cup but instead be environmentally friendly.",
										"Copco_Mug_Thumbnail.jpg",
										"Copco_Mug.jpg",
										1 )
             );
             
             // Create the table for our products, all of the key variables that were listed earlier are included.
             $myQuery = "CREATE TABLE product (ProductID   	VARCHAR(10),
			                                   ProductName 		VARCHAR(50),
											   Price      		DECIMAL(10,2),
											   Description 		TEXT,
											   Thumbnail		VARCHAR(50),
											   Image			VARCHAR(50),
											   Weight      		INT,
											   PRIMARY KEY (ProductID)
												 )";
			
			 mysql_query($myQuery, $conn)
			        or die("Failed to create table " . mysql_error());
			 echo "Table created...<br />";	 
			 
		 									 
			 echo "There are " . count($productList). " products. <br />";
             // OK, now put this data in the table
             for($i = 0; $i < count($productList); $i++)
             {
				$myQuery = "INSERT INTO product VALUES ('". $productList[$i][0]."'";
			    //echo "Preparing to insert. Query is: " . $myQuery . "<br />";
				for ($j = 1; $j < count($productList[$i]); $j++)
				{
			         //echo "Preparing to insert. Query is: " . $myQuery . "<br />";
					 $myQuery  .= ", '".$productList[$i][$j]. "'";
				}
		  	    $myQuery .= ")";
			    echo "Preparing to insert. Query is: " . $myQuery . "<br />";
			    mysql_query($myQuery, $conn)
				     or die("Failed to insert..." . mysql_error());			
			}
			
			//Create our department table array
			 $departmentList = array( array("01", "Coffee Beans"),
										array("02", "Coffee Makers"),
										array("03", "Coffee Mugs")
										);
										
			//create the table for departments, our departments must have an ID and a name and that's all that
			//is required.
			$myQuery = "CREATE TABLE department (DepartmentID	 VARCHAR(5),
												 DepartmentName	 VARCHAR(50),
												 PRIMARY KEY	(DepartmentID) 
												 )";
			
			mysql_query($myQuery, $conn)
			        or die("Failed to create table " . mysql_error());
			 echo "Table created...<br />";
			
			for($i = 0; $i < count($departmentList); $i++)
             {
				$myQuery = "INSERT INTO department VALUES ('". $departmentList[$i][0]."'";
			    //echo "Preparing to insert. Query is: " . $myQuery . "<br />";
				for ($j = 1; $j < count($departmentList[$i]); $j++)
				{
			         //echo "Preparing to insert. Query is: " . $myQuery . "<br />";
					 $myQuery  .= ", '".$departmentList[$i][$j]. "'";
				}
		  	    $myQuery .= ")";
			    echo "Preparing to insert. Query is: " . $myQuery . "<br />";
			    mysql_query($myQuery, $conn)
				     or die("Failed to insert..." . mysql_error());			
			}
			
			//Create our department-product table array
			 $departmentProductList = array( array("111", "01"),
										array("112", "01"),
										array("113", "01"),
										array("121", "02"),
										array("122", "02"),
										array("123", "02"),
										array("211", "03"),
										array("212", "03"),
										array("213", "03")
										);
										
			//create the table for department product. This is a cross table to link department and product
			//because I see it as a many to many relationship where a department can have many products
			//and a product can be crosslisted into different departments.
			$myQuery = "CREATE TABLE departmentProduct (ProductID	 VARCHAR(10),
												 DepartmentID	 VARCHAR(5),
												 PRIMARY KEY	(ProductID, DepartmentID) 
												 )";
			
			mysql_query($myQuery, $conn)
			        or die("Failed to create table " . mysql_error());
			 echo "Table created...<br />";
			
			for($i = 0; $i < count($departmentProductList); $i++)
             {
				$myQuery = "INSERT INTO departmentProduct VALUES ('". $departmentProductList[$i][0]."'";
			    //echo "Preparing to insert. Query is: " . $myQuery . "<br />";
				for ($j = 1; $j < count($departmentProductList[$i]); $j++)
				{
			         //echo "Preparing to insert. Query is: " . $myQuery . "<br />";
					 $myQuery  .= ", '".$departmentProductList[$i][$j]. "'";
				}
		  	    $myQuery .= ")";
			    echo "Preparing to insert. Query is: " . $myQuery . "<br />";
			    mysql_query($myQuery, $conn)
				     or die("Failed to insert..." . mysql_error());			
			}
			
			//Create our customer table array
			 $customerList = array( array("01", 
											"tdetweiler", 
											"password", 
											"Detweiler", 
											"Todd", 
											"1256 North street",
											"Tacoma",
											"WA",
											"98416",
											"9278990123",
											"t.detweiler13@gmail.com")
										);
										
			//create the table for customer with all key information
			$myQuery = "CREATE TABLE customer (CustomerID	 VARCHAR(5),
												 Username	 VARCHAR(10),
												 Password	 VARCHAR(10),
												 LastName	 VARCHAR(20),
												 FirstName	 VARCHAR(20),
												 Address	 VARCHAR(50),
												 City		 VARCHAR(50),
												 State		 VARCHAR(2),
												 Zipcode	 VARCHAR(5),
												 PhoneNumber VARCHAR(10),
												 Email		 VARCHAR(30),
												 PRIMARY KEY	(CustomerID) 
												 )";
			
			mysql_query($myQuery, $conn)
			        or die("Failed to create table " . mysql_error());
			 echo "Table created...<br />";
			
			for($i = 0; $i < count($customerList); $i++)
             {
				$myQuery = "INSERT INTO customer VALUES ('". $customerList[$i][0]."'";
			    //echo "Preparing to insert. Query is: " . $myQuery . "<br />";
				for ($j = 1; $j < count($customerList[$i]); $j++)
				{
			         //echo "Preparing to insert. Query is: " . $myQuery . "<br />";
					 $myQuery  .= ", '".$customerList[$i][$j]. "'";
				}
		  	    $myQuery .= ")";
			    echo "Preparing to insert. Query is: " . $myQuery . "<br />";
			    mysql_query($myQuery, $conn)
				     or die("Failed to insert..." . mysql_error());			
			}
			
			//create the order table which stores all the key information about an order
			$myQuery = "CREATE TABLE orderT(OrderID	 VARCHAR(10),
												 CCName	 	VARCHAR(50),
												 CCNumber	 VARCHAR(16),
												 CCSecurity	 VARCHAR(3),
												 BillingAddress VARCHAR(300),
												 ShippingAddress VARCHAR(300),
												 Shipped	 VARCHAR(5),
												 Paid		 VARCHAR(5),
												 Weight			INT,
												 TotalPrice		INT,
												 PRIMARY KEY	(OrderID) 
												 )";
			
			mysql_query($myQuery, $conn)
			        or die("Failed to create table " . mysql_error());
			 echo "Table created...<br />";
			
			//create our order details table which links the order to the products and quantity of that order.
			$myQuery = "Create Table orderDetail(OrderID VARCHAR(10),
													ProductID VARCHAR(10),
													Quantity VARCHAR(5),
													Cost	INT,
													PRIMARY KEY 	(OrderID, ProductID)
													)";
			
			mysql_query($myQuery, $conn)
			        or die("Failed to create table " . mysql_error());
			 echo "Table created...<br />";
			
            mysql_close($conn);     // close the connection
        ?>
   		
	    
		<p>
		<!-- XHTML Compliant Image -->
		<a href="http://validator.w3.org/check?uri=referer">
		    <img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Transitional" height="31" width="88" />
		</a>
		</p>
			
	</body>

	
</html>