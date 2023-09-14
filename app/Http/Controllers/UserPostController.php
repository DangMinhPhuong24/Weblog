<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserPost;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
class UserPostController extends Controller
{
    public function like(Request $request){
        $data = $request->all();
        $like = UserPost::where('post_id',$data['post_id'])->where('user_id',$data['user_id'])->where('type','0')->first();
        if ($like) {
            $like->delete();
            echo 'False';
        } else {
            UserPost::create([
                'user_id' => $data['user_id'],
                'post_id' => $data['post_id'],
                'type' => '0',
            ]);
            echo 'True';
        }
    }
    public function comment(Request $request, $id){
        $comment = UserPost::create([
            'user_id' => Auth::user()->id,
            'post_id' => $id,
            'type' => '1',
            'cmt' => $request->input('cmt'),
        ]);
        $comment->save();
        return redirect()->back();
    }
    // public function share($id){
    //     UserPost::create([
    //         'user_id' => Auth()->user()->id,
    //         'post_id' => $id,
    //         'type' => '2',
    //     ]);
    //     return redirect()->back();
    // }
    
}
