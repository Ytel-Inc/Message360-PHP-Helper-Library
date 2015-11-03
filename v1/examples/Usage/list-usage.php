<?php
# First we must import the actual Message360 library
require_once '../../library/message360.php';
# Now what we need to do is instantiate the library and set the required options defined above
$Message360 = Message360::getInstance();
# Ytel REST API credentials are required
$Message360 -> setOptions(array( 
    'account_sid'       => 'xxxx', 
    'auth_token'        => 'xxxx', 
    'response_to_array' => true, 
));
try 
{
   	# Fetch Usage
    $usage = $Message360->listAll('Usage','lists',array(
    				'search'=>'all',//Ex. inbound or outbound
    				'start_month'=>'{start_month}'//'05-2015'
					));      
   # Print content of the $usage objects
   echo "<pre>";
    foreach($usage->getResponse() as $usages) 
 	{ 
        print_r($usages);
    }
} 
catch (Message360_Exception $e) 
{
    echo "Error occured: " . $e->getMessage() . "\n";   
}
?>
