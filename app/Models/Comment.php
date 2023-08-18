<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    //to get info ofthe comment
    public function user( ){
        return $this->belongsTo(User::class)->withTrashed( );
    }
}
