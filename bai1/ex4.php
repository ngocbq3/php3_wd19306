<?php

abstract class Car
{
    protected $name;
    protected $color;

    public function __construct($name, $color)
    {
        $this->name = $name;
        $this->color = $color;
    }

    abstract function sound();

    public function info()
    {
        echo "Name: " . $this->name;
        echo "<br>Color: " . $this->color;
        echo "<br>";
    }
}

class VinFat extends Car
{
    public function sound()
    {
        echo $this->name . " Bùm Bùm ....<br>";
    }
}

class Toyota extends Car
{
    public function sound()
    {
        echo $this->name . " Buzzz Buzzzz....<br>";
    }
}

$vinfat = new VinFat("VF5", "Đen");
$toyota = new Toyota("Vios", "Trắng");

$vinfat->info();
$vinfat->sound();

$toyota->info();
$toyota->sound();
