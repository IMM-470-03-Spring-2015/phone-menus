<?php
$from = $_REQUEST["From"];

// make an associative array of senders we know, indexed by phone number
$phonebook = array(
    "+12152642459"=>"Professor Thompson",
);

$name = "étranger";
 
// if the caller is in our phonebook, then greet them by name
// otherwise, refer to them as fella
if(isset($phonebook[$_REQUEST['From']])) {
    $name = $phonebook[$_REQUEST['From']];
}

header("content-type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
?>
<Response>
    <Say voice="woman" language="fr">Allô <?php echo $name ?>.</Say>
</Response>