<?php
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
   	# Fetch recordings   
    $recordings = $Message360->listAll('Recording','ListRecordingAPI',array(
    				'Page'=>'0',
    				'PageSize'=>'10',
    				'DateCreated'=>'2014-12-31',
    				'CallSid'=>'xxxxxxx',    				
					));      
    # Print content of the recording object
    echo "<pre>";
 	foreach($recordings->getResponse() as $recording) 
 	{ 
        print_r($recording);
    }    
} 
catch (Message360_Exception $e) 
{
    echo "Error occured: " . $e->getMessage() . "\n";   
}
?>