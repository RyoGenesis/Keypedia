<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Keyboard;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class KeyboardController extends Controller
{
    //
    public function index($id){
        $categ = Category::all();

        $keyboard = Keyboard::find($id);

        return view('keyboard_details')->with('categories',$categ)->with('keyboard', $keyboard);
    }

    public function search(Request $request){
        $validation = [
            "category"=>'required|string|in:name,price,price less,price more',
        ];

        $request->validate($validation);
        $category = Category::find($request->id);

        $categ = Category::all();

        if($request->category == "name") $keyboard = $this->searchByName($request,$category->id);
        else $keyboard = $this->searchByPrice($request,$category->id);

        return view('view_keyboard')
            ->with('categories',$categ)
            ->with('keyboards', $keyboard)
            ->with('category',$category)
            ->with("success","Search result for (".$request->category.") : ".$request->input);
        
    }

    private function searchByName(Request $request,$id){
        $keyboard = Keyboard::where('category_id',$id)->where('name',"LIKE","%".$request->input."%")->orderBy('name','asc')->simplePaginate(8);
        return $keyboard;
    }

    private function searchByPrice(Request $request,$id){
        $validation = [
            "input"=>'required|integer|min:0',
        ];

        $request->validate($validation);
        switch($request->category){
            case 'price less':
                $keyboard = Keyboard::where('category_id',$id)->where('price','<=',$request->input)->orderBy('name','asc')->simplePaginate(8);
                break;
            case 'price more':
                $keyboard = Keyboard::where('category_id',$id)->where('price','>=',$request->input)->orderBy('name','asc')->simplePaginate(8);
                break;
            default:
                $keyboard = Keyboard::where('category_id',$id)->where('price',$request->input)->orderBy('name','asc')->simplePaginate(8);
                break;
        }
        
        return $keyboard;
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

        Storage::putFileAs('public/images/keyboard/', $imgfile, $imageName);
        $imagePath = 'images/keyboard/'.$imageName;
        
        $keyboard = new Keyboard();
        $keyboard->category_id = $request->category;
        $keyboard->name = $request->name;
        $keyboard->price = $request->price;
        $keyboard->description = $request->description;
        $keyboard->image_path = $imagePath;
        $keyboard->save();
        return redirect()->back()->with("success","Adding New Keyboard Success!");
        //might change later
    }

    public function updateIndex($id){
        $categ = Category::all();

        $keyboard = Keyboard::find($id);

        return view('update_keyboard')->with('categories',$categ)->with('keyboard', $keyboard);
    }

    public function update(Request $request){
        $validation = [
            "category"=>'required',
            "name"=>['required','min:5',Rule::unique('keyboards')->ignore($request->id)],
            "price"=>"integer|numeric|min:1",
            "description"=>"required|min:20",
            "image"=>"nullable|image"
        ];
        $request->validate($validation);

        $id = $request->id;

        $keyboard = Keyboard::find($id);
        if($keyboard == null) return redirect()->back(); //for safety

        $imgfile = $request->file('image');

        if($imgfile != null){
            $imageName = time().'_'.$imgfile->getClientOriginalName();
            Storage::putFileAs('public/images/keyboard/', $imgfile, $imageName);
            $imagePath = 'images/keyboard/'.$imageName;
            Storage::delete('public/'.$keyboard->image_path);
            $keyboard->image_path = $imagePath;
        }
       
        $keyboard->category_id = $request->category;
        $keyboard->name = $request->name;
        $keyboard->price = $request->price;
        $keyboard->description = $request->description;
        $keyboard->save();
        return redirect()->back()->with("success","Keyboard update Success!");
    }

    public function delete(Request $request){
        $keyboard = Keyboard::find($request->id);
        if($keyboard == null) return redirect()->back(); //for safety

        $keyboard->delete();
        return redirect()->back();
    }
}
