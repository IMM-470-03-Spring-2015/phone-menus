<?php
$from = $_REQUEST["From"];
header("content-type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
?>
<Response>
    <Say>Hello <?php echo $from; ?></Say>
<Response>