@extends('admin.master')

@section('title', 'Cập nhật bài viết')

@section('content')
    <div class="container w-50">
        @isset($message)
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endisset
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="" class="form-label">Title</label>
                <input type="text" name="title" value="{{ $post->title }}" class="form-control">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Image</label> <br>
                <img src="{{ APP_URL . $post->image }}" alt="" width="90"> <br>
                <input type="file" name="image" id="" class="form-control">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Category</label>
                <select name="category_id" id="" class="form-control">
                    @foreach ($categories as $cate)
                        <option value="{{ $cate->id }}" @selected($cate->id == $post->category_id)>
                            {{ $cate->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">description</label>
                <textarea name="description" class="form-control" rows="5">{{ $post->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">content</label>
                <textarea name="content" class="form-control" rows="10">{{ $post->content }}</textarea>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ APP_URL . 'admin/posts' }}" class="btn btn-primary">List Post</a>
            </div>
        </form>
    </div>
@endsection
