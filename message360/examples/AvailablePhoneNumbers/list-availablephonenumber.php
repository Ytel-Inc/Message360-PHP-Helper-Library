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
	/*'account_sid'       => '{account_sid}', 
    'auth_token'        => '{auth_token}',*/       
));
try 
{
   	# Fetch Available Numbers   	
   	$AvailablePhoneNumbers = $Message360->listAll('AvailablePhoneNumbers','ListAvailableNumbersAPI',array(
    			'AreaCode'=>'800',
    			'Region'=>'CA',
    			'numberrequest' =>'10',
    			//'Contains'=>'1',
				));     
    # Print content of the AvailablePhoneNumbers object 
    
    echo "<pre>";
	foreach($AvailablePhoneNumbers->getResponse() as $AvailablePhoneNumber) 
 	{ 
        print_r($AvailablePhoneNumber);
    }
} 
catch (Message360_Exception $e) 
{
    echo "Error occured: " . $e->getMessage() . "\n";   
}
?>
