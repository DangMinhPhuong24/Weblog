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
.gradient-custom button{
    margin-top: 20px;
    padding-top: 5px;
}
</style>
@section('content')
    
    <section class="vh-100" style="background-color: #f4f5f7;">
        <div class="container py-5 h-50">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-6 mb-lg-0">
            <div id="message" class="message"></div>
            <div class="card " style="border-radius: .5rem;">
                
                <div class="row g-0">
                <div class="col-md-4 gradient-custom text-center text-white"
                    style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                    alt="Avatar" class="img-fluid my-4" style="width: 80px;" />
                    <form action="/suaten" method="POST">
                        @csrf
                        <input type="text" name="name" value="{{ $user->name }}" >
                        <button type="submit"><i class="far fa-edit mb-2">Sửa tên</i> </button>
                    </form>        
                </div>
                <div class="col-md-8">
                    <div class="card-body p-4">
                        <h6>Thông tin cá nhân</h6>
                        <hr class="mt-0 mb-4">
                        <div class="pt-1">
                            <div class="col-6 mb-3">
                                <h6>Email</h6>
                                <p>{{ $user->email }}</p>
                            </div>
                        </div>
                        <hr class="mt-0 ">
                       
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
                       
                                                                                                 
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
  </section>
  <script>
    document.getElementById("myBtn").onclick = function() {myFunction()};
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }
</script>
@endsection

