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
        $data = [
            'title' => 'Update test 1',
            'description' => 'Update mô tả',
            'image' => 'anh.jpg',
            'content' => 'nội dung 1',
            'category_id' => 1,
            'updated_at' => date('Y-m-d H:i:s')
        ];
        // Post::create($data);

        // Post::delete(1);

        // Post::update($data, 2);

        // dd(Post::find(21));

        // dd(
        //     Post::where('title', 'LIKE', '%Quốc%')
        //         ->andWhere('category_id', '=', 2)
        //         ->get()
        // );

        dd(
            Post::select(['posts.*', 'name'])
                ->join('posts', 'categories', 'category_id', 'id')
                ->get()
        );
    }
}
