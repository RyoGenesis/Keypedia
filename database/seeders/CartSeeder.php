<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cart = [
            ["keyboard_id"=>"1","user_id"=>"2","quantity"=>"3"],
            ["keyboard_id"=>"2","user_id"=>"2","quantity"=>"1"],
            ["keyboard_id"=>"3","user_id"=>"2","quantity"=>"4"]
        ];
        DB::table("cart_items")->insert($cart);
    }
}
