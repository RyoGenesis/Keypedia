<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Keyboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class KeyboardController extends Controller
{
    //
    public function index($id){
        $categ = Category::all();

        $keyboard = Keyboard::where('id',$id)->first();

        return view('keyboard_details')->with('categories',$categ)->with('keyboard', $keyboard);
    }

    public function addIndex(){
        $categ = Category::all();

        return view('add_keyboard')->with('categories',$categ);
    }

    public function add(Request $request){
        $validation = [
            "category"=>'required',
            "name"=>"required|unique:keyboards,name|min:5",
            "price"=>"integer|numeric|min:1",
            "description"=>"required|min:20",
            "image"=>"file|image|required"
        ];
        $temp = $request->validate($validation);

        $imgfile = $request->file('image');
        $imageName = time().'_'.$imgfile->getClientOriginalName();

        Storage::putFileAs('public/images', $imgfile, $imageName);
        $imagePath = 'images/keyboard/'.$imageName;
        //pathnya belum selesai kalau mau disubcategory lg
        
        $keyboard = new Keyboard();
        $keyboard->category_id = $request->category;
        $keyboard->name = $request->name;
        $keyboard->price = $request->price;
        $keyboard->description = $request->description;
        $keyboard->image_path = $imagePath;
        $keyboard->save();
        return redirect()->back()->with("success","Register Success!");
        //belum di test, might change later
    }
}
