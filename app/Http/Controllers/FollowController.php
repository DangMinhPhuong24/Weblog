<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follow;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;
class FollowController extends Controller
{
    public function followuser(Request $request){
        $data = $request->all();
        $follow = Follow::where('user_id',$data['user_id'])->where('follow_id',$data['follow_id'])->first();
        //$follow = Follow::orderBy('id','DESC')->get();
        if ($follow) {
            $follow->delete();
            echo 'False';
        } else {
            Follow::create([
                'user_id' =>  $data['user_id'],
                'follow_id' => $data['follow_id'],
            ]);
            echo 'True';
        }
    }
    public function index()
    {
        if(!Auth::user()){
            return redirect('/login');
        }
        elseif (Auth::user()->role == 'US') {
            //$follows = Follow::where('follow_id',Auth::user()->id)->orderBy('id','DESC')->paginate(5);
            $notifications = Notification::where('follow_id',Auth::user()->id)->orderBy('created_at','DESC')->get();
            $notification2 = Notification::where('follow_id',Auth::user()->id)->where('read',0)->count();
            $user_notitfication = Notification::where('user_id',Auth::user()->id)->first();
            if (isset($_GET['sort_by'])) {
                $sort_by = $_GET['sort_by'];
                if ($sort_by == 'ten_az') {
                    $follows = Follow::where('follow_id',Auth::user()->id)->orderBy('user_id','ASC')->paginate(5);
                    // ->paginate(3)->appends(request()->query());
                } elseif($sort_by == 'ten_za') {
                    $follows = Follow::where('follow_id',Auth::user()->id)->orderBy('user_id','DESC')->paginate(5);
                }
                
            }
            elseif(request()->search_follow){
                $search = request()->search_follow;
                $follows = Follow::where('follow_id',Auth::user()->id)->orderBy('id','DESC')->where('name','like','%'.$search.'%')->paginate(5);
            }
            else{
                $follows = Follow::where('follow_id',Auth::user()->id)->orderBy('id','DESC')->paginate(5);
            }
            return view('users.follow',[
                'follows' => $follows,
                'notifications' => $notifications,
                'notification2' => $notification2,
                'user_notitfication' => $user_notitfication,
            ]);
        }else{
            return redirect('/login');
        }
        
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $follow = Follow::find($id);
        $follow->delete();
        return redirect('/follows');
    }
}
