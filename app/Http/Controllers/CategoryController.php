<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Keyboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

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
    public function viewAddCategory(){
        $categ = Category::all();
        return view('add_category')->with('categories', $categ);
    }

    public function addCategory(Request $request){
        $validate=[
            "category_name"=>"required|unique:categories|min:5",
            "image"=>"required|file|image"
        ];
        $request->validate($validate);

        $imgfile = $request->file('image');
        $imageName = time().'_'.$imgfile->getClientOriginalName();
        Storage::putFileAs('public/images/category/',$imgfile,$imageName);
        $imagePath = 'images/category/'.$imageName;
        
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->image_path = $imagePath;
        $category->save();
        return redirect()->back()->with("success","Add Category Success!");
    }

    public function updateIndex($id){
        $categ = Category::all();

        $category = Category::find($id);

        return view('update_category')->with('categories',$categ)->with('category', $category);
    }

    //bug unresolved
    public function update(Request $request){
        $validation = [
           "category_name"=>['required','min:5',Rule::unique('categories')->ignore($request->id)],
            "image"=>"nullable|image"
        ];
        $request->validate($validation);

        $id = $request->id;

        $category = Category::find($id);
        if($category == null) return redirect()->back(); //for safety

        $imgfile = $request->file('image');

        if($imgfile != null){
            $imageName = time().'_'.$imgfile->getClientOriginalName();
            //putFileAs ga nyimpen gambarnya. BUG ???
            //Storage::putFileAs('public/images/category', $imgfile, $imageName);
            $imagePath = 'images/category/'.$imageName;
            //Storage::delete('public/images'.$category->image_path);
            $category->image_path = $imagePath;
            //dd($category->image_path);
        }
       
        $category->category_name = $request->category_name;
        $category->save();
        return redirect()->back()->with("success","Category update Success!");
    }
}
