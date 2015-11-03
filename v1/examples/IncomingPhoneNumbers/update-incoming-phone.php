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
	 # Update incoming phone number
	  $updateIncomingPhoneNumber = $Message360->update('Incomingphone','updateIncomingPhoneNumberAPI', array(
					'FriendlyName' => 'MyNewNumberUs',//'{FriendlyName}',	   
					'PhoneNumber'  => '8002825639',//'{PhoneNumber}',		    
			        'VoiceUrl' => 'http://m360.ytel.com/voiceUs.php',//'{VoiceUrl}',
			        'VoiceMethod' => 'POST',//'{VoiceMethod}',
			        'VoiceFallbackUrl' => 'http://m360.ytel.com/voicefallbackUs.php',//'{VoiceFallbackUrl}',
			        'VoiceFallbackMethod' => 'POST',//'{VoiceFallbackMethod}',
			        'HangupCallback' => 'HagupcallbackUs',//'{HangupCallback}',
			        'HangupCallbackMethod' => 'POST',//'{HangupCallbackMethod}',
			        'HeartbeatUrl' => 'http://m360.ytel.com/hrtbeaturlUs.php',//'{HeartbeatUrl}',
			        'HeartbeatMethod' => 'POST',//'{HeartbeatMethod}',
			        'SmsUrl' => 'http://m360.ytel.com/smsurlUs.php',//'{SmsUrl}',
			        'SmsMethod' => 'POST',//'{SmsMethod}',
			        'SmsFallbackUrl' => 'http://m360.ytel.com/smsfallbackurlUs.php',//'{SmsFallbackUrl}',
			        'SmsFallbackMethod' => 'POST',//'{SmsFallbackMethod}',
			        'VoiceCallerIdLookup' =>'true',//'{VoiceCallerIdLookup}'   
         
        		   /*'FriendlyName'   => '{FriendlyName}',
				   'PhoneNumber'  => '{PhoneNumber}',    
        		   'VoiceUrl'  =>  '{VoiceUrl}',
        		   'VoiceMethod' => '{VoiceMethod}',
				   'VoiceFallbackUrl'  =>  '{VoiceFallbackUrl}',
				   'VoiceFallbackMethod'  =>  '{VoiceFallbackMethod}',
				   'HangupCallback'  =>  '{HangupCallback}',
				   'HangupCallbackMethod'  =>  '{HangupCallbackMethod}',
				   'HeartbeatUrl'  =>  '{HeartbeatUrl}',
				   'HeartbeatMethod'  => '{ HeartbeatMethod}',
				   'SmsUrl'  =>  '{SmsUrl}',
				   'SmsMethod'  =>  '{SmsMethod}',
				   'SmsFallbackUrl'  =>  '{SmsFallbackUrl}',
				   'SmsFallbackMethod'  =>  '{SmsFallbackMethod}',
				   'VoiceCallerIdLookup'  =>  '{VoiceCallerIdLookup}'*/
    ));
	# Print content of the incoming phone number object
	echo "<pre>";
	print_r($updateIncomingPhoneNumber->getResponse());
} 
catch (Message360_Exception $e) 
{
    echo "Error occured: " . $e->getMessage() . "\n";   
}
?>
