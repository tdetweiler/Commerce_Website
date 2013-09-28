<!--
	Author: Eric Lund, Todd Detweiler
	Date: February 14th, 2013
	Revision: Session ID's and Cookies, March 10th, 2013
	Revision: Database Addition, April 1st, 2013
	This page checks to see if the user gave the right username and password
-->

<?php 
		//Our log in method that will take the form fields and compare them to the file database fields and 
		//check to see if they are valid. If they are we set the log in variable to true and reload the index.
		//We also store the email and name for future calls.
		session_start();
		$userNameFromQueryString = $_GET['UserName'];
		$passwordFromQueryString =  $_GET['PasswordField'];
		$fileName = "configFile.txt";
		$mode = "r";                        // read mode
		// attempt to open the file
		// the @ sign suppresses operating system messages (like file not found)
		// the 'or trigger_error' clause says what to do if the operation was not successful
		$inFile = @fopen($fileName, "r")    // open the file
			or trigger_error('Unable to open file: ' . $fileName, E_USER_WARNING);
			$userNameFromDatabase = rtrim(fgets($inFile)); //omit the space at the end...
			$PasswordFromDatabase = rtrim(fgets($inFile)); //omit the space at the end...
			$Email	= rtrim(fgets($inFile));
		fclose($inFile);
		if($userNameFromQueryString == $userNameFromDatabase && $passwordFromQueryString == $PasswordFromDatabase)
		{
			// The username and password is valid, lets make the right page!
				$_SESSION['loggedIn'] = 'true';	
				$_SESSION['email'] = $Email;
				$_SESSION['name'] = $userNameFromDatabase;
		}
		else
		{
			$_SESSION['failedLogIn'] = true;
		}
 ?>
<!--  Bring the user back to the home page -->
  <script>location.href='Index.php'</script>. 