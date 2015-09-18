<?php
## First we must import the actual Message360 library
require_once '../../library/message360.php';

# Now what we need to do is instantiate the library and set the required options defined above
$Message360 = Message360::getInstance();

# Message360 REST API credentials are required
$Message360 -> setOptions(array( 
    'account_sid'       => 'xxxx-xxxxxx-xxxxxx', 
    'auth_token'        => 'xxxx-xxxxxx-xxxxxx',
    'response_to_array' =>true,
	));

try 
{	# Fetch transcribeRecoring
    $transcribeRecoring = $Message360->create('Transcriptions','TranscribeRecordingAPI',array(
    			'recordingsid'=>''
				));
	# Print content of the transcribeRecoring objects		
	print_r($transcribeRecoring->getResponse());
} 
catch (Message360_Exception $e) 
{
  echo "Error occured: " . $e->getMessage() . "\n";
}
?>