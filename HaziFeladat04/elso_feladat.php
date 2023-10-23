<?php

class ArrayManipulator
{
    private $data = [];

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function __get($item)
    {
        if (isset($this->data[$item])) {
            return $this->data[$item];
        }
        return null;
    }

    public function __set($item, $value)
    {
        $this->data[$item] = $value;
    }

    public function __isset($item)
    {
        return isset($this->data[$item]);
    }

    public function __unset($item)
    {
        unset($this->data[$item]);
    }

    public function __toString()
    {
        return implode(", ", $this->data);
    }

    public function __clone()
    {
        return new ArrayManipulator($this->data);
    }
}

$data = [1, 2, 3, 4, 5];
$manipulator = new ArrayManipulator($data);

echo "Original Data: " . $manipulator . "<br>"; // __toString
echo "Value at index 2: " . $manipulator->__get(2) . "<br>"; // __get
echo "New value: " . $manipulator->__set(2, 10) . "<br>";
echo "Value at index 2 after setting: " . $manipulator->__get(2) . "<br>";
echo "Is item at index 3 set? " . (($manipulator->__isset(3)) ? "Yes" : "No") ."<br>"; // __isset
$manipulator->__unset(3). "<br>"; // __unset
echo "Is item at index 3 set after unset? " . (isset($manipulator->data[3]) ? "Yes" : "No") . "<br>";
$clonedManipulator = clone $manipulator;
echo "Cloned Data: " . $clonedManipulator . "<br>";

?>
