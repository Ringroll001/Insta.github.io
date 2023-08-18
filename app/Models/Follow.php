<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function followers( ){
        return $this->belongsTo(User::class,'follower_id')->withTrashed( );
    }

    //to get the of the user being follows
    public function following( ){
        return $this->belongsTo(User::class,'following_id')->withTrashed( );
    }

    
}
