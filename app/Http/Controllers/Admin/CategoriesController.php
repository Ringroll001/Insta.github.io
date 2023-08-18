<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class CategoriesController extends Controller
{
    private $category;

    private $post;

    public function __construct(Category $category, Post $post){
        $this->category = $category;
        $this->post = $post;
    }

    public function index( ){
        $all_categories= $this->category->latest( )->get( );
        $all_post = $this->post->all( );
        $uncategoized_count = 0;

        foreach($all_post as $post){
            if ( $post->categoryPost->count( ) == 0 ) {
                $uncategoized_count++;
            }
        }

        return view('admin.categories.index')->with('all_categories', $all_categories)->with('uncategoized_count', $uncategoized_count);
    }

    public function store(Request $request){
      
        $request->validate([
                'name' => 'required|string|max:255',
        ]);

        $this->category->name  = ucwords(strtolower($request->name));
        $this->category->save( );
      
        return redirect( )->back( );
    }

    public function edit($id ){
        $category = $this->category->findOrFail($id);
        return view('admin.categories.edit')->with('category', $category);
    }

    public function update( Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
    ]);
         $category = $this->category->findOrFail($id);
        $category->name = $request->name;
        $category->save( );

        return redirect( )->route('admin.categories');
    }
    

    public function destroy($id){
        $category = $this->category->findOrFail($id);
        $category->delete( );
        $category->categoryPost( )->delete( );

        return redirect( )->back( );
    }
    


}
