<?php

    $number = 10;

    $multiplication_table = function() use ($number) {

        echo "<table border='1', align='center'>";

    for ($i = 1; $i <= $number; $i++) {
        echo "<tr>";
        for ($j = 1; $j <= $number; $j++) {
           if ($i === $j){
                echo "<td style='background-color: cyan'>".$i * $j."</td>";
           } else{
                echo "<td>".$i * $j."</td>";
           }
        }
        echo "</tr>";
    }

    echo "</table>";

    };

    $multiplication_table();

?>
