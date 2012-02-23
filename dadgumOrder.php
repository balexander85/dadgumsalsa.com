<?php include "dadGumHeader.php";?>

<?php
/*
phpinfo();
*/
?>


<div id="order">


</div>
<form action="index.php" method="POST" id="payment-form">
    
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
</form>


<?php include "dadGumFooter.php";?>
