<?php
require_once '../../library/message360.php';
// Now what we need to do is instantiate the library and set the required options defined above
$Message360 = Message360::getInstance();
// Message360 REST API credentials are required
$Message360 -> setOptions(array( 
   	'account_sid'       => 'YT94c49d220e5a45dc516f9733460460f5', 
    'auth_token'        => '53ee61684ef2a3805fb4721dfdf9672f',
    'response_to_array' => true,      
));
try 
{
   	// Fetch phone number details
    $incomingNumbers = $Message360->delete('Incomingphone','releaseNumber',array('23233232323'));      
   	// Print content of the phone number  objects
   	foreach($incomingNumbers->getResponse() as $incomingNumber) 
 	{ 
        print_r($incomingNumber);
    }
} 
catch (Message360_Exception $e) 
{
    echo "Error occured: " . $e->getMessage() . "\n";   
}
?>