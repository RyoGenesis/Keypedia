<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MyCartController extends Controller
{
    public function index(){
        $categ = Category::all();
        $user = Auth::user();
        $cart = CartItem::where("user_id","=",$user->id)->get();
        return view("mycart")->with('categories',$categ)->with('carts',$cart);
    }

    public function updateCart(Request $request){
        $validation = [
            "quantity"=>"numeric|min:0"
        ];
        // echo "test";
        $request->validate($validation);
        
        if($request->quantity == 0){
            //where("keyboard_id","=",$request->keyboard_id)->where("user_id","=",Auth::user()->id)->first()->get()
            //CartItem::where("keyboard_id","=",$request->keyboard_id)->where("user_id","=",Auth::user()->id)->first();
            $cart = DB::table("cart_items")->where("keyboard_id",$request->keyboard_id)->where("user_id",Auth::user()->id)->delete();
            // print_r($cart);
            // $cart->delete();
            return redirect()->back();
        }else{
            $cart = CartItem::where("keyboard_id","=",$request->keyboard_id)->where("user_id","=",Auth::user()->id)->first();
            $cart->quantity = $request->quantity;
            $cart->save();
            return redirect()->back();
        }
        
    }
}
