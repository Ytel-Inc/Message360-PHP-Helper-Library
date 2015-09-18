<?php
# First we must import the actual Message360 library
require_once '../../library/message360.php';
# Now what we need to do is instantiate the library and set the required options defined above
$Message360 = Message360::getInstance();
# Ytel REST API credentials are required
$Message360 -> setOptions(array( 
   	'account_sid'       => 'YT00ca6c65c3a1e86de8a4172d04fffe7e', 
    'auth_token'        => 'afe896f533418d6b47055793b0b05495',
    'response_to_array' => true, 
	/*'account_sid'       => '{account_sid}', 
    'auth_token'        => '{auth_token}',*/       
));
try 
{
  	 # view ncoming phone number details
     $incomingNumber = $Message360->get('Incomingphone','ViewIncomingPhoneNumbersAPI',array('incomingPhoneNumberSid'=>'2c9d447a2460423cb6da831e8459baa1'));
	 # Print content of the incoming phone number object
	 
	 echo "<pre>";
	 print_r($incomingNumber->getResponse());    
} 
catch (Message360_Exception $e) 
{
    echo "Error occured: " . $e->getMessage() . "\n";   
}
?>

