<?php
require_once '../../library/message360.php';
// Now what we need to do is instantiate the library and set the required options defined above
$Message360 = Message360API\Lib\Message360::getInstance();
// Message360 REST API credentials are required
$Message360 -> setOptions(array( 
        'account_sid'       => 'xxxxxxxxxxxxxxxx', 
    'auth_token'        => 'xxxxxxxxxxxxxxxx',
    'response_to_array' => true,      
));
try 
{
    //Available phone numbers parameters
    $releaseNumber = $Message360->listAll('incomingphone', 'releaseNumber', array(
        'phonenumber' => 'xxxxxxxxxx'
    ));

    $response = $releaseNumber->getResponse();
} 
catch (Message360_Exception $e) 
{
    echo "Error occured: " . $e->getMessage() . "\n";   
}
?>
