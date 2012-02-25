<?php
require_once("stripe-php/lib/Stripe.php");

//Assigning the price to the different sizes of jars
$half_pint = 599;
$pint = 799;
$quart = 1299;
//Assigns the salsa size and the number of jars selected
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
//below is the php script that sends the charge immediately
if ($_POST) {
  Stripe::setApiKey("a49cCmr3rdkXurgHSdoiMWAr9WWsiGNG");
  $error = '';
  $success = '';
  try {
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

<?php include "dadGumHeader.php";?>

<div id="order">

</div>

<!-- to display errors returned by createToken -->
<span class="payment-errors"><?= $error ?></span>
<span class="payment-success"><?= $success ?></span>
<form action="" method="POST" id="payment-form">
	<div>
	<h3>Welcome to the Dad Gum Order Page</h3>
	<p class="paragraph">Please fill in the form below completely and then press Submit Payment<p/>
	<p id="note">Note: I will only fill orders that I can hand deliver at the moment, I will try to work on shipping orders soon.</p>
	<br />
	</div>
	<div class="form-row">
		<label>Salsa Size:</label>
		<select name="salsa-size">
		<option value="half-pint">Half Pint ($5.99)</option>
		<option value="pint">Pint ($7.99)</option>
		<option value="quart">Quart ($12.99)</option>
		</select>
		<label>Quantity</label>
		<input type="text" name="quantity" />
	</div>
	<br />
	<div class="form-row">
		<label>First name</label>
		<input type="text" name="firstname" />
		<label>Last name</label>
		<input type="text" name="lastname" />
	</div>
	<div class="form-row">
		<label>Email</label>
		<input type="text" name="email" />
        <label>Phone</label>
		<input type="text" name="phone" />
    </div>
    <br />
    <!-- Beginning of info that is not saved by me, aka Credit Card Info-->
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
    <br />
    <button type="submit" class="submit-button">Submit Payment</button>
</form>

<?php include "dadGumFooter.php";?>
