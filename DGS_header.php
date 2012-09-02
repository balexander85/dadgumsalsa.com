<?php
    $urlValue = $_SERVER['REQUEST_URI'];
    $base = "Dad Gum Salsa";
    $about_pattern = '/about/i';
    $blog_pattern  = '/blog/i';
    $order_pattern  = '/order./i';
    $contact_pattern = '/contact/i';

    if (preg_match($blog_pattern, $urlValue)) {
        $page = "Photo Blog";
    } elseif (preg_match($about_pattern, $urlValue)) {
        $page = "About DGS";
    } elseif (preg_match($order_pattern, $urlValue)) {
        $page = "Order Page";
    } elseif (preg_match($contact_pattern, $urlValue)) {
        $page = "Contact Info";
    } else {
        $page = "Home";
    }

    $title = $base ." | ". $page;

	require 'stripe-php/lib/Stripe.php';

	if ($_POST) {
	  Stripe::setApiKey("sk_0D3gcdNkpSVula64o5eWDwcDuFsRb");
	  $error = '';
	  $success = '';
	  try {
	  	echo $_POST['stripeToken'];
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
    <link type="image/png" rel="shortcut icon" href="images/tomato_Favicon.png"/>
    <meta name="author" content="Brian Alexander" />
    <meta name="description" content="Dad Gum Salsa Coming Soon!" />
    <meta name="keywords" content="Dad Gum, Salsa, Dad Gum Salsa, Chips and Salsa" />  
    <title><?php print $title; ?></title>
    <!--Cascading Style Sheets for this Dad'Gum Website--> 
    <link rel="stylesheet" type="text/css" href="DGSstyle.css" />
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
<div class="main-frame">