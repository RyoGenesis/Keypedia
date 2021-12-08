<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class MyCartController extends Controller
{
    public function index(){
        $categ = Category::all();
        return view("mycart")->with('categories',$categ);
    }
}
