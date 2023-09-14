<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'follow_id',
        'post_id',
        'read',
    ];
    public function userNotify(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
