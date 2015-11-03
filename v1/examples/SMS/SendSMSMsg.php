<?php
# First we must import the actual Message360 library
require_once '../../library/message360.php';

# Now what we need to do is instantiate the library and set the required options defined above
$Message360 = Message360::getInstance();

# Message360 REST API credentials are required
$Message360 -> setOptions(array( 
       'account_sid'       => 'xxxxxx', 
    'auth_token'        => 'xxxxx',
    'response_to_array' =>true,
 ));


try 
{
   # Fetch Send SMS
   $sendSMS = $Message360->create('SMS','sendSMSMsg', array(
              'from'   => '{From_Number}',
              'to'  => '{To_Number}',
              'body' => '{text_Body}',
          ));
    # Print content of the $sendSMS objects
    print_r($sendSMS->getResponse());
}
catch (Message360_Exception $e) 
{
    echo "Error occured: " . $e->getMessage() . "\n";
}
?>
