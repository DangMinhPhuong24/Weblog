<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\FollowController;

Auth::routes();
Route::resource('posts',PostController::class);
Route::group(['prefix'=>'/'], function(){
    Route::get('',[PostController::class, 'home']);
    
});
Route::get('/postusers/{id}',[PostController::class, 'postUser']);
Route::get('/approve',[PostController::class, 'approve']);
Route::get('/approve/{id}',[PostController::class, 'show_approve']);
//phê duyệt bài viết và từ chối
Route::get('/accept_post/{id}',[PostController::class, 'accept_post']);
Route::get('/reject_post/{id}',[PostController::class, 'reject_post']);

//quản lý bài viết tất cả
Route::get('/admin_post',[PostController::class, 'admin_post']);

//Quản lý bình luận
Route::get('/admin_comment',[PostController::class, 'admin_comment']);
Route::post('/delete_comment/{id}',[PostController::class, 'deleteComment'])->name('delete_comment');

//Quản lý người dùng
Route::get('/admin_user',[PostController::class, 'admin_user']);
Route::post('/delete_user',[PostController::class, 'deleteUser'])->name('delete_user');

Route::resource('users',UserController::class);
//profile
Route::get('/profile',[UserController::class, 'index']);
//đổi tên
Route::post('/suaten',[UserController::class, 'suaten'])->name('suaten');
//profile của người khác
Route::get('/profile/{id}',[UserController::class, 'show']);
//đổi mật khẩu
Route::post('/changePassword',[UserController::class, 'changePassword'])->middleware('auth');

//Quên mật khẩu
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

//like share cmt bài viết
Route::post('like',[UserPostController::class, 'like'])->name('like');
Route::post('/comment/{id}',[UserPostController::class, 'comment'])->name('comment');
// Route::post('/form_submit/{id}',[UserPostController::class, 'form_submit'])->name('form_submit');
//Route::get('/share/{id}',[UserPostController::class, 'share'])->name('share');

//Follow-unfollow
Route::resource('follows',FollowController::class);
Route::post('followuser',[FollowController::class, 'followuser'])->name('followuser');

//notification
Route::get('notification',[PostController::class, 'notification'])->name('notification');


//form test
use App\Models\User;
use App\Models\Post;
Route::get('/form',[PostController::class, 'form']);
Route::get('/thu',function(){
    $user = User::find(1);
    foreach($user->userpost as $userpost){
        echo $userpost;
    }
});

Route::get('/thu2',function(){
    $users = User::all();
    foreach($users as $user){
        echo $user->email;
        echo'<br>';
        echo $user->post->name; 
        echo'<hr>';
    }
});

Route::get('/thu3',function(){
    $posts = Post::all();
    foreach($posts as $post){
        $user = $post->user->name;
        echo $user;
        echo '<hr>';
    }
});

Route::get('/thu4',function(){
    $post = Post::find(3);
    $create_by = $post->user->name;
    echo  $create_by;
    echo '<hr>';
});

