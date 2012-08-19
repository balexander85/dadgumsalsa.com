<?php

function numbers_only($user_input){
	$numbers = ereg_replace("[^0-9]", "", $user_input);
	return $numbers;
}

// Assigning the price to the different sizes of jars
$half_pint = 599;
$pint = 699;
$quart = 1299;

// Assigns and validates the customer's information including salsa size and the number of jars selected
if ($_POST) {
	// validating that a user enters a quantity
	$quantity = $_POST["quantity"];
	if (!preg_match("/\d+/",$quantity))
		$error = 'Please enter a valid number of salsa jars.';
		//die("Please enter a valid number of salsa jars."." ".$quantity);
	// validating that user has entered a name
	// $customer_name = $_POST["fullname"];
	// if ($customer_name == NULL)
	// 	die("Please enter your full name.");
	// // validating that user has entered a valid email
	// $customer_email = $_POST['email'];
	// if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$customer_email))
	// 	die("E-mail address not valid");
	// // validating that customer has filled out their address
	// $customer_addr = $_POST["address"];
	// if ($customer_addr == NULL)
	// 	die("Please enter your full address.");
	// // validating that customer has filled out their city
	// $customer_city = $_POST["city"];
	// if ($customer_city == NULL)
	// 	die("Please fill in city.");
	// // validating that customer has filled out their state
	// $customer_state = $_POST["state"];
	// if ($customer_state == NULL)
	// 	die("Please enter your state.");
	// // validating that customer has filled out their zip code
	// $customer_zip = $_POST["zipcode"];
	// if ($customer_zip == NULL)
	// 	die("Please enter a valid zip code.");
	//CURRENTLY ONLY SELLING PINTS- validating that a user selects a size
	//$salsa_size = $_POST["salsa-size"];
	//if ($salsa_size == NULL)
	//	die("Please Select Size");
	//CURRENTLY NOT TAKING PHONE NUMBERS BUT WANT TO KEEP THE VALIDATION CODE FOR FUTURE REF -validating phone number
	//$customer_phone = $_POST["phone"];
	//$numbers_only = numbers_only($customer_phone);
	//$numbers_of_digits = strlen($numbers_only);
	//if ($numbers_of_digits != 10)
	//	die("Please enter a valid phone number with area code, e.g.(512) 555-5555");
	// validating credit card #
}

//Sets the price of the salsa to the jar size chosen
// if ($salsa_size == "half-pint")
// 	$salsa_price = $half_pint;
// elseif ($salsa_size == "pint")
// 	$salsa_price = $pint;
// elseif ($salsa_size == "quart")
// 	$salsa_price = $quart;
//Multiply the quantity times the price of the size of the jar chosen
// CURRENTLY ONLY SELLING PINTS
$amount = $pint * $quantity;
$subtotal = $amount / 100 ;

?>