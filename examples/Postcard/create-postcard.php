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
    $createPostcard = $Message360->create('Postcard', 'createpostcard', array(
        'to' => 'XXXXXXXXXXXXXXXXXX',                         //required
        'from' => 'XXXXXXXXXXXXXXXXXX',                       //required
        'front' => $front,                                    //required
        'back' => $back,                                      //required      
        'Attachbyid' => 'XXXXXXXXXXXXXXXXXX ',                //required either attachbyid or file
        'Setting' => '1001',                                  //required   
        'Message' => 'XXXXXXXX',                              //required either by message or back
        'Description' => 'XXXXXXX',                           //optional
        'Htmldata' => 'Htmldata'));                           //optional

    print_r($createPostcard->getResponse());
} catch (Message360_Exception $e) {
    echo "Error : " . $e->getMessage();
}
?>


