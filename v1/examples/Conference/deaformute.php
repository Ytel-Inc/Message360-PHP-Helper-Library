<?php

#To use this program  :  You must download the libraries and move this example to examples directory.
# First we must import the actual Message360 library
require_once '../../library/message360.php';

# Now what we need to do is instantiate the library and set the required options defined above
$Message360 = Message360::getInstance();

# Message360 REST API credentials are required
$Message360 -> setOptions(array( 
    'account_sid'       => "XXXXXX", 
    'auth_token'        => "XXXXX",
    'response_to_array' =>true
	));
try
{
    # Fetch listParticipant    
    $DeafMuteParticipant = $Message360->listAll('Conferences','DeafMuteParticipantAPI',array(
    'Conferenceid'=>'XXXXX',
    'Participantid'=>'XXXXX',
    #true or falls optional value
    'Muted'=>true,
    #true or falls optional values
    'Deaf'=>true,
   	));
  # Print content of the listParticipant objects
  foreach($DeafMuteParticipant->getResponse() as $List) 
  { 
     print_r($List);
  }
} 
catch (Message360_Exception $e) 
{
  echo "Error occured: " . $e->getMessage() . "\n";
}

?>
