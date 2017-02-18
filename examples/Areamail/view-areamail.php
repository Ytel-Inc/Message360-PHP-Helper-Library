<?php

// First we must import the actual Message360 library
require_once '../../library/message360.php';
// Now what we need to do is instantiate the library and set the required options defined above
$Message360 = Message360API\Lib\Message360::getInstance();
// Message360 REST API credentials are required
$Message360->setOptions(array(
    'account_sid' => 'XXXXXXXXXXXXXXXXXXXXXXXXXXX',
    'auth_token' => 'XXXXXXXXXXXXXXXXXXXXXXXXXXX',
    'response_to_array' => true,
));

try {
    // Fetch View areamail
    $viewareamail = $Message360->create('Areamail', 'viewareamail', array(
        'areamailid' => 'XXXXXXXXXXXXXX'  //required
    ));
    // Print content of the $viewletter objects
    print_r($viewareamail->getResponse());
} catch (Message360_Exception $e) {
    echo "Error occured: " . $e->getMessage() . "\n";
}
?>
