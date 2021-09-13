<?php

namespace App\Http\Controllers\Login;

use App\Http\Requests\Registration;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    function IndexLogin(){
        return view('login.login');
    }

    function LoginAuthentication(Request $request){
        $Admin = User::all();

        $data = [
            'email'     => 'required|email',
            'password'  => 'required'
        ];

        $request->validate($data);

        $credentials = $request->only('email','password');

        if (Auth::attempt($credentials)) {
            return response()->json([
                'code' => 200,
            ]); 
         }else{
            return response()->json([
                'status' => 500,
                'message' => 'Email atau password tidak sesuai'
            ]); 
        }
        

    }
}