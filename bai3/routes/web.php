<?php

use App\Controllers\AuthController;
use App\Controllers\HomeController;


$router->get('/', [HomeController::class, 'index']);
$router->get('/test', [HomeController::class, 'test']);

$router->get('/about', function () {
    return "ABOUT US";
});
$router->get("/detail/{id}", function ($id) {
    return "Post Detail is $id";
});

$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'postLogin']);
$router->get('/register', [AuthController::class, 'register']);
$router->post('/register', [AuthController::class, 'store']);
$router->get('/logout', [AuthController::class, 'logout']);
