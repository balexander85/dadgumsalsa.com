<?php include "dadGumHeader.php";?>

<div id="order_photo">

</div>
<div id="order_form">
	<!-- to display errors returned by createToken -->
	<span class="payment-errors"><?= $error ?></span>
	<span class="payment-success"><?= $success ?></span>
	<form action="dadgumOrderSuccess.php" method="POST">
		<div>
		<h1>Welcome to the Dad Gum Order Page</h1>
		<p class="paragraph">Please fill in the form below completely and then press Submit Payment<p/>
		<br />
		</div>
		<div class="form-row">
			<label>Pint $6.99 - </label>
			<!--Right now only doing one size
			<label>Salsa Size:</label>
			<select name="salsa-size">
			<option value="" name="">Please Select Size</option>
			<option value="half-pint" name="half-pint">Half Pint ($5.99)</option>
			<option value="pint" name="pint">Pint ($7.99)</option>
			<option value="quart" name="quart">Quart ($12.99)</option>
			</select>-->
			<label>Qty</label>
			<input type="text" name="quantity" />
		</div>
		<br />
	    <div class="customer_info">
			<label>Full Name</label>
			<input type="text" name="fullname" />
			<label>Email</label>
			<input type="text" name="email" />
			<br />
	    	<label>Address</label>
			<input type="text" name="address" size="35"/>
			<br />
			<label>City</label>
			<input type="text" name="city" />
	        <label>State</label>
			<input type="text" name="state" size="2" maxlength="2"/>
			<label>Zip Code</label>
			<input type="text" name="zipcode" />
	    </div>
	    <br />
	    <!-- Beginning of Credit Card Info-->
	    <div class="card_info">
	        <label>Card Number</label>
	        <input type="text" size="20" autocomplete="off" class="card-number" id="CardNumber" />
			<br />
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
			<br />
	        <label>CVC</label>
	        <input type="text" size="4" autocomplete="off" class="card-cvc" />
	        <br />
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
	    <button type="submit" class="submit-button" >Submit Payment</button>
	</form>
</div>

<?php include "dadGumFooter.php";?>
