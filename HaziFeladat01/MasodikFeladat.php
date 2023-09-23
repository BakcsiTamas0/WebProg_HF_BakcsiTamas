<?php
    $seconds = 7201;

    function calculateHours($seconds){
        if (is_int($seconds)){
            $hours = $seconds / 3600;
            echo "The given <b>seconds</b>: $seconds is equal to $hours <b>hours</b>.";
        } else {
            echo "The given seconds: <b>$seconds</b> cannot be transformed into hours.";
        }
    }

    calculateHours($seconds);
?>