<?php

# First we must import the actual Message360 library
require_once '../../library/message360.php';

# Now what we need to do is instantiate the library and set the required options defined above
$Message360 = Message360::getInstance();

# Message360 REST API credentials are required
$Message360 -> setOptions(array( 
    'account_sid'       => 'xxxx', //Your Account Sid 
    'auth_token'        => 'xxxx', //Your Authentication Token 
    'response_to_array' => true,       
));
try 
{
	 $sendMail = $Message360->create('EmailAddress','sendemailapi', array(
      'to'   => '{To}', // Ex. For multiple recipients use 'example1@example.com,example2@example.com'
      'cc'	=>	'{Cc}', // Ex. For multiple recipients use 'example1@example.com,example2@example.com'
      'bcc'	=>	'{Bcc}', // Ex. For multiple recipients use 'example1@example.com,example2@example.com'
      'subject'  => '{Subject}',
      'type'  => '{Type}', // Ex. text or html
      'from'  => '{From}',
      'message'  => '{Message}',// Ex.  urlencode($message);
      'attachment[0]'=> '{FULL_PATH_FILE}', // Ex.  '@'.realpath('/home/xoyal/Desktop/pm2.png');
      'attachment[1]'=> '{FULL_PATH_FILE}', // Ex.  '@'.realpath('/home/xoyal/Desktop/pm2.png');
  ));    
  
   # Print content of the send mail object
    print_r($sendMail->getResponse());
} 
catch (Message360_Exception $e) 
{
  echo "Error occured: " . $e->getMessage() . "\n";   
}
?>
