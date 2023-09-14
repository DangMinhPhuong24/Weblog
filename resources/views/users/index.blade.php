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
.post{
    text-decoration: none;
}
/* -------------------Ảnh-------------------- */
.slider{
    padding-bottom: 30px;
    border-bottom: 2px solid #000;
    overflow: hidden;
}

.aspect-ratio-169 {
    display: block;
    position: relative;
    padding-top: 30%;
    transition: 0.3s;
}
  
.aspect-ratio-169 img {
    display: block;
    position: absolute;
    width: 70%;
    height: 450px;
    top: 0;
    left: 0;
    margin-left: 15%;
}
.dot-container{
    position: absolute;
    height: 30px;
    width: 100%;
    align-items: center;
    justify-content: center;
}
.dot {
    height: 16px;
    width: 16px;
    background-color: #ccc;
    border-radius: 50%;
    margin-right: 12px;
    cursor: pointer;
}
.dot.active {
    background-color: #333;
}
h3 a{
    text-decoration: none;
}
h5 a{
    text-decoration: none;
}

</style>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- boostrap --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    
    {{-- chart --}}
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        .ms-auto i{
            margin: 10px 20px 0 0;
            cursor: pointer;
            font-size: 20px;
        }
        #notifications_button{
            margin-right: 100px;
        }
        .dropdown-bell {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        width: 300px;
        height: 700px;
        overflow: auto;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        margin: 50px 0 0 0;
        z-index: 1;
        border-radius:10px; 
        }
        .dropdown-bell div:hover{
            background-color: rgba(235, 235, 235, 1);
        }
        .dropdown-bell a {
        padding:12px 0 0 16px; 
        text-decoration: none;
        color: black;
        font-size: 20px;
        
        }
        .dropdown-bell i{
            margin-right: 10px; 
            font-size: 30px;
        }
        .show {display:block;}
        
        #notifications_counter {
            position:absolute;
            color:red;
            font: bold;
            font-size:15px;
            font-weight:normal;
            padding:1px 3px;
            margin:0 0 0 15px;
        }
        .container .navbar-brand{
            margin-left: -65px; 
        }
        .container{
            z-index: 1;
        }
        .header-index{
            position: fixed;
            width: 100%;
            z-index: 1;
            background-color: rgb(225, 225, 225, 0.3);
        }
        .header-index:hover{
            background: whitesmoke;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm header-index">
            <div class="container ">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Trang chủ
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    
                    
                    <ul class="navbar-nav ms-auto">
                        <div id="notifications_counter">{{ $notification2 }}</div>
                        <form >
                            @csrf
                            {{-- <a type="button" onclick="return notifi()">
                                <i class="far fa-bell dropbtn" id="bell"  ></i>
                            </a> --}}
                            <div id="notifications_button" >
                                <i class="far fa-bell dropbtn" id="bell"  ></i>
                            </div>
                        </form>
                        <script>
                            $(document).ready(function () {
                                $('#notifications_button').click(function () {
                                    var _token = $('input[name="_token"]').val();
                                    $.ajax({
                                        url:'{{ route('notification') }}',
                                        data:{_token:_token},
                                        success:function(data){
                                            // $('#notifications').fadeToggle('fast', 'linear');
                                            $('#notifications_counter').fadeOut('slow');
                                            console.log('Đã xem thông báo');
                                        }
                                    })
                                });
                                
                            });
                        </script>
                        
                        <div id="myBell" class="dropdown-bell">
                            @if ($user_notitfication)
                                <div >
                                    <a href="/posts/{{ $user_notitfication->post_id }}">
                                        <i class="fa fa-user-circle"></i>Bài viết của bạn đang chờ phê duyệt
                                    </a>
                                </div>
                                @foreach ($notifications as $item)
                                    <div>
                                        <a href="/posts/{{ $item->post_id }}">
                                            <i class="fa fa-user-circle"></i>{{ $item->userNotify->name }} đã thêm một bài viết
                                        </a>
                                    </div>
                                @endforeach
                            @else
                                @foreach ($notifications as $item)
                                    <div>
                                        <a href="posts/{{ $item->post_id }}">
                                            <i class="fa fa-user-circle"></i>{{ $item->userNotify->name }} đã thêm một bài viết
                                        </a>
                                    </div>
                                @endforeach
                            @endif
                            
                                                    
                        </div>
                        <script>
                            
                            document.getElementById("bell").onclick = function() {BellFunction()};
                            function BellFunction() {
                                document.getElementById("myBell").classList.toggle("show");
                            }
                            
                        </script>

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                
                                <a class="dropdown-item" href="/posts">Quản lý bài viết cá nhân</a>
                                <a class="dropdown-item" href="/profile">Thông tin cá nhân</a>
                                <a class="dropdown-item" href="/follows">Danh sách theo dõi</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    Đăng xuất
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <main >
            <section class="slider "> 
                <div class="aspect-ratio-169">
                    <a href=""><img src="images/Slider1.jpg"></a>
                    <a href=""><img src="images/Slider3.jpg"></a>
                    <a href=""><img src="images/Slider4.jpg"></a>
                    
                </div>
                <div class="dot-container d-flex">
                    <div class="dot active"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                    
                </div>
            </section>
            <script>
                // chuyển dấu chấm 
                const imgPosition = document.querySelectorAll(".aspect-ratio-169 img")
                const imgContainer = document.querySelector(".aspect-ratio-169")
                const dotItem = document.querySelectorAll(".dot")
                let imgNumber = imgPosition.length
                let index = 0
                //console.log(imgPosition)
                imgPosition.forEach(function(image,index){
                    image.style.left = index*100 + "%"
                    dotItem[index].addEventListener("click",function(){
                        slider(index)
                    })
                })
                function imgSlide(){
                    index++;
                    console.log(index)
                    if (index>=imgNumber){index=0}
                    slider(index)
                }
                function slider (index) {
                    imgContainer.style.left = "-" +index*100+ "%"
                    const dotActive = document.querySelector(".active")
                    dotActive.classList.remove("active")
                    dotItem[index].classList.add("active")
                }
                setInterval(imgSlide,5000)
            </script>
            <div class="container">
                <div class="row mt-n5">
                    
                    @foreach ($posts as $item)
                    <div class="col-md-6 col-lg-4 mt-5 wow fadeInUp" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <div class="blog-grid">
                            <div class="blog-grid-img position-relative"><img src="{{ asset('images/'.$item->image_path) }}" alt="">
                            </div>
                                <div class="blog-grid-text p-4">
                                    <h3 class="h5 mb-3"><a href="posts/{{ $item->id }}" role="button" >{{ $item->name }}</a></h3>
                                    <p class="display-30">{{ $item->content }}</p>
                                    <div class="media mb40">
                                        <i class="d-flex mr-3 fa fa-user-circle fa-5x text-primary"></i>
                                        <div class="media-body post-meta">
                                            <h5 >
                                                <a href="/profile/{{ $item->user->id }}" class="mt-0 font700">{{ $item->user->name }}</a> 
                                            </h5>
                                            <div class="meta meta-style2">
                                                <ul>
                                                    <li btn-type>
                                                        <div class="post" >
                                                            {{ $item->user_likes_count }} người thích 
                                                        </div>  
                                                    </li>
                                                    <li>
                                                        <div class="post">
                                                            {{ $item->user_comments_count }} bình luận
                                                        </div>
                                                    </li>
                                                    
                                                    
                                                </ul>
                                                <ul>
                                                    <li btn-type>
                                                        <form>
                                                            @csrf
                                                            <a type="button" onclick="return likepost()"  
                                                            data-fa_user_id="{{ Auth::user()->id }}"
                                                            data-fa_post_id="{{ $item->id }}"
                                                            class="post btn-like" id="like">
                                                                <i class="fa fa-thumbs-o-up " ></i>Thích
                                                            </a> 
                                                        </form>
                                                        
                                                    </li>
                                                    <li>
                                                        <a class="post" href="/posts/{{ $item->id }}">
                                                            <i  class="fa fa-comments-o" ></i>Bình luận
                                                        </a>
                                                    </li>
                                                    <li><a class="post" href="/posts/{{ $item->id }}"><i class="fa fa-share"></i> Chia sẻ</a></li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
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
                            console.log('Đã thích bài viết thành công');
                        }
                    });   
                }    
            </script>
        </main>
    </div>
</body>
</html>


    
    
    

