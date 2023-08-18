<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{

    private $category;

    public function __construct(Category $category){
        $this->category = $category;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() :void
    {
        $categories = [
                [
                    'name' => 'Travel',
                    'created_at' => NOW( ),
                    'updated_at' => NOW( )
                ],
                [
                    'name' => 'Food',
                    'created_at' => NOW( ),
                    'updated_at' => NOW( )
                ],
                [
                    'name' => 'Lifestyle',
                    'created_at' => NOW( ),
                    'updated_at' => NOW( )
                ],
                [
                    'name' => 'Music',
                    'created_at' => NOW( ),
                    'updated_at' => NOW( )
                ],
                [
                    'name' => 'Career',
                    'created_at' => NOW( ),
                    'updated_at' => NOW( )
                ],
                [
                    'name' => 'Sports',
                    'created_at' => NOW( ),
                    'updated_at' => NOW( )
                ],
                [
                    'name' => 'Games',
                    'created_at' => NOW( ),
                    'updated_at' => NOW( )
                ],

            ];
            foreach($categories as $categorydata){
                $this->category->create($categorydata );

            }
    }
}
