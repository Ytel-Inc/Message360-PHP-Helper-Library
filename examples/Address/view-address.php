<?php
// First we must import the actual Message360 library
require_once '../../library/message360.php';
// Now what we need to do is instantiate the library and set the required options defined above
$Message360 = Message360API\Lib\Message360::getInstance();
// Message360 REST API credentials are required
$Message360 -> setOptions(array( 
     'account_sid'       => 'cbc6a0b5-c113-a6e4-4f96-53366a7c9966', 
    'auth_token'        => '5964d5de074084894ff57f7771b296c3',
    'response_to_array' =>true,
));

try 
{    
    // Fetch View SMS
   $viewAddress = $Message360->create('Address','viewAddress', array(
'AddressId' => 'xxxxxxxxxxxxxxx'
));
    // Print content of the $viewSMS objects
    print_r($viewAddress->getResponse());
} 
catch (Message360_Exception $e) 
{
    echo "Error occured: " . $e->getMessage() . "\n";
}
?>
