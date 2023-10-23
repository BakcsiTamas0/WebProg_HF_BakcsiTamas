<?php

    require_once "elso_feladat.php";

    $data = [1, 2, 3, 4, 5, 6];
    $dataList = new ArrayManipulator($data);

    echo "Data List: ". "<br>";
    // $dataList->__get("3");
    // echo $dataList->__toString(). "<br>";

    echo "Setting a new value: ". "<br>";
    $dataList->__set("a", 10);
    echo $dataList->__toString(). "<br>";

    echo "Isset 'a'". "<br>";
    echo $dataList->__isset("a"). "<br>";

    echo "Unsetting 'a'". "<br>";
    $dataList->__unset("a");
    echo $dataList->__toString(). "<br>";

    echo "Cloning". "<br>";
    $dataList2 = clone $dataList;
    echo $dataList2->__toString(). "<br>";

?>