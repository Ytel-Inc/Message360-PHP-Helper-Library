<?php
# First we must import the actual Message360 library
require_once '../../library/message360.php';

# Now what we need to do is instantiate the library and set the required options defined above
$Message360 = Message360::getInstance();
# Message360 REST API credentials are required
$Message360 -> setOptions(array( 
      'account_sid'       => 'xxxxx', 
    'auth_token'        => 'xxxxx',
    'response_to_array' => true, 
));

try 
{
  # Fetch CreatePrint
  $CreatePrint = $Message360->create('Job','create', array(
	  	      'description'=>'{description}',
		      'from' => '{from}',
		      'to' =>'{to}',
		      'object' =>'{object}', // you cand send multiple objects like 'obj_2a8302811d6b7ba6,obj_2a8302811d6b7ba7,...' 
		));

   # Print content of the createprint objects
   echo "<pre>";
   print_r($CreatePrint->getResponse());
} 
catch (Message360_Exception $e) 
{
    echo "Error occured: " . $e->getMessage() . "\n";
}
?>
