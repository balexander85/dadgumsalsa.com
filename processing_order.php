<?php
require_once("stripe-php/lib/Stripe.php");

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
//Elements of the email to be sent to the customer saying that their order is being processed
$subject = "Processing Order";
if ($quantity != "1")
       $salsa_size = $salsa_size."s";
$message = "<html>
<head></head>
<body>
<h1>Thank you for ordering salsa from Dad Gum Salsa Co.</h1>
<pre>Dear $customer_first $customer_last,
     
     Thanks again for ordering from DGS. This is only a confirmation that you ordered $quantity $salsa_size of salsa. 
You will receive an email shortly informing you when you should expect to receive your salsa. If anything does 
not look correct or you have any questions or comments, please email me at <a href='mailto:brian@dadgumsalsa.com'>brian@dadgumsalsa.com</a>.

Love,

DGS</pre>";
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
// Additional headers
$headers .= 'From: Dad Gum Orders<brian@dadgumsalsa.com>' . "\r\n";
$headers .= 'Cc: brian@dadgumsalsa.com' . "\r\n";
$headers .= 'Bcc: info@dadgumsalsa.com' . "\r\n";

//below is the php script that sends the charge immediately
if ($_POST) {
  Stripe::setApiKey("a49cCmr3rdkXurgHSdoiMWAr9WWsiGNG");
  $error = '';
  $success = '';
  try {
    if (!isset($_POST['stripeToken']))
      throw new Exception("The Stripe Token was not generated correctly");
  	mail ($customer_email, $subject, $message, $headers);
    //Below is commented out, but is used for troubleshooting
    //echo "Amount:", $amount, "<br />";
    //echo "Salsa Price:", $salsa_price, "<br />";
    //echo "Quantity:", $quantity;
    //echo "message should have been a success";
    //exit();
    Stripe_Charge::create(array("amount" => $amount,
                                "currency" => "usd",
                                "card" => $_POST['stripeToken']));
    $success = 'Your payment was successful.';
  }
  catch (Exception $e) {
    $error = $e->getMessage();
  }
}
?>