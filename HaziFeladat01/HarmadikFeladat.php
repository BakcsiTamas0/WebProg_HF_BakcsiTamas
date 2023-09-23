<?php
    $first_number = 5;
    $second_number = 10;

    function addition($first_number, $second_number){
        echo "The sum of $first_number and $second_number is: ".($first_number + $second_number). "<br>";
    }

    function subtraction($first_number, $second_number){
        echo "The difference of $first_number and $second_number is: ".($first_number - $second_number). "<br>";
    }

    function multiplication($first_number, $second_number){
        echo "The product of $first_number and $second_number is: ".($first_number * $second_number). "<br>";
    }

    function division($first_number, $second_number){
        echo "The quotient of $first_number and $second_number is: ".($first_number / $second_number). "<br>";
    }

    function power_of_number($first_number, $second_number){
        echo "The power of $first_number on $second_number is: ".($first_number ** $second_number). "<br>";
    }

    addition($first_number, $second_number);
    subtraction($first_number, $second_number);
    multiplication($first_number, $second_number);
    division($first_number, $second_number);
    power_of_number($first_number, $second_number);
?>