@extends('layouts.app')

<style>
    body{margin-top:20px;}
.blog-grid {
    position: relative;
    box-shadow: 0 1rem 1.75rem 0 rgba(45, 55, 75, 0.1);
    height: 100%;
    border: 0.0625rem solid rgba(220, 224, 229, 0.6);
    border-radius: 0.25rem;
    transition: all .2s ease-in-out;
    height: 100%
}

.blog-grid span {
    color: #292dc2
}

.blog-grid img {
    width: 100%;
    border-top-left-radius: 0.25rem;
    border-top-right-radius: 0.25rem
}

.blog-grid-text {
    position: relative
}

.blog-grid-text>span {
    color: #292dc2;
    font-size: 13px;
    padding-right: 5px
}

.blog-grid-text h4 {
    line-height: normal;
    margin-bottom: 15px
}

.blog-grid-text .meta-style2 {
    border-top: 1px dashed #cee1f8;
    padding-top: 15px
}

.blog-grid-text .meta-style2 ul li {
    margin-bottom: 0;
    font-weight: 500
}

.blog-grid-text .meta-style2 ul li:last-child {
    margin-right: 0
}

.blog-grid-text ul {
    margin: 0;
    padding: 0
}

.blog-grid-text ul li {
    display: inline-block;
    font-size: 14px;
    font-weight: 500;
    margin: 5px 10px 5px 0
}

.blog-grid-text ul li:last-child {
    margin-right: 0
}

.blog-grid-text ul li i {
    font-size: 14px;
    font-weight: 600;
    margin-right: 5px
}

.blog-grid-text p {
    font-weight: 400;
    padding: 0
}

.blog-list-left-heading:after,
.blog-title-box:after {
    content: '';
    height: 2px
}

.blog-grid-simple-content a:hover {
    color: #1d184a
}

.blog-grid-simple-content a:hover:after {
    color: #1d184a
}
.blog-grid-text {
    position: relative
}

.blog-grid-text>span {
    color: #292dc2;
    font-size: 13px;
    padding-right: 5px
}

.blog-grid-text h4 {
    line-height: normal;
    margin-bottom: 15px
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

.blog-grid-text ul {
    margin: 0;
    padding: 0
}

.blog-grid-text ul li {
    display: inline-block;
    font-size: 14px;
    font-weight: 500;
    margin: 5px 10px 5px 0
}

.blog-grid-text ul li:last-child {
    margin-right: 0
}

.blog-grid-text ul li i {
    font-size: 14px;
    font-weight: 600;
    margin-right: 5px
}

.blog-grid-text p {
    font-weight: 400;
    padding: 0
}

a, a:active, a:focus {
    color: #575a7b;
    text-decoration: none;
    transition-timing-function: ease-in-out;
    -ms-transition-timing-function: ease-in-out;
    -moz-transition-timing-function: ease-in-out;
    -webkit-transition-timing-function: ease-in-out;
    -o-transition-timing-function: ease-in-out;
    transition-duration: .2s;
    -ms-transition-duration: .2s;
    -moz-transition-duration: .2s;
    -webkit-transition-duration: .2s;
    -o-transition-duration: .2s;
}

.pagination div {
    display: inline-block;
    *display: inline;
    *zoom: 1;
    margin: 0 0 0 45%;
    text-decoration: none;
}


.pagination a:hover {
    background-color: #1d184a;
    color: #fff
}

.pagination .active a {
    background-color: #f7f7f7;
    color: #999;
    cursor: default
}
img{
    width: 500px;
    height: 500px;
}
h3 a{
    text-decoration: none; 
}
h5 a{
    text-decoration: none;
}

</style>
@section('content')
<div class="container">
    <div class="row mt-n5">
        @foreach ($posts as $item)
        <div class="col-md-6 col-lg-4 mt-5 wow fadeInUp" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
            <div class="blog-grid">
                <div class="blog-grid-img position-relative"><img src="{{ asset('images/'.$item->image_path) }}" alt="">
                </div>
                    <div class="blog-grid-text p-4">
                        <h3 class="h5 mb-3"><a href="posts/{{ $item->id }}" role="button">{{ $item->name }}</a></h3>
                        <p class="display-30">{{ $item->content }}</p>
                        <div class="media mb40">
                            <i class="d-flex mr-3 fa fa-user-circle fa-5x text-primary"></i>
                            <div class="media-body post-meta">
                                <h5 >
                                    <a href="/profile/{{ $item->user->id }}" class="mt-0 font700">{{ $item->user->name }}</a> 
                                    / {{ $item->created_at }}
                                </h5>
                                <div class="meta meta-style2">
                                    <ul>
                                        {{-- <li><a  href="{{ route('like-post', $post->id) }}"><i class="fa fa-thumbs-o-up"></i> Like</a></li> --}}
                                        <li btn-type>
                                            <div class="post">
                                                {{ $item->user_likes_count }} người thích
                                            </div>
                                        </li>
                                        <li>
                                            <div class="post">
                                                {{ $item->user_comments_count }} bình luận
                                            </div>
                                        </li>
                                        
                                        
                                    </ul>
                                </div>    
                            </div>
                            
                        </div>
                        <div style="color: red">
                            <a style="color: red" href="/login">*Đăng nhập</a> để có thể like, share, comment.
                        </div>

                    </div>
            </div>
        </div>
        @endforeach                                                                       
    </div>

    <div class="pagination mt-4">
        <div>
            {{ $posts->appends(request()->all())->links() }}
        </div>      
    </div>
</div>

@endsection





    
    
    

