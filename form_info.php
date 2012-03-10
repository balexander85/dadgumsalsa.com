<?php

//Assigning the price to the different sizes of jars
$half_pint = 599;
$pint = 799;
$quart = 1299;
//Assigns the customer's information including salsa size and the number of jars selected
$customer_first = $_POST["firstname"];
$customer_last = $_POST["lastname"];
$customer_email = $_POST["email"];
$customer_phone = $_POST["phone"];
$salsa_size = $_POST["salsa-size"];
$quantity = $_POST["quantity"];
//Sets the price of the salsa to the jar size chosen
if ($salsa_size == "half-pint")
	$salsa_price = $half_pint;
elseif ($salsa_size == "pint")
	$salsa_price = $pint;
elseif ($salsa_size == "quart")
	$salsa_price = $quart;
//Multiply the quantity times the price of the size of the jar chosen
$amount = $salsa_price * $quantity;
$subtotal = $amount / 100 ;

?>