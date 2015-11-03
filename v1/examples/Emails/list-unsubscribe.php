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
    $unsubscribes = $Message360->listAll('EmailAddress','listunsubscribeemailapi',array(
     'offset'=> '{Offset}',
     'limit'=>'{Limit}',
    )); 
		     
    # Print content of the list unsubscribes email address object
 	foreach($unsubscribes->getResponse() as $unsubscribe) 
 	{ 
        print_r($unsubscribe);
    }    
} 
catch (Message360_Exception $e) 
{
    echo "Error occured: " . $e->getMessage() . "\n";   
}
?>