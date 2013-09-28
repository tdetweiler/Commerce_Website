<!--
	Author: Eric Lund, Todd Detweiler
	Date: April 7th, 2013
	This page will add a product to the cart when it is called from the add to cart button.
-->
<?php
		//our log out php that will send an email to the user and then destroy the session and reload 
		//the index page.
		session_start();
		
		$ID = $_GET['ID'];
		$changed = "false";
		
		//echo $ID;
		

		if(isset($_SESSION['cart']))
		{//Check to see if the cart variable exists. If it does let's add to it.
		$temp = $_SESSION['cart'];
		for($i =0; $i<count($temp); $i++){
			$temp2 = $temp[$i];
			if($ID == $temp2[0]){			// if this is true then our product is in the shopping cart so let's
											//increase the quanity.
				$temp[$i] = array($ID, $temp2[1]+1);
				$changed = "true";
			}
		}
		//if the product isn't already in the shopping cart add it.
		if($changed == "false"){
			array_push($temp, array($ID, 1));
		}
		$_SESSION['cart'] = $temp;
		}
		
		//if there isn't a shopping cart already then create it.
		else{
		$_SESSION['cart'] = array(array($ID , 1));
		}
?>

<script>location.href='viewCart.php'</script>. 