<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
# First we must import the actual Message360 library
require_once '../../library/message360.php';

# Now what we need to do is instantiate the library and set the required options defined above
$Message360 = Message360::getInstance();
# Message360 REST API credentials are required
$Message360 -> setOptions(array( 
  	    'account_sid'       => 'xxxx', 
	    'auth_token'        => 'xxxx',    
	    'response_to_array' => true,     
	));
try 
{
  # Fetch deleteAddress	    
  $deleteAddress = $Message360->delete('addresses','delete',array('addressSid'=>'{AddressID}'));
  # Print content of the deleteAddress objects
  echo "<pre>";
  print_r($deleteAddress->getResponse());
} 
catch (Message360_Exception $e)
{
  echo "Error occured: " . $e->getMessage() . "\n";
}
?>
