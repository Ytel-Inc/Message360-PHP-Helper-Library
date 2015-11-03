<?php
ini_set("display_errors",1);
#To use this program  :  You must download the libraries and move this example to examples directory.
# First we must import the actual Message360 library
require_once '../../library/message360.php';

# Now what we need to do is instantiate the library and set the required options defined above
$Message360 = Message360::getInstance();

# Message360 REST API credentials are required
$Message360 -> setOptions(array( 
    'account_sid'       => "XXXXX", 
    'auth_token'        => "XXXXX",
    'response_to_array' =>true
	));

try
{
    # Fetch listParticipant    
    $listParticipant = $Message360->listAll('Conferences','listParticipantAPI',array(
    'Page'=>'1',
    'PageSize'=>'5',
    'deaf'=>'',
    'Muted'=>'',
    'conferenceid'=>'XXXXX',
	));
  # Print content of the listParticipant objects
  foreach($listParticipant->getResponse() as $ParticipantList) 
  { 
     print_r($ParticipantList);
  }

} 
catch (Message360_Exception $e) 
{
  echo "Error occured: " . $e->getMessage() . "\n";
}

?>
