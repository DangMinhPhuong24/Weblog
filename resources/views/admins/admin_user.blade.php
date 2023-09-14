@extends('layouts.app')

<style>
body{margin-top:20px;}

.flex{
    display: flex;
    align-items: center;
    text-align: center;
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
.event-date a{
    text-decoration: none;
}
.event-schedule-area-two .tab-content .table tbody tr td {
    padding: 30px 20px;
    vertical-align: middle;
}
.event-schedule-area-two .tab-content .table tbody tr td .r-no span {
    color: #252525;
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
.row2 {
    display: flex;
}
.row2 form{
    margin: 7px 0 0 30px;   
}
</style>

@section('content')
<h1>Quản lý người dùng</h1>
<div class="event-schedule-area-two bg-color pad100">
    <div class="container">
        <!-- row end-->
        <div class="">
            <div class=" col-md-7 row2">
                <a href="users/create" class="btn btn-primary " >Thêm admin mới</a>
                
                <form>
                    @csrf
                    <select name="sort" id="sort">
                        <option value="{{ Request::url() }}?sort_by=none">----Sắp xếp----</option>
                        <option value="{{ Request::url() }}?sort_by=ten_az">Theo tên A->Z</option>
                        <option value="{{ Request::url() }}?sort_by=ten_za">Theo tên Z->A</option>
                    </select>
                </form>
            
                <form>
                    @csrf
                    <select name="filter" id="filter">
                        <option value="{{ Request::url() }}?filter_by=none">-----Lọc-----</option>
                        <option value="{{ Request::url() }}?filter_by=role_admin">Vai trò quản lý</option>
                        <option value="{{ Request::url() }}?filter_by=role_user">Vai trò người dùng</option>
                        
                    </select>
                </form>

                <form >
                    @csrf
                    <input type="text" name="search_admin_user" placeholder="Tìm kiếm">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
            <div class="col-lg-12">
                <hr>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="home" role="tabpanel">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center" scope="col">Tên</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Vai trò</th>
                                    </tr>
                                </thead>
                                @foreach ($users as $user)
                                    <tbody>
                                        <tr class="inner-box">
                                            <th scope="row">
                                                <div class="event-date">
                                                    <a href="/profile/{{ $user->id }}" role="button">{{ $user->name }}</a>
                                                </div>
                                            </th>
                                            {{-- <td>
                                                <div class="event-img">
                                                    <img src="{{ asset('images/'.$item->image_path) }}" alt="">
                                                </div>
                                            </td> --}}
                                            <td>
                                                <div class="event-wrap">
                                                    {{ $user->email }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="r-no">
                                                    {{ $user->role }}
                                                </div>
                                            </td>
                                            <td>
                                                <div >
                                                    <form>
                                                        @csrf

                                                        <button class="btn btn-danger" type="submit" 
                                                        data-user_id="{{ $user->id }}"
                                                        id="deleteuser">
                                                            Xóa người dùng
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pagination mt-4">
                <div>
                    {{ $users->appends(request()->all())->links() }}
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
<script>
    $(document).ready(function(){
        $('#deleteuser').click(function(){
            var user_id = $('.btn-like').data('fa_user_id');
            var _token = $('input[name="_token"]').val();
            
            $.ajax({
                url:'{{ route('delete_user') }}',
                method:"POST",
                data:{user_id:user_id,_token:_token},
                success:function(data){
                    if (data == 'False') {
                        console.log('Xóa người dùng thất bại');  
                    } else {
                        console.log('Xóa người dùng thành công');        
                    }
                }
            });   
        });
    });
</script>

@endsection



    
    
    

