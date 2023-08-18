<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    const ADMIN_ROLE_ID = 1;

    const USER_ROLE_ID = 2;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //to get all the posts of a user
    public function posts( ){
        return $this->hasMany(Post::class);
    }

    //to get all the followeres of a user
    public function followers( ){
        return $this->hasMany(Follow::class,'following_id');
    }

    public function following( ){
        return $this->hasMany(Follow::class,'follower_id');

        //following_id can show who are following me 
    }

    public function isFollowed( ){
        return $this->followers( )->where('follower_id',Auth::user( )->id)->exists( );
    }

    //Authuser( )->id follower_id
    //get all the followers of the user($this->followers( )),then from that list, search for the auth user from the foloower column (where ('follower_id',Auth::user( )->id))

    
 }
