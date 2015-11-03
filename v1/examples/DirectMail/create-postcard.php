<?php
# First we must import the actual Message360 library
require_once '../../library/message360.php';

# Now what we need to do is instantiate the library and set the required options defined above
$Message360 = Message360::getInstance();
# Message360 REST API credentials are required
$Message360 -> setOptions(array( 
       	   'Account_sid'       => 'xxxx', 
	    'Auth_token'        => 'xxxx', 
    	'response_to_array' => true, 
));

try 
{   
$before = microtime(true);
     $front='@'.realpath('/home/xoyal/Desktop/4x6_postcard.pdf'); // for localhost file     
     $back='@'.realpath('/home/xoyal/Desktop/4x6_postcard.pdf');// for localhost file
    # Fetch createPostcard
  $createPostcard = $Message360->create('Postcard','create', array(
	  	'From'=>'{from}', // Addresses_Sid
	    	'To'  => '{to}', // Addresses_Sid
		//'attachebyid'=>'psc_fae2a8f0787d3145',		
		'Front' =>$front,  // either message or back, choose one 
		'Back'   =>$back,  // either message or back, choose one 
		'Htmldata'=>'{key:value}',			
		//'message' => 'Hi Customer',  // either message or back, choose one 
		'Description'  =>'{Description}',  //Wish u happy new year..
		'settinG'=>'1001', // defualt 1001

		));
   # Print content of the createPostcard objects
   	echo "<pre>";
    print_r($createPostcard->getResponse());
$after = microtime(true);

echo "<br>Time:".number_format(($after-$before),4)." Seconds";
} 
catch (Message360_Exception $e) 
{
    echo "Error occured: " . $e->getMessage() . "\n";
}

/*

Note: We can send postcard by using two different setting type
  1. 4x6 .jpg, .pdf , .png file its default value is '1001'
  2. 6x4 .jpg, pdf, png file its value is '1002'
*/
?>
