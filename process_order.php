<?php
  function numbers_only($user_input) {
    $numbers = ereg_replace("[^0-9]", "", $user_input);
    return $numbers;
  }
  $pint = 500;
  require 'stripe-php/lib/Stripe.php';

  if ($_POST) {
    //validating that a user enters a quantity
    $quantity = $_POST["quantity"];
    $amount = $pint * $quantity;
    $customer_name = $_POST["fullname"];
    $customer_email = $_POST['email'];
    $customer_addr = $_POST["address"];
    $customer_city = $_POST["city"];
    $customer_state = $_POST["state"];
    $customer_zip = $_POST["zipcode"];

    Stripe::setApiKey("sk_0D3gcdNkpSVula64o5eWDwcDuFsRb");
    $error = '';
    $success = '';
    try {
      if (!preg_match("/\d+/",$quantity))
        throw new Exception("Please enter a valid number of salsa jars."." "."'".$quantity."'");
      if ($customer_name == NULL)
        throw new Exception("Please enter your full name.");
      if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$customer_email))
        throw new Exception("E-mail address not valid");
      if ($customer_addr == NULL)
        throw new Exception("Please enter your full address.");
      if ($customer_city == NULL)
        throw new Exception("Please fill in city.");
      if ($customer_state == NULL)
        throw new Exception("Please enter your state.");
      if ($customer_zip == NULL)
        throw new Exception("Please enter your zip code.");
      if (!isset($_POST['stripeToken']))
        throw new Exception("The Stripe Token was not generated correctly");
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