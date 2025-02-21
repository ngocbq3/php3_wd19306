<?php

namespace App\Controllers\Admin;

use App\Models\Category;
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

    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.add', compact('categories'));
    }

    public function store()
    {
        $data = $_POST;

        //Xử lý hình ảnh
        $image = "";
        $file = $_FILES['image'];

        if ($file['size'] > 0) {
            $image = "images/" . $file['name'];
            move_uploaded_file($file['tmp_name'], $image);
        }
        //thêm image vào mảng data
        $data['image'] = $image;
        //insert
        Post::create($data);

        //Chuyển hướng sang danh sách
        return redirect('admin/posts');
    }

    //xóa
    public function destroy($id)
    {
        Post::delete($id);
        //Chuyển hướng sang danh sách
        return redirect('admin/posts');
    }

    //edit
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }
    //update
    public function update($id)
    {
        //lấy bài viết cũ
        $post = Post::find($id);
        //Lấy dữ liệu mới
        $data = $_POST;

        $file = $_FILES['image'];

        if ($file['size'] > 0) {
            $image = "images/" . $file['name'];
            move_uploaded_file($file['tmp_name'], $image);
            $data['image'] = $image;
        }

        //Xóa ảnh
        if ($file['size'] > 0) {
            if (file_exists($post->image) && $image != $post->image) {
                unlink($post->image);
            }
        }
        Post::update($data, $id);

        $message = "Cập nhật dữ liệu thành công";
        $post = Post::find($id);
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories', 'message'));
    }
}
