<?php
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
	# Fetch DeleteBankaccounts
    $DeleteBankaccounts = $Message360->get('Bankaccounts','delete',array('Id'=>'{BankID}'));
	
	# Print content of the DeleteBankaccounts objects
	print_r($DeleteBankaccounts->getResponse());
} 
catch (Message360_Exception $e) 
{
    echo "Error occured: " . $e->getMessage() . "\n";
}
?>
