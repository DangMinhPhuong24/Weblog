<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'content',
        'image_path',
        'description',
    ];
    
    public function userLikes(){
        return $this->belongsToMany(User::class, 'user_posts', 'post_id', 'user_id')
            ->withPivot(['type'])->wherePivot('type', 0);
    }
    
    public function userComments(){
        return $this->belongsToMany(User::class, 'user_posts', 'post_id', 'user_id')
            ->withPivot(['type', 'cmt','id'])->wherePivot('type', 1);
    }
    public function userPost(){
        return $this->hasMany(UserPost::class, 'post_id', 'id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}


