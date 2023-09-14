@extends('layouts.app')

<style>
body{margin-top:20px;}
.row{display: flex;}
.card-body{
    background-color: rgb(77, 168, 253);
    border-radius: 5px;
}
.card-footer a{
    margin: 0 0 5px 5px; 
    text-decoration: none;
}
.card-footer i{
    cursor: pointer;
}
.panel-default .panel-body{
    margin: 15px 0 0 0;
    margin-left: 35%;
}
.panel-default .panel-body input{
    margin: 0 10px 0 0;
}
.graphBox{
    position: relative;
    width: 100%;
    padding: 2px;
    display: grid;
    grid-template-columns: 1fr 2fr;
    grid-gap: 30px;
    min-height: 200px;
}
.graphBox .box{
    position: relative;
    background: #ffffff;
    width: 100%;
    padding: 2px;
    box-shadow: 0 7px 25px rgb(0, 0, 0,0.08);
    border-radius: 20px; 
}
.graphBox .box h1{
    font-size: 20px;
    text-align: center;
    padding-top: 10px; 
}
.graphBox .box .c-l{ 
    margin-top: 30px;
    padding-top: 50px; 
}
.graphBox .box .chart-left{
    width: 300px;
    margin: auto;
    
}
.graphBox .box .chart-right{
    width: 700px;
    margin: auto;
    
}
@media(max-width:999px){
    .graphBox{
        grid-template-columns: 1fr ;
        height: auto;
    }
}
</style>

@section('content')

<h1>Thống kê</h1>
<div class="container px-4">
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    Tổng số người dùng
                    <h1>{{ $user }}</h1>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a href="/admin_user">Xem chi tiết</a>
                    <div><i class="fa fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    Tổng số bài viết
                    <h1>{{ $post }}</h1>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a href="/posts">Xem chi tiết</a>
                    <div><i class="fa fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    Tổng số bình luận
                    <h1>{{ $cmt }}</h1>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a href="/admin_comment">Xem chi tiết</a>
                    <div><i class="fa fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    Tổng số lượt thích
                    <h1>{{ $like }}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <form  class="form-inline" role="form" method="GET">
                @csrf
                Từ ngày: <input type="date" id="datepicker" name="date_from">
                Đến ngày: <input type="date" id="datepicker2" name="date_to">
                <button type="submit" id="btn-dashboard-filter" class="btn btn-primary">Tìm kiếm</button>
            </form>
        </div> 
    </div>
    <div class="graphBox">
        <div class="box">
            <div class="chart-left"><h1>Thống kê bài viết</h1>
                <canvas id="myChart"></canvas>
            </div>
            <div class="chart-left c-l" ><h1>Thống kê bài viết của người dùng</h1>
                <canvas id="myChart2" ></canvas>
            </div>
        </div>
        <div class="box"> 
            @if ($datefrom)
                <div class="chart-right"><h1>Thống kê bình luận từ ngày {{ $datefrom }} đến ngày {{ $dateto }}</h1>
                    <canvas id="myChart5"></canvas>
                </div>
                <div class="chart-right"><h1>Thống kê lượt thích từ ngày {{ $datefrom }} đến ngày {{ $dateto }}</h1>
                    <canvas id="myChart7"></canvas>
                </div>  
            @else
                <div class="chart-right"><h1>Thống kê bình luận</h1>
                    <canvas id="myChart4"></canvas>
                </div>
                <div class="chart-right"><h1>Thống kê lượt thích</h1>
                    <canvas id="myChart6"></canvas>
                </div>
            @endif
        </div>
    </div>
    
    <script>
         //   backgroundColor: ['rgba(255, 99, 132, 1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)','rgba(75, 192, 192, 1)','rgba(153, 102, 255, 1)','rgba(255, 159, 64, 1)',
            
        //bài viết
        const ctx = document.getElementById('myChart');
        new Chart(ctx, {
          type: 'doughnut',
          data: {
            labels:{!! json_encode($labels) !!},
            datasets:{!! json_encode($datasets) !!}
          },
        });
        //bài viết của người dùng 
        const ctx2 = document.getElementById('myChart2');
        new Chart(ctx2, {
          type: 'doughnut',
          data: {
            labels:{!! json_encode($labels2) !!},
            datasets:{!! json_encode($datasets2) !!}
          },
          options: {
            reponsive: true,
          }
        });
    </script>
    <script>
        //bảng bình luận tự động
        const ctx4 = document.getElementById('myChart4');
        new Chart(ctx4, {
          type: 'bar',
          data: {
            labels:{!! json_encode($labels4) !!},
            datasets:{!! json_encode($datasets4) !!}
          },
        });

        //bảng bình luận date from date to
        const ctx5 = document.getElementById('myChart5');
        new Chart(ctx5, {
          type: 'bar',
          data: {
            labels:{!! json_encode($labels5) !!},
            datasets:{!! json_encode($datasets5) !!}
          },
        });

    </script>
    <script>
        //bảng thích tự động
        const ctx6 = document.getElementById('myChart6');
        new Chart(ctx6, {
          type: 'bar',
          data: {
            labels:{!! json_encode($labels6) !!},
            datasets:{!! json_encode($datasets6) !!}
          },
        });

        //bảng thích date from date to
        const ctx7 = document.getElementById('myChart7');
        new Chart(ctx7, {
          type: 'bar',
          data: {
            labels:{!! json_encode($labels7) !!},
            datasets:{!! json_encode($datasets7) !!}
          },
        });
    </script> 
</div>

@endsection



    
    
    

