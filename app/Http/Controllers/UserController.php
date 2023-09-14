<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Follow;
use Illuminate\Support\Facades\Hash;
use App\Models\Notification;
class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $notifications = Notification::where('follow_id',Auth::user()->id)->orderBy('created_at','DESC')->get();
        $notification2 = Notification::where('follow_id',Auth::user()->id)->where('read',0)->count();
        $user_notitfication = Notification::where('user_id',Auth::user()->id)->first();    
        if(!Auth::user()){
            return redirect('/login');
        }
        elseif (Auth::user()->role == 'US') {
            return view('users.profile',[
                'user' => $user,
                'notifications' => $notifications,
                'notification2' => $notification2,
                'user_notitfication' => $user_notitfication,
            ]); 
        }
        else{
            return redirect('/login');
        }    
        
        
    }
    public function changePassword(Request $request)
    {
        $user = Auth::user();
        if (Hash::check($request->input('oldpassword'), $user->password )) {
            $this->validate($request,[
                'oldpassword' => 'required',
                'newpassword'=> 'required|min:8|max:25',
                'passwordAgain'=> 'required|same:newpassword',
            ],
            [   'oldpassword.required' => 'Bạn chưa nhập mật khẩu cũ',
                'newpassword.required' => 'Bạn chưa nhập mật khẩu mới',
                'newpassword.min' => 'Mật khẩu chứa ít nhất 8 kí tự',
                'newpassword.max' => 'Mật khẩu chứa tối đa 25 kí tự',
                'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu mới',
                'passwordAgain.same' => 'Mật khẩu nhập lại chưa đúng',
            ]); 
            $user->password = Hash::make($request->newpassword);
        }
        $user->save();
        return redirect('/profile')->with('message', 'Doi mat khau thanh cong');
    }
    public function suaten(Request $request){
        $user = Auth::user()
                ->update([
                    'name' => $request->input('name'),
                ]);
        return redirect('/profile');
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        if(!Auth::user()){
            return view('users.profile_other',[
                'user' => $user,
            ]); 
        }
        elseif (Auth::user()->role == 'AD') {
            return view('users.profile_other',[
                'user' => $user,
            ]);
        }
        elseif (Auth::user()->role == 'US') {
            $notifications = Notification::where('follow_id',Auth::user()->id)->orderBy('created_at','DESC')->get();
            $notification2 = Notification::where('follow_id',Auth::user()->id)->where('read',0)->count();
            $user_notitfication = Notification::where('user_id',Auth::user()->id)->first();
            $follow = Follow::where('follow_id',Auth::user()->id)->where('user_id',$id)->first();
            return view('users.profile_other',[
                'user' => $user,
                'notifications' => $notifications,
                'notification2' => $notification2,
                'user_notitfication' => $user_notitfication,
                'follow' => $follow,
            ]);
        }
        else{
            return redirect('/login');
        }      
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        
    }
}
