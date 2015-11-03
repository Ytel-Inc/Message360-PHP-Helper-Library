<?php
# First we must import the actual Message360 library
require_once '../../library/message360.php';
# Now what we need to do is instantiate the library and set the required options defined above
$Message360 = Message360::getInstance();
# Ytel REST API credentials are required
$Message360 -> setOptions(array( 
  	'account_sid'       => 'xxxxxxx', 
    'auth_token'        => 'xxxxxxx',
    'response_to_array' => true,        
));
try 
{
  	 # delete an recording
     $deleteRecording = $Message360->delete('Recording','DeleteRecordingAPI',array('recordingSid'=>'xxxxxxx'));
	 # Print content of the recording object
	 echo "<pre>";
	 print_r($deleteRecording->getResponse());    
} 
catch (Message360_Exception $e) 
{
    echo "Error occured: " . $e->getMessage() . "\n";   
}
?>

