/*
   If a credit card number is invalid, an error reason is loaded into the global ccErrorNo variable. 
   This can be be used to index into the global error  string array to report the reason to the user 
   if required:
   
   e.g. if (!checkCreditCard (number, name) alert (ccErrors(ccErrorNo);
*/

var ccErrorNo = 0;
var ccErrors = new Array ()

ccErrors [0] = "Unknown card type";
ccErrors [1] = "No card number provided";
ccErrors [2] = "Credit card number is in invalid format";
ccErrors [3] = "Credit card number is invalid";
ccErrors [4] = "Credit card number has an inappropriate number of digits";
ccErrors [5] = "Warning! This credit card number is associated with a scam attempt";
ccErrors [6] = "Please enter a valid cvc number.";
ccErrors [7] = "Please select an expiration month.";
ccErrors [8] = "Please select an expiration year.";

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
	
	var year_exp = document.forms["orderForm"]["card-expiry-year"].value;
	if (!year_exp.match(/^\d+$/))
	{
		alert("Please select an expiration year.");
		return false;
	}
	if (!validateCredit())
	{
		alert(ccErrors[ccErrorNo])
		return false
	}
}
function validateCredit()
{
	var card_number = document.forms["orderForm"]["card-number"].value;
	var len 	= card_number.length;
	var card_type = document.forms["orderForm"]["card-type"].value;
	var card_cvc = document.forms["orderForm"]["card-cvc"].value;
	var month_exp = document.forms["orderForm"]["card-expiry-month"].value;
	var year_exp = document.forms["orderForm"]["card-expiry-year"].value;

	// Array to hold the permitted card characteristics
	var cards = new Array();

	// Define the cards we support. You may add addtional card types as follows.
	//  Name:         As in the selection box of the form - must be same as user's
	//  Length:       List of possible valid lengths of the card number for the card
	//  prefixes:     List of possible prefixes for the card
	//  checkdigit:   Boolean to say whether there is a check digit
	cards [0] = {name: "Visa", 
	             length: "13,16", 
	             prefixes: "4",
	             checkdigit: true};
	cards [1] = {name: "MasterCard", 
	             length: "16", 
	             prefixes: "51,52,53,54,55",
	             checkdigit: true};
	cards [2] = {name: "DinersClub", 
	             length: "14,16", 
	             prefixes: "36,54,55",
	             checkdigit: true};
	cards [3] = {name: "CarteBlanche", 
	             length: "14", 
	             prefixes: "300,301,302,303,304,305",
	             checkdigit: true};
	cards [4] = {name: "AmEx", 
	             length: "15", 
	             prefixes: "34,37",
	             checkdigit: true};
	cards [5] = {name: "Discover", 
	             length: "16", 
	             prefixes: "6011,622,64,65",
	             checkdigit: true};
	cards [6] = {name: "JCB", 
	             length: "16", 
	             prefixes: "35",
	             checkdigit: true};
	cards [7] = {name: "enRoute", 
	             length: "15", 
	             prefixes: "2014,2149",
	             checkdigit: true};
	cards [8] = {name: "Solo", 
	             length: "16,18,19", 
	             prefixes: "6334,6767",
	             checkdigit: true};
	cards [9] = {name: "Switch", 
	             length: "16,18,19", 
	             prefixes: "4903,4905,4911,4936,564182,633110,6333,6759",
	             checkdigit: true};
	cards [10] = {name: "Maestro", 
	             length: "12,13,14,15,16,18,19", 
	             prefixes: "5018,5020,5038,6304,6759,6761,6762,6763",
	             checkdigit: true};
	cards [11] = {name: "VisaElectron", 
	             length: "16", 
	             prefixes: "4026,417500,4508,4844,4913,4917",
	             checkdigit: true};
	cards [12] = {name: "LaserCard", 
	             length: "16,17,18,19", 
	             prefixes: "6304,6706,6771,6709",
	             checkdigit: true};

	// Now remove any spaces from the credit card number
  	card_number = card_number.replace (/\s/g, "");
  	// Ensure that the user has provided a credit card type
  	if (card_type == 'NULL')
  	{
  		ccErrorNo = 0;
  		return false;
  	}
	// Ensure that the user has provided a credit card number
  	if (card_number.length == 0)
  	{
     	ccErrorNo = 1;
     	return false; 
  	}
  	// Check that the number is numeric
	if (!card_number.match(/^\d{13,19}$/))
	{
		ccErrorNo = 2;
	    return false; 
	}
	// Check it's not a spam number
  	if (card_number == '5490997771092064') 
  	{ 
    	ccErrorNo = 5;
    	return false; 
  	}
  	// Check CVC
	if (!card_cvc.match(/^\d{3,4}/))
	{
		ccErrorNo = 6;
		return false;
	}
	// Check Month
	if (!month_exp.match(/^\d+$/))
	{
		ccErrorNo = 7;
		return false;
	}
	// Check Year
	if (!year_exp.match(/^\d+$/))
	{
		ccErrorNo = 8;
		return false;
	}
	alert(card_type);

	return true;

}

