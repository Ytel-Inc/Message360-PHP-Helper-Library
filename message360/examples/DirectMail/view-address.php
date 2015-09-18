<?php
# First we must import the actual Message360 library
require_once '../../library/message360.php';

# Now what we need to do is instantiate the library and set the required options defined above
$Message360 = Message360::getInstance();

# Message360 REST API credentials are required
$Message360 -> setOptions(array( 
    'Account_Sid'       => 'xxx', 
    'Auth_Token'        => 'xxx',    
    'response_to_array' => true, 
	));

try 
{
	# Fetch viewAddress    
    	$viewAddress = $Message360->get('Addresses','view',array('addressSid'=>'AddressID'));
	
	# Print content of the viewAddress objects
	echo "<pre>";
	print_r($viewAddress->getResponse());
} 
catch (Message360_Exception $e) 
{
    echo "Error occured: " . $e->getMessage() . "\n";
}
?>
