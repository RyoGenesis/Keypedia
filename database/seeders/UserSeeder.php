<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            ["role_id"=>1,"username"=>"manager",
            "email_address"=>"manager@gmail.com","password"=>Hash::make("manager123"),
            "address"=>"Manager Address","gender"=>"Male","dob"=>"2001-12-25"],
            ["role_id"=>2,"username"=>"customer",
            "email_address"=>"customer@gmail.com","password"=>Hash::make("customer123"),
            "address"=>"Customer Address","gender"=>"Male","dob"=>"2000-1-17"]
            
        ];
        DB::table("users")->insert($user);
    }
}
