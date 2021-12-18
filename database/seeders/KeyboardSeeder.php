<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeyboardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        $keyboard = [
            ['category_id'=>1,
            "name"=>"87 Ghost TKL Gaming Rexus Legionare Key Mechanical MX5.1 Keyboard Anti",
            "price"=>87,
            "description"=>"87 Mechanical Switch Anti-ghosting Rexus Mechanical Keyboard MX5.1 menggunakan 87 switch independen merek Content yang masing-masing punya durabilitas hingga 50 juta kali klik. ",
            "image_path"=>"images/keyboard/87key1.jpg"
            ],
            ['category_id'=>1,
                "name"=>"Keychron K1-87 key Ultra Slim WHITE Backlight Aluminum Body Keyboard - Brown Switch",
                "price"=>87,
                "description"=>"87 Mechanical Switch Anti-ghosting Rexus Mechanical Keyboard MX5.1 menggunakan 87 switch independen merek Content yang masing-masing punya durabilitas hingga 50 juta kali klik.",
                "image_path"=>"images/keyboard/87key2.jpg"
            ],
            ['category_id'=>1,
            "name"=>"Tecware Phantom 87 Keys - Backlit Mechanical Ten Key Less Keyboard - Brown Switch",
            "price"=>60,
            "description"=>"87 Mechanical Switch Anti-ghosting Rexus Mechanical Keyboard MX5.1 menggunakan 87 switch independen merek Content yang masing-masing punya durabilitas hingga 50 juta kali klik. ",
            "image_path"=>"images/keyboard/87key3.jpg"
            ],
            ["category_id"=>2,
            "name"=>"61 key backlit RGB keyboard mekanik game kecil komputer notebook porta",
            "price"=>56,
            "description"=>"87 Mechanical Switch Anti-ghosting Rexus Mechanical Keyboard MX5.1 menggunakan 87 switch independen merek Content yang masing-masing punya durabilitas hingga 50 juta kali klik.",
            "image_path"=>"images/keyboard/61key1.jpg"
            ],
            ["category_id"=>2,
            "name"=>"Kraken Pro 60 - BRED Edition 60% Mechanical Keyboard RGB Gaming Keyboard (Silver Speed Switches)",
            "price"=>30,
            "description"=>"87 Mechanical Switch Anti-ghosting Rexus Mechanical Keyboard MX5.1 menggunakan 87 switch independen merek Content yang masing-masing punya durabilitas hingga 50 juta kali klik.",
            "image_path"=>"images/keyboard/61key2.jpg"
            ],
            ["category_id"=>2,
            "name"=>"HUICCN Mechanical Gaming Bluetooth Keyboard 60% - 61 Keys Hot-Swappable Programmable Wireless Keyboard with RGB Backlit",
            "price"=>97,
            "description"=>"87 Mechanical Switch Anti-ghosting Rexus Mechanical Keyboard MX5.1 menggunakan 87 switch independen merek Content yang masing-masing punya durabilitas hingga 50 juta kali klik. ",
            "image_path"=>"images/keyboard/61key3.jpg"
            ],
            ["category_id"=>3,
            "name"=>"Cherry MX Mechanical Gaming Keyboard Black G80-3000S TKL NBL - RED SWITCH",
            "price"=>117,
            "description"=>"87 Mechanical Switch Anti-ghosting Rexus Mechanical Keyboard MX5.1 menggunakan 87 switch independen merek Content yang masing-masing punya durabilitas hingga 50 juta kali klik.",
            "image_path"=>"images/keyboard/cherryprofile1.jpg"
            ],
            ["category_id"=>3,
            "name"=>"Sades Dragon Wolf TKL Mechanical Gaming Keyboard / Switch Cherry MX",
            "price"=>37,
            "description"=>"87 Mechanical Switch Anti-ghosting Rexus Mechanical Keyboard MX5.1 menggunakan 87 switch independen merek Content yang masing-masing punya durabilitas hingga 50 juta kali klik.",
            "image_path"=>"images/keyboard/cherryprofile2.jpg"
            ],
            ["category_id"=>3,
            "name"=>"HyperX Alloy Elite RGB Cherry MX Blue Mechanical Gaming Keyboard",
            "price"=>57,
            "description"=>"87 Mechanical Switch Anti-ghosting Rexus Mechanical Keyboard MX5.1 menggunakan 87 switch independen merek Content yang masing-masing punya durabilitas hingga 50 juta kali klik.",
            "image_path"=>"images/keyboard/cherryprofile3.jpg"
            ],
            ["category_id"=>4,
            "name"=>"Q1 & K2 OEM Dye-Sub PBT Keycap Set - Wheat Grey",
            "price"=>94,
            "description"=>"87 Mechanical Switch Anti-ghosting Rexus Mechanical Keyboard MX5.1 menggunakan 87 switch independen merek Content yang masing-masing punya durabilitas hingga 50 juta kali klik.",
            "image_path"=>"images/keyboard/xdaprofile1.jpg"
            ],
            ["category_id"=>4,
            "name"=>"Q1 & K2 OEM Dye-Sub PBT Keycap Set - Rainbow",
            "price"=>85,
            "description"=>"87 Mechanical Switch Anti-ghosting Rexus Mechanical Keyboard MX5.1 menggunakan 87 switch independen merek Content yang masing-masing punya durabilitas hingga 50 juta kali klik.",
            "image_path"=>"images/keyboard/xdaprofile2.jpg"
            ],
            ["category_id"=>4,
            "name"=>"Q1 & K2 OEM Dye-Sub PBT Keycap Set - Ocean",
            "price"=>66,
            "description"=>"87 Mechanical Switch Anti-ghosting Rexus Mechanical Keyboard MX5.1 menggunakan 87 switch independen merek Content yang masing-masing punya durabilitas hingga 50 juta kali klik.",
            "image_path"=>"images/keyboard/xdaprofile3.jpg"
            ],
        ];
        DB::table("keyboards")->insert($keyboard);

    }
}
