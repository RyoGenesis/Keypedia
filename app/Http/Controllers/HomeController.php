<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categ = Category::all();
        return view('home')->with('categories', $categ);
    }
}
