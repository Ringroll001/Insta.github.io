<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

     private $post;

     private $user;

    public function __construct(Post $post, User $user)
    {
      $this->post = $post;  
      $this->user = $user;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $home_posts = $this->getHomePosts( );
        $suggested_users = $this->getSuggestionUsers( );

        return view('users.home')
            ->with('home_posts', $home_posts)
            ->with('suggested_users', $suggested_users);
        
    }

    //get the posts of the users that the auth user is following 
    private function getHomePosts( ){
        $all_posts = $this->post->latest( )->get( );
        $home_posts= [ ]; //in case of $home_post is empty. it will not return NULL but empty instead.

        foreach($all_posts as $post){
            if ($post->user->isFollowed( ) || $post->user->id === Auth::user( )->id ) {
                $home_posts[] = $post;
            }
        }
        return $home_posts;
    }

    //get the users that the auth user is not following 
    private function getSuggestionUsers( ){
        $all_users = $this->user->all( )->except(Auth::user( )->id);
        $suggested_users = [ ];

        foreach($all_users as $user){
           
                if ( !$user->isFollowed( )) {
                    $suggested_users[ ] = $user;
                }
            }
            //array_slicee(x , y , z) x = name of the array , y = starting index , x = length of array to be display
             return array_slice($suggested_users, 0 , 5 );
        }
        
        public function search(Request $request)
        {
            $users = $this->user->where('name', 'like', '%' . $request->search.'%')->get( );
            return view('users.search')->with('users', $users)->with('search', $request->search);
        }
    }
    

