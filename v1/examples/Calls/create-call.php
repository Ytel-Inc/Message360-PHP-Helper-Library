<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
#To use this program  :  You must download the libraries and move this example to examples directory.

# First we must import the actual Message360 library
require_once '../../library/message360.php';

# Now what we need to do is instantiate the library and set the required options defined above

$Message360 = Message360::getInstance();
# Message360 REST API credentials are required
$Message360 -> setOptions(array( 
   'account_sid'       => 'xxxxxxx', 
   'auth_token'        => 'xxxxxxx',    
   'response_to_array' => true,
));
try 
{
# Make Call
$call = $Message360->create('Calls','makeCall', array(
        'To' => '{To}',
        'From'   => '{From}',
        'Url'  => '{Url}',
        'Method'  => '{Method}',
        'StatusCallback'  => '{StatusCallback}',
        'StatusCallbackMethod'  => '{StatusCallBackMethod}',
        'FallbackUrl'  => '{FallBackUrl}',
        'FallbackMethod'  => '{FallBackMethod}',
        'HeartbeatUrl'  => '{HearBeatUrl}',
        'HeartbeatMethod'  => '{HeartBeatMethod}',
        'ForwardedFrom'  => '{FOrwardFrom}',
        'Timeout'  => '{TimeOut}',
        'PlayDtmf'  => '{PlayDtmf}',
        'HideCallerId'  => '{HideCallerId}',
        'Record'  => '{Record}',
        'RecordCallback'  => '{RecordCallBack}',
        'RecordCallbackMethod'  => '{RecordCallBackMethod}',
        'Transcribe'  => '{Transcribe}',
        'TranscribeCallback'  => '{Transcribe}',
        'TranscribeQuality'  => '{TranscribeQuality}',
        'StraightToVoicemail'  => '{STraightToVoiceemail}',
        'IfMachine'  => '{IfMachine}',
        'IfMachineUrl'  => '{IfMachineUrl}',
        'IfMachineMethod'  => '{IfMachineMethod}',
    ));
# Print content of the calls objects
echo '<pre>';
print_r($call->getResponse());
} 
catch (Message360_Exception $e) 
{
   echo "Error occured: " . $e->getMessage() . "\n";   
}

