function validateForm()
{
	var quantity = document.forms["orderForm"]["quantity"].value;
	if (!quantity.match(/^\d+$/))
	{
		alert("Not a valid number of jars");
		return false;
	}
	var full_name = document.forms["orderForm"]["fullname"].value;
	if (!full_name.match(/[A-Za-z]+/))
	{
		alert("Please enter your full name");
		return false;
	}
	var email = document.forms["orderForm"]["email"].value;
	if (!email.match(/.+@.+\.[a-z]+/))
	{
		alert("Not a valid e-mail address");
		return false;
	}
	var address = document.forms["orderForm"]["address"].value;
	if (!address.match(/\S+/))
	{
		alert("Please enter your full address");
		return false;
	}
	var city = document.forms["orderForm"]["city"].value;
	if (!city.match(/[A-Za-z]+/))
	{
		alert("Please enter your city name");
		return false;
	}
	var state = document.forms["orderForm"]["state"].value;
	if (!state.match(/^[A-Za-z]{2}$/))
	{
		alert("Not a valid State abbreviation");
		return false;
	}
	var zip_code = document.forms["orderForm"]["zipcode"].value;
	if (!zip_code.match(/^\d{5}$/))
	{
		alert("Not a valid zip code, only 5 digit zips, e.g. 78745");
		return false;
	}
	var card_number = document.forms["orderForm"]["card-number"].value;
	if (!card_number.match(/^\d{13,24}$/))
	{
		alert("Please enter a valid credit card number.");
		return false;
	}
	var card_cvc = document.forms["orderForm"]["card-cvc"].value;
	if (!card_cvc.match(/^\d{3,4}/))
	{
		alert("Please enter a valid cvc number.");
		return false;
	}
	var month_exp = document.forms["orderForm"]["card-expiry-month"].value;
	if (!month_exp.match(/^\d+$/))
	{
		alert("Please select an expiration month.");
		return false;
	}
	var year_exp = document.forms["orderForm"]["card-expiry-year"].value;
	if (!year_exp.match(/^\d+$/))
	{
		alert("Please select an expiration year.");
		return false;
	}
	if (!validateCredit())
	{
		return false
	}
}
function validateCredit()
{
	alert('chea');
	return false;

}

