<?php

// First we must import the actual message360 library
require_once '../../library/message360.php';

// Now what we need to do is instantiate the library 

$Message360 = Message360API\Lib\Message360::getInstance();

 // Message360 REST API credentials are required
     $Message360->setOptions(array(
    'account_sid' => 'XXXXXXXXXXXXXXXXXXXXXXXXXXX',
    'auth_token' => 'XXXXXXXXXXXXXXXXXXXXXXXXXXX',
    'response_to_array' => true,
));

try {
       $front = new CURLFile('Full_Path_Of_File');
       $back = new CURLFile('Full_Path_Of_File');
      
     
    // Fetch Account
    $create_areamail = $Message360->create('Areamail', 'createareamail', array(
        'routes' => 'XXXXXXXXXXXXXXXXXX',                         //required
        'front' => $front,                                    //required
        'back' => $back,                                      //required      
        'Attachbyid' => 'XXXXXXXXXXXXXXXXXX ',                //required either attachbyid or file
        'Description' => 'XXXXXXX',                           //optional
        'Htmldata' => 'Htmldata'));                           //optional

    print_r($create_areamail->getResponse());
} catch (Message360_Exception $e) {
    echo "Error : " . $e->getMessage();
}
?>


