<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ["category_name"=>"87 Key Keyboard","image_path"=>"images/category/87-key-keyboard.jpg"],
            ["category_name"=>"61 Key Keyboard","image_path"=>"images/category/61-key-keyboard.jpg"],
            ["category_name"=>"Cherry Profile","image_path"=>"images/category/cherry-key-keyboard.jpg"],
            ["category_name"=>"XDA Profile","image_path"=>"images/category/xda-key-keyboard.jpg"]
        ];
        DB::table("categories")->insert($categories);
    }
}
