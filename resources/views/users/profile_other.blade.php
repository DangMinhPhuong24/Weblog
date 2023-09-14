@extends('layouts.app')

<style>
    .gradient-custom {
/* fallback for old browsers */
background: #f6d365;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1));

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1))
}

.message{
    text-align: center;
}
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 100px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}
.dropdown-content h6 {
  padding:12px 0 0 16px; 
}
.dropdown-content input {
  margin: 0 16px 12px 16px; 
}
.dropdown-content button {
  margin: 0 0 12px 80px;
  text-align: center;

}
.show {display:block;}

.follow{
    border: 1px rgb(173, 173, 173) solid;
    background-color: rgba(246, 211, 101, 1);
    color: rgb(126, 75, 0);
    font-size: 20px;
    text-decoration:none;
    cursor: pointer;
}
.follow:hover{
    background-color: rgb(250, 162, 0);
    color: black;
    border: 1px black solid;
}
.gradient-custom button{
    margin-top: 20px;
    padding-top: 5px;
}
h1{
    text-align: center;
    background-color: rgb(140, 230, 163,0.5);
    border-radius: 10px;
}
</style>
@section('content')
    <section class="vh-100" style="background-color: #f4f5f7;">
        <div class="container py-5 h-200">
        <div class="row d-flex justify-content-center align-items-center h-200">
            <div class="col col-lg-6 ">

            <h1 id="massage"></h1>  

            <div class="card mb-3" style="border-radius: .5rem;">
                <div id="message"></div>
                <div class="row g-0">
                <div class="col-md-4 gradient-custom text-center text-white"
                    style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                    alt="Avatar" class=" my-4" style="width: 80px;" />
                    <p>{{ $user->name }}</p>
                    @if(Auth::user())
                        @if (Auth::user()->role == 'US')
                            @if (Auth::user()->id == $user->id)
                                <form action="/suaten" method="POST">
                                    @csrf
                                    <input type="text" name="name" value="{{ $user->name }}" >
                                    <button type="submit"><i class="far fa-edit mb-2">Sửa tên</i> </button>
                                </form>
                            @else
                                <form>
                                    @csrf
                                    <button type="button" onclick="return followuser()"  
                                    data-fa_user_id="{{ $user->id }}"
                                    data-fa_follow_id="{{ Auth::user()->id }}"
                                    class="follow btn-follow" id="followLink">
                                    @if ($follow )
                                        <div id="msg_counter_like">
                                            Bỏ theo dõi
                                        </div> 
                                    @else
                                        <div id="msg">
                                            Theo dõi 
                                        </div>
                                    @endif
                                    </button> 
                                </form>  
                            @endif
                        @else
                            <div></div>
                        @endif
                    @else
                        <div style="color: red">
                            <a style="color: red" href="/login">*Đăng nhập</a> để có thể theo dõi.
                        </div>
                    @endif                                       
                </div>
                <div class="col-md-8">
                    <div class="card-body p-4">
                        <h6>Thông tin cá nhân của {{ $user->name }}</h6>
                        <hr class="mt-0 mb-4">
                        <div class="pt-1">
                            <div class="col-6 mb-3">
                                <h6>Email</h6>
                                <p>{{ $user->email }}</p>
                            </div>
                        </div>
                        <hr class="mt-0 ">
                        @if (Auth::user())
                            @if (Auth::user()->role == 'US' && Auth::user()->id == $user->id)
                                <button id="myBtn" class="dropbtn">Đổi mật khẩu</button>
                                <form action="/changePassword" method="POST">
                                    @csrf
                                    <div id="myDropdown" class="dropdown-content">
                                        <h6>Mật khẩu cũ</h6><input type="text" name="oldpassword">
                                        <h6>Mật khẩu mới </h6><input type="text" name="newpassword">
                                        <h6>Nhập lại mật khẩu mới </h6><input type="text" name="passwordAgain">
                                        <div>
                                            <button type="submit">Lưu</button>
                                        </div>                           
                                    </div>
                                </form>
                            @else
                                <div>
                                    <a href="/postusers/{{ $user->id }}" style="text-decoration: none;">Danh sách bài viết của {{ $user->name  }}</a>
                                </div>
                            @endif
                        @else
                            <div>
                                <a href="/postusers/{{ $user->id }}" style="text-decoration: none;">Danh sách bài viết của {{ $user->name  }}</a>
                            </div>
                        @endif     
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
  </section>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    function followuser(){
        var user_id = $('.btn-follow').data('fa_user_id');
        var follow_id = $('.btn-follow').data('fa_follow_id');
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url:'{{ route('followuser') }}',
            method:"POST",
            data:{user_id:user_id,follow_id:follow_id,_token:_token},
            success:function(data){
                if (data == 'False') {
                    $('#massage').text('Đã hủy theo dõi người dùng này');
                    $('#msg_counter').text('Theo dõi');  
                    $('#massage').fadeToggle(2000);
                } else {
                    $('#massage').text('Đã theo dõi người dùng này');
                    $('#msg').text('Bỏ theo dõi');
                    $('#massage').fadeToggle(2000);
                }
                
            }
        });   
    }    
</script>
<script>
    document.getElementById("myBtn").onclick = function() {myFunction()};
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }
    document.
</script>
@endsection
  
{{-- <script>
    document.getElementById('followLink').addEventListener('click', function(event) {
        event.preventDefault(); // Ngăn chặn hành vi mặc định của thẻ <a> (chuyển đến đường dẫn href)

        var followLink = document.getElementById('followLink');

        // Kiểm tra xem nội dung thẻ <a> là "Follow" hay "Un Follow"
        if (followLink.innerText === "Follow") {
            followLink.innerText = "Un Follow";
        } else {
            followLink.innerText = "Follow";
        }
    });
</script> --}}