<?php
	require 'stripe-php/lib/Stripe.php';

	if ($_POST) {
	  Stripe::setApiKey("sk_0D3gcdNkpSVula64o5eWDwcDuFsRb");
	  $error = '';
	  $success = '';
	  try {
	  	echo $_POST['stripeToken'];
	  	echo 'bullshit';
	    if (!isset($_POST['stripeToken']))
	      throw new Exception("The Stripe Token was not generated correctly");
	    Stripe_Charge::create(array("amount" => 500,
	                                "currency" => "usd",
	                                "card" => $_POST['stripeToken']));
	    $success = 'Your payment was successful.';
	  }
	  catch (Exception $e) {
	    $error = $e->getMessage();
	  }
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link type="image/png" rel="shortcut icon" href="resources/tomato_Favicon.png"/>
	<script type="text/javascript" src="https://js.stripe.com/v1/"></script>
	<!-- jQuery is used only for this example; it isn't required to use Stripe -->
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	 <!-- <script type="text/javascript" src="./credit_card/orderFormValidation.js"></script> -->
	<script type="text/javascript">
	    // this identifies your website in the createToken call below
	    Stripe.setPublishableKey('pk_0D3gylaUGbd2faTL8wYRu1htuBR4k');

	    function stripeResponseHandler(status, response) {
        	if (response.error) {
                    // re-enable the submit button
                    $('.submit-button').removeAttr("disabled");
                    // show the errors on the form
                    $(".payment-errors").html(response.error.message);
                } else {
                    var form$ = $("#payment-form");
                    // token contains id, last4, and card type
                    var token = response['id'];
                    // insert the token into the form so it gets submitted to the server
                    form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
                    // and submit
                    form$.get(0).submit();
                }
            }

            $(document).ready(function() {
                $("#payment-form").submit(function(event) {
                    // disable the submit button to prevent repeated clicks
                    $('.submit-button').attr("disabled", "disabled");
                    // createToken returns immediately - the supplied callback submits the form if there are no errors
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                    return false; // submit from callback
                });
            });

            if (window.location.protocol === 'file:') {
                alert("stripe.js does not work when included in pages served over file:// URLs. Try serving this page over a webserver. Contact support@stripe.com if you need assistance.");
            }
	</script>
</head>
<body>

<!-- action="/dev.dadgumsalsa.com/dadgumOrderSuccess.php" onsubmit="return validateOrder();"-->
<form id="payment-form" action="" method="POST" onsubmit="return validateOrder();">
	<!-- to display errors returned by createToken -->
	<span class="payment-errors"><?= $error; ?></span>
	<span class="payment-success"><?= $success; ?></span>
	<div>
		<h1>Welcome to the Dad Gum Order Page</h1>
			<p class="paragraph">Please fill in the form below completely and then press Submit Payment<p/>
		<br />
	</div>
	<div class="form-row">
		<label>Pint $5 - </label>
		<label>Qty</label>
		<input type="text" name="quantity"/>
	</div>
	<br />
    <div class="customer_info">
		<label>Full Name</label>
			<input type="text" name="fullname" />
		<label>Email</label>
			<input type="text" name="email" />
			<br />
    	<label>Address</label>
			<input type="text" name="address" size="35" />
			<br />
		<label>City</label>
			<input type="text" name="city" />
        <label>State</label>
			<input type="text" name="state" size="2" maxlength="2" />
		<label>Zip Code</label>
			<input type="text" name="zipcode" />
    </div>
    <br />
    <!-- Beginning of Credit Card Info-->
    <div class="card_info">
        <label>Card Number</label>
        <input type="text" maxlength="24" size="24" autocomplete="off" class="card-number" id="card-number"/>
		<br />
    	<label>Card Name</label>
		<select tabindex="11" class="card-name" id="card-name">
		<option value="NULL">Card Name</option>
		<option value="Visa">Visa</option>
		<option value="AmEx">American Express</option>
		<option value="Discover">Discover</option>
		<option value="MasterCard">MasterCard</option>
		<option value="CarteBlanche">Carte Blanche</option>
		<option value="DinersClub">Diners Club</option>
		<option value="EnRoute">enRoute</option>
		<option value="JCB">JCB</option>
		<option value="Maestro">Maestro</option>
		<option value="Solo">Solo</option>
		<option value="Switch">Switch</option>
		<option value="VisaElectron">Visa Electron</option>
		<option value="LaserCard">Laser</option>
		</select>
		<br />
        <label>CVC</label>
        <input type="text" size="4" autocomplete="off" class="card-cvc" id="card-cvc"/>
        <br />
        <label>Expiration (MM/YYYY)</label>
        <select class="card-expiry-month" id="card-expiry-month">
        	<option>MM</option>
			<?php
				for($i = 1; $i < 13; $i++)
				{ 
					echo '<option>' . $i . '</option>'; 
				} 
			?>
		</select>
        <span> / </span>
        <select class="card-expiry-year" id="card-expiry-year">
        	<option>YYYY</option>
			<?php
				for($i = 2012; $i < 2020; $i++)
				{ 
					echo '<option>' . $i . '</option>'; 
				} 
			?>
		</select>
    </div>
    <br />
    <button type="submit" class="submit-button" id="submit-button">Submit Payment</button>
</form>

</body>
</html>