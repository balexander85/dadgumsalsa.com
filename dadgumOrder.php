<?php include "processing_order.php";?>

<?php include "dadGumHeader.php";?>

<div id="order">

</div>

<!-- to display errors returned by createToken -->
<span class="payment-errors"><?= $error ?></span>
<span class="payment-success"><?= $success ?></span>
<form action="dadgumOrderSuccess.php" method="POST" id="payment-form">
	<div>
	<h1>Welcome to the Dad Gum Order Page</h1>
	<p class="paragraph">Please fill in the form below completely and then press Submit Payment<p/>
	<p id="note">Note: I will only fill orders that I can hand deliver at the moment, I will try to work on shipping orders soon.</p>
	<br />
	</div>
	<div class="form-row">
		<label>Salsa Size:</label>
		<select name="salsa-size">
		<option value="" name="">Please Select Size</option>
		<option value="half-pint" name="half-pint">Half Pint ($5.99)</option>
		<option value="pint" name="pint">Pint ($7.99)</option>
		<option value="quart" name="quart">Quart ($12.99)</option>
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
    <!-- Beginning of Credit Card Info-->
    <div class="form-row">
        <label>Card Number</label>
        <input type="text" size="20" autocomplete="off" class="card-number" id="CardNumber" />
    </div>
    <div class="form-row">
    	<label>Card Type</label>
		<select tabindex="11" id="CardType">
		<option value="AmEx">American Express</option>
		<option value="CarteBlanche">Carte Blanche</option>
		<option value="DinersClub">Diners Club</option>
		<option value="Discover">Discover</option>
		<option value="EnRoute">enRoute</option>
		<option value="JCB">JCB</option>
		<option value="Maestro">Maestro</option>
		<option value="MasterCard">MasterCard</option>
		<option value="Solo">Solo</option>
		<option value="Switch">Switch</option>
		<option value="Visa">Visa</option>
		<option value="VisaElectron">Visa Electron</option>
		<option value="LaserCard">Laser</option>
		</select>
    </div>
    <div class="form-row">
        <label>CVC</label>
        <input type="text" size="4" autocomplete="off" class="card-cvc" />
    </div>
    <div class="form-row">
        <label>Expiration (MM/YYYY)</label>
        <select name="ccExpM" class="card-expiry-month">
		<?php
			for($i = 1; $i < 13; $i++){ 
				echo '<option>' . $i . '</option>'; 
			} 
		?>
		</select>
        <span> / </span>
        <select name="ccExpY" class="card-expiry-year">
		<?php
			for($i = 2012; $i < 2020; $i++){ 
				echo '<option>' . $i . '</option>'; 
			} 
		?>
		</select>
    </div>
    <br />
    <button type="submit" class="submit-button" onsubmit="testCreditCard();" >Submit Payment</button>
</form>

<?php include "dadGumFooter.php";?>
