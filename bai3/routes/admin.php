<?php

use App\Controllers\Admin\PostController;

$router->group(['prefix' => 'admin'], function ($router) {
    $router->get('/posts', [PostController::class, 'index']); // Show all posts
});
