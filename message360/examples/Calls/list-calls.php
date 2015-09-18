<?php
#To use this program  :  You must download the libraries and move this example to examples directory.

# First we must import the actual Message360 library
require_once '../../library/message360.php';
# Now what we need to do is instantiate the library and set the required options defined above
$Message360 = Message360::getInstance();
# Message360 REST API credentials are required
$Message360 -> setOptions(array( 
  'account_sid'       => 'xxxxx', 
    'auth_token'        => 'xxxx', 
));
try 
{
# Fetch calls
  $calls = $Message360->post('calls','listcalls',array(
    				'id'=>'',
					'Page'=>'',
					'PageSize'=>'',
					'to'=>'',
					'from'=>'',
					'status'=>''
					));      
# Print content of the calls objects
 print_r($calls->getResponse());
} 
catch (Message360_Exception $e) 
{
   echo "Error occured: " . $e->getMessage() . "\n";   
}


















