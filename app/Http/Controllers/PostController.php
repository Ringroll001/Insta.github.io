<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    private $post;

    private $category;

    public function __construct(Post $post, Category $category){
        $this->post =$post;
        $this->category = $category;
    }

    public function create( ){
        $all_categories = $this->category->all( );
        return view('users.posts.create')->with('all_categories', $all_categories);
    }

    public function store(Request $request){
        // validate all the form data
        $request->validate([
                'category' => 'required|array|between:1, 3',
                'description' => 'required | min:1|max:1000',
                'image' => 'required | mimes:jpeg, jpg,png,gif|max:1048'
        ]);
        //save the post
        $this->post->user_id  = Auth::user( )->id;
        //base 64 is function of store the image into the datebase
        $this->post->image   = 'data:image/' . $request->image->extension( ). ';base64,' . base64_encode(file_get_contents($request->image ));
        $this->post->description = $request->description;
        $this->post->save( );

          //save the categories to the category_post table
          foreach($request->category as $category_id){
                $category_post[ ] = ['category_id' => $category_id];
        }

        $this->post->categoryPost( )->createMany($category_post); //createMany( ) accepts 2d array
        //give $this->post->id = 2
        //request->category = [1,4];
        
        //after the foreach loop
        //$category_post = [
        // ['category_id' =>1],
        //['category_id' =>4],
        //];

        //after the $this->post->categoryPost( )
        //$category_post = [
        // ['category_id' => 1, 'post_id' =>2 ],
        //  ['category_id' => 4, 'post_id' =>2 ],
        // ];

        //createMany( ) accepts 2d array( $category_post) and saves it into category_post table 

        //go back to home page
        return redirect( )->route('index');
    }

    public function show($id){
        $post = $this->post->findOrFail($id);

        return view('users.posts.show')->with('post', $post);
    }


    public function edit($id){
        $post = $this->post->findOrFail($id);

        if (Auth::user( )->id != $post->user->id) {
                return redirect( )->route('idenx');
        }

        $all_categories = $this->category->all( );

        //get all the category Ids of this post. save in an array

        $selected_categories = [ ];
        foreach($post->categoryPost as $category_post){
                $selected_categories[ ] = $category_post->category_id;
        }

        return view('users.posts.edit')
                        ->with('post' , $post)
                        ->with('all_categories' , $all_categories)
                        ->with('selected_categories', $selected_categories);
    }

    public function update(Request $request, $id){
        $request->validate([
                'category' => 'required|array|between:1,3',
                'description' => 'required|min:1|max:100',
                'image' =>'mimes:jpg,jpeg,png,gif|max:1048'
        ]);

        $post = $this->post->findOrFail($id);
        $post->description = $request->description;

        if($request->image){
                $post->image = 'data:image/' . $request->image->extension( ) . ';base64,' . base64_encode(file_get_contents($request->image)); 
        }

        $post->save( );

        //delete all records from the category_post related to this post 
        $post->categoryPost( )->delete( );
        //user the relation shop Post::categorypost ( )to select the record to a post 
        //equivalent to : delete from category_post where post_id = $post

        //4. save the new categories to category_post table 
        foreach ($request->category as  $category_id) {
                $category_post[ ] = ['category_id' => $category_id];
        }

        $post->categoryPost( )->createMany($category_post);// 

        //5. redirect to show post page (to comfirm the update records)
        return redirect( )->route('post.show', $id);
    }

//     public function deleteImage($image){

//         $image = $this->post->image;
//         $image_path = public_path(self::LOCAL_STORAGE_FOLDER .'/'.$image);

//         if(file_exists($image_path)){
//                 unlink($image_path);
//         }

//     }


    public function destroy($id){
        $post = $this->post->findOrFail($id);
        $post->forceDelete( );
        
        return redirect( )->route('index');
    }
      

}
