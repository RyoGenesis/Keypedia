<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Category;
use App\Models\DetailTransaction;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    
    public function getTransaction(){
        if(Auth::check()){
            $categ = Category::all();
            $user = Auth::user();
            $transaction = Transaction::where("user_id",$user->id)->orderBy('transaction_date','DESC')->get();
            return view('viewTransaction')->with('categories',$categ)->with('transaction',$transaction);
        }else{
            return redirect('login');
        }
    }

    public function getDetailTransaction($id){
        $detail = DetailTransaction::where("transaction_id",$id)->get();

        $categ = Category::all();
        return view('viewDetailTransaction')->with('details',$detail)->with('categories',$categ);
    }
}
