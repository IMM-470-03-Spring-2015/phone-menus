<?php
    $selection = (int) $_REQUEST['Digits'];

    header('Content-type: text/xml');
    echo '<?xml version="1.0" encoding="UTF-8"?>';  
    
    echo '<Response>';
 
    switch($selection){
        case 1:
            echo "<Say>For many in the United States and the developed world, Interactive Multimedia implies broadband and rich media. While this is true for some, broadband is still out of reach for many in the U.S. and most in the developing world. This class examines the distribution of broadband and device capabilities, locally and globally, and introduces a range of alternative technologies for designing interactive systems based on these capabilities. Working as a design studio, students will examine a target audience and prototype interactive projects using technologies appropriate for that audience’s needs and capabilities.</Say>";
        break;
        
        case 2:
            echo "<Say>I M M 470 0 3, meets every Friday morning, 9 30 a m to 12 20 p m, in A I M M 2 26.</Say>";
        break;
        
        case 3:
            echo "<Dial>215-264-2459</Dial>";
        break;
        
        default:
            echo "<Say>I didn't understand your selection.</Say><Redirect>./class-menu.xml</Redirect>";
        break;
    }
 
    echo '</Response>';
?>
