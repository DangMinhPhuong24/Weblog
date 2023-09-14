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

        /*--------------- admin -------------------*/
        #sidebar {
            width:240px;
            background:rgba(52, 48, 48, 0.78);
        }
        .leftside-navigation{
            height: 100%;
        }
        .sidebar-right{
            width: 100%;
        }
        ul li{
            list-style: none;
        }
        ul.sidebar-menu,ul.sidebar-menu li ul.sub {
            margin:0;
            padding:0;
        }
        #sidebar .sub-menu>.sub li a {
            padding-left:46px;
        }

        ul.sidebar-menu li {
            border-bottom:1px solid rgba(255,255,255,0.05);
        }
        ul.sidebar-menu ul.sub li {
            border-bottom:none;
        }
        ul.sidebar-menu li a {
            color:#fff;
            text-decoration:none;
            display:block;
            padding:18px 0 18px 25px;
            font-size:12px;
            outline:none;
            -webkit-transition:all 0.3s ease;
            -moz-transition:all 0.3s ease;
            -o-transition:all 0.3s ease;
            -ms-transition:all 0.3s ease;
            transition:all 0.3s ease;
        }
        .sidebar-menu li a span{
            font-size:15px;
        }
        ul.sidebar-menu li a.active, ul.sidebar-menu li a:hover, ul.sidebar-menu li a:focus {
            background: rgba(40, 40, 46, 0.28);
            color: #fff;
            display: block;
            -webkit-transition: all 0.3s ease;
            -moz-transition: all 0.3s ease;
            -o-transition: all 0.3s ease;
            -ms-transition: all 0.3s ease;
            transition: all 0.3s ease;
        }
        ul.sidebar-menu li a i {
            font-size:15px;
            padding-right:6px;
        }
        ul.sidebar-menu li a:hover i,ul.sidebar-menu li a:focus i {
            color:#fff;
        }
        ul.sidebar-menu li a.active i {
            color:#fff;
        }
        .sub-menu .dropdown-toggle{
            color:#fff;
        }
        .sub-menu .dropdown-toggle i{
            font-size:15px;
            padding:18px 0 18px 25px;
            color:#fff;
        }
        .sub-menu .dropdown-toggle span{
            font-size:15px;
            padding-right:6px;
            padding-left:6px;
            color:#fff;
        }
        .sidebar-menu .sub li a {
            font-size:13px;
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
        <nav class="navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container ">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Trang chủ
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Đăng nhập</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Đăng ký</a>
                                </li>
                            @endif
                        @else
                            @if (Auth::user()->role == 'US')
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
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
                                
                            @endif
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main >
        @guest
            @yield('content')
        @else
            @if (Auth::user()->role == 'AD')
            <div class="d-flex">
                <div id="sidebar" >
                    <div class="leftside-navigation">
                        <ul class="sidebar-menu" >
                            <li>
                                <a href="{{ url('/') }}">
                                    <i class="fa fa-bar-chart"></i>
                                    <span>Thống kê</span>
                                </a>
                            </li>
                            
                            <li class="sub-menu">
                                <div  class="dropdown-toggle" >
                                    <i class="fa fa-book" ></i>
                                    <span>Quản lý bài viết</span>
                                </div>
                                <ul class="sub">
                                    <li><a href="/posts">Bài viết cá nhân</a></li>
                                    <li><a href="/approve">Duyệt bài viết</a></li>
                                    <li><a href="/admin_post">Tất cả bài viết</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="/admin_comment">
                                    <i class="fa fa-comments"></i>
                                    <span>Quản lý bình luận </span>
                                </a>
                            </li>
                            <li class="sub-menu">
                                <a href="/admin_user">
                                    <i class="fa fa-user"></i>
                                    <span>Quản lý người dùng</span>
                                </a>
                                
                            </li>
                            
                            
                        </ul>            
                    </div>
                </div>
                <div class="sidebar-right">
                @yield('content')   
                </div> 
            </div>  
            @else
                @yield('content')
            @endif       
        @endguest
        </main>
    </div>
</body>
</html>
