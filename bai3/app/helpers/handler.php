<?php

use eftec\bladeone\BladeOne;

function view($pathView, $data = [])
{

    $views = __DIR__ . "/../Views";
    $cache = __DIR__ . '/../cache';

    $blade = new BladeOne($views, $cache, BladeOne::MODE_AUTO);

    return $blade->run($pathView, $data);
}

//Hàm dd để debug
function dd($data)
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
    die;
}
