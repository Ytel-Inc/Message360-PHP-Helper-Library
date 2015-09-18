<?php
# First we must import the actual Message360 library
require_once '../../library/message360.php';
# Now what we need to do is instantiate the library and set the required options defined above
$Message360 = Message360::getInstance();
# Ytel REST API credentials are required
$Message360 -> setOptions(array( 
    'account_sid'       => 'xxxx-xxxxxx-xxxxxx', 
    'auth_token'        => 'xxxx-xxxxxx-xxxxxx',
    'response_to_array' => true, 
));
try 
{
	 # Update application
	  $updateApplication = $Message360->update('Application','createApplicationAPI', array(
	  	'ApplicationSid' => '',//'{ApplicationSid}',
	  	
		 'FriendlyName'   => '',//'{Application Name}',
        'VoiceUrl'  => '',//'{Voice Url}',
        'VoiceMethod'  => '',//'{Voice Method}', 
        'VoiceFallbackUrl'  => '',//'{VoiceFallBackUrl}',
        'VoiceFallbackMethod'  => '',//'{Voice Fallback Method}',
        'HangupCallback'  => '',//'{Hangup Callback}',
        'HangupCallbackMethod'  => '',//'{Hangupcallback Method}',
        'HeartbeatUrl'  => '',//'{Heartbeat Url}',
        'HeartbeatMethod'  => '',//'{Heartbeat Url }',
        'SmsUrl'  => '',//'{Sms Url}',
        'SmsMethod'  => '',//'{Sms Method}',
        'SmsFallbackUrl'  => '',//'{Smsfallback Url}',
        'SmsFallbackMethod'  => '',//'{Sms Fallback Method}',
        'VoiceCallerIdLookup'  => '',//'{Voice CallerId Lookup}',
    ));
	# Print content of the application object
	print_r($updateApplication->getResponse());
} 
catch (Message360_Exception $e) 
{
    echo "Error occured: " . $e->getMessage() . "\n";   
}
?>
