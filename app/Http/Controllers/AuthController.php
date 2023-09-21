<?php

namespace App\Http\Controllers;

use App\Models\User;
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
    public function logout(){
        Auth::logout();
        return redirect()->route('website');
    }

    public function registration(){
        return view('backend.pages.auth.registration');
    }

   public function registrationStore(Request $request){

   // dd($request->all());
    User::create([

        "name"=>$request->name,
        "email"=>$request->email,
        "role" => 'admin',
        "password"=>bcrypt($request->password),

    ]);

    return redirect()->route('login');
   }
}
