@extends('layout')

@section('title', 'Danh sách')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <th>#ID</th>
                <th>Category Name</th>
                <th>Name</th>
                <th>Image Thumbnail</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>
                    <a href="{{ APP_URL . 'products/create' }}" class="btn btn-primary">Create New</a>
                </th>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <th>{{ $product->id }}</th>
                        <td>{{ $product->cate_name }}</td>
                        <td>{{ $product->name }}</td>
                        <td>
                            <img src="{{ APP_URL . $product->img_thumbnail }}" width="80" alt="">
                        </td>
                        <td>{{ date('d/m/Y H:i:s', strtotime($product->created_at)) }}</td>
                        <td>{{ date('d/m/Y H:i:s', strtotime($product->updated_at)) }}</td>
                        <td>
                            <a href="{{ APP_URL . 'products/' . $product->id . '/edit' }}" class="btn btn-primary">Edit</a>
                            <a href="{{ APP_URL . 'products/' . $product->id . '/delete' }}" class="btn btn-danger"
                                onclick="return confirm('Bạn có muốn xóa không?')">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
