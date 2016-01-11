<?php
// First we must import the actual Message360 library
require_once '../../library/message360.php';
// Now what we need to do is instantiate the library and set the required options defined above
$Message360 = Message360API\Lib\Message360::getInstance();
// Message360 REST API credentials are required
$Message360 -> setOptions(array( 
   	'account_sid'       => 'xxxxxxxxxxxxxxxx', 
    'auth_token'        => 'xxxxxxxxxxxxxxxx',
    'response_to_array' => true,      
));
try 
{  
	  //For all Methods you can use GET or POST
	  $updateIncomingPhoneNumber = $Message360->update('Incomingphone','updateNumber', array(
					'FriendlyName' => 'Test',	   
					'PhoneNumber'  => 'XXXXXXXXXX',		    
			        'VoiceUrl' => 'http://test.example.com/test.php',
			        'VoiceMethod' => 'POST',
			        'VoiceFallbackUrl' => 'http://test.example.com/test.php',
			        'VoiceFallbackMethod' => 'POST',
			        'HangupCallback' => 'HagupcallbackUs',
			        'HangupCallbackMethod' => 'POST',
			        'HeartbeatUrl' => 'http://test.example.com/test.php',
			        'HeartbeatMethod' => 'POST',
			        'SmsUrl' => 'http://test.example.com/test.php',
			        'SmsMethod' => 'POST',
			        'SmsFallbackUrl' => 'http://test.example.com/test.php',
			        'SmsFallbackMethod' => 'POST',
			        'VoiceCallerIdLookup' =>'true',
    ));
	// Print content of the incoming phone number object
	print_r($updateIncomingPhoneNumber->getResponse());
} 
catch (Message360_Exception $e) 
{
    echo "Error occured: " . $e->getMessage() . "\n";   
}
?>