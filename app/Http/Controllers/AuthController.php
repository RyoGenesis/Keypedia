<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    //
    public function login(){
        return view('login');

    }
    public function doLogin(Request $request){
        $validation = [
            "email_address"=>"required",
            "password"=>"required"
        ];
        $credential = $request->validate($validation);
        // $user = User::where('email_address','=',$request["email_address"])->where('password','=',$request['password'])->first();
        if($request->remember){
            Cookie::queue('email',$credential['email_address'],10080);
        }
        if(Auth::attempt($credential,true)) return redirect("/home");
        else{
            return redirect()->back()->withErrors("Invalid Account!");
           
        }
    }
    public function addUser(Request $request){
        $validation = [
            "username"=>'required|min:5',
            "email_address"=>"required|email|unique:users",
            "password"=>"required|min:8",
            "confirm"=>"required|same:password",
            "address"=>"required|min:10",
            "gender"=>"required",
            "dob"=>"required"
        ];
        $temp = $request->validate($validation);
        
        $user = ["role_id"=>2,"username"=>$request->username,
        "email_address"=>$request->email_address,"password"=>$request->password,
        "address"=>$request->address,"gender"=>$request->gender,"dob"=>$request->dob];
        DB::table("users")->insert($user);
        return redirect()->back()->with("success","Register Success!");
    }

    public function register(){
        return view('register');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/home');
    }
}
