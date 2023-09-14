<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\UserPost;
use App\Http\Requests\CreateValidationRequest;
use Illuminate\Support\Facades\Auth;
use App\Notifications\ProductNotification;
use App\Models\Notification;
use App\Models\Follow;
class PostController extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth');
    // }
    public function home(){
        $posts = Post::where('status',1)
                ->withCount(['userLikes', 'userComments'])
                ->paginate(3); 
        // $share = \Share::page(
        //     url('/posts'),
        //     $posts->name
        // )
        // ->facebook()
        // ->reddit()
        // ->telegram();
        //$like = UserPost::where('post_id',$id)->where('user_id',Auth::user()->id)->where('type','0')->first();
        
        if(!Auth::user()){
            return view('index',[
                'posts' => $posts,
            ]); 
        }
        elseif (Auth::user()->role == 'AD') {
            $user = User::count(); 
            $post = Post::count();
            $like = UserPost::where('type','0')->count();
            $cmt = UserPost::where('type','1')->count();
            $datefrom = request()->date_from;
            $dateto = request()->date_to;
            // $users = User::selectRaw('MONTH(created_at) as month,COUNT(*) as count')
            //             ->whereYear('created_at',date('Y'))
            //             ->groupBy('month')
            //             ->orderBy('month')
            //             ->get();
            // $labels2 = [];
            // $data2 = [];
            // $colors = ['#36A2EB','#FFCE56','#8BC34A','#FF5722','#009688','#795548','#9C27B0','#2196F3','#FF9800','#CDDC39','#607D8B'];
            // for ($i=1; $i < 12; $i++) { 
            //     $month = date('F',mktime(0,0,0,$i,1));
            //     $count = 0;
            //     foreach ($users as $item) {
            //        if ($item->month == $i) {
            //             $count = $item->count;
            //             break;
            //        }
            //     }
            //     array_push($labels2,$month);
            //     array_push($data2,$count);
            // }
            // $datasets2 = [
            //     [
            //         'label' => 'Users',
            //         'data' => $data2,
            //         'backgroundColor' => $colors,
            //     ],
            // ];
            
    
            //donut 1
            $posts1 = Post::all();
            //$labels = ['Chưa phê duyệt','Đã phê duyệt','Đã từ chối'];
            $labels = [];
            $lb1 = '';
            $lb2 = '';
            $lb3 = '';
            foreach ($posts1 as $lb) {
                if ($lb->status == 0) {
                    $lb1 = 'Chưa phê duyệt';     
                } elseif($lb->status == 1) {
                    $lb2 = 'Đã phê duyệt';      
                }else{
                    $lb3 = 'Đã từ chối';      
                }   
            }
            $labels = [$lb1,$lb2,$lb3];
            $count1 = 0;
            $count2 = 0;
            $count3 = 0;
            foreach ($posts1 as $po) {
                if ($po->status == 0) {
                    $count1 = $count1+1;
                    
                }elseif ($po->status == 1) {
                    $count2 = $count2+1;
                }else {
                    $count3 = $count3+1;
                }
                
            }
            $data = [$count1,$count2,$count3];
            $colors = ['#36A2EB','#FFCE56','#8BC34A','#FF5722','#009688','#795548','#9C27B0','#2196F3','#FF9800','#CDDC39','#607D8B'];
            $datasets = [
                [
                    'label' => 'Số bài viết',
                    'data' => $data,
                    'backgroundColor' => $colors,
                ],
            ];


            //donut 2
            $posts2 = Post::all();
            $user2 = User::all();
            $labels2 = [];
            $count_labels2=0;
            foreach ($user2 as $us2) {
                array_push($labels2,$us2->name);
                $count_labels2 = $count_labels2 + 1;
            }
            $data2 = [];
            $count_2 = 0;
            for ($i=1; $i < $count_labels2 + 1; $i++) { //11111111111111112222222222222222333333333333333344444444444444445555555555555555
                foreach ($posts2 as $po) {
                    if ($po->user_id == $i) {
                        $count_2 = $count_2+1;
                    }  
                }
                array_push($data2,$count_2);
                $count_2 = 0;  
            }
            $colors2 = ['rgba(255, 99, 132, 1)','rgba(75, 192, 192, 1)','rgba(54, 162, 235, 1)','rgba(255, 159, 64, 1)','rgba(125, 102, 235, 1)'];
            $datasets2 = [
                [
                    'label' => 'Số bài viết',
                    'data' => $data2,
                    'backgroundColor' => $colors2,
                ],
            ];
    

            //bar - bình luận
            // $posts4 = Post::with('userComments')->get();
            $userposts4 = UserPost::where('type',1)->get();
            $user4 = User::where('role','US')->get();
            $labels4 = [];
            $count_labels4 =0;
            foreach ($user4 as $us4) {
                array_push($labels4,$us4->name);
                $count_labels4 = $count_labels4 + 1;
            }
            $data4 = [];
            $count_4 = 0;
            for ($i=1; $i < $count_labels4 + 1; $i++) { 
                foreach ($userposts4 as $up4){
                    if ($up4->user_id == $i + 1) {
                        $count_4 = $count_4 + 1;
                    }   
                } 
                array_push($data4,$count_4);
                $count_4 = 0;  
            }
            $colors4 = ['#9C27B0','#2196F3','#FF9800','#CDDC39','#607D8B'];
            $datasets4 = [
                [
                    'label' => 'Số bình luận',
                    'data' => $data4,
                    'backgroundColor' => $colors4,
                ],
            ];
    
    
    
            //bar2 - bình luận
            $userposts5 = UserPost::where('type',1)->whereBetween('created_at', [$datefrom,$dateto])->get();
            $user5 = User::where('role','US')->get();
            $labels5 = [];
            $count_labels5 = 0;
            foreach ($user5 as $us5) {
                array_push($labels5,$us5->name);
                $count_labels5 = $count_labels5 + 1;
            }
            $data5 = [];
            $count_5 = 0;
            for ($i=1; $i < $count_labels5 + 1; $i++) { 
                foreach ($userposts5 as $up5){
                    if ($up5->user_id == $i + 1) {
                        $count_5 = $count_5 + 1;
                    }   
                } 
                array_push($data5,$count_5);
                $count_5 = 0;  
            }
            $colors5 = ['#FF9800','#CDDC39','#607D8B'];
            $datasets5 = [
                [
                    'label' => 'Số bình luận',
                    'data' => $data5,
                    'backgroundColor' => $colors5,
                ],
            ];
    
            //bar - thích 
            // $posts4 = Post::with('userComments')->get();
            $userposts6 = UserPost::where('type',0)->get();
            $user6 = User::where('role','US')->get();
            $labels6 = [];
            $count_labels6 =0;
            foreach ($user6 as $us6) {
                array_push($labels6,$us6->name);
                $count_labels6 = $count_labels6 + 1;
            }
            $data6 = [];
            $count_6 = 0;
            for ($i=1; $i < $count_labels6 + 1; $i++) { 
                foreach ($userposts6 as $up6){
                    if ($up6->user_id == $i + 1) {
                        $count_6 = $count_6 + 1;
                    }   
                } 
                array_push($data6,$count_6);
                $count_6 = 0;  
            }
            $colors6 = ['#9C27B0','#2196F3','#FF9800','#CDDC39','#607D8B'];
            $datasets6 = [
                [
                    'label' => 'Số lượt thích',
                    'data' => $data6,
                    'backgroundColor' => $colors6,
                ],
            ];
    
    
    
            //bar2 - thích
            $userposts7 = UserPost::where('type',0)->whereBetween('created_at', [$datefrom,$dateto])->get();
            $user7 = User::where('role','US')->get();
            $labels7 = [];
            $count_labels7 = 0;
            foreach ($user7 as $us7) {
                array_push($labels7,$us7->name);
                $count_labels7 = $count_labels7 + 1;
            }
            $data7 = [];
            $count_7 = 0;
            for ($i=1; $i < $count_labels7 + 1; $i++) { 
                foreach ($userposts7 as $up7){
                    if ($up7->user_id == $i + 1) {
                        $count_7 = $count_7 + 1;
                    }   
                } 
                array_push($data7,$count_7);
                $count_7 = 0;  
            }
            $colors7 = ['#FF9800','#CDDC39','#607D8B'];
            $datasets7 = [
                [
                    'label' => 'Số lượt thích',
                    'data' => $data7,
                    'backgroundColor' => $colors7,
                ],
            ];

            if(!Auth::user()){
                return redirect('/login');
            }
            
            elseif (Auth::user()->role == 'AD') {
                
                return view('admins.dashboard',[
                    'user' => $user,
                    'post' => $post,
                    'like' => $like,
                    'cmt' => $cmt,
                    'datasets' => $datasets,
                    'labels' => $labels,
                    'datasets2' => $datasets2,
                    'labels2' => $labels2,
                    'datasets4' => $datasets4,
                    'labels4' => $labels4,
                    'datasets5' => $datasets5,
                    'labels5' => $labels5,
                    'datasets6' => $datasets6,
                    'labels6' => $labels6,
                    'datasets7' => $datasets7,
                    'labels7' => $labels7,
                    'datefrom' => $datefrom,
                    'dateto' => $dateto,
                    
                ]);
            }else{
                return redirect('/login');
            }
        
        }
        elseif (Auth::user()->role == 'US') {
            $notifications = Notification::where('follow_id',Auth::user()->id)->orderBy('created_at','DESC')->get();
            $notification2 = Notification::where('follow_id',Auth::user()->id)->where('read',0)->count();
            $user_notitfication = Notification::where('user_id',Auth::user()->id)->first();
            return view('users.index',[
                'posts' => $posts, 
                'user_notitfication' => $user_notitfication,
                // 'share' => $share, 
                'notifications' => $notifications, 
                'notification2' => $notification2,            
            ]);
        }
        else{
            return redirect('/login');
        }     
    }
    public function index()
    {
        
        if(!Auth::user()){
            return redirect('/login');
        }
        elseif (Auth::user()->role == 'AD') {
            if (isset($_GET['sort_by'])) {
                $sort_by = $_GET['sort_by'];
                if ($sort_by == 'ten_az') {
                    $posts = Post::where('user_id',Auth::user()->id)->orderBy('name','ASC')->paginate(3);
                    // ->paginate(3);
                } elseif($sort_by == 'ten_za') {
                    $posts = Post::where('user_id',Auth::user()->id)->orderBy('name','DESC')->paginate(3);
                }
                
            }
            elseif (isset($_GET['filter_by'])) {
                $filter_by = $_GET['filter_by'];
                if ($filter_by == 'da_phe_duyet') {
                    $posts = Post::where('user_id',Auth::user()->id)->where('status',1)->paginate(3);
                }
                elseif ($filter_by == 'cho_phe_duyet') {
                    $posts = Post::where('user_id',Auth::user()->id)->where('status',0)->paginate(3);
                }
                elseif ($filter_by == 'da_tu_choi') {
                    $posts = Post::where('user_id',Auth::user()->id)->where('status',2)->paginate(3);
                }
            }elseif(request()->search_post){
                $search = request()->search_post;
                $posts = Post::where('user_id',Auth::user()->id)->where('name','like','%'.$search.'%')->paginate(3);
            }
            else{
                $posts = Post::where('user_id',Auth::user()->id)->orderBy('id','ASC')->paginate(3);
            }
            return view('admins.post',[
                'posts' => $posts,
            ]);
        }
        elseif (Auth::user()->role == 'US') {
            //$posts = Post::where('user_id',Auth::user()->id)->paginate(3);
            $notifications = Notification::where('follow_id',Auth::user()->id)->orderBy('created_at','DESC')->get();
            $notification2 = Notification::where('follow_id',Auth::user()->id)->where('read',0)->count();
            $user_notitfication = Notification::where('user_id',Auth::user()->id)->first();
            if (isset($_GET['sort_by'])) {
                $sort_by = $_GET['sort_by'];
                if ($sort_by == 'ten_az') {
                    $posts = Post::where('user_id',Auth::user()->id)->orderBy('name','ASC')->paginate(3);
                    // ->paginate(3);
                } elseif($sort_by == 'ten_za') {
                    $posts = Post::where('user_id',Auth::user()->id)->orderBy('name','DESC')->paginate(3);
                }
                
            }
            elseif (isset($_GET['filter_by'])) {
                $filter_by = $_GET['filter_by'];
                if ($filter_by == 'da_phe_duyet') {
                    $posts = Post::where('user_id',Auth::user()->id)->where('status',1)->paginate(3);
                }
                elseif ($filter_by == 'cho_phe_duyet') {
                    $posts = Post::where('user_id',Auth::user()->id)->where('status',0)->paginate(3);
                }
                elseif ($filter_by == 'da_tu_choi') {
                    $posts = Post::where('user_id',Auth::user()->id)->where('status',2)->paginate(3);
                }
            }elseif(request()->search_post){
                $search = request()->search_post;
                $posts = Post::where('user_id',Auth::user()->id)->where('name','like','%'.$search.'%')->paginate(3);
            }
            else{
                $posts = Post::where('user_id',Auth::user()->id)->orderBy('id','ASC')->paginate(3);
            }
            return view('users.post',[
                'posts' => $posts,
                'user_notitfication' => $user_notitfication,
                'notifications' => $notifications, 
                'notification2' => $notification2, 
            ]);
        }
        else{
            return redirect('/login');
        }     
    }
    public function postUser($id)
    {
        $posts = Post::where('user_id',$id)->where('status',1)->paginate(5);
        $user = User::find($id);
        if(!Auth::user()){
            return view('users.post_other',[
                'posts' => $posts,
                'user' => $user,
            ]);
        }
        //$posts = Post::where('user_id',$id)->where('status',1)->paginate(5);
        $notifications = Notification::where('follow_id',Auth::user()->id)->orderBy('created_at','DESC')->get();
        $notification2 = Notification::where('follow_id',Auth::user()->id)->where('read',0)->count();
        $user_notitfication = Notification::where('user_id',Auth::user()->id)->first();  
        if (isset($_GET['sort_by'])) {
            $sort_by = $_GET['sort_by'];
            if ($sort_by == 'ten_az') {
                $posts = Post::where('user_id',$id)->where('status',1)->orderBy('name','ASC')->paginate(5);
                // ->paginate(3)->appends(request()->query());
            } elseif($sort_by == 'ten_za') {
                $posts = Post::where('user_id',$id)->where('status',1)->orderBy('name','DESC')->paginate(5);
            }
            
        }
        elseif(request()->search_admin_post){
            $search = request()->search_admin_post;
            $posts = Post::where('user_id',$id)->where('status',1)->where('name','like','%'.$search.'%')->paginate(5);
        }
        else{
            $posts = Post::where('user_id',$id)->where('status',1)->orderBy('id','ASC')->paginate(5);
        }
        return view('users.post_other',[
            'posts' => $posts,
            'user' => $user,
            'user_notitfication' => $user_notitfication,
            'notifications' => $notifications,
            'notification2' => $notification2,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        if(!Auth::user()){
            return redirect('/login');
        }
        elseif (Auth::user()->role == 'AD') {
            return view('posts.create',[ 
            ]);
        }
        elseif (Auth::user()->role == 'US') {
            $notifications = Notification::where('follow_id',Auth::user()->id)->orderBy('created_at','DESC')->get();
            $notification2 = Notification::where('follow_id',Auth::user()->id)->where('read',0)->count();
            $user_notitfication = Notification::where('user_id',Auth::user()->id)->first();
            return view('posts.create',[
                'user_notitfication' => $user_notitfication,
                'notifications' => $notifications, 
                'notification2' => $notification2, 
            ]);
        }
        else{
            return redirect('/login');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //posts
        $newImageName = $request->file('image')->getClientOriginalName();
        $request->image->move(public_path('images'),$newImageName);
        
        $request -> validate([
            'name' => 'required|min:0|max:1000',
            'content' => 'required',
            'description' => 'required',
            
        ]);
        $post = Post::create([
            'user_id' => Auth::user()->id,
            'name' => $request->input('name'),
            'content' => $request->input('content'),
            'description' => $request->input('description'),
            'image_path' => $newImageName,
        ]);
        $post->save();

        //notifications
        $post2 = Post::where('user_id',Auth::user()->id)->orderBy('created_at','DESC')->limit(1)->get();
        foreach ($post2 as $item) {
            $postid = $item->id;
        }

        $follow = Follow::where('user_id',Auth::user()->id)->get();
        foreach ($follow as $item) {
            $notification = Notification::create([
                'user_id' => Auth::user()->id,
                'follow_id' => $item->follow_id,
                'post_id' => $postid,
            ]);
            $notification->save();
        }
        return redirect()->back();
    }

    public function show(string $id)
    {
        $post = Post::query()->with('userComments')->withCount(['userLikes', 'userComments'])->find($id);
        $share = \Share::page(
            url('/post/{id}'),
            $post->name
        )
        ->facebook()
        ->reddit()
        ->telegram();
        
        if(!Auth::user()){
            return view('show', compact('post'));
        }
        elseif (Auth::user()->role == 'AD') {
            if ($post->status == '1') {
                return view('admins.show', compact('post'));
            } else {
                return view('admins.show_approve', compact('post'));
            }    
        }
        elseif (Auth::user()->role == 'US') {
            $like = UserPost::where('post_id',$id)->where('user_id',Auth::user()->id)->where('type','0')->first();
            $notifications = Notification::where('follow_id',Auth::user()->id)->orderBy('created_at','DESC')->get(); 
            $notification2 = Notification::where('follow_id',Auth::user()->id)->where('read',0)->count();
            $user_notitfication = Notification::where('user_id',Auth::user()->id)->first();
            if ($post->status == '1') {
                return view('users.show', compact('post','share','like','notifications','notification2','user_notitfication'));
            } else {
                return view('users.show_approve', compact('post','share','like','notifications','notification2','user_notitfication'));
            }
        }
        else{
            return redirect('/login');
        }
    }


    public function edit(string $id)
    {
        
        $post = Post::find($id);
        
        if(!Auth::user()){
            return redirect('/login');
        }
        elseif (Auth::user()->role === 'AD') {
            
            return view('posts.edit', compact('post'));
        }
        elseif (Auth::user()->role === 'US') {
            $notifications = Notification::where('follow_id',Auth::user()->id)->orderBy('created_at','DESC')->get();
            $notification2 = Notification::where('follow_id',Auth::user()->id)->where('read',0)->count();
            $user_notitfication = Notification::where('user_id',Auth::user()->id)->first();
            return view('posts.edit', compact('post','notifications','notification2','user_notitfication'));
        }
        else{
            return redirect('/login');
        }
        
    }

    public function update(Request $request, string $id)
    {
        $imageName = $request->file('image')->getClientOriginalName();
        $request->image->move(public_path('images'),$imageName);

        // $request -> validated([
        //     'name' => 'required|min:0|max:1000',
        //     'content' => 'required',
        //     'description' => 'required',
        //     'image' => 'required|mimes:jpg,png,jpeg'
        // ]);
        $post = Post::where('id',$id)
        ->update([
            'name' => $request->input('name'),
            'content' => $request->input('content'),
            'description' => $request->input('description'),
            'image_path' => $imageName,
        ]);  
        return redirect('/posts');
    }

    public function destroy(string $id)
    {
        $post = Post::find($id);
        if(!Auth::user()){
            return redirect('/login');
        }
        elseif (Auth::user()->role == 'AD') {
            $post->delete();
            return redirect('/posts');
        }
        elseif (Auth::user()->role == 'US') {
            $post->delete();
            return redirect('/posts');
        }
        else{
            return redirect('/login');
        }    
    }
    // danh sách bài viết phê duyệt
    public function approve(){
        $posts = Post::where('status',0)
                // ->with('user')
                ->paginate(5);   
        if(!Auth::user()){
            return redirect('/login');
        }
        elseif (Auth::user()->role == 'AD') {
            if (isset($_GET['sort_by'])) {
                $sort_by = $_GET['sort_by'];
                if ($sort_by == 'ten_az') {
                    $posts = Post::where('status',0)->orderBy('name','ASC')->paginate(5);
                    // ->paginate(3)->appends(request()->query());
                } elseif($sort_by == 'ten_za') {
                    $posts = Post::where('status',0)->orderBy('name','DESC')->paginate(5);
                }
                
            }
            elseif(request()->search_approve){
                $search = request()->search_approve;
                $posts = Post::where('status',0)->where('name','like','%'.$search.'%')->paginate(5);
            }
            else{
                $posts = Post::where('status',0)->orderBy('id','ASC')->paginate(5);
            }
            return view('admins.approve',[
                'posts' => $posts,
            ]);
        }
        else{
            return redirect('/login');
        }     
    }
    // chi tiết bài viết phê duyệt
    public function show_approve($id){
        $post = Post::find($id);
        $user = User::find($id);
        if(!Auth::user()){
            return view('show')->with('post',$post);
        }
        elseif (Auth::user()->role == 'AD') {
            return view('admins.show_approve',[
                'post' => $post,
                'user' => $user, 
            ]);
        }
        else{
            return redirect('/login');
        }
    }
    // nút phê duyệt
    public function accept_post($id){
        $post = Post::find($id);
        $post->status = '1';
        $post->save();
        return redirect()->back()->with('message', 'Phê duyệt thành công');
    }
    // nút từ chối
    public function reject_post($id){
        $post = Post::find($id);
        $post->status = '2';
        $post->save();
        return redirect()->back()->with('message', 'Bài viết đã bị từ chối');
    }
    public function admin_post(){
        
        if(!Auth::user()){
            return redirect('/login');
        }
        elseif (Auth::user()->role == 'AD') {
            if (isset($_GET['sort_by'])) {
                $sort_by = $_GET['sort_by'];
                if ($sort_by == 'ten_az') {
                    $posts = Post::orderBy('name','ASC')->paginate(5);
                    // ->paginate(3)->appends(request()->query());
                } elseif($sort_by == 'ten_za') {
                    $posts = Post::orderBy('name','DESC')->paginate(5);
                }
                
            }
            elseif (isset($_GET['filter_by'])) {
                $filter_by = $_GET['filter_by'];
                if ($filter_by == 'da_phe_duyet') {
                    $posts = Post::where('status',1)->paginate(5);
                }
                elseif ($filter_by == 'cho_phe_duyet') {
                    $posts = Post::where('status',0)->paginate(5);
                }
                elseif ($filter_by == 'da_tu_choi') {
                    $posts = Post::where('status',2)->paginate(5);
                }
            }elseif(request()->search_admin_post){
                $search = request()->search_admin_post;
                $posts = Post::where('name','like','%'.$search.'%')->paginate(5);
            }
            else{
                $posts = Post::orderBy('id','ASC')->paginate(5);
            }
            return view('admins.admin_post',[
                'posts' => $posts,
            ]);
        }else{
            return redirect('/login');
        }  
        
    }
    public function admin_comment(){ 
        $posts = Post::with('userComments')->withCount('userComments')->paginate(10);  
        if(!Auth::user()){
            return redirect('/login');
        }
        elseif (Auth::user()->role == 'AD') {
            return view('admins.admin_comment',[
                'posts' => $posts,
            ]);
        }else{
            return redirect('/login');
        }
    }
    // public function deleteComment(string $id){
    //     $userpost = UserPost::where('',$id);
    //     dd($userpost);
    //     $userpost->delete();
    //     return redirect()->back(); 
    // }
    public function admin_user(){  
        if(!Auth::user()){
            return redirect('/login');
        }
        elseif (Auth::user()->role == 'AD') {
            if (isset($_GET['sort_by'])) {
                $sort_by = $_GET['sort_by'];
                if ($sort_by == 'ten_az') {
                    $users = User::orderBy('name','ASC')->paginate(3);
                    // ->paginate(3)->appends(request()->query());
                } elseif($sort_by == 'ten_za') {
                    $users = User::orderBy('name','DESC')->paginate(3);
                }
                
            }
            elseif (isset($_GET['filter_by'])) {
                $filter_by = $_GET['filter_by'];
                if ($filter_by == 'role_admin') {
                    $users = User::where('role','AD')->paginate(3);
                }
                elseif ($filter_by == 'role_user') {
                    $users = User::where('role','US')->paginate(3);
                }
               
            }elseif(request()->search_admin_user){
                $search = request()->search_admin_user;
                $users = User::where('name','like','%'.$search.'%')->paginate(3);
            }
            else{
                $users = User::orderBy('id','ASC')->paginate(3);
            }
            return view('admins.admin_user',[
                'users' => $users,
            ]);
        }else{
            return redirect('/login');
        }
    }
    public function deleteUser(Request $request){
        $data = $request->all();
        $user = User::where('user_id',$data['user_id'])->first();
        if ($user) {
            $user->delete();
            echo 'True';
        }else{
            echo 'False';
        }
        
    }

    public function notification(){
        $notifications = Notification::where('follow_id',Auth::user()->id)->get();
        foreach ($notifications as $item) {
            $item->read = '1';
            $item->save();
        }
    } 
    
    public function form(){
        return view('form');
    }
}
