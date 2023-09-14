@extends('layouts.app')

<style>
body{
    margin-top:20px;
}
/*
Blog post entries
*/

.entry-card {
    -webkit-box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.05);
    -moz-box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.05);
    box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.05);
}

.entry-content {
    background-color: #fff;
    padding: 36px 36px 36px 36px;
    border-bottom-left-radius: 6px;
    border-bottom-right-radius: 6px;
}

.entry-content .entry-title a {
    color: #333;
}

.entry-content .entry-title a:hover {
    color: #4782d3;
}

.entry-content .entry-meta span {
    font-size: 12px;
}

.entry-title {
    font-size: .95rem;
    font-weight: 500;
    margin-bottom: 15px;
}

.entry-thumb {
    display: block;
    position: relative;
    overflow: hidden;
    border-top-left-radius: 6px;
    border-top-right-radius: 6px;
}

.entry-thumb img {
    border-top-left-radius: 6px;
    border-top-right-radius: 6px;
}

.entry-thumb .thumb-hover {
    position: absolute;
    width: 100px;
    height: 100px;
    background: rgba(71, 130, 211, 0.85);
    display: block;
    top: 50%;
    left: 50%;
    color: #fff;
    font-size: 40px;
    line-height: 100px;
    border-radius: 50%;
    margin-top: -50px;
    margin-left: -50px;
    text-align: center;
    transform: scale(0);
    -webkit-transform: scale(0);
    opacity: 0;
    transition: all .3s ease-in-out;
    -webkit-transition: all .3s ease-in-out;
}

.entry-thumb:hover .thumb-hover {
    opacity: 1;
    transform: scale(1);
    -webkit-transform: scale(1);
}

.article-post {
    border-bottom: 1px solid #eee;
    padding-bottom: 70px;
}

.article-post .post-thumb {
    display: block;
    position: relative;
    overflow: hidden;
}

.article-post .post-thumb .post-overlay {
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.6);
    transition: all .3s;
    -webkit-transition: all .3s;
    opacity: 0;
}

.article-post .post-thumb .post-overlay span {
    width: 100%;
    display: block;
    vertical-align: middle;
    text-align: center;
    transform: translateY(70%);
    -webkit-transform: translateY(70%);
    transition: all .3s;
    -webkit-transition: all .3s;
    height: 100%;
    color: #fff;
}

.article-post .post-thumb:hover .post-overlay {
    opacity: 1;
}

.article-post .post-thumb:hover .post-overlay span {
    transform: translateY(50%);
    -webkit-transform: translateY(50%);
}

.post-content {
    font-weight: 500;
}

.post-meta {
    padding-top: 15px;
    margin-bottom: 20px;
}

.post-meta li:not(:last-child) {
    margin-right: 10px;
}

.post-meta li a {
    color: #999;
    font-size: 13px;
}

.post-meta li a:hover {
    color: #4782d3;
}

.post-meta li i {
    margin-right: 5px;
}

.post-meta li:after {
    margin-top: -5px;
    content: "/";
    margin-left: 10px;
}

.post-meta li:last-child:after {
    display: none;
}

.post-masonry .masonry-title {
    font-weight: 500;
}



.post-content .fa {
    color: #ddd;
}

.post-content a h2 {
    font-size: 1.5rem;
    color: #333;
    margin-bottom: 0px;
}

.article-post .owl-carousel {
    margin-bottom: 20px !important;
}

.post-masonry h4 {
    text-transform: capitalize;
    font-size: 1rem;
    font-weight: 700;
}
.mb40 {
    margin-bottom: 40px !important;
}
.mb30 {
    margin-bottom: 30px !important;
}
.media-body h5 a {
    color: #555;
}
.categories li a:before {
    content: "\f0da";
    font-family: 'FontAwesome';
    margin-right: 5px;
}
/*
Template sidebar
*/

.sidebar-title {
    margin-bottom: 1rem;
    font-size: 1.1rem;
}

.categories li {
    vertical-align: middle;
}

.categories li > ul {
    padding-left: 15px;
}

.categories li > ul > li > a {
    font-weight: 300;
}

.categories li a {
    color: #999;
    position: relative;
    display: block;
    padding: 5px 10px;
    border-bottom: 1px solid #eee;
}

.categories li a:before {
    content: "\f0da";
    font-family: 'FontAwesome';
    margin-right: 5px;
}

.categories li a:hover {
    color: #444;
    background-color: #f5f5f5;
}

.categories > li.active > a {
    font-weight: 600;
    color: #444;
}

.media-body h5 {
    font-size: 15px;
    letter-spacing: 0px;
    line-height: 20px;
    font-weight: 400;
}

.media-body h5 a {
    color: #555;
}

.media-body h5 a:hover {
    color: #4782d3;
}
.blog-grid-text {
    position: relative;
}
.blog-grid-text ul {
    margin: 0;
    padding: 0;
}

.blog-grid-text ul li {
    display: inline-block;
    font-size: 14px;
    font-weight: 500;
    margin: 5px 10px 5px 0;
}

.blog-grid-text ul li:last-child {
    margin-right: 0;
}

.blog-grid-text ul li i {
    font-size: 14px;
    font-weight: 600;
    margin-right: 5px;
}
.blog-grid-text .meta-style2 {
    border-top: 1px dashed #cee1f8 !important;
    padding-top: 15px
}

.blog-grid-text .meta-style2 ul li {
    margin-bottom: 0;
    font-weight: 500
}

.blog-grid-text .meta-style2 ul li:last-child {
    margin-right: 0
}
h5 a{
    text-decoration: none;
    color: black
}
h5 a:hover{
    color: blue;
}
img{
    width: 500px;
    height: 500px;
}
</style>
@section('content')

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container pb50">
    <div class="row">
        <div class="col-md-9 mb40">
            <article>
                <div style="text-align: center">
                    <h1>{{ $post->name }}</h1>
                </div>
                
                <img src="{{ asset('images/'.$post->image_path) }}" alt="" class="img-fluid mb30">
                <div class="post-content blog-grid-text">
                    <h3>{{ $post->content }}</h3>
                    
                    {{ $post->description }}
                    <div class="meta meta-style2">
                        <ul>
                            {{-- <li><a  href="{{ route('like-post', $post->id) }}"><i class="fa fa-thumbs-o-up"></i> Like</a></li> --}}
                            <li btn-type>
                                <div class="post">
                                    {{ $post->user_likes_count }} người thích
                                    
                                </div>
                            </li>
                            <li>
                                <div class="post">
                                    {{ $post->user_comments_count }} bình luận
                                </div>
                            </li>
                            
                            
                        </ul>
                    </div>
                    <hr>
                    <div class="media">
                        <i class="d-flex mr-3 fa fa-user-circle fa-5x text-primary"></i>
                        <div class="media-body post-meta">
                            <h5 >
                                <a href="/profile/{{ $post->user->id }}" class="mt-0 font700">{{ $post->user->name }}</a> 
                                / <i class="fa fa-calendar-o"></i> Created_at: {{ $post->created_at }}                                                       
                            </h5> 
                        </div>
                        
                    </div>
                    <hr >
                    @foreach ($post->userComments as $user)
                    <div class="media mb20">
                        <i class="d-flex mr-3 fa fa-user-circle-o fa-3x"></i>
                        <div class="media-body">
                            <h5 class="mt-0 font400 clearfix">
                                <a href="#" class="float-right">{{ $user->name }}</a>
                            </h5> 
                            {{ $user->pivot->cmt }}
                        </div>
                    </div>
                    @endforeach
                    
                    <hr class="mb20">
                    <div style="color: red">
                        <a style="color: red" href="/login">*Đăng nhập</a> để có thể like, share, comment.
                    </div>
                    
                </div>
            </article>
            <!-- post article-->

        </div>
        <div class="col-md-3 mb40">
            <!--/col-->
            <div class="mb40">
                <a href="/" class="btn" role="button" style="border: 1px solid black; background-color: aqua;">Quay lại</a>
                <h4 class="sidebar-title">Categories</h4>
                <ul class="list-unstyled categories">
                    <li><a href="#">Rent</a></li>
                    <li><a href="#">Sale</a></li>
                    <li class="active"><a href="#">Apartment</a>
                        <ul class="list-unstyled">
                            <li><a href="#">Office</a></li>
                            <li><a href="#">Godown</a></li>
                            <li><a href="#">Gerage</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Top Rating</a></li>
                    <li><a href="#">Trending</a></li>
                    <li><a href="#">Newest Properties</a></li>
                </ul>
            </div>
            <!--/col-->
        </div>
    </div>
</div>
@endsection