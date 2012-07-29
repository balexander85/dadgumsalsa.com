$(function()
		{
			$("#payment-form").submit(function validateForm(event)
			{
				var quantity = event.currentTarget["quantity"].value;
				if (!quantity.match(/^\d+$/))
				{
					alert("Not a valid number of jars");
					return false;
				}

				var full_name = event.currentTarget["fullname"].value;
				if (!full_name.match(/\S+/))
				{
					alert("Please enter your full name");
					return false;
				}

				var email = event.currentTarget["email"].value;
				if (!email.match(/.+@.+\.[a-z]+/))
				{
					alert("Not a valid e-mail address");
					return false;
				}

				var address = event.currentTarget["address"].value;
				if (!address.match(/\S+/))
				{
					alert("Please enter your full address");
					return false;
				}

				var city = event.currentTarget["city"].value;
				if (!city.match(/[A-Za-z]+/))
				{
					alert("Please enter your city name");
					return false;
				}

				var state = event.currentTarget["state"].value;
				if (!state.match(/^[A-Za-z]{2}$/))
				{
					alert("Not a valid State abbreviation");
					return false;
				}

				var zip_code = event.currentTarget["zipcode"].value;
				if (!zip_code.match(/^\d{5}$/))
				{
					alert("Not a valid zip code, only 5 digit zips, e.g. 78746");
					return false;
				}

			});
		});

//Beginning of stripe info
// this identifies your website in the createToken call below
Stripe.setPublishableKey('pk_otfY90DnuhFBkkyRnbev0bQvmCV9h');

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

//End of stripe info




