<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = [
        ["role_name"=>"Manager"],
        ["role_name"=>"Customer"],
        ["role_name"=>"Guest"],
        ];
        // DB::table("keyboards")->insert($keyboard);
        DB::table("roles")->insert($role);
    }
}
