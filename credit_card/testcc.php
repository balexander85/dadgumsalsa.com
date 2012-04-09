<?php include "dadGumHeader.php"; ?>

<?php //include('class.creditcard.php'); ?>

<h1>Validate Credit Card</h1>
<form name="frmCC" action="testcc.php" method="post" id="payment-form">
<label>Cardholders name:</label> 
<input type="text" name="ccName" />
<br />
<label>Card number:</label> 
<input type="text" name="ccNum" />
<br />
<label>Expiry Date:</label>
<select name="ccExpM">
<?php
	for($i = 1; $i < 13; $i++){ 
		echo '<option>' . $i . '</option>'; 
	} 
?>
</select>
<select name="ccExpY">
<?php
	for($i = 2012; $i < 2020; $i++){ 
		echo '<option>' . $i . '</option>'; 
	} 
?>
</select>
<br />
<label>Card type:</label>
<select name="ccType">
<option value="1">mastercard</option>      
<option value="2">Visa</option>      
<option value="3">Amex</option>      
<option value="4">Diners</option>      
<option value="5">Discover</option>      
<option value="6">JCB</option>      
</select>  
<br />

<input type="submit" name="submit" value="Validate">

</form> 



<?php      
 if(!isset($submit))      
 {
 
 }      
 else      
 {      
   // Check if the card is valid      
   $cc = new CCreditCard($ccName, $ccType, $ccNum, $ccExpM, $ccExpY);      
          
      
   <h2>Validation Results</h2>      
   <b>Name: </b><?=$cc->Name(); ?>      
   <b>Number: </b><?=$cc->SafeNumber('x', 6); ?>      
   <b>Type: </b><?=$cc->Type(); ?>      
   <b>Expires: </b><?=$cc->ExpiryMonth() . '/' .      
   $cc->ExpiryYear();    
       
     echo '<font color="blue" size="2"><b>';       
      
     if($cc->IsValid())      
     echo 'VALID CARD';      
     else      
     echo 'INVALID CARD';      
      
     echo '</b></font>';      
 }      
?>


<?php include "dadGumFooter.php";?>