<?php

    $termek = [
        ["nev" => "Kenyer", "mennyiseg" => 2, "egysegar" => 7.5],
        ["nev" => "Sajt", "mennyiseg" => 5, "egysegar" => 11],
        ["nev" => "Olaj", "mennyiseg" => 3, "egysegar" => 4],
    ];

    //  a) Termek hozzadas, torles
    
    $hozzadas = function($nev, $mennyiseg, $egysegar) use ($termek){
        $new_item = [
            "nev" => $nev,
            "mennyiseg" => $mennyiseg,
            "egysegar" => $egysegar
        ];
    
        array_push($termek, $new_item);
        return $termek;
        
    };

    $kiveves = function ($nev) use (&$termek){
        foreach($termek as $key => $value){
            if($value["nev"] == $nev){
                unset($termek[$key]);
            };
        };
        return $termek;
    };

    $termek = $hozzadas("Vaj", 100, 8.75);
    $temrek = $kiveves("Kenyer");

    //  b) Lista kiiratasa

    foreach($termek as $key => $value){
        echo "Nev: ".$value["nev"] . " " . "mennyiseg: ".$value["mennyiseg"] . " " . "egysegar: ".$value["egysegar"] . "<br>";
    }

    //  c) Vegso osszeg kiszamitasa

    $vegso_osszeg = 0;
    foreach($termek as $key => $value){
        if($value["mennyiseg"] != 0 && $value["egysegar"] != 0){
            $osszar = $value["mennyiseg"] * $value["egysegar"];
            $vegso_osszeg += (int)$osszar;
        };
    }
    echo "A végső összeg: ".$vegso_osszeg;


?>