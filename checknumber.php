<?php
// puck a random number
$number = 5;
$guess = $_REQUEST['Digits'];
$from = $_REQUEST['From'];

header("content-type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";

if($guess == $number){
    echo "<Response>";
    echo "<Say>Correct. The number was ".$number.". You win!</Say>";
    echo "</Response>";
} else {
    echo "<Response>";
    echo "<Say>Incorrect. Guess again.</Say>";
    echo "<Redirect method=\"POST\">http://www.tcnj.edu/~thompsom/imm-470-03/voice-menus/numbergame.xml</Redirect>";
    echo "</Response>";
}