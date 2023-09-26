<?php

    $szinek = array("A" => "Kek", "B" => "Zold", "c" => "Piros");

    function atalakit($szinek, $betu_meret){
        if ($betu_meret == "kisbetus"){
            foreach($szinek as $key => $value){
                echo $key. " : " .strtolower($value)."<br>";
            }
        } else {
            if ($betu_meret == "nagybetus"){
                $upppercased = array_map("strtoupper", $szinek);
                foreach($upppercased as $key => $value){
                    echo $key. " : " .$value. "<br>";
                }
            }
        }
    }

    atalakit($szinek, "nagybetus");

?>