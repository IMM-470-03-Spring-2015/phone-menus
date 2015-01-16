<?php
header("content-type: text/xml");

/* Define voice attributes */
$voice = "alice";
$lang = "en-gb";

/* Define Menus */
$menus = array();
$menus['default'] = array('receptionist','hours', 'location', 'duck');
$menus['location'] = array('receptionist','east-bay', 'san-jose', 'marin');

/* Get the menu node, index, and url */
$node = isset($_REQUEST['node'])?$_REQUEST['node']:NULL;
$index = (isset($_REQUEST['Digits']))?(int) $_REQUEST['Digits']:NULL;

/* Check to make sure index is valid */
if(!is_null($node) && !is_null($index)) {
	$selection= $menus[$node][$index];
} else {
	$selection = NULL;
}

/* Render TwiML */
$xml = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<Response>\n";
switch($selection) {
	case 'hours': 
		$xml.= '<Say voice="'.$voice.'" language="'.$lang.'">We are open Monday through Friday, 9am to 5pm</Say>';
		$xml.= '<Say voice="'.$voice.'" language="'.$lang.'">Saturday, 10am to 3pm and closed on Sundays</Say>';
		break;
	case 'location': 
		$xml.= '<Say voice="'.$voice.'" language="'.$lang.'">We are located at 101 4th St in San Francisco California</Say>';
		$xml.= '<Gather action="http://' . dirname($_SERVER["SERVER_NAME"] .  $_SERVER['PHP_SELF']) . '/phonemenu.php?node=location" numDigits="1">';
		$xml.= '<Say voice="'.$voice.'" language="'.$lang.'">For directions from the East Bay, press 1</Say>';
		$xml.= '<Say voice="'.$voice.'" language="'.$lang.'">For directions from San Jose, press 2</Say>';
		$xml.= '</Gather>';
		break;
	case 'east-bay': 
		$xml.= '<Say voice="'.$voice.'" language="'.$lang.'">Take BART towards San Francisco / Milbrae. Get off on Powell Street. Walk a block down 4th street</Say>';
		break;
	case 'san-jose':
		$xml.= '<Say voice="'.$voice.'" language="'.$lang.'">Take Cal Train to the Milbrae BART station. Take any Bart train to Powell Street</Say>';
		break;
	case 'duck':
		$xml.= '<Play>duck.mp3</Play>';
		break;
	case 'receptionist':
		$xml.= '<Say voice="'.$voice.'" language="'.$lang.'">Please wait while we connect you</Say>';
		$xml.= '<Dial>+12158625906</Dial>';
		break;
	default:
		$xml.= '<Gather action="http://' . dirname($_SERVER["SERVER_NAME"] .  $_SERVER['PHP_SELF']) . '/phonemenu.php?node=default" numDigits="1">';
		$xml.= '<Say voice="'.$voice.'" language="'.$lang.'">Hello and welcome to Our Phone Menu</Say>';
		$xml.= '<Say voice="'.$voice.'" language="'.$lang.'">For business hours, press 1</Say>';
		$xml.= '<Say voice="'.$voice.'" language="'.$lang.'">For directions, press 2</Say>';
		$xml.= '<Say voice="'.$voice.'" language="'.$lang.'">To hear a duck quack, press 3</Say>';
		$xml.= '<Say voice="'.$voice.'" language="'.$lang.'">To speak to a receptionist, press 0</Say>';
		$xml.= '</Gather>';
		break;
}

if($selection && $selection != 'receptionist') { 
	$xml.= '<Pause/>';
	$xml.= '<Say voice="'.$voice.'" language="'.$lang.'">Main Menu</Say>';
	$xml.= '<Redirect>http://' . dirname($_SERVER["SERVER_NAME"] .  $_SERVER['PHP_SELF']) . '/phonemenu.php</Redirect>';
}

$xml.= '</Response>';
echo $xml;