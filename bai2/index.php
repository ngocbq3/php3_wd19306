<?php
require_once "./vendor/autoload.php";

use App\Animal;

use App\Dog;

$dog = new Dog('Cậu Vàng', 'Vàng');
$dog->info();

echo "<br>Type: " . Dog::TYPE;

//Static
Animal::soundA();
Dog::soundA();
//Self
Animal::soundB();
Dog::soundB();

$classA = new App\ClassC;
$classA->method1();
$classA->method2();
