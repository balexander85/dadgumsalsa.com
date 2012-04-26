<?php
  require 'stripe-php/lib/Stripe.php';
  // This includes all the info that is submitted through the form
  include "form_info.php";

  if ($_POST) {
    Stripe::setApiKey("dhkYkhcDnJvCR3WIJ5BLsLDDJJAmwWYE");
    $error = '';
    $success = '';
    try {
      if (!isset($_POST['stripeToken']))
        throw new Exception("The Stripe Token was not generated correctly");
      //Below is commented out, but is used for troubleshooting
      //echo "Amount:", $amount, "<br />";
      //echo "Salsa Price:", $salsa_price, "<br />";
      //echo "Quantity:", $quantity;
      //exit();
      Stripe_Charge::create(array("amount" => 1000,
                                  "currency" => "usd",
                                  "card" => $_POST['stripeToken']));
      $success = 'Your payment was successful.';
    }
    catch (Exception $e) {
      $error = $e->getMessage();
    }
  }

?>