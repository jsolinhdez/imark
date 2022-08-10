<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm(){
        return view('backend.auth.login');
    }
    public function login(Request $request){
        if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect()->intended(route('admin'))->with('success','You are logged in as admin');
        }
        else{
            return back()->withInput($request->only('email'));
        }
    }
}
