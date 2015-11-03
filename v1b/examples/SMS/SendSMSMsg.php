<?php
echo "HIII";
# First we must import the actual Message360 library
require_once '../../library/message360.php';

# Now what we need to do is instantiate the library and set the required options defined above
$Message360 = Message360::getInstance();

# Message360 REST API credentials are required
$Message360 -> setOptions(array( 
    'accountsid'       => 'YT94c49d220e5a45dc516f9733460460f5', 
    'authtoken'        => '53ee61684ef2a3805fb4721dfdf9672f',
    'response_to_array' =>true,
 ));


try 
{
   # Fetch Send SMS
//for($i=0;$i<500;$i++)
//{
   $sendSMS = $Message360->create('sms','sendsms', array(
              'from'   => '9495350301',
              'to'  => '9492366569',
              'body' => 'Hi Test @ "'.date('Y-m-d H:i:s').'"',
          ));
    # Print content of the $sendSMS objects
echo "<pre>";
  print_r($sendSMS->getResponse());
//}
}
catch (Message360_Exception $e) 
{
    echo "Error occured: " . $e->getMessage() . "\n";
}
?>
