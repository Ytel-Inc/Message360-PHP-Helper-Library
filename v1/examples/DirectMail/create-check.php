<?php
# First we must import the actual Message360 library
require_once '../../library/message360.php';

# Now what we need to do is instantiate the library and set the required options defined above
$Message360 = Message360::getInstance();
# Message360 REST API credentials are required
$Message360 -> setOptions(array( 
   	'account_sid' => 'xxxx', 
	'auth_token' => 'xxxx', 
    	'response_to_array' => true, 
));

try 
{ 

   $file='@'.realpath('/home/xoyal/Desktop/check-file-template.pdf'); //for local  file
   $logo='@'.realpath('/home/xoyal/Desktop/check_logo.png');  // for local file logo

  # Fetch createChecks
  $createChecks = $Message360->create('Checks', 'create', array(
      'Description' => '{Description}',
      'Checknumber' => '{Checknumber}',
      'BankAccount' => '{BankAccount}', //bankaccountSid 
      'To'	=> '{to}', //To address
      'Amount' => '{AMOUNT}',
      'Memo' => '{Memo}',
      'Logo' =>$logo, //URL
      'Message'=>'{Message}', //either message or file, choose one
      'File'=>$file, // URL and either message or file, choose one
      'HtmlData'=>'{key:value}'
    ));
    
   # Print content of the createChecks objects
    print_r($createChecks->getResponse());
} 
catch (Message360_Exception $e) 
{
    echo "Error occured: " . $e->getMessage() . "\n";
}
?>
