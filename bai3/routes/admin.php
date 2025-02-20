<?php

use App\Controllers\Admin\PostController;


$router->filter('admin', function () {
    if (!isset($_SESSION['user'])) {
        redirect('login');
    } else if ($_SESSION['user']->role != 'admin') {
        redirect('');
    }
});

$router->group(['before' => 'admin'], function ($router) {
    $router->group(['prefix' => 'admin'], function ($router) {
        $router->get('/posts', [PostController::class, 'index']); // Show all posts
        $router->get('/posts/create', [PostController::class, 'create']);
        $router->post('/posts/create', [PostController::class, 'store']);
        $router->get('/posts/edit/{id}', [PostController::class, 'edit']);
        $router->post('/posts/edit/{id}', [PostController::class, 'update']);
        $router->post('/posts/delete/{id}', [PostController::class, 'destroy']);
    });
});
