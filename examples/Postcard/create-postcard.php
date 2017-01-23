<?php

// First we must import the actual message360 library
require_once '../../library/message360.php';

// Now what we need to do is instantiate the library 

$Message360 = Message360API\Lib\Message360::getInstance();

 // Message360 REST API credentials are required
          $Message360 -> setOptions(array(
            'account_sid' => '36ba3e5f-00a6-72fd-a290-710128dcbc7a' ,
            'auth_token' => '66e3265cce023fd2537a19f9d85837ef' ,
            'response_to_array' => true ,
          ));

try {
//    $front = new CURLFile('Full_Path_Of_File');
//    $back = new CURLFile('Full_Path_Of_File');
      
     $front = new  CURLFile('/home/xoyal/Downloads/postcard_manual_pdf.pdf');
     $back = new  CURLFile('/home/xoyal/Downloads/postcard_manual_pdf.pdf');
    // Fetch Account
    $createPostcard = $Message360->create('Postcard', 'createpostcard', array(
        'to' => 'adr_9d276589f23560b2',                       //required
        'from' => 'adr_9d276589f23560b2',                     //required
        'front' => $front,    
        'back' => $back,                                       //required      
        'Attachbyid' => 'psc_9d73d7aee37f71ab ',                //required either attachbyid or file
        'Setting' => '1001',                                  //required
        'Description' => 'XXXXXXX',                          //optional
        'Htmldata' => 'Htmldata'));                          //optional

    print_r($createPostcard->getResponse());
} catch (Message360_Exception $e) {
    echo "Error : " . $e->getMessage();
}
?>


