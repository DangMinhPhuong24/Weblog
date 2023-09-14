@extends('layouts.app')
<meta property="og:name" content="{{ $post->name }}">
<meta property="og:content" content="{{ $post->content }}">
<meta property="og:description" content="{{ $post->description }}">
<meta property="og:image_path" content="{{ $post->image_path }}">
<meta name="keywords" content="php,laravel,html,css">
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
    text-decoration: none;
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
.btn{
    border: 1px solid black;
    background-color: aqua;
}
.post{
    text-decoration:none;
}

.post-like{
    cursor: pointer;
}
.flex{
    display: flex;
}
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  width: 190px;
  height: 70px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding:7px 0 0 16px;
  margin: -20px 0 0 170px;
}
.show {display:block;}

.dropbtn{
    cursor: pointer;
}
.dropdown-like{
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    width: 180px;
    height: 60px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    padding:7px 0 0 10px;
    margin-top: 40px;
   
}
.show2 {display:block;}
#social-links ul li{
    display: inline-block;
}
#social-links ul li a{
    padding: 7px;
    margin: 2px;
    font-size: 30px;
    color: #4782d3;
    background-color: whitesmoke;
}
#social-links ul li a:hover{
    background-color:#4782d3;
    color: white;
}
.btn-lg{
    margin-top: 10px;
}
.btn-like .like-color{
    color: rgba(71, 130, 211);
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
                    <hr>
                    <div class="meta ">
                        <ul>
                            <div id="my-like" class="dropdown-like">
                                @foreach ($post->userLikes as $user)
                                    <h6 >{{ $user->name }}</h6>    
                                @endforeach                  
                            </div>
                            <li btn-type>
                                
                                <div class="post post-like" id="mylike">
                                    {{ $post->user_likes_count }} người thích   
                                </div>                            
                            </li>
                            <li>
                                <div class="post">
                                    {{ $post->user_comments_count }} bình luận
                                </div>
                            </li>
                            
                            
                        </ul>
                        <ul>
                            {{-- data-url="{{ route('like', $post->id) }}" --}}
                            <li btn-type>
                                <form>
                                    @csrf
                                    <a type="button" onclick="return likepost()"  
                                    data-fa_user_id="{{ Auth::user()->id }}"
                                    data-fa_post_id="{{ $post->id }}"
                                    class="post btn-like" id="like">
                                    @if ($like)
                                        <div id="like_msg_counter">
                                            
                                            <i class="fa fa-thumbs-o-down like-color" ></i>Bỏ thích
                                        </div>                                          
                                    @else
                                        <div id="like_msg">
                                            <i class="fa fa-thumbs-o-up like-color" ></i>Thích 
                                        </div>                                  
                                    @endif 
                                    </a> 
                                </form>
                                
                            </li>
                            <li>
                                <a class="post" href="#commentTextarea">
                                    <i  class="fa fa-comments-o" ></i>Bình luận
                                </a>
                            </li>
                            <li>
                                {{-- href="{{ route('share', $post->id) }}" --}}
                                <a id="myBtn" class="dropbtn post" >
                                    <i class="fa fa-share" style="color: rgba(71, 130, 211)" ></i>Chia sẻ
                                </a>
                            </li>
                            <div id="myDropdown" class="dropdown-content">
                                {!! $share !!}                         
                            </div>
                        </ul>
                    </div>
                    
                    
                    <h4 class="text-uppercase font500 meta-style2">Tác giả</h4>
                    <div class="media mb40">
                        <i class="d-flex mr-3 fa fa-user-circle fa-5x text-primary"></i>
                        <div class="media-body post-meta">
                            <h5 >
                                <a href="/profile/{{ $post->user->id }}" class="mt-0 font700">{{ $post->user->name }}</a> 
                                / {{ $post->created_at }}
                            </h5>
                        </div>
                        
                    </div>
                    
                    <hr >

                    @foreach ($post->userComments as $user)
                    <div class="media mb20">
                        <i class="d-flex mr-3 fa fa-user-circle-o fa-3x"></i>
                        <div class="media-body">
                            <h5 class="mt-0 font400 clearfix">
                                <a href="/profile/{{ $user->id }}" class="float-right">{{ $user->name }}</a>
                            </h5> 
                            {{ $user->pivot->cmt }}
                            
                        </div>
                    </div>
                    @endforeach
                    
                    
                    <hr class="mb20">
                    <div class="form-group">
                        <label class="text-uppercase font500">Bình luận :</label>
                    </div>
                    <form action="{{ route('comment',$post->id) }}" method="POST">
                        @csrf
                        <textarea id="commentTextarea" class="form-control cmt-post" rows="5" name="cmt"></textarea>
                        <div class="clearfix float-right">
                            <button type="submit" class="btn btn-primary btn-lg">Gửi bình luận</button>
                        </div>
                    </form>
                </div>
            </article>
            <!-- post article-->

        </div>
        <div class="col-md-3 mb40">
            <a href="/" class="btn btn-primary" role="button">Quay lại</a>
            <!--/col-->
            <div class="mb40">
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
<script>
    document.getElementById("mylike").onclick = function() {myLike()};
    function myLike() {
    document.getElementById("my-like").classList.toggle("show2");
    }

    document.getElementById("myBtn").onclick = function() {myFunction()};
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }
</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    function likepost(){
        var user_id = $('.btn-like').data('fa_user_id');
        var post_id = $('.btn-like').data('fa_post_id');
        var _token = $('input[name="_token"]').val();
        
        $.ajax({
            url:'{{ route('like') }}',
            method:"POST",
            data:{user_id:user_id,post_id:post_id,_token:_token},
            success:function(data){
                if (data == 'False') {
                    $('#like_msg_counter').html('<i class="fa fa-thumbs-o-up"></i>Thích');  
                } else {
                    $('#like_msg').html('<i class="fa fa-thumbs-o-down"></i>Bỏ thích');        
                }
            }
        });   
    }    
</script>
@endsection


{{-- <script>
    let check = true;
    document.getElementById('like').addEventListener('click', function(e) {
        e.preventDefault(); // Ngăn chặn hành vi mặc định của thẻ <a> (chuyển đến đường dẫn href)

        var likeLink = document.getElementById('like').preventDefault();
        
        // Kiểm tra xem nội dung thẻ <a> có chứa "Thích" hay "Bỏ thích"
        if (check) {
            check = false;
            document.getElementById("like-post").style.color='blue';
        } else {
            check = true;
            document.getElementById("like-post").style.color='gray';
        }
    });
</script> --}}
<script>
    // click vào thẻ comment thì tự động nhảy vào textarea
    document.querySelector('a[href="#commentTextarea"]').addEventListener('click', function(event) {
      event.preventDefault(); // Prevent the default link behavior
      // lấy tham chiếu textarea 
      const commentTextarea = document.getElementById('commentTextarea');
      // focus vào textarea
      commentTextarea.focus();
    });
</script>


