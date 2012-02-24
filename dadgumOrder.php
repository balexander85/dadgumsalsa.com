<?php
require_once("stripe-php/lib/Stripe.php");

if ($_POST) {
  Stripe::setApiKey("a49cCmr3rdkXurgHSdoiMWAr9WWsiGNG");
  $error = '';
  $success = '';
  try {
    if (!isset($_POST['stripeToken']))
      throw new Exception("The Stripe Token was not generated correctly");
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


<?php include "dadGumHeader.php";?>


<div id="order">


</div>
		
	<h1>Charge $10 with Stripe</h1>
    <!-- to display errors returned by createToken -->
    <span class="payment-errors"><?= $error ?></span>
    <span class="payment-success"><?= $success ?></span>
    <form action="" method="POST" id="payment-form">
        <div class="form-row">
            <label>Card Number</label>
            <input type="text" size="20" autocomplete="off" class="card-number" />
        </div>
        <div class="form-row">
            <label>CVC</label>
            <input type="text" size="4" autocomplete="off" class="card-cvc" />
        </div>
        <div class="form-row">
            <label>Expiration (MM/YYYY)</label>
            <input type="text" size="2" class="card-expiry-month"/>
            <span> / </span>
            <input type="text" size="4" class="card-expiry-year"/>
        </div>
        <button type="submit" class="submit-button">Submit Payment</button>
    </form>


<!--<form action="index.php" method="POST" id="payment-form">
    
	<div>
	<h3>Welcome to the Dad Gum Order Page</h3>
	<h5>Please fill in the form below completely and then press Submit Payment</h5>
	</div>
	<br />
    <div class="form-row">
        <label>Card Number</label>
        <input type="text" size="20" autocomplete="off" class="card-number"/>
    </div>
    <br />
    <div class="form-row">
        <label>CVC</label>
        <input type="text" size="4" autocomplete="off" class="card-cvc"/>
    </div>
    <br />
    <div class="form-row">
        <label>Expiration (MM/YYYY)</label>
        <input type="text" size="2" class="card-expiry-month"/>
        <span> / </span>
        <input type="text" size="4" class="card-expiry-year"/>
    </div>
    <br />
    <button type="submit" class="submit-button">Submit Payment</button>
</form>-->


<?php include "dadGumFooter.php";?>
