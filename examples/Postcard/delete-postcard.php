<?php
// First we must import the actual Message360 library
require_once '../../library/message360.php';
// Now what we need to do is instantiate the library and set the required options defined above
$Message360 = Message360API\Lib\Message360::getInstance();
// Message360 REST API credentials are required
$Message360 -> setOptions(array( 
    'account_sid'       => '36ba3e5f-00a6-72fd-a290-710128dcbc7a', 
    'auth_token'        => '66e3265cce023fd2537a19f9d85837ef',
    'response_to_array' =>true,
));

try 
{    
    // Fetch delete postcard
   $deletepostcard = $Message360->listAll('Postcard','deletepostcard', array(
   'postcardid' => 'psc_d1a45935d493c2a8'  //required
));
    // Print content of the $viewpostcard objects
    print_r($deletepostcard->getResponse());
} 
catch (Message360_Exception $e) 
{
    echo "Error occured: " . $e->getMessage() . "\n";
}
?>
