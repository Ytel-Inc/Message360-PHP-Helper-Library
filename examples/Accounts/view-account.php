<?php
// First we must import the actual Message360 library
require_once '../../library/message360.php';
// Now what we need to do is instantiate the library and set the required options defined above
$Message360 = Message360API\Lib\Message360::getInstance();
// Message360 REST API credentials are required
$Message360 -> setOptions(array( 
    'account_sid'       => 'YT94c49d220e5a45dc516f9733460460f5', 
    'auth_token'        => '53ee61684ef2a3805fb4721dfdf9672f',
    'response_to_array' =>true,
));

try 
{    
    // Fetch Account
    $viewAccount = $Message360->get('accounts','viewaccount');
    // Print content of the $viewAccount objects
    print_r($viewAccount->getResponse());
} 
catch (Message360_Exception $e) 
{
  echo "Error occured: " . $e->getMessage() . "\n";
}
?>
