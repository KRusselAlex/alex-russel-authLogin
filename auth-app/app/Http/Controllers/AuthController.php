<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function index(){
        return view('login');
    }

    public function authLogin(Request $request){
        //Form input validation
        $validatedAttributes = request()->validate([
            'email' =>['required','email'],
            'password' => ['required']
        ]);
 
        ///Authentification attemptation
        //But we can check, if it false, throw errors messages
        if(!Auth::attempt($validatedAttributes)){
            throw ValidationException::withMessages([
                'email' => "Email or password is incorrect !"
            ]);
        }

        ///New session regeneration for connected user
        request()->session()->regenerate();

        //Redirection to the root 
        return redirect('/dashboard');
    }

    public function register(){
        return view('register');
    }

    public function authRegister(Request $request){
        //Input data validation
     
       $validatedAttributes =  $request->validate([
            'name' => ['required', 'string', 'regex:/^([A-Za-z0-9\-\_\s]+)$/'], 
            'email' => ['required', 'unique:users', 'regex:/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/'],
            'password' => ['required', Password::min(8)->max(16)->letters()->numbers()->symbols(), 'confirmed'],
        ]);

        //User creation


        // dd($validatedAttributes);
        $user = User::create($validatedAttributes);     


        //User login
     
        // Auth::login($user);

        // event(new Registered($user));

        //Redirect
        return redirect('/');
    }


    public function logout(){
        // Logout current user!!
        Auth::logout();

        // //Redirect to root with disconnect status
        return redirect('/');
    }
}
