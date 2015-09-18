<?php
# First we must import the actual message360 library
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
	$front='@'.realpath('/home/xoyal/Desktop/Lob attachements sample files/areafront.pdf'); // local file
	$back='@'.realpath('/home/xoyal/Desktop/Lob attachements sample files/areaback.pdf');  //local file
    # Fetch createAreamail
  $createAreamail = $Message360->create('areamail', 'create', array(
      'Routes' => '{Routes}',
      'Front' => $front,
      'Back' => $back,
      'Description'=>'{Description}',
      'TargetType' => 'all',//all Or residential
    ));
    
   # Print content of the createAreamail objects
    print_r($createAreamail->getResponse());
} 
catch (Message360_Exception $e) 
{
    echo "Error occured: " . $e->getMessage() . "\n";
}
?>
