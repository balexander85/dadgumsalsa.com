<?php include "dadGumHeader.php";?>

<div id="order_placed">
	<h1>Thank you for ordering salsa from Dad Gum Salsa Co.</h1>
	<pre style="color: #FFFFFF">Dear Brian Alexander<?php echo $customer_first, " ", $customer_last; ?>,
	
	Thanks again for ordering from DGS. This is only a confirmation that you ordered <?php echo $quantity, " ", $salsa_size; if ($quantity != "1"){echo "s";}?> of salsa.
	You will receive an email shortly informing you when you should expect to receive your salsa. If anything does

		Love,

		DGS</pre>
</div>

<?php include "dadGumFooter.php";?>