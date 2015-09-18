<?php
# First we must import the actual Message360 library
require_once '../../library/message360.php';
# Now what we need to do is instantiate the library and set the required options defined above
$Message360 = Message360::getInstance();
# Ytel REST API credentials are required
$Message360 -> setOptions(array( 
  	'account_sid'       => 'YT00ca6c65c3a1e86de8a4172d04fffe7e', 
    'auth_token'        => 'afe896f533418d6b47055793b0b05495',
    'response_to_array' => true, 
    
	/*'account_sid'       => '{account_sid}', 
    'auth_token'        => '{auth_token}',*/     
));
try 
{
	 # Whitelist Destination
	  $whitelist_destination = $Message360->create('FraudControl','whiteListDestinationAPIS', array(
        'countryCode'   => 'IN',//'{CountryCode}',//Ex. For United States : US
        'smsEnable'  => '1',//'{SmsEnable}',// Ex. 1 or 0
        'mobileEnabled'  => '1',//'{MobileEnabled}', //Ex. 1 or 0
        'LandlineEnabled'  => '1',//'{LandlineEnabled}',// Ex. 1 or 0               
    ));
	# Print content of the authorize_destination object
	 echo "<pre>";
	 print_r($whitelist_destination->getResponse());
} 
catch (Message360_Exception $e) 
{
    echo "Error occured: " . $e->getMessage() . "\n";   
}
?>
