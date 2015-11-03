<?php
# First we must import the actual Message360 library
require_once '../../library/message360.php';
# Now what we need to do is instantiate the library and set the required options defined above
$Message360 = Message360::getInstance();
# Ytel REST API credentials are required
$Message360 -> setOptions(array( 
   	'account_sid'       => 'xxxxx', 
    'auth_token'        => 'xxxxx',
    'response_to_array' => true, 
));
try 
{
	 # Add new  number
	  $addIncomingNumber = $Message360->create('Incomingphone','createIncomingPhoneNumberAPI', array(
        'CountryCode'   => '{CountryCode}',
        'AreaCode'  => '{AreaCode}',
        'PhoneNumber'  => '{PhoneNumber}',
        'FriendlyName' => '{FriendlyName}',
        'VoiceUrl' => '{VoiceUrl}',
        'VoiceMethod' => '{VoiceMethod}',
        'VoiceFallbackUrl' => '{VoiceFallbackUrl}',
        'VoiceFallbackMethod' =>'{VoiceFallbackMethod}',
        'HangupCallback' => '{HangupCallback}',
        'HangupCallbackMethod' => '{HangupCallbackMethod}',
        'HeartbeatUrl' => '{HeartbeatUrl}',
        'HeartbeatMethod' => '{HeartbeatMethod}',
        'SmsUrl' => '{SmsUrl}',
        'SmsMethod' => '{SmsMethod}',
        'SmsFallbackUrl' => '{SmsFallbackUrl}',
        'SmsFallbackMethod' => '{SmsFallbackMethod}',
        'VoiceCallerIdLookup' =>'{VoiceCallerIdLookup}'    
      ));
	# Print content of the number object
	 echo "<pre>";
	 print_r($addIncomingNumber->getResponse());
} 
catch (Message360_Exception $e) 
{
    echo "Error occured: " . $e->getMessage() . "\n";   
}
?>
