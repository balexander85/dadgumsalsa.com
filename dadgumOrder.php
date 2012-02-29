<?php include "processing_order.php";?>

<?php include "dadGumHeader.php";?>

<div id="order">

</div>

<!-- to display errors returned by createToken -->
<span class="payment-errors"><?= $error ?></span>
<span class="payment-success"><?= $success ?></span>
<form action="" method="POST" id="payment-form">
	<div>
	<h1>Welcome to the Dad Gum Order Page</h1>
	<p class="paragraph">Please fill in the form below completely and then press Submit Payment<p/>
	<p id="note">Note: I will only fill orders that I can hand deliver at the moment, I will try to work on shipping orders soon.</p>
	<br />
	</div>
	<div class="form-row">
		<label>Salsa Size:</label>
		<select name="salsa-size">
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
