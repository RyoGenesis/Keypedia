<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Keyboard;
use Illuminate\Http\Request;

class KeyboardController extends Controller
{
    //
    public function index($id){
        $categ = Category::all();

        $keyboard = Keyboard::where('id',$id)->first();

        return view('keyboard_details')->with('categories',$categ)->with('keyboard', $keyboard);
    }
}
