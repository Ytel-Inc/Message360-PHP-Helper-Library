<?php 
# First we must import the actual Message360 library
require_once '../../library/message360.php';

# Now what we need to do is instantiate the library and set the required options defined above
$Message360 = Message360::getInstance();

$Message360 -> setOptions(array( 
    'account_sid'       => 'xxxxx', 
    'auth_token'        => 'xxxxx',
    'response_to_array' =>true,
	));

try 
{
  # Fetch Accounts    
  $accounts = $Message360->get('Accounts','viewAccountApi');
 
  # Print content of the Accounts objects
  foreach($accounts->getResponse() as $accountsList) 
  { 
     print_r($accountsList);
  }
} 
catch (Message360_Exception $e) 
{
  echo "Error occured: " . $e->getMessage() . "\n";
}
?>
