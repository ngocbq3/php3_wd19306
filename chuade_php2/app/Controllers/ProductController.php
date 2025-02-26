<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\Product;

class ProductController
{
    public function index()
    {
        $products = Product::select(['products.*', 'categories.name as cate_name'])
            ->join('categories', 'categories.id', 'products.category_id')
            ->orderBy('id', 'DESC')
            ->get();
        return view('index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('create', compact('categories'));
    }

    public function store()
    {
        $data = $_POST;

        //validate
        if (empty($data['name'])) {
            $errors['name'] = "Bạn cần nhập name";
        } else if (strlen(trim($data['name'])) < 5) {
            $errors['name'] = "Name cần nhập ít nhất 5 ký tự";
        }

        if (empty($data['description'])) {
            $errors['description'] = "Bạn chưa nhập description";
        }

        //Xử lý ảnh
        $file = $_FILES['img_thumbnail'];

        //Dữ liệu ảnh được phép
        $imgs = ['jpg', 'jpeg', 'png', 'gif'];
        // dd($file);
        if ($file['size'] > 0) {
            //lấy phần đuôi mở rộng của file
            $image = 'images/' . $file['name'];
            $ext = pathinfo($image, PATHINFO_EXTENSION);
            if (!in_array($ext, $imgs)) {
                $errors['img_thumbnail'] = "File ảnh không đúng định dạng";
            }
        }
        //Trường hợp có lỗi xảy ra
        if (isset($errors)) {
            $categories = Category::all();
            return view('create', compact('categories', 'errors', 'data'));
        }

        //Trường hợp không lỗi
        if ($file['size'] > 0) {
            $image = 'images/' . $file['name'];
            move_uploaded_file($file['tmp_name'], $image);
            //Đưa dữ liệu image vào mảng data
            $data['img_thumbnail'] = $image;
        }
        Product::create($data);
        return redirect('products');
    }

    public function destroy($id)
    {
        //lấy dữ liệu cần xóa
        $product = Product::find($id);
        Product::delete($id);
        //Xóa ảnh
        if (file_exists($product->img_thumbnail)) {
            unlink($product->img_thumbnail);
        }
        return redirect('products');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();

        return view('edit', compact('categories', 'product'));
    }

    public function update($id)
    {
        $data = $_POST;

        $data['updated_at'] = date('Y/m/d H:i:s');
        Product::update($data, $id);

        return redirect("products/$id/edit");
    }
}
