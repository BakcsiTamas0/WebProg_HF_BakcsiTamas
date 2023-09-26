<?php

$napok = array(
    "HU" => array("H", "K", "Sze", "Cs", "P", "Szo", "V"),
    "EN" => array("M", "Tu", "W", "Th", "F", "Sa", 'Su'),
    "DE" => array("Mo", "Di", "Mi", "Do", "F", "Sa", "So"),
    );  

    foreach($napok as $key => $value){
        echo $key." : ";
        foreach($value as $item){
            if (in_array($item, array("K", "Cs", "Szo", "Tu", "Th", "Sa", "Di", "Do", "Sa"))){
                echo "<b>".$item.", "."</b>";
            } else {
                echo $item.", ";
            }
        }
        echo "<br>";  
    }
    
?>