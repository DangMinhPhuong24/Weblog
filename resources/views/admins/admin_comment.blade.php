@extends('layouts.app')

<style>
body{margin-top:20px;}
.flex{
    display: flex;
    align-items: center;
    text-align: center;
}
.primary-btn .btn2{
    background-color: red;
    margin-top: 20px;
}

.event-schedule-area .tab-area .nav-tabs {
    border-bottom: inherit;
}

.event-schedule-area .tab-area .nav {
    border-bottom: inherit;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    margin-top: 80px;
}

.event-schedule-area .tab-area .nav-item {
    margin-bottom: 75px;
}
.event-schedule-area .tab-area .nav-item .nav-link {
    text-align: center;
    font-size: 22px;
    color: #333;
    font-weight: 600;
    border-radius: inherit;
    border: inherit;
    padding: 0px;
    text-transform: capitalize !important;
}
.event-schedule-area .tab-area .nav-item .nav-link.active {
    color: #4125dd;
    background-color: transparent;
}

.event-schedule-area .tab-area .tab-content .table {
    margin-bottom: 0;
    width: 80%;
}
.event-schedule-area .tab-area .tab-content .table thead td,
.event-schedule-area .tab-area .tab-content .table thead th {
    border-bottom-width: 1px;
    font-size: 20px;
    font-weight: 600;
    color: #252525;
}
.event-schedule-area .tab-area .tab-content .table td,
.event-schedule-area .tab-area .tab-content .table th {
    border: 1px solid #b7b7b7;
    padding-left: 30px;
}
.event-schedule-area .tab-area .tab-content .table tbody th .heading,
.event-schedule-area .tab-area .tab-content .table tbody td .heading {
    font-size: 16px;
    text-transform: capitalize;
    margin-bottom: 16px;
    font-weight: 500;
    color: #252525;
    margin-bottom: 6px;
}
.event-schedule-area .tab-area .tab-content .table tbody th span,
.event-schedule-area .tab-area .tab-content .table tbody td span {
    color: #4125dd;
    font-size: 18px;
    text-transform: uppercase;
    margin-bottom: 6px;
    display: block;
}
.event-schedule-area .tab-area .tab-content .table tbody th span.date,
.event-schedule-area .tab-area .tab-content .table tbody td span.date {
    color: #656565;
    font-size: 14px;
    font-weight: 500;
    margin-top: 15px;
}
.event-schedule-area .tab-area .tab-content .table tbody th p {
    font-size: 14px;
    margin: 0;
    font-weight: normal;
}


.event-schedule-area-two ul.custom-tab {
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    border-bottom: 1px solid #dee2e6;
    margin-bottom: 30px;
}
.event-schedule-area-two ul.custom-tab li {
    margin-right: 70px;
    position: relative;
}
.event-schedule-area-two ul.custom-tab li a {
    color: #252525;
    font-size: 25px;
    line-height: 25px;
    font-weight: 600;
    text-transform: capitalize;
    padding: 35px 0;
    position: relative;
}
.event-schedule-area-two ul.custom-tab li a:hover:before {
    width: 100%;
}
.event-schedule-area-two ul.custom-tab li a:before {
    position: absolute;
    left: 0;
    bottom: 0;
    content: "";
    background: #4125dd;
    width: 0;
    height: 2px;
    -webkit-transition: all 0.4s;
    -o-transition: all 0.4s;
    transition: all 0.4s;
}
.event-schedule-area-two ul.custom-tab li a.active {
    color: #4125dd;
}

.event-schedule-area-two .tab-content .table {
    -webkit-box-shadow: 0 1px 30px rgba(0, 0, 0, 0.1);
    box-shadow: 0 1px 30px rgba(0, 0, 0, 0.1);
    margin-bottom: 0;
}
.event-schedule-area-two .tab-content .table thead {
    background-color: #007bff;
    color: #fff;
    font-size: 20px;
}
.event-schedule-area-two .tab-content .table thead tr th {
    padding: 20px;
    border: 0;
}
.event-schedule-area-two .tab-content .table tbody {
    background: #fff;
}
.event-schedule-area-two .tab-content .table tbody tr.inner-box {
    border-bottom: 1px solid #dee2e6;
}
.event-schedule-area-two .tab-content .table tbody tr th {
    border: 0;
    padding: 30px 20px;
    vertical-align: middle;
}
.event-schedule-area-two .tab-content .table tbody tr th .event-date {
    color: #252525;
    text-align: center;
}
.event-schedule-area-two .tab-content .table tbody tr th .event-date span {
    font-size: 50px;
    line-height: 50px;
    font-weight: normal;
}
.event-schedule-area-two .tab-content .table tbody tr td {
    padding: 30px 20px;
    vertical-align: middle;
}
.event-schedule-area-two .tab-content .table tbody tr td .r-no span {
    color: #252525;
}


.event-schedule-area-two .tab-content .table tbody tr td .primary-btn {
    margin-top: 0;
    text-align: center;
}
.event-schedule-area-two .tab-content .table tbody tr td .event-img img {
    width: 100px;
    height: 100px;
    border-radius: 8px;
}
.mt-6 {
    margin-top: 3.5rem;
    padding-top: 30px; 
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
.event-date a{
    text-decoration: none;
}
.event-wrap a{
    text-decoration: none;
}
.row2 {
    display: flex;
}
.row2 form{
    margin: 7px 0 0 30px;   
}
</style>

@section('content')
<h1>Quản lý bình luận</h1>
<div class="event-schedule-area-two bg-color pad100">
    <div class="container">
        <!-- row end-->
        <div class="row">
            {{-- <div class=" col-md-9 row2">
                <a href="posts/create" class="btn btn-primary " >Đăng bài viết mới</a>
                
                <form>
                    @csrf
                    <select name="sort" id="sort">
                        <option value="{{ Request::url() }}?sort_by=none">----Sắp xếp----</option>
                        <option value="{{ Request::url() }}?sort_by=ten_az">Theo tên A->Z</option>
                        <option value="{{ Request::url() }}?sort_by=ten_za">Theo tên Z->A</option>
                        <option value="{{ Request::url() }}?sort_by=baiviet_az">Theo bài viết A->Z</option>
                        <option value="{{ Request::url() }}?sort_by=baiviet_za">Theo bài viết Z->A</option>
                    </select>
                </form>
            
                <form>
                    @csrf
                    <select name="filter" id="filter">
                        <option value="{{ Request::url() }}?filter_by=none">-----Lọc-----</option>
                        <option value="{{ Request::url() }}?filter_by=bv_bl_nn">Bài viết được bình luận nhiều nhất</option>
                        <option value="{{ Request::url() }}?filter_by=bl_nn">Bình luận nhiều nhất</option>
                        
                    </select>
                </form>

                <form >
                    @csrf
                    <input type="text" name="search_admin_post" placeholder="Tìm kiếm">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div> --}}
            <div class="col-lg-12">
                <hr>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="home" role="tabpanel">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center" scope="col">Tên</th>
                                        <th scope="col">Bài viết</th>
                                        <th scope="col">Bình luận</th>
                                    </tr>
                                </thead>
                                @foreach ($posts as $post)
                                    @foreach ($post->userComments as $comment)
                                    <tbody>
                                        <tr class="inner-box">
                                            <th scope="row">
                                                <div class="event-date">
                                                    <a href="/profile/{{ $comment->id }}" role="button">{{ $comment->name }}</a>
                                                </div>
                                            </th>
                                            {{-- <td>
                                                <div class="event-img">
                                                    <img src="{{ asset('images/'.$item->image_path) }}" alt="">
                                                </div>
                                            </td> --}}
                                            <td>
                                                <div class="event-wrap">
                                                    <a href="/posts/{{ $post->id }}">{{ $post->name }}</a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="r-no">
                                                    {{ $comment->pivot->cmt }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="primary-btn">
                                                    <form action="{{ route('delete_comment',$comment->pivot->cmt) }}" method="POST">
                                                        @csrf
                                                        
                                                        <button class="btn2" type="submit">
                                                            Xóa bình luận
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                    @endforeach
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pagination mt-4">
                <div>
                    {{ $posts->appends(request()->all())->links() }}
                </div>      
            </div> 
            <!-- /col end-->
        </div>
        <!-- /row end-->
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#sort').on('change',function(){
            var url= $(this).val();
            if(url){
                window.location = url;
            }
            return false;
        });

       
    });
</script>  
<script>
    $(document).ready(function(){
        
        $('#filter').on('change',function(){
            var url2= $(this).val();
            if(url2){
                window.location = url2;
            }
            return false;
        });
    });    
</script> 
@endsection



    
    
    

