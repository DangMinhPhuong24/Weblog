@extends('layouts.app')
<style>
#sidebar {
    width:240px;
    height:100%;
    background:rgba(52, 48, 48, 0.78);
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

</style>
@section('content')

    <div id="sidebar" >
        <!-- sidebar menu start-->
        <div>
            <ul class="sidebar-menu" >
                <li>
                    <a class="active" href="index.html">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>UI Elements</span>
                    </a>
                    <ul class="sub">
						<li><a href="#">Bài viết cá nhân</a></li>
						<li><a href="#">Duyệt bài viết</a></li>
                        <li><a href="#">Tất cả bài viết</a></li>
                    </ul>
                </li>
                <li>
                    <a href="fontawesome.html">
                        <i class="fa fa-bullhorn"></i>
                        <span>Font awesome </span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-th"></i>
                        <span>Data Tables</span>
                    </a>
                    
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-tasks"></i>
                        <span>Form Components</span>
                    </a>
                    
                </li>
                
            </ul>            
        </div>
        <!-- sidebar menu end-->
    </div>

@endsection
