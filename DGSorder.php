<?php include "process_order.php"; ?>
<?php include "DGS_header.php"; ?>

<img class="left-image" src="images/DGS_tomato.png" alt="Dad Gum Salsa Title" />
<!-- action="/dev.dadgumsalsa.com/dadgumOrderSuccess.php" onsubmit="return validateOrder();"-->
<form id="payment-form" class="main-content" action="" method="POST" onsubmit="return validateOrder();">
<!-- to display errors returned by createToken -->
<span class="payment-errors"><?= $error; ?></span>
<span class="payment-success"><?= $success; ?></span>
<div>
	<h1>Welcome to the Dad Gum Order Page</h1>
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

<?php include "DGS_footer.php";?>