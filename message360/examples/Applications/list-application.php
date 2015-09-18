<?php
# First we must import the actual Message360 library
require_once '../../library/message360.php';
# Now what we need to do is instantiate the library and set the required options defined above
$Message360 = Message360::getInstance();
# Ytel REST API credentials are required
$Message360 -> setOptions(array( 
    'account_sid'       => 'xxxxx', 
   'auth_token'        => 'xxxxx', 
    	'response_to_array' => true,      
));
try 
{
   	# Fetch applications
    $applications = $Message360->listAll('Application','listApplicationAPI',array(
    				'Page'=> '0',//'{Page}',
    				'PageSize'=> '10',//'{PageSize}',
    				'FriendlyName'=>''//'{FriendlyName}'
					));       
   # Print content of the application objects
  	foreach($applications->getResponse() as $application) 
 	  { 
        print_r($application);
    }
    
} 
catch (Message360_Exception $e) 
{
    echo "Error occured: " . $e->getMessage() . "\n";   
}
?>
