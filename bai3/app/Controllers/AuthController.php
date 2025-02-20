<?php

namespace App\Controllers;

use App\Models\User;

class AuthController
{
    public function login()
    {
        return view('auth.login');
    }

    //Xử lý đăng nhập
    public function postLogin()
    {
        $data = $_POST;

        if (trim($data['username']) == "") {
            $errors['message'] = "Username và password phải nhập";
        }
        if (trim($data['password']) == "") {
            $errors['message'] = "Username và password phải nhập";
        }

        if (isset($errors)) {
            return view('auth.login', compact('data', 'errors'));
        }

        $user = User::where('username', '=', $data['username'])->first();

        if (!$user) {
            $errors['message'] = "Username hoặc mật khẩu không chính xác";
        } else {
            //kiểm tra mật khẩu của user
            if (password_verify($data['password'], $user->password)) {
                $_SESSION['user'] = $user;
                redirect('admin/posts');
            } else {
                $errors['message'] = "Username hoặc mật khẩu không chính xác";
            }
        }

        if (isset($errors)) {
            return view('auth.login', compact('data', 'errors'));
        }
    }
    public function register()
    {
        return view('auth.register');
    }

    public function store()
    {
        $data = $_POST;
        //Mã hóa mật khẩu
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        User::create($data);

        return redirect('login');
    }

    public function logout()
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }
        return redirect('login');
    }
}
