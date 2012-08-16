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

var fErrorNo = 0;
var fErrors = new Array ()

fErrors [0] = "Not a valid number of jars";
fErrors [1] = "Please enter your full name";
fErrors [2] = "Not a valid e-mail address";
fErrors [3] = "Please enter your full address";
fErrors [4] = "Please enter your city name";
fErrors [5] = "Not a valid State abbreviation";
fErrors [6] = "Not a valid zip code, only 5 digit zips, e.g. 78745";


function validateOrder()
{
	if (!validateForm())
	{
		alert(fErrors[fErrorNo]);
		return false;
	}
	if (!validateCredit())
	{
		alert(ccErrors[ccErrorNo]);
		return false;
	}

}
function validateForm()
{
	var quantity = document.forms["orderForm"]["quantity"].value;
	if (!quantity.match(/^\d+$/))
	{
		fErrorNo = 0;
		return false;
	}
	var full_name = document.forms["orderForm"]["fullname"].value;
	if (!full_name.match(/[A-Za-z]+/))
	{
		fErrorNo = 1;
		return false;
	}
	var email = document.forms["orderForm"]["email"].value;
	if (!email.match(/.+@.+\.[a-z]+/))
	{
		fErrorNo = 2;
		return false;
	}
	var address = document.forms["orderForm"]["address"].value;
	if (!address.match(/\S+/))
	{
		fErrorNo = 3;
		return false;
	}
	var city = document.forms["orderForm"]["city"].value;
	if (!city.match(/[A-Za-z]+/))
	{
		fErrorNo = 4;
		return false;
	}
	var state = document.forms["orderForm"]["state"].value;
	if (!state.match(/^[A-Za-z]{2}$/))
	{
		fErrorNo = 5;
		return false;
	}
	var zip_code = document.forms["orderForm"]["zipcode"].value;
	if (!zip_code.match(/^\d{5}$/))
	{
		fErrorNo = 6;
		return false;
	}

	return true;
}

function validateCredit()
{
	var card_number = document.forms["orderForm"]["card-number"].value;
	var len 	= card_number.length;
	var card_name = document.forms["orderForm"]["card-name"].value;
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
  	// Establish card type
	var cardType = -1;
	for (var i=0; i<cards.length; i++) 
	{
		// See if it is this card (ignoring the case of the string)
		if (card_name.toLowerCase () == cards[i].name.toLowerCase()) 
		{
			cardType = i;
			break;
		}
	}
	// If card type not found, report an error
	if (cardType == -1) 
	{
		ccErrorNo = 0;
		return false; 
	}

	// Ensure that the user has provided a credit card number
  	if (len == 0)
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
	// Now check the modulus 10 check digit - if required
	if (cards[cardType].checkdigit) 
	{
		var checksum = 0;                                  // running checksum total
		var mychar = "";                                   // next char to process
		var j = 1;                                         // takes value of 1 or 2

		// Process each digit one by one starting at the right
		var calc;
		for (i = card_number.length - 1; i >= 0; i--) 
		{

			// Extract the next digit and multiply by 1 or 2 on alternative digits.
			calc = Number(card_number.charAt(i)) * j;

			// If the result is in two digits add 1 to the checksum total
			if (calc > 9) 
			{
				checksum = checksum + 1;
				calc = calc - 10;
			}

			// Add the units element to the checksum total
			checksum = checksum + calc;

			// Switch the value of j
			if (j ==1) {j = 2} else {j = 1};
		} 

		// All done - if checksum is divisible by 10, it is a valid modulus 10.
		// If not, report an error.
		if (checksum % 10 != 0)  
		{
			ccErrorNo = 3;
			return false; 
		}
	}  	
	// Check it's not a spam number
  	if (card_number == '5490997771092064') 
  	{ 
    	ccErrorNo = 5;
    	return false; 
  	}
	// The following are the card-specific checks we undertake.
	var LengthValid = false;
	var PrefixValid = false; 
	var undefined;


	// We use these for holding the valid lengths and prefixes of a card type
	var prefix = new Array ();
	var lengths = new Array ();

	// Load an array with the valid prefixes for this card
	prefix = cards[cardType].prefixes.split(",");

	// Now see if any of them match what we have in the card number
	for (i=0; i<prefix.length; i++) 
	{
		var exp = new RegExp ("^" + prefix[i]);
		if (exp.test (card_number)) PrefixValid = true;
	}

	// If it isn't a valid prefix there's no point at looking at the length
	if (!PrefixValid) 
	{
		ccErrorNo = 3;
		return false; 
	}

	// See if the length is valid for this card
	lengths = cards[cardType].length.split(",");
	for (j=0; j<lengths.length; j++) 
	{
		if (card_number.length == lengths[j]) LengthValid = true;
	}

	// See if all is OK by seeing if the length was valid. We only check the length if all else was 
	// hunky dory.
	if (!LengthValid) 
	{
		ccErrorNo = 4;
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

	return true;

}

