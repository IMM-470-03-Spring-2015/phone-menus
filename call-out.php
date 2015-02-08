<?php
// Get the PHP helper library
require_once('./Services/Twilio.php');
 
// Your Account Sid and Auth Token from twilio.com/user/account
$sid = "ACc97cde1b267c161a9e1d2f916b75d22b"; 
$token = "7ecd6a0f68a4eb7128cdfbfe146ba8f1"; 

$connection = new Services_Twilio($sid, $token);
 
$call = $connection->account->calls->create(
        "+12675363902", // from #
        "+12152642459", // to #
        "http://www.tcnj.edu/~thompsom/imm-470-03/voice-menus/basic-voice.xml", // TwiML file to target after connection
        array() // see Twilio REST API docs for details on other parameters
);

echo $call->sid;
?>