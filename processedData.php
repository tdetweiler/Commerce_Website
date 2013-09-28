<!--
	Author: Eric Lund, Todd Detweiler
	Date: February 14th, 2013
	Revision: Session ID's and Cookies, March 10th, 2013
	Revision: Database Addition, April 1st, 2013
	This page displays the information the user gave
-->

<?php // For some pages, you will need to
// place php cookie processing here.
// Do not place ANY code (even blank lines)
// in front of this part. 
		session_start();
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
		<title>Processed Data</title>
	</head>
	
	<body>

		<?php include 'leftMenu.php';?> <!-- Include the side bar by calling the external php class -->
	    <script language="javascript" type="text/javascript">
			document.getElementById("custmerInfo").style.backgroundColor="#004a80";
			document.getElementById("custmerInfo").style.fontSize="9pt";
			document.getElementById("custmerInfo").style.fontWeight="bold";
			document.getElementById("custmerInfo").textContent="\u221A Home Page \u221A";
		</script>
	

	</center></div> <!--End side nav div-->
	

	<div class="mainInformation">
	
	<center><h1>Here Is The Information You Submitted</h1></center>
		
	
	<!-- This code is adapted from code at: http://programming.top54u.com/post/Javascript-Location-Search-Substring.aspx -->
	    	<script type="text/javascript" language="javascript">
			<!--

		        function LocationSearch()
		        {	            	
		            // Extract the query string from the address request.
					var queryString = window.location.search;
		            // We now inject this string in the HTML for this page.
	
		            // Create an array to hold the name=value pairs
					var nameValuePairs = new Array();
					
					// The split() function is cool. It splits the string on the specified character into an array
					nameValuePairs = queryString.split("&");
		
		            // We can separate the name=value pairs if we want.
					var names = new Array();
					var values = new Array();
		
					//				document.getElementById("div1").innerHTML += "The names and values separated:<br /><br />";
					//	
									// display the data 
					//				document.getElementById("div1").innerHTML += "Name   |  Value  <br />";
					//				for(var i = 1; i < nameValuePairs.length-1; i++)
					//	            {
					// 	                names[i] = nameValuePairs[i].toString().substring(0,nameValuePairs[i].toString().indexOf("="));
					//					values[i]  = nameValuePairs[i].toString().substring(nameValuePairs[i].toString().indexOf("=") + 1);
					// 					document.getElementById("div1").innerHTML +=  names[i] + "   |   " + values[i] + "<br />";
					// 				}
	 				
					// display the data in a table
					document.getElementById("table1").innerHTML= "<tr><th> Name </th><th> Value </th></tr>";
					for(var i = 0; i < nameValuePairs.length-1; i++)
					{
						if(i == 0)
						{
							names[i]  = nameValuePairs[i].toString().substring(1,nameValuePairs[i].toString().indexOf("=")); 
						}
						else {
							names[i]  = nameValuePairs[i].toString().substring(0,nameValuePairs[i].toString().indexOf("=")); 
						}
						values[i] = nameValuePairs[i].toString().substring(nameValuePairs[i].toString().indexOf("=") + 1);
						document.getElementById("table1").innerHTML +=  "<tr><td>" + names[i] + "</td><td>" + values[i] + "</td></tr>";
					} 				
				}

				function contains(a, obj) {
			    for (var i = 0; i < a.length; i++) {
			        if (a[i] == obj) {
			            return true;
			        }
			    }
			    return false;
				}

				function showCookies()
	            {
		            document.getElementById("table2").innerHTML= "<tr><th> Cookie Name </th><th> Cookie Content </th></tr>";
		            var names = new Array();
					var values = new Array();
					var formValues = ['LastName','FirstName','Address','City', 'State', 'PostalCode', 'PhoneNumber', 'AccountName', 'Password', 'eMail'];
					var cookieString=unescape(document.cookie);
	                var cookieList=cookieString.split(";");	
	                				// separate cookies at semicolon
	                // alert("cookieString = " + cookieString);
	                // alert("cookieList length = " + cookieList.length);
	                // document.getElementById("table2").innerHTML="These are the name=value pairs retrieved from the cookies:<br>";
	                for (i=0;i<cookieList.length;i++)
	                {         

	                		names[i] = cookieList[i].toString().substring(0,cookieList[i].toString().indexOf("=")); 
	                		//alert(formValues[i]);

	                		names[i] = names[i].trim();
	                		   	
	                		if(contains(formValues, names[i]) == true)
	                		{

	                			values[i]  = unescape(cookieList[i].toString().substring(cookieList[i].toString().indexOf("=") + 1));
				          	    document.getElementById("table2").innerHTML +=  "<tr><td>" + names[i] + "</td><td>" + values[i] + "</td></tr>";      	
	                		}					               	
					}
					//check to see if there is any cookies, if not, let the user know.
					var rowCount = document.getElementById("table2").getElementsByTagName("TR").length;
					if(rowCount == 1) //there are no cookies
					{
						document.getElementById("table2").innerHTML = "You have deleted all of the cookies!";
					}

			    }

				function eraseCookies()
				{
					
					var expirationDate=new Date();     // get today's date
					// get the cookie names and values
					var names = new Array();
					var values = new Array();
					var formValues = ['LastName','FirstName','Address','City', 'State', 'PostalCode', 'PhoneNumber', 'AccountName', 'Password', 'eMail'];
					
					var cookieString=unescape(document.cookie);
	                var cookieList=cookieString.split(";");					// separate cookies at semicolon
	                //alert("cookieString = " + cookieString);
	                //alert("cookieList length = " + cookieList.length);
	                //document.getElementById("div1").innerHTML="Erasing all cookies ...";

	                for (i=0;i<cookieList.length;i++)
	                {
	  	                names[i] = cookieList[i].toString().substring(0,cookieList[i].toString().indexOf("="));
	 					names[i] = names[i].trim();
	 					
	 					if(contains(formValues, names[i]) == true)
	                	{

	                		expirationDate.setDate(expirationDate.getDate() - 1);
		                //now save the cookie 
		                   document.cookie=names[i] + "=" + values[i] +";expires=" + expirationDate.toUTCString();
	                    }
			        }
			        // alert("cookieString = " + cookieString);
	                //       alert("cookieList length = " + cookieList.length);
			        //document.getElementById("div1").innerHTML +="Done <br />";
			        showCookies();				
				}
			-->
	 </script>
		<h3> Form Information </h3>
			<table border="1" id = "table1" class="myTable"> <tr><td></td></tr> </table>
		<h3> Cookie Information <input type="button" class = "custom" name="clearFormData" value="Clear All Form Cookies" onclick="eraseCookies();"/> </h3>

			<table border="1" id = "table2" class="myTable"> <tr><td></td></tr> </table>
		
		<script type="text/javascript">LocationSearch();
		showCookies();
	</script>	
	
        
    <br/>
	<!--Copyright Symbol-->
	<br/>
	&copy; 2013 Eric Lund, Todd Detweiler 
	</center>
	
	</div> <!--end main information div-->
	
	</body>
	
</html>
