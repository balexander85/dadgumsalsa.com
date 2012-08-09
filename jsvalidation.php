<html>
<head>
<script type="text/javascript" src="./js/orderFormValidation.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v1/"></script>
<script type="text/javascript">
    // this identifies your website in the createToken call below
    Stripe.setPublishableKey('YOUR_PUBLISHABLE_KEY');
    ...
</script>
</head>
<body>

<!--return validateForm(); action="/dev.dadgumsalsa.com/dadgumOrderSuccess.php" method="POST" id="payment-form"-->
<form name="orderForm" onsubmit="return validateForm();" method="POST">
	<!-- to display errors returned by createToken -->
	<span class="payment-errors"><?= $error ?></span>
	<span class="payment-success"><?= $success ?></span>
	<div>
		<h1>Welcome to the Dad Gum Order Page</h1>
			<p class="paragraph">Please fill in the form below completely and then press Submit Payment<p/>
		<br />
	</div>
	<div class="form-row">
		<label>Pint $5 - </label>
		<label>Qty</label>
		<input type="text" id="quantity" required="required"/>
	</div>
	<br />
    <div class="customer_info">
		<label>Full Name</label>
			<input type="text" id="fullname" required="required" />
		<label>Email</label>
			<input type="text" id="email" required="required" />
			<br />
    	<label>Address</label>
			<input type="text" id="address" size="35" required="required" />
			<br />
		<label>City</label>
			<input type="text" id="city" required="required" />
        <label>State</label>
			<input type="text" id="state" size="2" maxlength="2" required="required" />
		<label>Zip Code</label>
			<input type="text" id="zipcode" required="required" />
    </div>
    <br />
    <!-- Beginning of Credit Card Info-->
    <div class="card_info">
        <label>Card Number</label>
        <input id="card-number" type="text" maxlength="24" size="24" autocomplete="off" required="required" class="card-number"/>
		<br />
    	<label>Card Type</label>
		<select tabindex="11" id="CardType">
		<option value="Visa">Visa</option>
		<option value="AmEx">American Express</option>
		<option value="Discover">Discover</option>
		<option value="MasterCard">MasterCard</option>
		</select>
		<br />
        <label>CVC</label>
        <input id="card-cvc" type="text" size="4" autocomplete="off" required="required" class="card-cvc"/>
        <br />
        <label>Expiration (MM/YYYY)</label>
        <select id="card-expiry-month" class="card-expiry-month">
        	<option>MM</option>
			<?php
				for($i = 1; $i < 13; $i++)
				{ 
					echo '<option>' . $i . '</option>'; 
				} 
			?>
		</select>
        <span> / </span>
        <select id="card-expiry-year" class="card-expiry-year">
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
    <button type="submit" class="submit-button">Submit Payment</button>
</form>

</body>
</html>