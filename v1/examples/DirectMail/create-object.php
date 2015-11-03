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
  $file='@'.realpath('/home/xoyal/Desktop/Objects_200.pdf'); // Local file
  # Fetch CreateObject
  $CreateObject = $Message360->create('Objects','create', array(
	  	      'Description'=>'{Description}',
		      'File' => $file, // Url File or Upload File
		      'Setting' =>'200', 
		));

   # Print content of the CreateObject objects
   echo "<pre>";
   print_r($CreateObject->getResponse());
} 
catch (Message360_Exception $e) 
{
    echo "Error occured: " . $e->getMessage() . "\n";
}


/*
  Note: We can create object with diffrent size format
 
4x6 Color Card	200,201
4x6 Premium Color Card	203
5x7 Folded Greeting Card	304
8x10 Semi-gloss Poster	305
11x17 Semi-gloss Poster	306
24x36 Semi-gloss Poster	307
5x7 Gloss Photo	501
8x10 Gloss Photo	502
4x4 Gloss Photo	503
8x8 Gloss Photo	504
 
*/
?>
