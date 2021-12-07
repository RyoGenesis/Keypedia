<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Keyboard;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index($id){
        $categ = Category::all();

        $category = Category::find($id);
        $keyboards = Keyboard::where('category_id',$category->id)->simplePaginate(8);

        return view('view_keyboard')->with('categories',$categ)->with('keyboards', $keyboards)->with('category',$category);
    }

    public function manage()
    {
        $categ = Category::all();
        return view('manage_categories')->with('categories', $categ);
    }
}
