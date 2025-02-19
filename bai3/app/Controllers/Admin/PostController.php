<?php

namespace App\Controllers\Admin;

use App\Models\Post;

class PostController
{
    public function index()
    {
        $posts = Post::select(['posts.*', 'name'])
            ->join('posts', 'categories', 'category_id', 'id')
            ->get();
        return view('admin.posts.index', compact('posts'));
    }
}
