 <?php
      error_reporting(E_ALL); 
      
    // First we must import the actual message360 library
          require_once '../../library/message360.php';
          
          // Now what we need to do is instantiate the library 
         // $Message360 = Message360::getInstance();
           $Message360 = Message360API\Lib\Message360::getInstance();
          
          // Message360 REST API credentials are required
          $Message360 -> setOptions(array(
            'account_sid' => 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX' ,
            'auth_token' => 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXX' ,
            'response_to_array' => true ,
          ));

        try {
       
          // Fetch Account
          $createLetter = $Message360->create('Letter', 'create', array(
            'to' => 'XXXXXXXXXXX',                   //required
            'from' => 'XXXXXXXXXXX',                 //required
            'file' => '@FULL_PATH_OF_FILE',          //required      
           
            'Attachbyid' => 'Attachbyid',            //required either attachbyid or file
            'Color' => 'true',                       //required
            'Extraservices' => '',                   //optional
            'Description' => 'XXXXXXX',              //optional
            'Doublesided' => 'true',                 //optional
            'Template' => '1',                       //optional
            'Htmldata' => 'Htmldata'));              //optional

          print_r($createLetter->getResponse());
        } catch (Message360_Exception $e) {
          echo "Error : " . $e->getMessage();
    } 

?>


