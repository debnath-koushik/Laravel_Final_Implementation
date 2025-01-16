<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //Login Validation
    public function login(Request $req){

        parse_str($req->input('data'), $formData);

        // $user = LoginModel::where('uname', $formData['uname'])->first();

        if (Auth::attempt(['uname' => $formData['uname'], 'password' => $formData['pwd']])) {
            return response()->json(['success' => true, 'redirect' => route('welcome')]);
        } else {
            return response()->json(['success' => false, 'message' => 'Invalid credentials.']);
        }
        
    }

    // Logout responce
    public function logout(Request $request)
    {
        Auth::logout();

        return response()->json(['success' => true, 'redirect' => route('login')]);
    }

}
