<?php

use App\Controllers\Admin\PostController;


$router->get('/admin/posts', [PostController::class, 'index']); // Show all posts