@extends('layouts.app')
@section('content')
   
    <h1>Đăng bài viết mới</h1>
    <a href="/posts" class="btn btn-primary" role="button">Quay lại</a>
    <form action="/posts" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" 
        placeholder="Tên bài viết">
        <input type="text" name="content" 
        placeholder="Nội dung bài viết">
        <input type="text" name="description" 
        placeholder="Mô tả bài viết">
        
        {{-- <div>
            <label>Choose a cate</label>
            <select name="categories">
            @foreach ($categories as $item)
                <option value="{{ $item->id }}">
                    {{ $item->name }}
                </option>
            @endforeach
            </select>
        </div> --}}

        <input type="file" name="image" >
        <button class="btn btn-primary" type="submit">
            Thêm
        </button>
    </form>
@endsection