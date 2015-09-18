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
	/*'account_sid'   => '{account_sid}', 
    'auth_token'      => '{auth_token}',*/     
));
try 
{
   	# Fetch List Destinations
    $listDestinations = $Message360->listAll('FraudControl','listDestinationsAPIS',array(
    				'Page'=>1,//'{Page}',
    				'PageSize'=>10,//'{PageSize}',    				
					));      
   # Print content of the listDestinations objects
   	echo "<pre>";
  	foreach($listDestinations->getResponse() as $listDestination) 
 	{ 
        print_r($listDestination);
    }
    
} 
catch (Message360_Exception $e) 
{
    echo "Error occured: " . $e->getMessage() . "\n";   
}
?>
