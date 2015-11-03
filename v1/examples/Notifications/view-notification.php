<?php
# First we must import the actual Message360 library
require_once '../../library/message360.php';

# Now what we need to do is instantiate the library and set the required options defined above
$Message360 = Message360::getInstance();

# Message360 REST API credentials are required
$Message360 -> setOptions(array( 
    'account_sid'       => $account_sid, 
    'auth_token'        => $auth_token,
    'response_to_array' =>true,
	));
try 
{
	# Fetch viewNotification    
    $viewNotification = $Message360->get('Notification','viewNotificationAPI',array('NotificationSid'=>'{NotificationSid}'));
	
	# Print content of the viewNotification objects
	print_r($viewNotification->getResponse());
} 
catch (Message360_Exception $e) 
{
 echo "Error occured: " . $e->getMessage() . "\n";
}
?>