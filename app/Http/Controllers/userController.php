<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class userController extends Controller
{
    public function login(){
        return view('login');
    }
    public function register(){
        return view('register');
    }
    public function login_user(Request $request){
        $formField=$request->validate([
            "name"=>"required|max:50",
            "password"=>"required|min:3"
        ]);
    
        if (Auth::attempt($formField)) {
            return redirect()->route("home");
        } else {
            return response("Login Fail");
        }
    }

    public function register_user(Request $request){
        $formField=$request->validate([
            "name"=>"required|max:50",
            "password"=>"required|min:3|confirmed"
        ]);

        $user=User::create($formField);
        if($user){
            return redirect("/login")->with("success","Register Successfully");
        }
        return back()->withErrors("message","Login Fail");
    }   
}
