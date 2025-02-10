<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\Post;

class HomeController
{
    public function index()
    {
        $categories = Category::all();
        var_dump($categories);
        return view('home');
    }

    public function test()
    {
        //Dữ liệu bảng posts
        // $data = [
        //     'title' => 'test 1',
        //     'description' => 'mô tả',
        //     'image' => 'anh.jpg',
        //     'content' => 'nội dung 1',
        //     'category_id' => 1
        // ];
        // Post::create($data);

        Post::delete(1);
    }
}
