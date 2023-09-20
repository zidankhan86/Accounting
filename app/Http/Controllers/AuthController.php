<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(){
        return view('backend.pages.auth.login');
    }

    public function getLogin(Request $request){

        //dd($request->all());

         // Validate the input fields
  $validator = Validator::make($request->all(), [
    'email' => 'required|email',
    'password' => 'required',
]);

if ($validator->fails()) {
    return redirect()->back()->withErrors($validator)->withInput();
}

$credentials = $request->only(['email', 'password']);
$remember = $request->has('remember'); // Check if the "Remember Me" checkbox is checked

if (Auth::attempt($credentials, $remember)) {
    $user = Auth::user();

    if ($user->role == 'admin') {
        return redirect()->route('report');
    } elseif ($user->role !== 'admin') {
        return redirect()->route('website');
    }
}

// Authentication failed
return redirect()->back()->withInput()->withErrors(['login' => 'Invalid credentials']);


    }
}
