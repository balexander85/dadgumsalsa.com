<html>
<head></head>
<body>

<?php
$customer_first = $_POST["firstname"];
$customer_last = $_POST["lastname"];
$customer_email = $_POST["email"];
$customer_phone = $_POST["phone"];
$salsa_size = $_POST["salsa-size"];
$quantity = $_POST["quantity"];
?>

<!--<table border="1px">
<tr>
<td>Last Name</td>
<td>First Name</td>
<td>Email</td>
<td>Phone</td>
<td>Salsa Size</td>
<td>Quantity</td>
</tr>
<tr>
<td><?php echo $customer_last; ?></td>
<td><?php echo $customer_first; ?></td>
<td><?php echo $customer_email; ?></td>
<td><?php echo $customer_phone; ?></td>
<td><?php echo $salsa_size; ?></td>
<td><?php echo $quantity; ?></td>
</tr>
</table>-->
<html>
<head></head>
<body>
<h1>Thank you for ordering salsa from Dad Gum Salsa Co.</h1>
<pre>Dear <?php echo $customer_first, " ", $customer_last; ?>,
     
     Thanks again for ordering from DGS. This is only a confirmation that you ordered <?php echo $quantity, " ", $salsa_size; if ($quantity != "1"){echo "s";}?> of salsa. 
You will receive an email shortly informing you when you should expect to receive your salsa. If anything does 
not look correct or you have any questions or comments, please email me at <a href="mailto:brian@dadgumsalsa.com">brian@dadgumsalsa.com</a>.

Love,

DGS</pre>
</body>
</html>
