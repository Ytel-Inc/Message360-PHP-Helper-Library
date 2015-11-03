<?php
# First we must import the actual Message360 library
require_once '../../library/message360.php';

# Now what we need to do is instantiate the library and set the required options defined above
$Message360 = Message360::getInstance();
# Message360 REST API credentials are required
$Message360 -> setOptions(array( 
   	'account_sid' => 'xxxx', 
	    'auth_token' => 'xxxx', 
    'response_to_array' => true, 
));

try 
{
  $file='@'.realpath('/home/xoyal/Desktop/letters-template1.pdf');
  # Fetch createLetter
  $CreateLetter = $Message360->create('Letters','create', array(
	  	      'From'=>'{from}',
		      'To' =>'{to}',
		      'FILE' => $file,  // local Or URL file 
		      'Color' => 'true',  // boolean true or false 
		      'Description'=> '{description}',
		      'Extraservice' => '{Extraservice}',	// certified Or registered
		      'Doublesided'=>'false',
		      'Template' => 'true',  // default true
		));
   # Print content of the createLetter objects
   	echo "<pre>";
    print_r($CreateLetter->getResponse());
} 
catch (Message360_Exception $e) 
{
    echo "Error occured: " . $e->getMessage() . "\n";
}

/*
 Note: We can send letters using two color 'Black and white' means false and 'Color' means true by default true 
 
 	Extra services:
                	this service provide delivery traking by domestic used certified and international registered. certified only used in United states. 
*/
?>
