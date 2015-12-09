<?php
// First we must import the actual Message360 library
require_once '../../library/message360.php';
// Now what we need to do is instantiate the library and set the required options defined above
$Message360 = Message360::getInstance();
// Message360 REST API credentials are required
$Message360 -> setOptions(array( 
   	    'account_sid'       => 'xxxxxxxxxxxxxxxxx', 
	    'auth_token'        => 'xxxxxxxxxxxxxxxxx',
	    'response_to_array' => true,      
));
try 
{
  	 // view incoming phone number details
     $incomingNumber = $Message360->get('Incomingphone','viewNumber',array('xxxxxxxx'));
	 // Print content of the incoming phone number object
	 print_r($incomingNumber->getResponse());    
} 
catch (Message360_Exception $e) 
{
    echo "Error occured: " . $e->getMessage() . "\n";   
}
?>

