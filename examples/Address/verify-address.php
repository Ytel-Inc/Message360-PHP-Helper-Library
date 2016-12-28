<?php
// First we must import the actual Message360 library
require_once '../../library/message360.php';
// Now what we need to do is instantiate the library and set the required options defined above
$Message360 = Message360API\Lib\Message360::getInstance();
// Message360 REST API credentials are required
$Message360 -> setOptions(array( 
    'account_sid'       => 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX', 
    'auth_token'        => 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXX',
    'response_to_array' =>true,
));

try 
{    
    // Fetch Verify Address
   $verifyAddress = $Message360->create('Address','verifyAddress', array(
                                                                    'AddressId' => 'XXXXXXXXXXXXXXXXXXXXXXXX'
                                                                    ));
    // Print content of the $verifyAddress objects
    print_r($verifyAddress->getResponse());
} 
catch (Message360_Exception $e) 
{
    echo "Error occured: " . $e->getMessage() . "\n";
}
?>
