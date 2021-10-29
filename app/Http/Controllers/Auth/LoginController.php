<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        if (!empty(auth()->user()->id)) {
            return redirect()->back();
        }

        return view('apps.auth.login');
    }

    public function login(Request $request){
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('checkUserLevel');
        }
        
        return redirect()->back();
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/login');
    }
}
