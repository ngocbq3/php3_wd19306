<?php

class Computer
{
    protected $name;
    protected $color;
    protected $type;

    public function __construct($name, $color, $type)
    {
        $this->name = $name;
        $this->color = $color;
        $this->type = $type;
    }

    public function info()
    {
        echo "Name: " . $this->name;
        echo "<br>Color: " . $this->color;
        echo "<br>Type: " . $this->type;
    }
}

$computer = new Computer("Dell V3310", "Xanh ngọc", "Văn phòng");
$computer->info();
