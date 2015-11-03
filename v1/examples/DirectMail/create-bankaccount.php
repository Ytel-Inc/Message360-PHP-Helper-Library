<?php
# First we must import the actual message360 library
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
  # Fetch createBankaccounts
  $createBankaccounts = $Message360->create('Bankaccounts', 'create', array(
      'Description' => '{Description}',
      'Routingnumber' => '{Routingnumber}', // bank routing number
      'Accountnumber' => '{Accountnumber}',
      'Bankaddress'=> '{bankaddress}', // AddressSid
      'Accountaddress' => '{accountaddress}', // AddressSid
      'Signatory' => '{signatory}', //signatory
    ));
    
   # Print content of the createBankaccounts objects
    echo '<pre>';	
    print_r($createBankaccounts->getResponse());
} 
catch (Message360_Exception $e) 
{
    echo "Error occured: " . $e->getMessage() . "\n";
}
?>
