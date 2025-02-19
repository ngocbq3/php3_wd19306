@extends('admin.master')

@section('title', 'Quản lý bài viết')

@section('content')
    <div class="container w-75">
        <h1>Quản lý bài viết</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Image</th>
                    <th scope="col">Description</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Created At</th>
                    <th scope="col">
                        <a href="{{ APP_URL . 'admin/posts/create' }}" class="btn btn-primary">Create New</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->title }}</td>
                        <td>
                            <img src="{{ APP_URL . $post->image }}" alt="" width="90">
                        </td>
                        <td>{{ $post->description }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td>{{ $post->name }}</td>
                        <td>
                            <a href="{{ APP_URL . 'admin/posts/edit/' . $post->id }}">Edit</a>
                            <form action="{{ APP_URL . 'admin/posts/delete/' . $post->id }}" method="post">
                                <button type="submit" onclick="return confirm('Bạn có muốn xóa không')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
