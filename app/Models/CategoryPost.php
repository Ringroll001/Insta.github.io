<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
    use HasFactory;

    protected $table = 'category_post'; // to crrect the table name 
    protected $fillable = ['category_id', 'post_id'];//allow mass assignment

    public $timestamps = false; //this is the automatic timestamp create_at and update_at

    public function category( ){
        return $this->belongsTo(Category::class);
    }
}
