@extends('layouts.app')

@section('content')
    <h1>Sửa bài viết</h1>
    <a href="/posts" class="btn btn-primary" role="button">Quay lại</a>
  
    <form action="/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="text" name="name"
        value="{{ $post->name }}" 
        placeholder="Tên bài viết">
        
        <input type="text" name="content" 
        value="{{ $post->content }}"
        placeholder="Nội dung bài viết">
        
        <input type="text" name="description" 
        value="{{ $post->description }}"
        placeholder="Mô tả bài viết">

        <input type="file" name="image" 
        value="{{ $post->image_path }}">

        <button class="btn btn-primary" type="submit">
            Sửa
        </button>
    </form>
@endsection