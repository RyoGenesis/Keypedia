<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Category;
use App\Models\DetailTransaction;
use App\Models\Transaction;
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
        echo $request->keyboard_id;
        $request->validate($validation);
        
        if($request->quantity == 0){
            $cart = DB::table("cart_items")->where("keyboard_id",$request->keyboard_id)->where("user_id",Auth::user()->id)->delete();

            return redirect()->back();
        }else{
            echo Auth::user()->id;
            $cart = CartItem::where("keyboard_id",$request->keyboard_id)->where("user_id",Auth::user()->id)->first();
            
            $cart->quantity = $request->quantity;
            $cart->save();
            return redirect()->back();
        }
        
    }
    
    public function addTransaction(Request $request){
        $user = Auth::user();

        $date = date("Y-m-d H:i:s");
        $transaction = new Transaction();
        $transaction->transaction_date = $date;
        $transaction->user_id = $user->id;
        $transaction->save();
        $carts = CartItem::where("user_id","=",$user->id)->get();
        foreach ($carts as $cart) {
            $detailTrans = new DetailTransaction();
            $detailTrans->transaction_id = $transaction->id;
            $detailTrans->keyboard_id = $cart->keyboard_id;
            $detailTrans->quantity = $cart->quantity;
            $detailTrans->save();
        }
        CartItem::where("user_id","=",$user->id)->delete();
        return redirect()->back();
    }

    public function insert(Request $request){
        $validation = [
            "quantity"=>"numeric|min:1"
        ];
        $request->validate($validation);

        $cartItem = CartItem::where("keyboard_id",$request->keyboard_id)->where("user_id",Auth::user()->id)->first();

        if($cartItem == null){
            $cartItem = new CartItem();
            $cartItem->keyboard_id = $request->keyboard_id;
            $cartItem->user_id = Auth::user()->id;
            $cartItem->quantity = $request->quantity;
            $cartItem->save();
            return redirect()->back()->with('success','Added To Cart!');
        } 
            
        $cartItem->quantity += $request->quantity;
        $cartItem->save();
        return redirect()->back()->with('success','Added To Cart!');
    }
}
