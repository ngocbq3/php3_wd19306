<?php

use App\Controllers\HomeController;


$router->get('/', [HomeController::class, 'index']);
$router->get('/test', [HomeController::class, 'test']);

$router->get('/about', function () {
    return "ABOUT US";
});
$router->get("/detail/{id}", function ($id) {
    return "Post Detail is $id";
});
