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
));
try 
{
  	 # View recording details
     $viewRecording = $Message360->get('Recording','ViewRecordingAPI',array('recordingSid'=>'643b12ae-90d3-11e4-8e6c-05831ba05873'));
	# Print content of the recording object
	echo "<pre>";
	 print_r($viewRecording->getResponse());    
} 
catch (Message360_Exception $e) 
{
    echo "Error occured: " . $e->getMessage() . "\n";   
}
?>