<?php include "processing_order.php";?>

<?php include "dadGumHeader.php";?>

<?php 

//Elements of the email to be sent to the customer saying that their order is being processed
$subject = "Processing Order";
if ($quantity != "1")
       $salsa_size = $salsa_size."s";
$message = "<html>
<head></head>
<body>
<h1>Thank you for ordering salsa from Dad Gum Salsa Co.</h1>
<pre>Dear $customer_first $customer_last,
     
     Thanks again for ordering from DGS. This is only a confirmation that you ordered $quantity $salsa_size of salsa. 
You will receive an email shortly informing you when you should expect to receive your salsa. If anything does 
not look correct or you have any questions or comments, please email me at <a href='mailto:brian@dadgumsalsa.com'>brian@dadgumsalsa.com</a>.

Love,

DGS</pre>";
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
// Additional headers
$headers .= 'From: Dad Gum Orders<order@dadgumsalsa.com>' . "\r\n";
$headers .= 'Cc: order@dadgumsalsa.com' . "\r\n";
$headers .= 'Bcc: brian@dadgumsalsa.com' . "\r\n";

//echo "About to send that email";
//exit();
//mail ($customer_email, $subject, $message, $headers);
?>

<div id="order_placed">

</div>

<h1>Thank you for ordering salsa from Dad Gum Salsa Co.</h1>
<pre style="color: #FFFFFF">
Dear <?php echo $customer_first, " ", $customer_last; ?>,

Thanks again for ordering from DGS. This is only a confirmation that you ordered <?php echo $quantity, " ", $salsa_size;?> of salsa. 
You will receive an email shortly informing you when you should expect to receive your salsa. If anything does not look correct or 
you have any questions or comments, please email me at <a href='mailto:brian@dadgumsalsa.com'>brian@dadgumsalsa.com</a>.

Love,

DGS</pre>

<?php include "dadGumFooter.php";?>